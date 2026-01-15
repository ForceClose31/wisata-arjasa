<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AnalyzeArchitectureMetrics extends Command
{
    protected $signature = 'architecture:analyze
                            {path=app/Modules : Path to analyze}
                            {--arch-version=v1 : Architecture version identifier}
                            {--type=modular : Architecture type (monolith|modular)}
                            {--output=storage/metrics : Output directory for results}
                            {--compare= : Compare with previous version file}';

    protected $description = 'Analyze architecture evolution using S1, S2, D1-D5 metrics for modular monolith';

    protected $metrics = [];
    protected $serviceConnections = [];
    protected $entities = [];
    protected $relationships = [];
    protected $modules = [];
    protected $ignoredDirs = ['vendor', 'node_modules', 'storage', 'bootstrap', 'public', 'tests', 'database'];

    public function handle()
    {
        $path = base_path($this->argument('path'));
        $version = $this->option('arch-version');
        $type = $this->option('type');
        $outputPath = base_path($this->option('output'));

        $this->info("🔍 Analyzing {$type} architecture at: {$path}");
        $this->info("📊 Version: {$version}");
        $this->newLine();

        if (!File::exists($path)) {
            $this->error("Path does not exist: {$path}");
            return 1;
        }

        if (!File::exists($outputPath)) {
            File::makeDirectory($outputPath, 0755, true);
        }

        if ($type === 'modular') {
            $this->analyzeModularMonolith($path);
        } else {
            $this->analyzeMonolith($path);
        }

        $this->calculateMetrics();

        $this->displayResults();

        $filename = $this->saveResults($outputPath, $version, $type);

        if ($compareFile = $this->option('compare')) {
            $this->compareVersions($filename, base_path($compareFile));
        }

        $this->newLine();
        $this->info('✅ Analysis completed successfully!');

        return 0;
    }

    /**
     * Analyze Modular Monolith Architecture
     */
    protected function analyzeModularMonolith($basePath)
    {
        $this->info('📦 Detecting modules...');

        $moduleDirs = File::directories($basePath);

        foreach ($moduleDirs as $moduleDir) {
            $moduleName = basename($moduleDir);

            if (in_array($moduleName, $this->ignoredDirs)) {
                continue;
            }

            $this->line("  - Scanning module: {$moduleName}");

            if ($this->hasNestedStructure($moduleDir)) {
                $this->line("    ↳ Detected nested Laravel structure");
                $this->analyzeNestedModule($moduleName, $moduleDir);
            } else {
                $this->analyzeModule($moduleName, $moduleDir);
            }
        }

        $this->info("✓ Found " . count($this->modules) . " modules");
    }

    /**
     * Check if directory has nested Laravel structure
     */
    protected function hasNestedStructure($dir)
    {
        return File::exists($dir . '/app') ||
               File::exists($dir . '/composer.json') ||
               File::exists($dir . '/module.json');
    }

    /**
     * Analyze nested module (like TourPackages with its own app structure)
     */
    protected function analyzeNestedModule($parentModule, $parentPath)
    {
        if (File::exists($parentPath . '/app')) {
            $appPath = $parentPath . '/app';
            $subModules = File::directories($appPath);

            foreach ($subModules as $subModuleDir) {
                $subModuleName = $parentModule . '::' . basename($subModuleDir);
                $this->line("    ↳ Found sub-module: " . basename($subModuleDir));
                $this->analyzeModule($subModuleName, $subModuleDir);
            }
        } else {
            $this->analyzeModule($parentModule, $parentPath);
        }
    }

    /**
     * Analyze Traditional Monolith Architecture
     */
    protected function analyzeMonolith($basePath)
    {
        $this->info('📦 Analyzing monolith structure...');

        $this->modules['App'] = [
            'path' => $basePath,
            'controllers' => [],
            'models' => [],
            'services' => [],
            'repositories' => [],
            'requests' => [],
            'resources' => [],
            'connections' => []
        ];

        $this->analyzeModule('App', $basePath);
    }

    /**
     * Analyze individual module
     */
    protected function analyzeModule($moduleName, $modulePath)
    {
        if (!isset($this->modules[$moduleName])) {
            $this->modules[$moduleName] = [
                'path' => $modulePath,
                'controllers' => [],
                'models' => [],
                'services' => [],
                'repositories' => [],
                'requests' => [],
                'resources' => [],
                'connections' => []
            ];
        }

        $this->scanForControllers($moduleName, $modulePath);

        $this->scanForModels($moduleName, $modulePath);

        $this->scanForServices($moduleName, $modulePath);

        $this->scanForRepositories($moduleName, $modulePath);

        $this->scanForRequests($moduleName, $modulePath);

        $this->scanForResources($moduleName, $modulePath);

        $this->detectConnections($moduleName, $modulePath);
    }

    /**
     * Scan for Controllers
     */
    protected function scanForControllers($moduleName, $basePath)
    {
        $controllerPaths = [
            $basePath . '/Controllers',
            $basePath . '/Http/Controllers',
        ];

        foreach ($controllerPaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $this->modules[$moduleName]['controllers'][] = $file->getPathname();
                    }
                }
            }
        }
    }

    /**
     * Scan for Models/Entities
     */
    protected function scanForModels($moduleName, $basePath)
    {
        $modelPaths = [
            $basePath . '/Models',
            $basePath . '/Entities',
        ];

        foreach ($modelPaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $modelPath = $file->getPathname();
                        $this->modules[$moduleName]['models'][] = $modelPath;
                        $this->analyzeModel($moduleName, $modelPath);
                    }
                }
            }
        }
    }

    /**
     * Scan for Services
     */
    protected function scanForServices($moduleName, $basePath)
    {
        $servicePaths = [
            $basePath . '/Services',
            $basePath . '/Service',
        ];

        foreach ($servicePaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $this->modules[$moduleName]['services'][] = $file->getPathname();
                    }
                }
            }
        }
    }

    /**
     * Scan for Repositories
     */
    protected function scanForRepositories($moduleName, $basePath)
    {
        $repoPaths = [
            $basePath . '/Repositories',
            $basePath . '/Repository',
        ];

        foreach ($repoPaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $this->modules[$moduleName]['repositories'][] = $file->getPathname();
                    }
                }
            }
        }
    }

    /**
     * Scan for Requests (Form Requests - Transient Entities)
     */
    protected function scanForRequests($moduleName, $basePath)
    {
        $requestPaths = [
            $basePath . '/Requests',
            $basePath . '/Http/Requests',
        ];

        foreach ($requestPaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $requestPath = $file->getPathname();
                        $this->modules[$moduleName]['requests'][] = $requestPath;
                        $this->analyzeTransientEntity($moduleName, $requestPath, 'request');
                    }
                }
            }
        }
    }

    /**
     * Scan for Resources (API Resources - Transient Entities)
     */
    protected function scanForResources($moduleName, $basePath)
    {
        $resourcePaths = [
            $basePath . '/Resources',
            $basePath . '/Http/Resources',
        ];

        foreach ($resourcePaths as $path) {
            if (File::exists($path)) {
                $files = File::allFiles($path);
                foreach ($files as $file) {
                    if ($file->getExtension() === 'php') {
                        $resourcePath = $file->getPathname();
                        $this->modules[$moduleName]['resources'][] = $resourcePath;
                        $this->analyzeTransientEntity($moduleName, $resourcePath, 'resource');
                    }
                }
            }
        }
    }

    /**
     * Analyze Model for entities and relationships
     */
    protected function analyzeModel($moduleName, $filePath)
    {
        $content = File::get($filePath);
        $className = $this->extractClassName($content);

        if (!$className) {
            return;
        }

        $isPersistent = $this->isPersistentEntity($content);

        $entityData = [
            'module' => $moduleName,
            'name' => $className,
            'file' => $filePath,
            'type' => $isPersistent ? 'persistent' : 'transient',
            'relationships' => [],
            'fields' => $this->extractFields($content)
        ];

        $relationships = $this->extractRelationships($content, $className, $moduleName);
        $entityData['relationships'] = $relationships;

        $this->entities[$moduleName . '::' . $className] = $entityData;
    }

    /**
     * Analyze Transient Entity (Request/Resource)
     */
    protected function analyzeTransientEntity($moduleName, $filePath, $type)
    {
        $content = File::get($filePath);
        $className = $this->extractClassName($content);

        if (!$className) {
            return;
        }

        $entityData = [
            'module' => $moduleName,
            'name' => $className,
            'file' => $filePath,
            'type' => 'transient',
            'subtype' => $type,
            'relationships' => [],
            'fields' => $this->extractTransientFields($content)
        ];

        $this->entities[$moduleName . '::' . $className] = $entityData;
    }

    /**
     * Detect connections between modules
     */
    protected function detectConnections($moduleName, $modulePath)
    {
        $allFiles = File::allFiles($modulePath);

        foreach ($allFiles as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $content = File::get($file->getPathname());

            foreach ($this->modules as $targetModule => $data) {
                if ($targetModule === $moduleName) {
                    continue;
                }

                $targetModuleBase = str_replace('::', '\\', $targetModule);

                if (preg_match_all('/use\s+App\\\\Modules\\\\[^;]*' . preg_quote(basename($targetModuleBase), '/') . '[^;]*/i', $content, $matches)) {
                    foreach ($matches[0] as $match) {
                        $this->serviceConnections[] = [
                            'from' => $moduleName,
                            'to' => $targetModule,
                            'type' => 'use_statement',
                            'detail' => trim($match),
                            'file' => $file->getPathname()
                        ];
                    }
                }

                if (preg_match_all('/\\\\?' . preg_quote(basename($targetModuleBase), '/') . '::/i', $content, $matches)) {
                    $this->serviceConnections[] = [
                        'from' => $moduleName,
                        'to' => $targetModule,
                        'type' => 'static_call',
                        'count' => count($matches[0])
                    ];
                }
            }
        }
    }

    /**
     * Calculate all metrics
     */
    protected function calculateMetrics()
    {
        $this->metrics['S1'] = count($this->modules);

        $uniqueConnections = [];
        foreach ($this->serviceConnections as $conn) {
            $key = $conn['from'] . '->' . $conn['to'];
            $uniqueConnections[$key] = true;
        }
        $this->metrics['S2'] = count($uniqueConnections);

        $persistentEntities = array_filter($this->entities, function($entity) {
            return $entity['type'] === 'persistent';
        });
        $this->metrics['D1'] = count($persistentEntities);

        $transientEntities = array_filter($this->entities, function($entity) {
            return $entity['type'] === 'transient';
        });
        $this->metrics['D2'] = count($transientEntities);

        $totalRelationships = 0;
        foreach ($this->entities as $entity) {
            if ($entity['type'] === 'persistent') {
                $totalRelationships += count($entity['relationships']);
            }
        }
        $this->metrics['D3'] = (int)($totalRelationships / 2);

        $this->metrics['D4'] = $this->findMergeCandidates();

        $this->metrics['D5'] = $this->findMergeCandidateRelationships();
    }

    /**
     * Find merge candidate entities (entities with similar names across modules)
     */
    protected function findMergeCandidates()
    {
        $candidates = 0;
        $entityNames = [];

        foreach ($this->entities as $fullName => $entity) {
            $name = strtolower($entity['name']);
            if (!isset($entityNames[$name])) {
                $entityNames[$name] = [];
            }
            $entityNames[$name][] = $entity;
        }

        foreach ($entityNames as $name => $entities) {
            if (count($entities) > 1) {
                $modules = array_unique(array_column($entities, 'module'));
                if (count($modules) > 1) {
                    $candidates += count($entities) - 1;
                }
            }
        }

        return $candidates;
    }

    /**
     * Find merge candidate relationships
     */
    protected function findMergeCandidateRelationships()
    {
        $candidateRelationships = 0;
        $entityNames = [];

        foreach ($this->entities as $fullName => $entity) {
            if ($entity['type'] !== 'persistent') continue;

            $name = strtolower($entity['name']);
            if (!isset($entityNames[$name])) {
                $entityNames[$name] = [];
            }
            $entityNames[$name][] = $entity;
        }

        foreach ($entityNames as $name => $entities) {
            if (count($entities) > 1) {
                $modules = array_unique(array_column($entities, 'module'));
                if (count($modules) > 1) {
                    foreach ($entities as $entity) {
                        $candidateRelationships += count($entity['relationships']);
                    }
                }
            }
        }

        return (int)($candidateRelationships / 2);
    }

    /**
     * Helper: Extract class name from file content
     */
    protected function extractClassName($content)
    {
        if (preg_match('/class\s+(\w+)/', $content, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Helper: Check if entity is persistent
     */
    protected function isPersistentEntity($content)
    {
        // Check for Eloquent Model extension
        if (preg_match('/extends\s+(Model|Authenticatable|Pivot)/', $content)) {
            return true;
        }

        // Check for table property
        if (preg_match('/protected\s+\$table\s*=/', $content)) {
            return true;
        }

        return false;
    }

    /**
     * Helper: Extract fields from entity
     */
    protected function extractFields($content)
    {
        $fields = [];

        if (preg_match('/protected\s+\$fillable\s*=\s*\[(.*?)\]/s', $content, $matches)) {
            $fillable = preg_replace('/[\'"\s]/', '', $matches[1]);
            $fields = array_merge($fields, array_filter(explode(',', $fillable)));
        }

        if (preg_match('/protected\s+\$guarded\s*=\s*\[(.*?)\]/s', $content, $matches)) {
            $guarded = preg_replace('/[\'"\s]/', '', $matches[1]);
            $fields = array_merge($fields, array_filter(explode(',', $guarded)));
        }

        if (preg_match('/protected\s+\$casts\s*=\s*\[(.*?)\]/s', $content, $matches)) {
            if (preg_match_all('/[\'"](\w+)[\'"]\s*=>/s', $matches[1], $castMatches)) {
                $fields = array_merge($fields, $castMatches[1]);
            }
        }

        return array_filter(array_unique($fields));
    }

    /**
     * Helper: Extract fields from transient entities
     */
    protected function extractTransientFields($content)
    {
        $fields = [];

        if (preg_match('/public\s+function\s+rules\s*\(\).*?return\s*\[(.*?)\]/s', $content, $matches)) {
            if (preg_match_all('/[\'"](\w+)[\'"]\s*=>/s', $matches[1], $ruleMatches)) {
                $fields = array_merge($fields, $ruleMatches[1]);
            }
        }

        if (preg_match('/public\s+function\s+toArray\s*\(.*?\).*?return\s*\[(.*?)\]/s', $content, $matches)) {
            if (preg_match_all('/[\'"](\w+)[\'"]\s*=>/s', $matches[1], $arrayMatches)) {
                $fields = array_merge($fields, $arrayMatches[1]);
            }
        }

        return array_filter(array_unique($fields));
    }

    /**
     * Helper: Extract relationships from entity
     */
    protected function extractRelationships($content, $className, $moduleName)
    {
        $relationships = [];

        $relationshipTypes = [
            'hasOne', 'hasMany', 'belongsTo', 'belongsToMany',
            'hasOneThrough', 'hasManyThrough', 'morphTo', 'morphOne', 'morphMany',
            'morphToMany', 'morphedByMany'
        ];

        foreach ($relationshipTypes as $type) {
            $pattern = '/public\s+function\s+(\w+)\s*\([^)]*\)\s*(?::\s*\w+)?\s*\{[^}]*return\s+\$this->' . $type . '\s*\(\s*([^,\)]+)/s';

            if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $relationName = $match[1];
                    $targetClass = isset($match[2]) ? trim($match[2], '\'" ') : 'Unknown';

                    if (strpos($targetClass, '::class') !== false) {
                        $targetClass = str_replace('::class', '', $targetClass);
                        $targetClass = basename(str_replace('\\', '/', $targetClass));
                    }

                    $relationships[] = [
                        'name' => $relationName,
                        'type' => $type,
                        'from' => $className,
                        'to' => $targetClass,
                        'module' => $moduleName
                    ];
                }
            }
        }

        return $relationships;
    }

    /**
     * Display results in console
     */
    protected function displayResults()
    {
        $this->newLine();
        $this->info('📊 ===== ARCHITECTURE METRICS RESULTS =====');
        $this->newLine();

        $this->line('<fg=cyan>═══ SERVICE VIEW METRICS ═══</>');
        $this->table(
            ['Metric', 'Code', 'Value', 'Description'],
            [
                ['S1', '#µs', $this->metrics['S1'], 'Number of Modules/Services'],
                ['S2', '#Cµs', $this->metrics['S2'], 'Number of Module Connections'],
            ]
        );

        $this->newLine();

        $this->line('<fg=cyan>═══ DATA VIEW METRICS ═══</>');
        $this->table(
            ['Metric', 'Code', 'Value', 'Description'],
            [
                ['D1', '#PDEs', $this->metrics['D1'], 'Persistent Entities (Models)'],
                ['D2', '#TDEs', $this->metrics['D2'], 'Transient Entities (DTOs)'],
                ['D3', '#RDEs', $this->metrics['D3'], 'Entity Relationships'],
                ['D4', '#MDEs', $this->metrics['D4'], 'Merge Candidate Entities'],
                ['D5', '#MRDEs', $this->metrics['D5'], 'Merge Candidate Relationships'],
            ]
        );

        $this->newLine();

        $this->line('<fg=cyan>═══ MODULE BREAKDOWN ═══</>');
        $moduleData = [];
        foreach ($this->modules as $name => $data) {
            $moduleData[] = [
                $name,
                count($data['controllers']),
                count($data['models']),
                count($data['services']),
                count($data['repositories']),
                count($data['requests']) + count($data['resources'])
            ];
        }
        $this->table(
            ['Module', 'Controllers', 'Models', 'Services', 'Repositories', 'DTOs'],
            $moduleData
        );

        if (!empty($this->serviceConnections)) {
            $this->newLine();
            $this->line('<fg=yellow>═══ TOP MODULE CONNECTIONS ═══</>');

            $connectionCounts = [];
            foreach ($this->serviceConnections as $conn) {
                $key = $conn['from'] . ' → ' . $conn['to'];
                if (!isset($connectionCounts[$key])) {
                    $connectionCounts[$key] = 0;
                }
                $connectionCounts[$key]++;
            }

            arsort($connectionCounts);
            $topConnections = array_slice($connectionCounts, 0, 10, true);

            $connData = [];
            foreach ($topConnections as $connection => $count) {
                $connData[] = [$connection, $count];
            }

            $this->table(['Connection', 'Count'], $connData);
        }
    }

    /**
     * Save results to JSON file
     */
    protected function saveResults($outputPath, $version, $type)
    {
        $results = [
            'version' => $version,
            'architecture_type' => $type,
            'timestamp' => now()->toIso8601String(),
            'metrics' => $this->metrics,
            'modules' => array_map(function($name, $module) {
                return [
                    'name' => $name,
                    'controllers_count' => count($module['controllers']),
                    'models_count' => count($module['models']),
                    'services_count' => count($module['services']),
                    'repositories_count' => count($module['repositories']),
                    'requests_count' => count($module['requests']),
                    'resources_count' => count($module['resources']),
                ];
            }, array_keys($this->modules), $this->modules),
            'entities' => array_map(function($fullName, $entity) {
                return [
                    'full_name' => $fullName,
                    'name' => $entity['name'],
                    'module' => $entity['module'],
                    'type' => $entity['type'],
                    'subtype' => $entity['subtype'] ?? null,
                    'relationships_count' => count($entity['relationships']),
                    'fields_count' => count($entity['fields'])
                ];
            }, array_keys($this->entities), $this->entities),
            'connections' => $this->serviceConnections,
            'relationships' => array_reduce($this->entities, function($carry, $entity) {
                return array_merge($carry, $entity['relationships']);
            }, [])
        ];

        $filename = "{$outputPath}/metrics_{$type}_{$version}_" . date('YmdHis') . ".json";
        File::put($filename, json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $this->newLine();
        $this->info("💾 Results saved to: {$filename}");

        return $filename;
    }

    /**
     * Compare two versions
     */
    protected function compareVersions($currentFile, $previousFile)
    {
        if (!File::exists($previousFile)) {
            $this->warn("Previous version file not found: {$previousFile}");
            return;
        }

        $current = json_decode(File::get($currentFile), true);
        $previous = json_decode(File::get($previousFile), true);

        $this->newLine();
        $this->info('📈 ===== VERSION COMPARISON =====');
        $this->newLine();

        $this->line("<fg=cyan>Comparing: {$previous['version']} → {$current['version']}</>");
        $this->newLine();

        $comparisonData = [];
        foreach ($current['metrics'] as $key => $value) {
            $oldValue = $previous['metrics'][$key] ?? 0;
            $diff = $value - $oldValue;
            $diffStr = $diff > 0 ? "+{$diff}" : (string)$diff;
            $emoji = $diff > 0 ? '📈' : ($diff < 0 ? '📉' : '➡️');

            $comparisonData[] = [
                $key,
                $oldValue,
                $value,
                $diffStr,
                $emoji
            ];
        }

        $this->table(
            ['Metric', $previous['version'], $current['version'], 'Change', 'Trend'],
            $comparisonData
        );
    }
}
