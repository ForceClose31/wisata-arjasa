<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DestinationCategory::all();

        if ($categories->isEmpty()) {
            $this->command->warn('No categories found. Please run DestinationCategorySeeder first.');
            return;
        }

        $types = [
            ['en' => 'Public', 'id' => 'Umum'],
            ['en' => 'Private', 'id' => 'Pribadi'],
        ];

        $operationalHours = [
            ['en' => '08:00 AM - 05:00 PM', 'id' => '08:00 - 17:00'],
            ['en' => '09:00 AM - 06:00 PM', 'id' => '09:00 - 18:00'],
            ['en' => 'Open 24 hours', 'id' => 'Buka 24 jam'],
            ['en' => '07:00 AM - 10:00 PM', 'id' => '07:00 - 22:00'],
        ];

        $destinations = [
            [
                'en' => 'Citra Mandiri Waterpark',
                'id' => 'Waterpark Citra Mandiri',
                'image' => 'destinations/waterpark.jpg'
            ],
            [
                'en' => 'Calok Site',
                'id' => 'Situs Calok',
                'image' => 'destinations/calok.jpg'
            ],
            [
                'en' => 'Terraced Punden',
                'id' => 'Punden Berundak',
                'image' => 'destinations/punden.jpg'
            ],
            [
                'en' => 'Kesseh Gumitir Tourism Village',
                'id' => 'Kampung Wisata Kesseh Gumitir',
                'image' => 'destinations/kesseh.jpg'
            ],
            [
                'en' => 'Bakar Painting Gallery',
                'id' => 'Gallery Lukis Bakar',
                'image' => 'destinations/gallery.jpg'
            ],
            [
                'en' => 'Tirta Amertha Rajasa Spring',
                'id' => 'Sendang Tirta Amertha Rajasa',
                'image' => 'destinations/sendang.jpg'
            ],
            [
                'en' => 'Arjasa Village Art Studio',
                'id' => 'Sanggar Seni Desa Arjasa',
                'image' => 'destinations/sanggar.jpg'
            ],
            [
                'en' => 'Traditional Market',
                'id' => 'Pasar Tradisional',
                'image' => 'destinations/market.jpg'
            ],
            [
                'en' => 'Heritage Museum',
                'id' => 'Museum Warisan',
                'image' => 'destinations/museum.jpg'
            ],
            [
                'en' => 'Nature Reserve',
                'id' => 'Cagar Alam',
                'image' => 'destinations/nature.jpg'
            ]
        ];

        foreach ($destinations as $i => $destination) {
            $category = $categories->random();
            $type = $types[array_rand($types)];
            $hours = $operationalHours[array_rand($operationalHours)];

            Destination::create([
                'title' => json_encode([
                    'en' => $destination['en'],
                    'id' => $destination['id'],
                ]),
                'description' => json_encode([
                    'en' => 'This is the description for ' . $destination['en'] . ', a popular tourist destination in the area.',
                    'id' => 'Ini adalah deskripsi untuk ' . $destination['id'] . ', destinasi wisata populer di daerah ini.',
                ]),
                'image' => $destination['image'],
                'location' => 'Arjasa, Jember',
                'operational_hours' => json_encode($hours),
                'type' => json_encode($type),
                'category_id' => $category->id,
                'admin_id' => 1,
                'slug' => Str::slug($destination['en'] . '-' . Str::random(5)),
            ]);
        }

        $this->command->info('Successfully seeded ' . count($destinations) . ' tourist destinations.');
    }
}
