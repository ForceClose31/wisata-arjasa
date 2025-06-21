@extends('layouts.appCus')

@section('content')

<section class="relative h-screen max-h-[500px] overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
        <div class="absolute inset-0 bg-black/20 z-10"></div>
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full">
                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
            </div>
        </template>

        <div class="relative z-20 h-full flex items-center">
            <div class="container mx-auto px-4 text-white">
                <div class="max-w-2xl">
                    <h1 x-text="slides[currentSlide].title"
                        class="text-xl md:text-4xl font-bold mb-4 font-montserrat animate-fade-in"></h1>
                    <p x-text="slides[currentSlide].subtitle"
                        class="text-sm md:text-xl mb-8 text-gray-100 animate-fade-in animate-delay-100"></p>
                    {{-- <a href="{{ route('about.index') }}"
                        class="px-8 py-4 bg-white text-teal-700 font-bold rounded-lg hover:bg-gray-100 hover:text-teal-800 transition duration-300 animate-fade-in animate-delay-200 inline-flex items-center shadow-lg">
                        <span x-text="slides[currentSlide].cta"></span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a> --}}
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <button @click="prevSlide"
            class="absolute left-4 top-1/2 z-30 -translate-y-1/2 bg-white/30 text-white p-3 rounded-full hover:bg-white/50 transition backdrop-blur-sm">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button @click="nextSlide"
            class="absolute right-4 top-1/2 z-30 -translate-y-1/2 bg-white/30 text-white p-3 rounded-full hover:bg-white/50 transition backdrop-blur-sm">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Slider Indicators -->
        <div class="absolute bottom-8 left-1/2 z-30 -translate-x-1/2 flex space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="currentSlide = index" class="w-3 h-3 rounded-full transition duration-300"
                    :class="{ 'bg-white w-6': currentSlide === index, 'bg-white/50': currentSlide !== index }"></button>
            </template>
        </div>
</section>

<section class="py-20 bg-gray-50"> {{-- Latar belakang abu-abu terang untuk kontras dengan kartu putih --}}
    <div class="container mx-auto px-4 max-w-screen-xl"> {{-- Menggunakan max-w-screen-xl untuk lebar yang lebih optimal --}}
        <div class="container mx-auto px-4 max-w-screen-xl">
            {{-- Judul dan Sub-judul --}}
            <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
            {{-- Menambahkan kelas relative inline-block untuk positioning garis --}}
            Paket Tour
            {{-- Garis di bawah teks --}}
            <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
        </h2>
        <p class="text-lg text-gray-700">Jelajahi keindahan destinasi kami dengan beragam pilihan paket tour.</p>
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
                            <span class="block text-xl font-bold text-gray-800">Rp 3.500.000<span class="text-base text-gray-600">/Pax</span></span>
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
                            <span class="block text-xl font-bold text-gray-800">Rp 8.000.000<span class="text-base text-gray-600">/Pax</span></span>
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
                            <span class="block text-xl font-bold text-gray-800">Rp 1.800.000<span class="text-base text-gray-600">/Pax</span></span>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- End of grid container --}}
    </div>
</section>

@endsection