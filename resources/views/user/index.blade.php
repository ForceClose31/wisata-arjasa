@extends('layouts.appCus')

@section('content')
    @auth
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('alert_tampil'))
                    const username = "{{ session('nama_login') }}";
                    Swal.fire({
                        title: 'Login Berhasil!',
                        text: `Selamat datang, ${username}!`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'confirm',
                        },
                        buttonsStyling: false,
                    });
                    @php
                        session()->forget('alert_tampil');
                        session()->forget('nama_login');
                    @endphp
                @endif
            });
        </script>
    @endauth

    <!-- Hero Section with Gradient Background -->
    <section class="relative h-screen max-h-[800px] overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
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
                        class="text-4xl md:text-6xl font-bold mb-4 font-montserrat animate-fade-in"></h1>
                    <p x-text="slides[currentSlide].subtitle"
                        class="text-xl md:text-2xl mb-8 text-gray-100 animate-fade-in animate-delay-100"></p>
                    <a href="{{ route('konten.index') }}"
                        class="px-8 py-4 bg-white text-teal-700 font-bold rounded-lg hover:bg-gray-100 hover:text-teal-800 transition duration-300 animate-fade-in animate-delay-200 inline-flex items-center shadow-lg">
                        <span x-text="slides[currentSlide].cta"></span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
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

    {{-- Information Section with Animated Counter --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-gray-800 mb-6 font-montserrat relative inline-block">
                    <span class="relative z-10">Explore Arjasa's Wonders</span>
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 z-0 opacity-30"></span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover the rich cultural heritage and natural beauty of
                    Arjasa through our curated experiences</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-teal-600 mb-2" x-data="{ count: 0, target: 10 }"
                        x-intersect="() => {
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        const updateCount = () => {
                            if (count < target) {
                                count = Math.ceil(count + increment);
                                requestAnimationFrame(updateCount);
                            } else {
                                count = target;
                            }
                        };
                        updateCount();
                    }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Cultural Sites</h3>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-indigo-600 mb-2" x-data="{ count: 0, target: 25 }"
                        x-intersect="() => {
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        const updateCount = () => {
                            if (count < target) {
                                count = Math.ceil(count + increment);
                                requestAnimationFrame(updateCount);
                            } else {
                                count = target;
                            }
                        };
                        updateCount();
                    }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Local Events</h3>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-amber-600 mb-2" x-data="{ count: 0, target: 8 }"
                        x-intersect="() => {
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        const updateCount = () => {
                            if (count < target) {
                                count = Math.ceil(count + increment);
                                requestAnimationFrame(updateCount);
                            } else {
                                count = target;
                            }
                        };
                        updateCount();
                    }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Tour Packages</h3>
                </div>
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-emerald-600 mb-2" x-data="{ count: 0, target: 15 }"
                        x-intersect="() => {
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        const updateCount = () => {
                            if (count < target) {
                                count = Math.ceil(count + increment);
                                requestAnimationFrame(updateCount);
                            } else {
                                count = target;
                            }
                        };
                        updateCount();
                    }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Natural Attractions</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="relative rounded-xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="About Us" class="w-full h-auto object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h3 class="text-2xl font-bold">Our Story</h3>
                            <p class="text-gray-200">Since 2010</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 font-montserrat">
                        <span class="relative">
                            Discover Arjasa with Us
                            <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Dewa Arjasa is your premier guide to the cultural and natural wonders of Arjasa. We are passionate
                        about showcasing the authentic beauty of our region while preserving its heritage for future
                        generations.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="flex items-center justify-center h-8 w-8 rounded-full bg-teal-100 text-teal-600">
                                    <i class="fas fa-compass"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-800">Local Expertise</h4>
                                <p class="text-gray-600">Our team consists of Arjasa natives with deep knowledge of the
                                    area's hidden gems.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="flex items-center justify-center h-8 w-8 rounded-full bg-indigo-100 text-indigo-600">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-800">Sustainable Tourism</h4>
                                <p class="text-gray-600">We're committed to responsible tourism that benefits local
                                    communities.</p>
                            </div>
                        </div>
                    </div>
                    <a href="/about"
                        class="mt-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                        Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Tour Packages Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 font-montserrat">
                        <span class="relative">
                            Our Signature Tours
                            <span class="absolute bottom-0 left-0 w-full h-2 bg-amber-400 opacity-30 -z-1"></span>
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Experience Arjasa like never before with our carefully crafted tour packages designed to showcase
                        the best of our region's culture, nature, and heritage.
                    </p>

                    <div class="space-y-6">
                        <div
                            class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-teal-500">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Cultural Heritage Tour</h3>
                            <p class="text-gray-600 mb-4">Explore ancient temples, traditional villages, and local artisans
                                in this immersive cultural journey.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-teal-600 font-semibold">IDR 450K / person</span>
                                <a href="#"
                                    class="text-sm font-medium text-teal-600 hover:text-teal-800 transition duration-300">
                                    View Details <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>

                        <div
                            class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-indigo-500">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Nature Adventure Package</h3>
                            <p class="text-gray-600 mb-4">Trek through lush forests, discover hidden waterfalls, and
                                experience Arjasa's breathtaking landscapes.</p>
                            <div class="flex justify-between items-center">
                                <span class="text-indigo-600 font-semibold">IDR 650K / person</span>
                                <a href="#"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition duration-300">
                                    View Details <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('konten.index') }}"
                        class="mt-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300">
                        View All Packages
                    </a>
                </div>

                <div class="lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative rounded-xl overflow-hidden shadow-lg h-64">
                            <img src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="Tour Package" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent flex items-end p-4">
                                <h3 class="text-white font-semibold">Traditional Village Visit</h3>
                            </div>
                        </div>
                        <div class="relative rounded-xl overflow-hidden shadow-lg h-64">
                            <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="Tour Package" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent flex items-end p-4">
                                <h3 class="text-white font-semibold">Waterfall Exploration</h3>
                            </div>
                        </div>
                        <div class="relative rounded-xl overflow-hidden shadow-lg h-64">
                            <img src="https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="Tour Package" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent flex items-end p-4">
                                <h3 class="text-white font-semibold">Sunset at Pura Luhur</h3>
                            </div>
                        </div>
                        <div class="relative rounded-xl overflow-hidden shadow-lg h-64">
                            <img src="https://images.unsplash.com/photo-1533107862482-0e6974b06ec4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="Tour Package" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent flex items-end p-4">
                                <h3 class="text-white font-semibold">Cultural Performance</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Keunggulan Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative">
                        Keunggulan Layanan Kami
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Mengapa memilih kami untuk petualangan Anda di Arjasa?
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Paket Lengkap -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-teal-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mb-4 text-teal-600 mx-auto">
                        <i class="fas fa-box-open text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Paket Lengkap</h3>
                    <p class="text-gray-600 text-center">Kami menyediakan berbagai pilihan paket wisata terlengkap di
                        Arjasa.</p>
                </div>

                <!-- All in One -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-indigo-600 mx-auto">
                        <i class="fas fa-car text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">All in One</h3>
                    <p class="text-gray-600 text-center">Tersedia juga sewa motor, mobil, dan cottage untuk kenyamanan
                        Anda.</p>
                </div>

                <!-- Professional -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-amber-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4 text-amber-600 mx-auto">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Professional</h3>
                    <p class="text-gray-600 text-center">Dengan dukungan tour guide profesional dan berpengalaman.</p>
                </div>

                <!-- Best Guide -->
                <div
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-emerald-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-4 text-emerald-600 mx-auto">
                        <i class="fas fa-award text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Best Guide</h3>
                    <div class="flex flex-col items-center space-y-2 mt-3">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-2"></i>
                            <span class="text-gray-600">Best Package</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-2"></i>
                            <span class="text-gray-600">Best Price</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center bg-gradient-to-r from-teal-50 to-indigo-50 rounded-xl p-8 shadow-inner">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Best Your Trip</h3>
                <p class="text-gray-600 mb-6">Temukan paket wisata terbaik untuk petualangan Anda di Arjasa</p>
                <div class="max-w-md mx-auto relative">
                    <input type="text" placeholder="Cari paket wisata..."
                        class="w-full px-6 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm">
                    <button
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-teal-600 text-white p-2 rounded-full hover:bg-teal-700 transition duration-300">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-4">*Temukan paket wisata menarik</p>
            </div>
        </div>
    </section>

    {{-- Tour Packages Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative">
                        Paket Wisata Unggulan
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan pengalaman wisata terbaik dengan paket-paket
                    eksklusif kami</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Tour Package Card -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-teal-500 hover:shadow-xl transition duration-300">
                    <!-- Header with Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Kei Island" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-2xl font-bold">Kei Island</h3>
                            <p class="text-gray-200">The Hidden Paradise</p>
                        </div>
                    </div>

                    <!-- Destination Highlights -->
                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-map-marker-alt text-teal-600 mr-2"></i>
                                DESTINASI
                            </h4>
                            <ul class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-circle text-teal-500 text-xs mr-2"></i>
                                    Pantai Ngurbloat
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-circle text-teal-500 text-xs mr-2"></i>
                                    Pulau Bair
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-circle text-teal-500 text-xs mr-2"></i>
                                    Goa Hawang
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-circle text-teal-500 text-xs mr-2"></i>
                                    Tanjung Verenang
                                </li>
                            </ul>
                        </div>

                        <!-- Package Includes -->
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-check-circle text-teal-600 mr-2"></i>
                                INCLUDE
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-hotel text-teal-500 mt-1 mr-2 text-xs"></i>
                                    <span>Hotel/Penginapan di Pantai</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-utensils text-teal-500 mt-1 mr-2 text-xs"></i>
                                    <span>Makan + Snack + Air Mineral</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-car text-teal-500 mt-1 mr-2 text-xs"></i>
                                    <span>Mobil + Speed Boat</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-ticket-alt text-teal-500 mt-1 mr-2 text-xs"></i>
                                    <span>Karcis Lokasi Wisata</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-camera text-teal-500 mt-1 mr-2 text-xs"></i>
                                    <span>Guide + Dokumentasi</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Price and CTA -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-t pt-4">
                            <div class="mb-4 sm:mb-0">
                                <div class="text-sm font-semibold text-gray-500">3 Day 2 Night</div>
                                <div class="text-2xl font-bold text-teal-600">Rp 3.500.000 <span
                                        class="text-sm font-normal text-gray-500">/person</span></div>
                            </div>
                            <a href="#"
                                class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition duration-300 font-medium text-sm">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t">
                        <div class="flex flex-col sm:flex-row justify-between items-center text-sm">
                            <div class="mb-2 sm:mb-0">
                                <a href="tel:0311477719"
                                    class="text-gray-600 hover:text-teal-600 transition duration-300">
                                    <i class="fas fa-phone-alt mr-1"></i> 0311-4777-19
                                </a>
                                <span class="mx-2 text-gray-300">|</span>
                                <a href="tel:082196644495"
                                    class="text-gray-600 hover:text-teal-600 transition duration-300">
                                    0821 9664 4495
                                </a>
                            </div>
                            <a href="https://www.mtckeitourandtravel.com" target="_blank"
                                class="text-teal-600 hover:text-teal-800 transition duration-300 font-medium">
                                www.mtckeitourandtravel.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Second Tour Package Card (duplicate and modify as needed) -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <!-- Header with Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Kepulauan Kei" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <h3 class="text-2xl font-bold">Tour Kei Island 3D2N</h3>
                            <p class="text-gray-200">Kepulauan Kei</p>
                        </div>
                    </div>

                    <!-- Package Details -->
                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-info-circle text-indigo-600 mr-2"></i>
                                DETAIL PAKET
                            </h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-600">Harga Paket</span>
                                    <span class="font-bold text-indigo-600">Rp 3.500.000 /pax</span>
                                </div>
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-600">Durasi</span>
                                    <span class="font-medium">3 Hari 2 Malam</span>
                                </div>
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-600">Minimal Peserta</span>
                                    <span class="font-medium">2 Orang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Highlights -->
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3">Pantai Ngurbloat</h4>
                            <p class="text-gray-600 text-sm">Pasir terhalus di dunia dengan pemandangan laut yang memukau.
                                Nikmati sunset terbaik di Kepulauan Kei.</p>
                        </div>

                        <!-- CTA -->
                        <div class="text-center">
                            <a href="https://www.kepualauankei.com" target="_blank"
                                class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 font-medium">
                                Kunjungi Website Kami
                            </a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t text-center">
                        <p class="text-sm text-gray-600">*Harga dapat berubah sesuai musim dan ketersediaan</p>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                    Lihat Semua Paket <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Cottage Options Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative">
                        Pilihan Cottage
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami menyediakan pilihan cottage dengan fasilitas
                    lengkap untuk kenyamanan Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Cottage 1 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-teal-500 hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Triambian Cottages" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold">TRIAMBIAN COTTAGES</h3>
                            <p class="text-sm text-gray-200">NACHRIDAN BRACH MITSI SANS</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">FASILITAS:</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                                    Free Breakfast
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                                    Free Wifi
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                                    Free Preseter
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                                    Full AC
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-2"></i>
                                    View Sea
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-center border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-500">TRIAMARIA COTTAGE</p>
                                <p class="font-medium">Four (4) Room</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Start from</p>
                                <p class="text-xl font-bold text-teal-600">650rb/malam</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#"
                            class="block w-full text-center px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition duration-300">
                            BOOKING
                        </a>
                    </div>
                </div>

                <!-- Cottage 2 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Casa Di Stella" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold">CASA DI STELLA</h3>
                            <p class="text-sm text-gray-200">NGUIBROAT BEACH KITISI ANIS</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">FASILITAS:</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-indigo-500 mr-2"></i>
                                    Free Breakfast
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-indigo-500 mr-2"></i>
                                    Free Wifi
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-indigo-500 mr-2"></i>
                                    Free Preseter
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-indigo-500 mr-2"></i>
                                    Full AC
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-indigo-500 mr-2"></i>
                                    View Sea
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-center border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-500">CASA DI STELLA</p>
                                <p class="font-medium">Two (2) Room</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Start from</p>
                                <p class="text-xl font-bold text-indigo-600">550rb/malam</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#"
                            class="block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                            BOOKING
                        </a>
                    </div>
                </div>

                <!-- Cottage 3 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-amber-500 hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719471389-8d0cb5301b69?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Noel Cottages" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-xl font-bold">NOEL COTTAGES</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">FASILITAS:</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-amber-500 mr-2"></i>
                                    Free Breakfast
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-amber-500 mr-2"></i>
                                    Free Wifi
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-amber-500 mr-2"></i>
                                    Free Preseter
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-amber-500 mr-2"></i>
                                    Full AC
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-amber-500 mr-2"></i>
                                    View Sea
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-between items-center border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-500">NOEL COTTAGES</p>
                                <p class="font-medium">Four (4) Room</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Start from</p>
                                <p class="text-xl font-bold text-amber-600">550rb/malam</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pb-6">
                        <a href="#"
                            class="block w-full text-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition duration-300">
                            BOOKING
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                    LIHAT COTTAGE LAINNYA <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Articles Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative">
                        Artikel Terbaru
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan tips wisata dan informasi terbaru seputar
                    destinasi kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1503917988258-f87a78e3c995?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Panduan Wisata Kei"
                            class="w-full h-full object-cover transition duration-300 hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-teal-600 text-white text-xs font-semibold rounded-full">Tips
                                Wisata</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>15 Juni 2023</span>
                            <span class="mx-2">•</span>
                            <i class="far fa-eye mr-1"></i>
                            <span>1.2k</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-teal-600 transition duration-300">
                            <a href="#">Panduan Lengkap Wisata ke Kepulauan Kei untuk Pemula</a>
                        </h3>
                        <p class="text-gray-600 mb-4">Temukan semua yang perlu Anda ketahui sebelum mengunjungi surga
                            tersembunyi di Maluku Tenggara ini.</p>
                        <a href="#"
                            class="text-teal-600 font-medium hover:text-teal-800 transition duration-300 flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Kuliner Kei" class="w-full h-full object-cover transition duration-300 hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span
                                class="px-3 py-1 bg-indigo-600 text-white text-xs font-semibold rounded-full">Kuliner</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>2 Juni 2023</span>
                            <span class="mx-2">•</span>
                            <i class="far fa-eye mr-1"></i>
                            <span>890</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-indigo-600 transition duration-300">
                            <a href="#">5 Makanan Khas Kei yang Wajib Dicoba Saat Berkunjung</a>
                        </h3>
                        <p class="text-gray-600 mb-4">Jelajahi kekayaan kuliner Kepulauan Kei mulai dari ikan bakar hingga
                            papeda yang lezat.</p>
                        <a href="#"
                            class="text-indigo-600 font-medium hover:text-indigo-800 transition duration-300 flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Spot Foto Kei"
                            class="w-full h-full object-cover transition duration-300 hover:scale-105">
                        <div class="absolute top-4 left-4">
                            <span
                                class="px-3 py-1 bg-amber-600 text-white text-xs font-semibold rounded-full">Fotografi</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>20 Mei 2023</span>
                            <span class="mx-2">•</span>
                            <i class="far fa-eye mr-1"></i>
                            <span>1.5k</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-amber-600 transition duration-300">
                            <a href="#">10 Spot Foto Instagramable di Kepulauan Kei</a>
                        </h3>
                        <p class="text-gray-600 mb-4">Catat lokasi-lokasi terbaik untuk mengabadikan momen indah Anda di
                            Kei dengan pemandangan memukau.</p>
                        <a href="#"
                            class="text-amber-600 font-medium hover:text-amber-800 transition duration-300 flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                    Lihat Semua Artikel <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Popular Content Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">Featured <span
                        class="relative">
                        Cultural Highlights
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-indigo-400 opacity-30 -z-1"></span>
                    </span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover the most engaging cultural content from our
                    community</p>
            </div>

            @if ($popularContents->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($popularContents as $content)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                            @if ($content->thumbnail)
                                <img src="{{ asset('storage/' . $content->thumbnail) }}" alt="{{ $content->judul }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Thumbnail" alt="No Thumbnail"
                                    class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span
                                        class="px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full">{{ $content->kategori }}</span>
                                    <span class="ml-2 text-xs text-gray-500">{{ $content->views_count }} views</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $content->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($content->isi, 100) }}</p>
                                <a href="{{ route('kontenbudaya.show', $content->id) }}"
                                    class="text-teal-600 font-semibold hover:text-teal-800 transition duration-300 flex items-center">
                                    Read More <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No content available at the moment</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('konten.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300">
                    Explore All Content <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Upcoming Events Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">Upcoming <span
                        class="relative">
                        Cultural Events
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-amber-400 opacity-30 -z-1"></span>
                    </span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Mark your calendar for these exciting cultural events in
                    Arjasa</p>
            </div>

            @if ($upcomingEvents->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach ($upcomingEvents as $event)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 flex flex-col md:flex-row">
                            <div class="md:w-1/3 relative">
                                @if ($event->thumbnail)
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->judul }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Thumbnail" alt="No Thumbnail"
                                        class="w-full h-full object-cover">
                                @endif
                                <div class="absolute top-4 left-4 bg-white/90 px-3 py-1 rounded-lg shadow-sm">
                                    <div class="text-sm font-bold text-gray-800">{{ $event->jadwal->format('d') }}</div>
                                    <div class="text-xs text-gray-600">{{ $event->jadwal->format('M') }}</div>
                                </div>
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-2">
                                    <span
                                        class="px-2 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded">{{ $event->tempat }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($event->isi, 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-gray-700">
                                        @if ($event->harga > 0)
                                            Rp {{ number_format($event->harga, 0, ',', '.') }}
                                        @else
                                            Free Admission
                                        @endif
                                    </span>
                                    <a href="{{ route('event.show', $event->id) }}"
                                        class="text-sm font-semibold text-teal-600 hover:text-teal-800 transition duration-300 flex items-center">
                                        Details <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No upcoming events scheduled</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('event.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition duration-300">
                    View All Events <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">Traveler <span
                        class="relative">
                        Experiences
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                    </span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Hear what our visitors say about their Arjasa adventures
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Sarah Wijaya</h4>
                            <div class="flex text-amber-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The cultural heritage tour was absolutely amazing! Our guide was so
                        knowledgeable and showed us hidden gems we would never have found on our own."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Budi Santoso</h4>
                            <div class="flex text-amber-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The waterfall trek was challenging but so rewarding. The guides were
                        professional and made sure everyone was safe while having an unforgettable experience."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Dewi Lestari</h4>
                            <div class="flex text-amber-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Participating in the traditional weaving workshop was the highlight of
                        our trip. The artisans were so patient and we came home with beautiful souvenirs we made ourselves!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    @auth
    @else
        <section class="py-20 bg-gradient-to-r from-teal-600 to-indigo-700 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 font-montserrat">Ready to Explore Arjasa?</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Join our community of cultural explorers and start your Arjasa
                    adventure today</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ 'login' }}"
                        class="px-8 py-3 bg-white text-teal-700 font-bold rounded-lg hover:bg-gray-100 hover:text-teal-800 transition duration-300 shadow-lg">
                        Create Account
                    </a>
                    <a href="/about"
                        class="px-8 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-teal-700 transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </section>
    @endauth

@endsection
