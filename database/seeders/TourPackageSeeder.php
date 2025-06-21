<?php

namespace Database\Seeders;

use App\Models\PackageType;
use App\Models\TourPackage;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    public function run()
    {
        // DAY ONE DAY TOUR
        $oneDayTour = TourPackage::create([
            'package_type_id' => PackageType::where('slug', 'one-day-tour')->first()->id,
            'name' => 'DAY ONE DAY TOUR DESA WISATA ADAT ARJASA',
            'slug' => 'day-one-tour-arjasa',
            'description' => 'Paket wisata sehari penuh menjelajahi Desa Wisata Adat Arjasa',
            'duration' => '1 Hari',
            'images' => [
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
            ],
            'itinerary' => [
                'Penjemputan di Terminal Bus Pariwisata Desa Arjasa',
                'Perjalanan menggunakan angkot sultan modifikasi',
                'Kunjungan ke Gallery Lukis Bakar Thoni Art Work',
                'Kunjungan ke Sendang Tirta Amertha Rajasa/Situs Calok',
                'Aktivitas pilihan: Punden Berundak/PS Craft/Batik Silabango/Cooking Class',
                'Berakhir di Wisata Citra Mandiri waterpark'
            ],
            'includes' => [
                'Transportasi dengan fasilitas baik',
                'Tiket masuk destinasi wisata',
                'Breakfast, makan siang dan makan malam',
                'Coffee break dengan kuliner khas',
                'Air mineral 600ml',
                'Tour guide',
                'Selendang',
                'Dokumentasi foto',
                'Asuransi'
            ],
            'excludes' => [
                'Tiket pesawat PP',
                'Keperluan pribadi',
                'Menu makan tambahan',
                'Alat lukis bakar/membatik (bisa disewa Rp150.000/orang)',
                'Tour tambahan',
                'Tips guide dan driver'
            ],
            'highlights' => [
                'Pengalaman budaya lokal',
                'Kunjungan ke situs heritage',
                'Aktivitas seni dan kerajinan',
                'Wisata air di Citra Mandiri'
            ],
            'is_featured' => true,
            'is_available' => true
        ]);

        // Pricing for One Day Tour
        $oneDayTour->pricings()->createMany([
            ['group_size' => '20 pack', 'price' => 150000, 'variant' => 'non cooking class'],
            ['group_size' => '20 pack', 'price' => 200000, 'variant' => 'cooking class'],
            ['group_size' => '30 pack', 'price' => 145000, 'variant' => 'non cooking class'],
            ['group_size' => '30 pack', 'price' => 195000, 'variant' => 'cooking class'],
            ['group_size' => '40 pack', 'price' => 140000, 'variant' => 'non cooking class'],
            ['group_size' => '40 pack', 'price' => 190000, 'variant' => 'cooking class'],
            ['group_size' => '50 pack', 'price' => 135000, 'variant' => 'non cooking class'],
            ['group_size' => '50 pack', 'price' => 185000, 'variant' => 'cooking class'],
            ['group_size' => '60 pack', 'price' => 130000, 'variant' => 'non cooking class'],
            ['group_size' => '60 pack', 'price' => 180000, 'variant' => 'cooking class']
        ]);

        // HERITAGE AND ART CAMP (2D1N)
        $heritageCamp = TourPackage::create([
            'package_type_id' => PackageType::where('slug', 'heritage-art-camp')->first()->id,
            'name' => 'PAKET WISATA HERITAGE AND ART CAMP (2D1N)',
            'slug' => 'heritage-art-camp',
            'description' => 'Pengalaman 2 hari 1 malam menjelajahi warisan budaya dan seni Arjasa',
            'duration' => '2 Hari 1 Malam',
            'images' => [
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
            ],
            'itinerary' => [
                'Hari 1: Penjemputan, Gallery Lukis Bakar, Batik Silabango, PS Craft',
                'Hari 1: Kunjungan ke Sendang Tirta Amertha Rajasa/Situs Calok',
                'Hari 1: Coffee break dengan pagelaran ta\' bhuta an',
                'Hari 2: Trip megalithikum dan cooking class sayur gudug',
                'Hari 2: Belajar gamelan tradisional'
            ],
            'includes' => [
                'Transportasi dengan fasilitas baik',
                'Tiket masuk destinasi wisata',
                'Penginapan camping ground (kapasitas 2 orang/camp)',
                'Makan: 2x breakfast, 2x makan siang, 1x makan malam',
                'Coffee break dengan kuliner khas',
                'Air mineral 600ml',
                'Tour guide',
                'Selendang',
                'Dokumentasi foto',
                'Asuransi'
            ],
            'excludes' => [
                'Tiket pesawat PP',
                'Keperluan pribadi',
                'Menu makan tambahan',
                'Alat lukis bakar/membatik (bisa disewa Rp150.000/orang)',
                'Tour tambahan',
                'Tips guide dan driver'
            ],
            'highlights' => [
                'Pengalaman menginap di camping ground',
                'Aktivitas seni dan budaya langsung',
                'Cooking class sayur gudug',
                'Pagelaran seni tradisional'
            ],
            'is_featured' => true,
            'is_available' => true
        ]);

        // Pricing for Heritage and Art Camp
        $heritageCamp->pricings()->createMany([
            ['group_size' => '20 pack', 'price' => 530000],
            ['group_size' => '30 pack', 'price' => 525000],
            ['group_size' => '40 pack', 'price' => 520000],
            ['group_size' => '50 pack', 'price' => 515000],
            ['group_size' => '60 pack', 'price' => 510000]
        ]);

        // RESEARCH TOUR (3D2N)
        $researchTour = TourPackage::create([
            'package_type_id' => PackageType::where('slug', 'research-tour')->first()->id,
            'name' => 'PAKET WISATA RESEARCH TOUR (3H2M)',
            'slug' => 'research-tour',
            'description' => 'Paket 3 hari 2 malam untuk penelitian budaya dan heritage Arjasa',
            'duration' => '3 Hari 2 Malam',
            'images' => [
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
            ],
            'itinerary' => [
                'Hari 1: Penjemputan, Gallery Lukis Bakar, Batik Silabango, PS Craft',
                'Hari 1: Kunjungan ke Sendang Tirta Amertha Rajasa/Situs Calok',
                'Hari 1: Coffee break dengan pagelaran ta\' bhuta an',
                'Hari 2: Trip megalithikum dan cooking class sayur gudug',
                'Hari 2: Belajar gamelan tradisional',
                'Hari 2: Makan malam grill dengan pagelaran gendhung dan pencak silat',
                'Hari 3: Kunjungan ke Museum Tembakau/Museum Huruf/City Tour Jember'
            ],
            'includes' => [
                'Transportasi dengan fasilitas baik',
                'Tiket masuk destinasi wisata',
                'Penginapan camping ground',
                'Makan: 3x breakfast, 3x makan siang, 2x makan malam',
                'Coffee break dengan kuliner khas',
                'Air mineral 600ml',
                'Tour guide',
                'Selendang',
                'Dokumentasi foto',
                'Asuransi'
            ],
            'excludes' => [
                'Tiket pesawat PP',
                'Keperluan pribadi',
                'Menu makan tambahan',
                'Alat lukis bakar/membatik (bisa disewa Rp150.000/orang)',
                'Tour tambahan',
                'Tips guide dan driver'
            ],
            'highlights' => [
                'Pengalaman penelitian mendalam',
                'Akses ke situs heritage',
                'Interaksi langsung dengan budaya lokal',
                'Kunjungan museum tembakau/huruf'
            ],
            'is_featured' => true,
            'is_available' => true
        ]);

        // Pricing for Research Tour
        $researchTour->pricings()->createMany([
            ['group_size' => '20 pack', 'price' => 1000000],
            ['group_size' => '30 pack', 'price' => 955000],
            ['group_size' => '40 pack', 'price' => 950000],
            ['group_size' => '50 pack', 'price' => 945000],
            ['group_size' => '60 pack', 'price' => 940000]
        ]);

        // HYANG ARGOPURO FESTIVAL
        $festival = TourPackage::create([
            'package_type_id' => PackageType::where('slug', 'hyang-argopuro-festival')->first()->id,
            'name' => 'PAKET EVENT HYANG ARGOPURO FESTIVAL (2D1N)',
            'slug' => 'hyang-argopuro-festival',
            'description' => 'Paket khusus untuk menyaksikan festival budaya Hyang Argopuro',
            'duration' => '2 Hari 1 Malam',
            'images' => [
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
                'tour-packages/kei-island.webp',
            ],
            'itinerary' => [
                'Hari 1: Penyambutan dan registrasi',
                'Hari 1: Menuju venue event sesuai rundown acara',
                'Hari 1: Kunjungan ke Situs Calok',
                'Hari 2: Persiapan dan partisipasi festival',
                'Hari 2: Menikmati pagelaran budaya Hyang Argopuro'
            ],
            'includes' => [
                'Transportasi dengan fasilitas baik',
                'Tiket masuk destinasi wisata',
                'Penginapan hotel/homestay (standar superior)',
                'Makan: 2x breakfast, 2x makan siang, 1x makan malam',
                'Coffee break dengan kuliner khas',
                'Air mineral 600ml',
                'Tour guide',
                'Selendang',
                'Dokumentasi foto',
                'Asuransi'
            ],
            'excludes' => [
                'Tiket pesawat PP',
                'Keperluan pribadi',
                'Menu makan tambahan',
                'Alat lukis bakar/membatik (bisa disewa Rp150.000/orang)',
                'Tour tambahan',
                'Tips guide dan driver'
            ],
            'highlights' => [
                'Pengalaman festival budaya eksklusif',
                'Akses khusus ke acara Hyang Argopuro',
                'Penginapan nyaman di hotel',
                'Pagelaran seni budaya spesial'
            ],
            'is_featured' => true,
            'is_available' => true
        ]);

        // Pricing for Festival
        $festival->pricings()->createMany([
            ['group_size' => '1 pack', 'price' => 1000000, 'variant' => 'VIP'],
            ['group_size' => '1 pack', 'price' => 600000, 'variant' => 'Reguler']
        ]);
    }
}
