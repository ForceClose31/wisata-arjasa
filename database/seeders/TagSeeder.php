<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Wisata Alam',
            'Budaya',
            'Kuliner',
            'Akomodasi',
            'Transportasi',
            'Tips',
            'Event',
            'Sejarah'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => \Illuminate\Support\Str::slug($tag)
            ]);
        }
    }
}
