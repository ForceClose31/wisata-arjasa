<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ScanLangStrings extends Command
{
    protected $signature = 'lang:scan';

    protected $description = 'Scan all Blade files and extract translation strings into lang files';

    public function handle()
    {
        $path = resource_path('views');
        $langPath = resource_path('lang/id');
        $strings = [];

        foreach (File::allFiles($path) as $file) {
            $contents = File::get($file);
            preg_match_all("/__\(['\"](.*?)['\"]\)/", $contents, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $string) {
                    $strings[$string] = $string;
                }
            }
        }

        if (!File::exists($langPath)) {
            File::makeDirectory($langPath, 0755, true);
        }

        $langFile = "<?php\n\nreturn " . var_export($strings, true) . ";\n";
        File::put($langPath . '/about.php', $langFile);

        $this->info("✔️ Bahasa berhasil digenerate ke `resources/lang/id/about.php`");
    }
}
