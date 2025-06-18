<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cottage;

class CottageSeeder extends Seeder
{
    public function run()
    {
        $cottages = [
            [
                'name' => 'Cottage Bambu',
                'slug' => 'cottage-bambu',
                'description' => 'Cottage nyaman dengan bahan utama bambu yang ramah lingkungan.',
                'price' => 350000,
                'capacity' => 2,
                'facilities' => ['Kasur queen size', 'Kamar mandi dalam', 'AC', 'WiFi', 'Dapur kecil'],
                'images' => ['cottages/bambu1.jpg', 'cottages/bambu2.jpg'],
                'is_available' => true,
            ],
            [
                'name' => 'Cottage Keluarga',
                'slug' => 'cottage-keluarga',
                'description' => 'Cottage luas yang cocok untuk keluarga dengan 2 kamar tidur.',
                'price' => 650000,
                'capacity' => 4,
                'facilities' => ['2 kamar tidur', 'Kamar mandi dalam', 'AC', 'TV', 'Dapur lengkap'],
                'images' => ['cottages/keluarga1.jpg', 'cottages/keluarga2.jpg'],
                'is_available' => true,
            ],
        ];

        foreach ($cottages as $cottage) {
            Cottage::create($cottage);
        }

        $this->command->info('Cottages seeded successfully!');
    }
}
