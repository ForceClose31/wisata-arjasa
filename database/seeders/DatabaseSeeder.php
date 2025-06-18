<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
            CottageSeeder::class,
            TourPackageSeeder::class,
            TestimonialSeeder::class,
            EventSeeder::class,
            ContentSeeder::class,
        ]);
    }
}
