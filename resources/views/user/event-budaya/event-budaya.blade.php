@extends('layouts.appCus')

@section('content')

<section class="relative h-96 overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/25 z-10"></div>
    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80"
         alt="Keindahan Alam Arjasa"
         class="w-full h-full object-cover transform scale-105 transition-transform duration-500 ease-in-out group-hover:scale-100">
    <div class="relative z-20 h-full flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 font-montserrat tracking-tight" data-aos="fade-up" data-aos-duration="1000">Paket <span class="text-teal-200">Tour</span></h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Jelajahi keindahan tersembunyi Arjasa dengan paket wisata terbaik kami.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4 font-montserrat">
                <span class="relative text-blue-900">
                    Kategori <span class="text-blue-500">Event</span>
                </span>
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Pilih kategori event yang ingin Anda jelajahi.
            </p>
        </div>

        {{-- Event Categories Section --}}
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button class="bg-blue-500 text-white px-5 py-3 rounded-full font-semibold text-sm hover:bg-blue-600 transition duration-300 shadow-md">
                Semua Event
            </button>
            <button class="bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md">
                Seni Pertunjukan
            </button>
            <button class="bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md">
                Festival
            </button>
            <button class="bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md">
                Workshop & Pameran
            </button>
            <button class="bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md">
                Upacara Adat
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            {{-- Event Card 1 --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Festival Budaya Arjasa"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        LIVE
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-400 mr-2"></i>25 Agustus 2025</span>
                        <span class="text-sm text-gray-600"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>Alun-alun Arjasa</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Festival Seni Arjasa 2025</h3>
                    <p class="text-gray-700 text-sm mb-4">
                        Menampilkan berbagai pertunjukan seni tradisional dan modern, pameran kerajinan tangan, dan kuliner khas Arjasa.
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#"
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            LIHAT DETAIL
                        </a>
                        <span class="text-lg font-bold text-green-600">Gratis</span>
                    </div>
                </div>
            </div>

            {{-- Event Card 2 --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Tari Tradisional"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        Upcoming
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-400 mr-2"></i>10 September 2025</span>
                        <span class="text-sm text-gray-600"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>Pendopo Agung</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Malam Kesenian Adat Arjasa</h3>
                    <p class="text-gray-700 text-sm mb-4">
                        Pertunjukan tari dan musik tradisional yang memukau dari berbagai sanggar seni lokal.
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#"
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            LIHAT DETAIL
                        </a>
                        <span class="text-lg font-bold text-green-600">Gratis</span>
                    </div>
                </div>
            </div>

            {{-- Event Card 3 --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Pameran Kerajinan"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-gray-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        Past Event
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-400 mr-2"></i>15 Juni 2025</span>
                        <span class="text-sm text-gray-600"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>Pusat Seni Arjasa</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Pameran Karya Seni & Kerajinan</h3>
                    <p class="text-gray-700 text-sm mb-4">
                        Melihat dan membeli langsung hasil karya seniman dan pengrajin lokal Arjasa.
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#"
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            LIHAT DETAIL
                        </a>
                        <span class="text-lg font-bold text-red-600">Selesai</span>
                    </div>
                </div>
            </div>

            {{-- Add more event cards as needed, following the same structure --}}

        </div>
    </div>
</section>

@endsection