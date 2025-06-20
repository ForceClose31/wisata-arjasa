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

<section class="py-20 bg-gray-50"> {{-- Latar belakang abu-abu terang untuk kontras dengan kartu putih --}}
    <div class="container mx-auto px-4 max-w-screen-xl"> {{-- Menggunakan max-w-screen-xl untuk lebar yang lebih optimal --}}
        <div class="mb-10" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-extrabold text-blue-500 mb-2 font-montserrat"><span class="text-blue-900">Paket</span> Tour</h2>
            <p class="text-lg text-gray-700">Butuh bantuan? Hubungi kami!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10"> {{-- Grid responsif untuk 1, 2, atau 3 kolom --}}

            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    {{-- Header Gambar Utama --}}
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Kei Islands Tour Package"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">

                    {{-- Informasi di dalam Gambar (Logo dan Judul Kecil) --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex flex-col justify-between p-4 text-white">
                        <div class="flex items-center justify-between">
                            {{-- Placeholder Logo --}}
                            <div class="flex items-center space-x-2">
                              
                                <span class="font-bold text-lg">Kei Islands</span>
                            </div>
                            <span class="text-sm opacity-90">The Hidden Paradise</span>
                        </div>
                        <div class="text-right text-sm opacity-90">Pantai Ngurbloat, Pasir terhalus di dunia</div>
                    </div>
                </div>

                {{-- Bagian Informasi Atas Paket --}}
                <div class="p-6">
                 
                    {{-- Detail DESTINASI dan INCLUDE --}}
                    <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">DESTINASI</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Pantai Ngurbloat</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Pulau Adranan</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Waan Mas El Evu</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Tanjung Ngurbloat</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">INCLUDE</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-hotel text-blue-800 mr-2"></i>Hotel di Pantai</li>
                                <li class="flex items-center"><i class="fas fa-utensils text-blue-800  mr-2"></i>Makan + Air</li>
                                <li class="flex items-center"><i class="fas fa-car text-blue-800 mr-2"></i>Speed Boat</li>
                                <li class="flex items-center"><i class="fas fa-users text-blue-800  mr-2"></i>Dokumentasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Footer Card (Nama Paket, Lokasi, Rating, Harga Final, Tombol) --}}
                <div class="p-6 bg-white border-t border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">Tour Kei Island 3D2N</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>Kepulauan Kei</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i> {{-- Contoh setengah bintang --}}
                        </div>
                        <span class="text-gray-500 text-xs ml-2">(4.5/5)</span>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href="" {{-- Contoh route ke halaman detail --}}
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            DETAIL PAKET
                        </a>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Harga</span>
                            <span class="block text-xl font-bold text-blue-500">Rp 3.500.000<span class="text-base text-gray-600">/Pax</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Another Tour Package"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex flex-col justify-between p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                               
                                <span class="font-bold text-lg">Raja Ampat</span>
                            </div>
                            <span class="text-sm opacity-90">The Ultimate Dive</span>
                        </div>
                        <div class="text-right text-sm opacity-90">Piaynemo, Wayag, dll.</div>
                    </div>
                </div>

                <div class="p-6">
                   
                    <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">DESTINASI</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Wayag Viewpoint</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Piaynemo Karst</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Teluk Kabui Pasir</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Arborek Village</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">INCLUDE</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-hotel text-blue-800 mr-2"></i>Floating Homestay</li>
                                <li class="flex items-center"><i class="fas fa-utensils text-blue-800 mr-2"></i>Full Meals</li>
                                <li class="flex items-center"><i class="fas fa-ship text-blue-800 mr-2"></i>Island Boat</li>
                                <li class="flex items-center"><i class="fas fa-users text-blue-800 mr-2"></i>Certified Dive</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-t border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">Raja Ampat Dive Expedition 5D4N</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>Raja Ampat, Papua Barat</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-500 text-xs ml-2">(5.0/5)</span>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href=""
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            DETAIL PAKET
                        </a>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Harga</span>
                            <span class="block text-xl font-bold text-blue-500">Rp 8.000.000<span class="text-base text-gray-600">/Pax</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Mount Bromo Sunrise Tour"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex flex-col justify-between p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                              
                                <span class="font-bold text-lg">Bromo Explore</span>
                            </div>
                            <span class="text-sm opacity-90">Volcano Adventure</span>
                        </div>
                        <div class="text-right text-sm opacity-90">Sunrise Point, Kawah Bromo</div>
                    </div>
                </div>

                <div class="p-6">
                    
                    <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">DESTINASI</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400  mr-2"></i>Bromo Sunrise Point</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Kawah Bromo</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Pasir Berbisik</li>
                                <li class="flex items-center"><i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Savana Teletubbies</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">INCLUDE</p>
                            <ul class="space-y-1 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-hotel text-blue-800  mr-2"></i>Hotel/Guesthouse</li>
                                <li class="flex items-center"><i class="fas fa-utensils text-blue-800 mr-2"></i>Breakfast</li>
                                <li class="flex items-center"><i class="fas fa-car text-blue-800 mr-2"></i>Jeep Bromo</li>
                                <li class="flex items-center"><i class="fas fa-users text-blue-800 mr-2"></i>Local Guide</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-t border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-1">Bromo Sunrise Trek 2D1N</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>Probolinggo, Jawa Timur</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-amber-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i> {{-- Contoh bintang kosong --}}
                        </div>
                        <span class="text-gray-500 text-xs ml-2">(4.0/5)</span>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href=""
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            DETAIL PAKET
                        </a>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Harga</span>
                            <span class="block text-xl font-bold text-blue-500">Rp 1.800.000<span class="text-base text-gray-600">/Pax</span></span>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- End of grid container --}}
    </div>
</section>

@endsection