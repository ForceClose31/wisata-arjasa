<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourPackage;

class TourPackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'name' => 'Kei Island',
                'subtitle' => 'The Hidden Paradise',
                'slug' => 'kei-island-tes',
                'description' => 'Paket wisata lengkap ke pulau Kei dengan destinasi terbaik...',
                'price' => 3500000,
                'duration' => '3 Hari 2 Malam',
                'min_person' => 2,
                'highlights' => [
                    'Pantai Ngurbloat',
                    'Pulau Bair',
                    'Goa Hawang',
                    'Tanjung Verenang'
                ],
                'includes' => [
                    'Hotel/Penginapan di Pantai',
                    'Makan + Snack + Air Mineral',
                    'Mobil + Speed Boat',
                    'Karcis Lokasi Wisata',
                    'Guide + Dokumentasi'
                ],
                'images' => ['tour-packages/kei-island.jpg'],
                'website_url' => 'https://www.mtckeitourandtravel.com',
                'phone_numbers' => ['0311477719', '082196644495'],
                'is_featured' => true
            ],
            [
                'name' => 'Kei Island',
                'subtitle' => 'The Hidden Paradise',
                'slug' => 'kei-island',
                'description' => 'Paket wisata lengkap ke pulau Kei dengan destinasi terbaik...',
                'price' => 3500000,
                'duration' => '3 Hari 2 Malam',
                'min_person' => 2,
                'highlights' => [
                    'Pantai Ngurbloat',
                    'Pulau Bair',
                    'Goa Hawang',
                    'Tanjung Verenang'
                ],
                'includes' => [
                    'Hotel/Penginapan di Pantai',
                    'Makan + Snack + Air Mineral',
                    'Mobil + Speed Boat',
                    'Karcis Lokasi Wisata',
                    'Guide + Dokumentasi'
                ],
                'images' => ['tour-packages/kei-island.jpg'],
                'website_url' => 'https://www.mtckeitourandtravel.com',
                'phone_numbers' => ['0311477719', '082196644495'],
                'is_featured' => true
            ],
        ];

        foreach ($packages as $package) {
            TourPackage::create($package);
        }

        $this->command->info('Tour packages seeded successfully!');
    }
}
