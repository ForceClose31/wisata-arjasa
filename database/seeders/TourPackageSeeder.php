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
                'name' => 'Paket Wisata 1 Hari',
                'slug' => 'paket-wisata-1-hari',
                'description' => 'Nikmati wisata alam selama sehari penuh dengan berbagai aktivitas seru.',
                'price' => 250000,
                'duration' => 1,
                'itinerary' => [
                    ['time' => '08:00', 'activity' => 'Penjemputan di titik kumpul'],
                    ['time' => '09:00', 'activity' => 'Trekking ke air terjun'],
                    ['time' => '12:00', 'activity' => 'Makan siang'],
                    ['time' => '13:00', 'activity' => 'Bersepeda keliling desa'],
                    ['time' => '16:00', 'activity' => 'Kembali ke titik kumpul'],
                ],
                'includes' => ['Transportasi', 'Pemandu', 'Tiket masuk', 'Makan siang', 'Air mineral'],
                'excludes' => ['Pengeluaran pribadi', 'Asuransi perjalanan'],
                'images' => ['tours/1hari1.jpg', 'tours/1hari2.jpg'],
                'is_available' => true,
            ],
            [
                'name' => 'Paket Wisata 2 Hari 1 Malam',
                'slug' => 'paket-wisata-2-hari-1-malam',
                'description' => 'Pengalaman menginap di alam dengan berbagai aktivitas petualangan.',
                'price' => 750000,
                'duration' => 2,
                'itinerary' => [
                    ['time' => 'Day 1', 'activity' => 'Aktivitas hari pertama'],
                    ['time' => 'Day 2', 'activity' => 'Aktivitas hari kedua'],
                ],
                'includes' => ['Penginapan 1 malam', 'Makan 3x', 'Pemandu', 'Aktivitas'],
                'excludes' => ['Transportasi dari kota asal', 'Pengeluaran pribadi'],
                'images' => ['tours/2hari1.jpg', 'tours/2hari2.jpg'],
                'is_available' => true,
            ],
        ];

        foreach ($packages as $package) {
            TourPackage::create($package);
        }

        $this->command->info('Tour packages seeded successfully!');
    }
}
