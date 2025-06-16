<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tourPackages = [
            [
                'title' => 'Tour Kei Island 3D2N',
                'location' => 'Kepulauan Kei',
                'price' => 'Rp 3.500.000/Pax',
                'rating' => 5,
                'image' => 'tour-3d2n.jpg'
            ],
            [
                'title' => 'Tour Kei Island 4D3N',
                'location' => 'Kepulauan Kei',
                'price' => 'Rp 4.000.000/Pax',
                'rating' => 5,
                'image' => 'tour-4d3n.jpg'
            ],
            [
                'title' => 'Tour Kei Island 5D4N',
                'location' => 'Kepulauan Kei',
                'price' => 'Rp 4.500.000/Pax',
                'rating' => 5,
                'image' => 'tour-5d4n.jpg'
            ]
        ];

        $dayTrips = [
            [
                'title' => 'Island Hopping',
                'price' => 'Rp 700.000/Pax',
                'rating' => 5,
                'image' => 'island-hopping-1.jpg'
            ],
            [
                'title' => 'Island Hopping',
                'price' => 'Rp 500.000/Pax',
                'rating' => 5,
                'image' => 'island-hopping-2.jpg'
            ],
            [
                'title' => 'Overland Tour Kei',
                'price' => 'Rp 350.000/Pax',
                'rating' => 5,
                'image' => 'overland-1.jpg'
            ],
            [
                'title' => 'Overland Tour Kei',
                'price' => 'Rp 250.000/Pax',
                'rating' => 5,
                'image' => 'overland-2.jpg'
            ]
        ];

        $carRentals = [
            [
                'name' => 'Toyota Avanza',
                'price' => 'Rp 750.000 / 12 Jam',
                'features' => ['Super', 'BBM', 'Car'],
                'image' => 'avanza.jpg'
            ],
            [
                'name' => 'Mobilio',
                'price' => 'Rp 750.000 / 12 Jam',
                'features' => ['Super', 'BBM', 'Car'],
                'image' => 'mobilio.jpg'
            ],
            [
                'name' => 'Toyota Xpander',
                'price' => 'Rp 750.000 / 12 Jam',
                'features' => ['Super', 'BBM', 'Car'],
                'image' => 'xpander.jpg'
            ]
        ];

        $motorcycleRentals = [
            [
                'name' => 'Honda Scoopy',
                'price' => 'Rp. 120.000 /Hari',
                'image' => 'scoopy.jpg'
            ],
            [
                'name' => 'Honda Beat',
                'price' => 'Rp. 120.000 /Hari',
                'image' => 'beat.jpg'
            ],
            [
                'name' => 'Honda Forza',
                'price' => 'Rp. 120.000 /Hari',
                'image' => 'forza.jpg'
            ]
        ];

        return view('homepage.homepage', compact(
            'tourPackages',
            'dayTrips',
            'carRentals',
            'motorcycleRentals'
        ));
    }
}
