<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $categories = EventCategory::all();

        if ($categories->isEmpty()) {
            $this->command->warn('No categories found. Please run EventCategorySeeder first.');
            return;
        }

        $types = [
            ['en' => 'Free', 'id' => 'Gratis'],
            ['en' => 'Paid', 'id' => 'Berbayar'],
        ];

        $statuses = [
            ['en' => 'live', 'id' => 'langsung'],
            ['en' => 'upcoming', 'id' => 'akan datang'],
            ['en' => 'past', 'id' => 'lalu'],
            ['en' => 'ongoing', 'id' => 'berlangsung'],
        ];

        foreach (range(1, 10) as $i) {
            $category = $categories->random();
            $type = $types[array_rand($types)];
            $status = $statuses[array_rand($statuses)];

            Event::create([
                'title' => [
                    'en' => 'Sample Event ' . $i,
                    'id' => 'Acara Contoh ' . $i,
                ],
                'description' => [
                    'en' => 'This is the description of event number ' . $i,
                    'id' => 'Ini adalah deskripsi untuk acara nomor ' . $i,
                ],
                'image' => 'https://via.placeholder.com/600x400.png?text=Event+' . $i,
                'location' => 'Bali',
                'start_date' => now()->addDays($i),
                'end_date' => now()->addDays($i + 1),
                'type' => $type,
                'status' => $status,
                'category_id' => $category->id,
                'slug' => Str::slug('Sample Event ' . $i . '-' . Str::random(5)),
            ]);
        }
    }
}
