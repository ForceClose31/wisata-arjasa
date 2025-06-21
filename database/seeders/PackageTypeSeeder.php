<?php

namespace Database\Seeders;

use App\Models\PackageType;
use Illuminate\Database\Seeder;

class PackageTypeSeeder extends Seeder
{
    public function run()
    {
        $packageTypes = [
            [
                'name' => 'One Day Tour',
                'slug' => 'one-day-tour',
                'description' => 'Paket wisata sehari penuh'
            ],
            [
                'name' => 'Heritage and Art Camp (2D1N)',
                'slug' => 'heritage-art-camp',
                'description' => 'Paket 2 hari 1 malam dengan fokus warisan budaya dan seni'
            ],
            [
                'name' => 'Research Tour (3D2N)',
                'slug' => 'research-tour',
                'description' => 'Paket 3 hari 2 malam untuk tujuan penelitian'
            ],
            [
                'name' => 'Hyang Argopuro Festival',
                'slug' => 'hyang-argopuro-festival',
                'description' => 'Paket khusus event festival Hyang Argopuro'
            ]
        ];

        foreach ($packageTypes as $type) {
            PackageType::create($type);
        }
    }
}
