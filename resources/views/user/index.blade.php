@extends('layouts.appCus')

@section('content')
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
                    <a href="{{ route('about.index') }}"
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
    <section class="py-20 bg-gray-50" data-aos="fade-up">
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
                    <div class="relative rounded-xl overflow-hidden shadow-2xl" data-aos="fade-right">
                        <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="About Us" class="w-full h-auto object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h3 class="text-2xl font-bold">Our Story</h3>
                            <p class="text-gray-200">Since 2010</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2" data-aos="fade-left">
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
            <div class="flex flex-col lg:flex-row gap-12 xl:gap-20">
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
                        @foreach ($featuredPackages->take(2) as $package)
                            @php
                                $basePrice = $package->pricings->sortBy('price')->first();
                                $colors = [
                                    'one-day-tour' => 'teal',
                                    'heritage-art-camp' => 'amber',
                                    'research-tour' => 'indigo',
                                    'hyang-argopuro-festival' => 'purple',
                                ];
                                $color = $colors[$package->packageType->slug] ?? 'teal';
                            @endphp
                            <div
                                class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-{{ $color }}-500 h-full">
                                <div class="flex items-start mb-2">
                                    <span
                                        class="text-xs bg-{{ $color }}-500 text-white px-2 py-1 rounded-full mr-3">
                                        {{ $package->packageType->name }}
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-800">{{ $package->name }}</h3>
                                </div>
                                <p class="text-gray-600 mb-4">{{ Str::limit($package->description, 120) }}</p>
                                <div class="flex justify-between items-center">
                                    @if ($basePrice)
                                        <span class="text-{{ $color }}-600 font-semibold">
                                            From IDR {{ number_format($basePrice->price) }}
                                            <span class="text-gray-500 text-sm">/ person
                                                ({{ $basePrice->group_size }})</span>
                                        </span>
                                    @endif
                                    <a href="{{ route('packages.show', $package->slug) }}"
                                        class="text-sm font-medium text-{{ $color }}-600 hover:text-{{ $color }}-800 transition duration-300 flex items-center">
                                        View Details
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('packages.by-type', ['packageType' => 'all']) }}"
                        class="mt-8 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300 group">
                        View All Packages
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="lg:w-1/2 flex flex-col gap-6 h-full">
                    @foreach ($newestPackages->take(2) as $package)
                        @php
                            $colors = [
                                'one-day-tour' => 'teal',
                                'heritage-art-camp' => 'amber',
                                'research-tour' => 'indigo',
                                'hyang-argopuro-festival' => 'purple',
                            ];
                            $color = $colors[$package->packageType->slug] ?? 'teal';
                        @endphp
                        <div class="relative rounded-xl overflow-hidden shadow-lg flex-1 group">
                            @if ($package->images && count(json_decode($package->images)) > 0)
                                <img src="{{ asset('storage/' . json_decode($package->images)[0]) }}"
                                    alt="{{ $package->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <img src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                    alt="Tour Package"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent flex items-end p-6">
                                <div>
                                    <span
                                        class="text-xs text-white bg-{{ $color }}-600 px-2 py-1 rounded-full mb-2 inline-block">
                                        {{ $package->packageType->name }}
                                    </span>
                                    <h3 class="text-white font-semibold text-xl mb-1">{{ $package->name }}</h3>
                                    <p class="text-gray-200 text-sm">{{ $package->duration }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

    {{-- Package Types Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-montserrat">
                Explore By Package Type
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($packageTypes as $type)
                    @php
                        $typeColors = [
                            'one-day-tour' => 'teal',
                            'heritage-art-camp' => 'amber',
                            'research-tour' => 'indigo',
                            'hyang-argopuro-festival' => 'purple',
                        ];
                        $typeColor = $typeColors[$type->slug] ?? 'teal';
                        $typeIcons = [
                            'one-day-tour' => 'map-marked-alt',
                            'heritage-art-camp' => 'landmark',
                            'research-tour' => 'microscope',
                            'hyang-argopuro-festival' => 'festival',
                        ];
                        $typeIcon = $typeIcons[$type->slug] ?? 'map';
                    @endphp

                    <a href="{{ route('packages.by-type', ['packageType' => $type->slug]) }}"
                        class="group block bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 border-t-4 border-{{ $typeColor }}-500">
                        <div class="p-6">
                            <div
                                class="w-12 h-12 bg-{{ $typeColor }}-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-{{ $typeIcon }} text-{{ $typeColor }}-600 text-lg"></i>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-800 mb-2 group-hover:text-{{ $typeColor }}-600 transition">
                                {{ $type->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit($type->description, 80) }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-{{ $typeColor }}-600 text-sm font-medium">
                                    {{ $type->tourPackages->count() }} packages
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-{{ $typeColor }}-500 opacity-0 group-hover:opacity-100 transition"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @if ($specialPackages->count() > 0)
        {{-- Special Packages Section --}}
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 font-montserrat">Special Events</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Unique experiences for unforgettable memories</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($specialPackages as $package)
                        @php
                            $basePrice = $package->pricings->sortBy('price')->first();
                        @endphp

                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-purple-500">
                            <div class="relative h-48 overflow-hidden">
                                @if ($package->images && count(json_decode($package->images)) > 0)
                                    <img src="{{ asset('storage/' . json_decode($package->images)[0]) }}"
                                        alt="{{ $package->name }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                @else
                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                        alt="{{ $package->name }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-6 text-white">
                                    <h3 class="text-xl font-bold">{{ $package->name }}</h3>
                                    <p class="text-sm text-gray-200">{{ $package->duration }}</p>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Starting from</p>
                                        <p class="text-xl font-bold text-purple-600">
                                            IDR {{ number_format($basePrice->price) }}
                                        </p>
                                    </div>
                                    <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                                        {{ $package->pricings->first()->variant ?? 'Standard' }}
                                    </span>
                                </div>

                                <a href="{{ route('packages.show', $package->slug) }}"
                                    class="w-full block text-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
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

            <!-- Featured Packages -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach ($featuredPackages as $package)
                    @php
                        $basePrice = $package->pricings->sortBy('price')->first();
                        $colors = ['teal', 'indigo', 'amber', 'emerald'];
                        $color = $colors[$loop->index % count($colors)];
                        $variantPrices = $package->pricings->groupBy('variant');
                    @endphp

                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-{{ $color }}-500 hover:shadow-xl transition duration-300">
                        <!-- Header with Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if ($package->images && count(json_decode($package->images)) > 0)
                                <img src="{{ asset('storage/' . json_decode($package->images)[0]) }}"
                                    alt="{{ $package->name }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                    alt="{{ $package->name }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-6 text-white">
                                <span class="text-xs bg-{{ $color }}-500 px-2 py-1 rounded-full mb-2 inline-block">
                                    {{ $package->packageType->name }}
                                </span>
                                <h3 class="text-2xl font-bold">{{ $package->name }}</h3>
                                <p class="text-gray-200">{{ $package->duration }}</p>
                            </div>
                        </div>

                        <!-- Package Content -->
                        <div class="p-6">
                            <!-- Dynamic content based on package type -->
                            @if ($package->packageType->slug === 'one-day-tour')
                                <!-- One Day Tour Layout -->
                                <div class="mb-6">
                                    <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                        <i class="fas fa-map-marker-alt text-{{ $color }}-600 mr-2"></i>
                                        ITINERARY
                                    </h4>
                                    <ul class="space-y-2 text-sm text-gray-600">
                                        @foreach (array_slice($package->itinerary, 0, 5) as $item)
                                            <li class="flex items-start">
                                                <i
                                                    class="fas fa-circle text-{{ $color }}-500 text-xs mt-1 mr-2"></i>
                                                <span>{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @elseif($package->packageType->slug === 'heritage-art-camp')
                                <!-- Heritage Camp Layout -->
                                <div class="mb-6">
                                    <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                        <i class="fas fa-route text-{{ $color }}-600 mr-2"></i>
                                        RUTE PERJALANAN
                                    </h4>
                                    <div class="flex items-start">
                                        <div class="flex flex-col items-center mr-4">
                                            <div
                                                class="w-8 h-8 bg-{{ $color }}-500 rounded-full flex items-center justify-center text-white">
                                                1
                                            </div>
                                            <div class="h-16 w-px bg-gray-300 my-1"></div>
                                            <div
                                                class="w-8 h-8 bg-{{ $color }}-500 rounded-full flex items-center justify-center text-white">
                                                2
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium">Hari 1: {{ $package->itinerary[0] ?? 'Penjemputan' }}
                                            </p>
                                            <p class="text-sm text-gray-600 mb-4">
                                                {{ Str::limit($package->itinerary[1] ?? 'Aktivitas hari pertama', 100) }}
                                            </p>
                                            <p class="font-medium">Hari 2:
                                                {{ $package->itinerary[2] ?? 'Aktivitas pagi' }}</p>
                                            <p class="text-sm text-gray-600">
                                                {{ Str::limit($package->itinerary[3] ?? 'Aktivitas hari kedua', 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @elseif($package->packageType->slug === 'hyang-argopuro-festival')
                                <!-- Festival Layout -->
                                <div class="mb-6">
                                    <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                        <i class="fas fa-calendar-day text-{{ $color }}-600 mr-2"></i>
                                        JADWAL ACARA
                                    </h4>
                                    <ul class="space-y-3">
                                        @foreach (array_slice($package->itinerary, 0, 3) as $item)
                                            <li class="flex items-start">
                                                <i class="fas fa-star text-{{ $color }}-500 text-xs mt-1 mr-2"></i>
                                                <span class="text-sm">{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Pricing Section -->
                            <div class="mb-6">
                                <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                    <i class="fas fa-tags text-{{ $color }}-600 mr-2"></i>
                                    HARGA PAKET
                                </h4>

                                @if (count($variantPrices) > 1)
                                    <!-- Show pricing variants if available -->
                                    <div class="space-y-3">
                                        @foreach ($variantPrices as $variant => $pricings)
                                            <div>
                                                <p class="font-medium text-sm text-gray-700">{{ $variant ?? 'Standar' }}
                                                </p>
                                                <div class="grid grid-cols-2 gap-2 mt-1">
                                                    @foreach ($pricings->sortBy('price')->take(2) as $pricing)
                                                        <div class="bg-gray-50 p-2 rounded">
                                                            <p class="text-xs text-gray-500">{{ $pricing->group_size }}
                                                            </p>
                                                            <p class="font-bold text-{{ $color }}-600">Rp
                                                                {{ number_format($pricing->price) }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <!-- Standard pricing display -->
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ($package->pricings->sortBy('price')->take(3) as $pricing)
                                            <div class="bg-gray-50 p-2 rounded text-center">
                                                <p class="text-xs text-gray-500">{{ $pricing->group_size }}</p>
                                                <p class="font-bold text-{{ $color }}-600">Rp
                                                    {{ number_format($pricing->price) }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- CTA Section -->
                            <div
                                class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-t pt-4">
                                <div class="mb-4 sm:mb-0">
                                    <div class="text-sm font-semibold text-gray-500">{{ $package->duration }}</div>
                                    <div class="text-2xl font-bold text-{{ $color }}-600">
                                        @if ($basePrice)
                                            Mulai Rp {{ number_format($basePrice->price) }}
                                            <span class="text-sm font-normal text-gray-500">/orang</span>
                                        @else
                                            Hubungi Kami
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('packages.show', $package->slug) }}"
                                    class="px-6 py-2 bg-{{ $color }}-600 text-white rounded-lg hover:bg-{{ $color }}-700 transition duration-300 font-medium text-sm">
                                    Detail Paket
                                </a>
                            </div>
                        </div>

                        <!-- Footer Note -->
                        <div class="bg-gray-50 px-6 py-4 border-t">
                            <p class="text-xs text-gray-600 text-center">
                                @if ($package->packageType->slug === 'one-day-tour')
                                    *Harga bervariasi berdasarkan jumlah peserta
                                @elseif($package->packageType->slug === 'hyang-argopuro-festival')
                                    *Tersedia paket VIP dan Reguler
                                @else
                                    *Termasuk semua fasilitas yang disebutkan
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <a href="{{ route('packages.by-type', ['packageType' => 'all']) }}"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                Lihat Semua Paket <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Package Types Section -->
    @if ($packageTypes->count() > 0)
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-montserrat">
                    Pilih Jenis Paket Wisata
                </h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($packageTypes as $type)
                        @php
                            $typeColors = [
                                'one-day-tour' => 'teal',
                                'heritage-art-camp' => 'amber',
                                'research-tour' => 'indigo',
                                'hyang-argopuro-festival' => 'purple',
                            ];
                            $typeColor = $typeColors[$type->slug] ?? 'teal';
                            $typeIcons = [
                                'one-day-tour' => 'map-marked-alt',
                                'heritage-art-camp' => 'landmark',
                                'research-tour' => 'microscope',
                                'hyang-argopuro-festival' => 'festival',
                            ];
                            $typeIcon = $typeIcons[$type->slug] ?? 'map';
                        @endphp

                        <a href="{{ route('packages.by-type', ['packageType' => $type->slug]) }}"
                            class="group block bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 border-t-4 border-{{ $typeColor }}-500">
                            <div class="p-6">
                                <div
                                    class="w-12 h-12 bg-{{ $typeColor }}-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-{{ $typeIcon }} text-{{ $typeColor }}-600 text-lg"></i>
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-2 group-hover:text-{{ $typeColor }}-600 transition">
                                    {{ $type->name }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit($type->description, 80) }}
                                </p>
                                <span class="text-{{ $typeColor }}-600 text-sm font-medium">
                                    {{ $type->tourPackages->count() }} paket tersedia
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Special Packages Section (Hyang Argopuro Festival) -->
    @if ($specialPackages->count() > 0)
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 font-montserrat">Event Khusus</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Paket spesial untuk pengalaman festival yang tak
                        terlupakan</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($specialPackages as $package)
                        @php
                            $basePrice = $package->pricings->sortBy('price')->first();
                            $variantPrices = $package->pricings->groupBy('variant');
                        @endphp

                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-purple-500">
                            <div class="relative h-48 overflow-hidden">
                                @if ($package->images && count(json_decode($package->images)) > 0)
                                    <img src="{{ asset('storage/' . json_decode($package->images)[0]) }}"
                                        alt="{{ $package->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                        alt="{{ $package->name }}" class="w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-6 text-white">
                                    <h3 class="text-xl font-bold">{{ $package->name }}</h3>
                                    <p class="text-sm text-gray-200">{{ $package->duration }}</p>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Mulai dari</p>
                                        <p class="text-xl font-bold text-purple-600">
                                            Rp {{ number_format($basePrice->price) }}
                                        </p>
                                    </div>
                                    <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                                        {{ $package->pricings->first()->variant ?? 'Reguler' }}
                                    </span>
                                </div>

                                <a href="{{ route('packages.show', $package->slug) }}"
                                    class="w-full block text-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($packageTypes->count() > 0)
        <!-- Package Types Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-montserrat">
                    Jelajahi Berdasarkan Jenis Paket
                </h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($packageTypes as $type)
                        <a href="{{ route('packages.by-type', ['packageType' => $type->slug]) }}"
                            class="group block bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 border-t-4 border-{{ $typeColor }}-500">
                            <div class="p-6">
                                <div
                                    class="w-12 h-12 bg-{{ $colors[$loop->index % count($colors)] }}-100 rounded-full flex items-center justify-center mb-4">
                                    <i
                                        class="fas fa-{{ $loop->index % 4 == 0 ? 'map-marked-alt' : ($loop->index % 4 == 1 ? 'camera' : ($loop->index % 4 == 2 ? 'home' : 'utensils')) }} text-{{ $colors[$loop->index % count($colors)] }}-600"></i>
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-2 group-hover:text-{{ $colors[$loop->index % count($colors)] }}-600 transition">
                                    {{ $type->name }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit($type->description, 80) }}
                                </p>
                                <span class="text-{{ $colors[$loop->index % count($colors)] }}-600 text-sm font-medium">
                                    {{ $type->tourPackages->count() }} paket tersedia
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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
