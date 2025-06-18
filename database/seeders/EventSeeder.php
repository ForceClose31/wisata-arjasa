<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'Festival Budaya Desa',
                'slug' => 'festival-budaya-desa',
                'description' => 'Acara tahunan menampilkan berbagai kesenian dan budaya tradisional.',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(17),
                'location' => 'Lapangan Desa Wisata',
                'image' => 'events/festival1.jpg',
                'is_published' => true,
            ],
            [
                'title' => 'Workshop Kerajinan Tangan',
                'slug' => 'workshop-kerajinan-tangan',
                'description' => 'Belajar membuat kerajinan tangan tradisional dari pengrajin lokal.',
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(30),
                'location' => 'Ruang Kreatif Desa',
                'image' => 'events/workshop1.jpg',
                'is_published' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('Events seeded successfully!');
    }
}
