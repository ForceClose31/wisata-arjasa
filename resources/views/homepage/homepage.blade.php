@extends('layouts.app')

@section('title', 'Homepage - MTC KEI Tour & Travel')

@section('content')
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-orange-400 rounded-full flex items-center justify-center">
                    <i class="fas fa-water text-white"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-blue-600">MTC KEI</h1>
                    <p class="text-sm text-orange-400">TOUR & TRAVEL</p>
                </div>
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="bg-blue-500 text-white px-4 py-2 rounded">HOME</a>
                <a href="#about" class="text-gray-700 hover:text-blue-500">ABOUT US</a>
                <a href="#packages" class="text-gray-700 hover:text-blue-500">TOUR PACKAGE</a>
                <a href="#transport" class="text-gray-700 hover:text-blue-500">TRANSPORTATION</a>
                <a href="#cottage" class="text-gray-700 hover:text-blue-500">COTTAGE</a>
                <a href="#gallery" class="text-gray-700 hover:text-blue-500">GALLERY</a>
                <a href="#blog" class="text-gray-700 hover:text-blue-500">BLOG</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-500">CONTACT</a>
            </nav>
            <div class="flex items-center space-x-2 text-orange-500">
                <i class="fas fa-phone"></i>
                <span class="text-sm">0811477719</span>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="relative h-screen bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-bg.jpg') }}" alt="Hero Background" class="w-full h-full object-cover opacity-90">
    </div>
    <div class="relative z-10 container mx-auto px-4 h-full flex items-center">
        <div class="grid md:grid-cols-2 gap-8 items-center w-full">
            <div class="text-white space-y-6">
                <div class="space-y-2">
                    <h2 class="text-4xl md:text-6xl font-bold">BEST</h2>
                    <p class="text-xl">Tour & Travel</p>
                </div>
                <div class="space-y-4">
                    <h1 class="text-4xl md:text-6xl font-bold">
                        Plan <span class="text-white">your</span>
                    </h1>
                    <h1 class="text-4xl md:text-6xl font-bold text-blue-200">travel</h1>
                    <p class="text-xl">Booking Paket Wisata Sekarang Juga !</p>
                </div>
                <a href="#packages" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full text-lg transition-colors">
                    Get a ticket!
                </a>
            </div>
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 transform rotate-3">
                        <img src="{{ asset('images/beach-1.jpg') }}" alt="Beach destination" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 transform -rotate-3 mt-8">
                        <img src="{{ asset('images/island-1.jpg') }}" alt="Island view" class="w-full h-48 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <div class="space-y-4 mb-12">
            <p class="text-gray-600">Selamat Datang di</p>
            <p class="text-sm text-gray-500">www.mtckeitourandtravel.com</p>
            <div class="flex justify-center items-center space-x-4">
                <i class="fas fa-phone text-orange-500"></i>
                <span class="text-orange-500 font-semibold">Hubungi Kami : 0811477719</span>
                <a href="#packages" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded transition-colors">EXPLORE</a>
            </div>
        </div>

        <div class="space-y-8">
            <h2 class="text-6xl font-bold text-gray-800">10+</h2>
            <h3 class="text-4xl font-bold text-blue-500">Tujuan Wisata</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kami mengajak Anda untuk mengeksplor wisata-wisata Kepulauan Kei Maluku
            </p>

            <div class="flex justify-center space-x-4">
                <a href="#packages" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded transition-colors">Wisata</a>
                <a href="#transport" class="bg-blue-400 hover:bg-blue-500 text-white px-8 py-3 rounded transition-colors">Transport</a>
                <a href="#cottage" class="bg-orange-400 hover:bg-orange-500 text-white px-8 py-3 rounded transition-colors">Cottage</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src="{{ asset('images/travel-collage.jpg') }}" alt="Travel Collage" class="w-full h-96 object-cover rounded-lg">
            </div>
            <div class="space-y-6">
                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">ABOUT US</span>
                <h2 class="text-4xl font-bold text-blue-600">MTC KEI Tour & Travel</h2>
                <p class="text-gray-600 leading-relaxed">
                    MTC (Mercy Tethool Corporate) Kei Tour & Travel adalah penyedia layanan perjalanan terpercaya di Maluku
                    yang menawarkan paket wisata eksklusif ke berbagai destinasi indah di Kepulauan Kei dan sekitarnya. Kami
                    menghadirkan pengalaman liburan tak terlupakan dengan pilihan paket wisata menarik menjelajahi surga
                    tersembunyi pantai pasir putih terhalus di dunia, ragam pantai unik berpasir putih exotic, hopping
                    islands, snorkeling, diving dan eksplorasi budaya lokal.
                </p>
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 p-3 rounded-full">
                        <i class="fas fa-phone text-white"></i>
                    </div>
                    <div>
                        <p class="text-gray-600">Call us anytime</p>
                        <p class="text-2xl font-bold text-orange-500">0811477719</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tour Packages Section -->
<section id="packages" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600 mb-4">Paket Tour</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mb-16">
            @foreach($tourPackages as $tour)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative h-64">
                    <img src="{{ asset('images/' . $tour['image']) }}" alt="{{ $tour['title'] }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        @for($i = 0; $i < $tour['rating']; $i++)
                        <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $tour['title'] }}</h3>
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span class="text-sm">{{ $tour['location'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Harga</p>
                            <p class="text-xl font-bold text-blue-600">{{ $tour['price'] }}</p>
                        </div>
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors">DETAIL PAKET</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 1 Day Trip Section -->
        <div class="text-center mb-8">
            <h3 class="text-3xl font-bold text-blue-600">1 Day Trip</h3>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            @foreach($dayTrips as $trip)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative h-48">
                    <img src="{{ asset('images/' . $trip['image']) }}" alt="{{ $trip['title'] }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        @for($i = 0; $i < $trip['rating']; $i++)
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        @endfor
                    </div>
                    <h4 class="font-bold mb-2">{{ $trip['title'] }}</h4>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600">Harga</p>
                            <p class="text-sm font-bold text-blue-600">{{ $trip['price'] }}</p>
                        </div>
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors">
                            DETAIL PAKET
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Car Rental Section -->
<section id="transport" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm mb-4 inline-block">Price List</span>
            <h2 class="text-4xl font-bold mb-2">
                Rental <span class="text-gray-600">Mobil</span>
            </h2>
            <p class="text-gray-600">Price List Sewa Mobil Kepulauan Kei.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mb-8">
            @foreach($carRentals as $car)
            <div class="bg-white border rounded-lg shadow-lg relative overflow-hidden">
                <span class="absolute top-4 right-4 bg-blue-500 text-white px-2 py-1 rounded text-xs">RENT CAR</span>
                <div class="p-6 text-center">
                    <div class="mb-4">
                        <p class="text-sm text-blue-600 mb-2">Sewa Mobil</p>
                        <p class="text-sm text-blue-600">Maluku</p>
                    </div>
                    <div class="relative h-32 mb-4">
                        <img src="{{ asset('images/' . $car['image']) }}" alt="{{ $car['name'] }}" class="w-full h-full object-contain">
                    </div>
                    <a href="#" class="inline-block mb-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors">Book Now</a>
                    <h3 class="text-xl font-bold mb-4">{{ $car['name'] }}</h3>
                    <div class="flex justify-center space-x-4 mb-4">
                        @foreach($car['features'] as $feature)
                        <div class="flex items-center space-x-1">
                            <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                @if($feature === 'Car')
                                <i class="fas fa-car text-blue-600 text-xs"></i>
                                @elseif($feature === 'Super')
                                <i class="fas fa-star text-blue-600 text-xs"></i>
                                @else
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                @endif
                            </div>
                            <span class="text-xs text-blue-600">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                    <p class="font-bold text-blue-600">{{ $car['price'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded transition-colors">LIHAT MOBIL LAINNYA</a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-orange-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-water text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold">MTC KEI</h3>
                        <p class="text-sm text-orange-400">TOUR & TRAVEL</p>
                    </div>
                </div>
                <p class="text-blue-200 text-sm">
                    Your trusted travel partner for exploring the beautiful Kei Islands.
                </p>
            </div>

            <div>
                <h4 class="font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#about" class="text-blue-200 hover:text-white">About Us</a></li>
                    <li><a href="#packages" class="text-blue-200 hover:text-white">Tour Packages</a></li>
                    <li><a href="#transport" class="text-blue-200 hover:text-white">Transportation</a></li>
                    <li><a href="#gallery" class="text-blue-200 hover:text-white">Gallery</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Services</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-blue-200 hover:text-white">Island Hopping</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white">Car Rental</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white">Motorcycle Rental</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white">Cottage Booking</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-4">Contact Info</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-phone"></i>
                        <span>0811477719</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Kepulauan Kei, Maluku</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-blue-800 mt-8 pt-8 text-center text-sm text-blue-200">
            <p>&copy; 2024 MTC KEI Tour & Travel. All rights reserved.</p>
        </div>
    </div>
</footer>
@endsection
