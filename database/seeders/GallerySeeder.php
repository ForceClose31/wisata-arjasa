<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $galleries = [
            [
                'title' => 'Ngurbloat Beach',
                'description' => 'The finest white sand in the world',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Pulau Adranan',
                'description' => 'Hidden gem with crystal clear water',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ohoilertawun Beach',
                'description' => 'Swing by the beach',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach Sand',
                'description' => 'Kei Islands Wonder',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach Paddleboard',
                'description' => 'The finest white sand in the world',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Goa Hawang',
                'description' => 'Mystical Cave Pool',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach Sunset 2',
                'description' => 'Golden Hour Beauty',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach People',
                'description' => 'The finest white sand',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach Wide',
                'description' => 'The finest white sand',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ],
            [
                'title' => 'Ngurbloat Beach Paddleboard Group',
                'description' => 'SUP Fun',
                'image_path' => 'tour-packages/kei-island.webp',
                'location' => 'Arjasa, Kei Islands'
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
