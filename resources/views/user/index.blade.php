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
        <div class="container mx-auto px-4 max-w-screen-xl"> {{-- Tambahkan max-w-screen-xl di sini --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-gray-800 mb-6 font-montserrat relative inline-block text-underline-animated-explore">
                    {{-- Tambahkan kelas baru untuk menargetkan CSS garis bawah ini --}}
                    <span class="relative z-10">Explore Arjasa's Wonders</span>
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 z-0 opacity-30"></span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover the rich cultural heritage and natural beauty of
                    Arjasa through our curated experiences</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8"> 

                {{-- Cultural Sites --}}
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-teal-600 mb-2" x-data="{ count: 0, target: 10 }"
                        x-intersect.once="() => { {{-- Tambahkan .once agar animasi hanya berjalan sekali --}}
                            const duration = 2000;
                            const increment = target / (duration / 16);
                            let start;
                            const animateCount = (timestamp) => {
                                if (!start) start = timestamp;
                                const progress = timestamp - start;
                                const value = Math.min(target, Math.ceil(progress * increment));
                                count = value;
                                if (progress < duration) {
                                    requestAnimationFrame(animateCount);
                                } else {
                                    count = target; // Ensure it ends exactly at target
                                }
                            };
                            requestAnimationFrame(animateCount);
                        }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Cultural Sites</h3>
                </div>

                {{-- Local Events --}}
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-indigo-600 mb-2" x-data="{ count: 0, target: 25 }"
                        x-intersect.once="() => {
                            const duration = 2000;
                            const increment = target / (duration / 16);
                            let start;
                            const animateCount = (timestamp) => {
                                if (!start) start = timestamp;
                                const progress = timestamp - start;
                                const value = Math.min(target, Math.ceil(progress * increment));
                                count = value;
                                if (progress < duration) {
                                    requestAnimationFrame(animateCount);
                                } else {
                                    count = target;
                                }
                            };
                            requestAnimationFrame(animateCount);
                        }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Local Events</h3>
                </div>

                {{-- Tour Packages --}}
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-amber-600 mb-2" x-data="{ count: 0, target: 8 }"
                        x-intersect.once="() => {
                            const duration = 2000;
                            const increment = target / (duration / 16);
                            let start;
                            const animateCount = (timestamp) => {
                                if (!start) start = timestamp;
                                const progress = timestamp - start;
                                const value = Math.min(target, Math.ceil(progress * increment));
                                count = value;
                                if (progress < duration) {
                                    requestAnimationFrame(animateCount);
                                } else {
                                    count = target;
                                }
                            };
                            requestAnimationFrame(animateCount);
                        }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Tour Packages</h3>
                </div>

                {{-- Natural Attractions --}}
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-4xl font-bold text-emerald-600 mb-2" x-data="{ count: 0, target: 15 }"
                        x-intersect.once="() => {
                            const duration = 2000;
                            const increment = target / (duration / 16);
                            let start;
                            const animateCount = (timestamp) => {
                                if (!start) start = timestamp;
                                const progress = timestamp - start;
                                const value = Math.min(target, Math.ceil(progress * increment));
                                count = value;
                                if (progress < duration) {
                                    requestAnimationFrame(animateCount);
                                } else {
                                    count = target;
                                }
                            };
                            requestAnimationFrame(animateCount);
                        }"
                        x-text="count">0</div>
                    <h3 class="text-lg font-semibold text-gray-800">Natural Attractions</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/3 mx-auto max-w-xs md:max-w-sm lg:max-w-md" data-aos="fade-right"
                    data-aos-duration="1000">
                    <div
                        class="relative rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out">
                        <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Kisah Kami Dewi Arjasa" class="w-full h-auto object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <p class="text-sm font-semibold font-lato tracking-wide">
                                Dewa Arjasa - Jejak Sejarah Sejak 2010
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/3" data-aos="fade-left" data-aos-duration="1000">
                    <div class="max-w-2xl mx-auto lg:mx-0">
                        <h2 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
                            Kisah Perjalanan Kami
                            <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed font-lato">
                            Berawal dari kecintaan mendalam terhadap kekayaan budaya dan pesona alam Arjasa, <span class="text-blue-500 font-bold">Dewa Arjasa</span> didirikan pada tahun 2010 dengan misi mulia untuk memperkenalkan keindahan tersembunyi ini kepada dunia. Kami memulai perjalanan ini dengan semangat untuk berbagi keunikan Arjasa.
                        </p>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed font-lato">
                            Dari sebuah tim kecil yang berdedikasi, kami telah tumbuh menjadi penyedia layanan wisata terpercaya, dikenal luas dengan pendekatan personal dan pengetahuan mendalam tentang setiap sudut Arjasa. Kami bangga dapat menjadi jembatan antara Anda dan pengalaman tak terlupakan di destinasi ini.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                            <div class="text-center p-4 bg-teal-50 rounded-lg shadow-sm animate-fade-in delay-100">
                                <div class="text-3xl font-bold text-teal-700 font-montserrat">14+</div>
                                <div class="text-gray-700 text-sm font-lato">Tahun Pengalaman</div>
                            </div>
                            <div class="text-center p-4 bg-indigo-50 rounded-lg shadow-sm animate-fade-in delay-200">
                                <div class="text-3xl font-bold text-indigo-700 font-montserrat">5000+</div>
                                <div class="text-gray-700 text-sm font-lato">Wisatawan Puas</div>
                            </div>
                            <div class="text-center p-4 bg-amber-50 rounded-lg shadow-sm animate-fade-in delay-300">
                                <div class="text-3xl font-bold text-amber-700 font-montserrat">50+</div>
                                <div class="text-gray-700 text-sm font-lato">Destinasi Unggulan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tour Packages Section --}}
    

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
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative inline-block text-underline-animated-feature-heading"> {{-- Tambahkan kelas baru untuk menargetkan CSS garis bawah ini --}}
                        Keunggulan Layanan Kami
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Mengapa memilih kami untuk petualangan Anda di Arjasa?
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Tambahkan data-aos="fade-up" dan data-aos-delay pada setiap kartu --}}
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-teal-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mb-4 text-teal-600 mx-auto">
                        <i class="fas fa-box-open text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Paket Lengkap</h3>
                    <p class="text-gray-600 text-center text-sm">Kami menyediakan berbagai pilihan paket wisata terlengkap di
                        Arjasa.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-indigo-600 mx-auto">
                        <i class="fas fa-car text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">All in One</h3>
                    <p class="text-gray-600 text-center text-sm">Tersedia juga sewa motor, mobil, dan cottage untuk kenyamanan
                        Anda.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-amber-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4 text-amber-600 mx-auto">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Professional</h3>
                    <p class="text-gray-600 text-center text-sm">Dengan dukungan tour guide profesional dan berpengalaman.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="400"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-emerald-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-4 text-emerald-600 mx-auto">
                        <i class="fas fa-award text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Best Guide</h3>
                    <div class="flex flex-col items-center space-y-2 mt-3">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-2"></i>
                            <span class="text-gray-600 text-sm">Best Package</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-2"></i>
                            <span class="text-gray-600 text-sm">Best Price</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tambahkan data-aos="fade-up" pada bagian Best Your Trip --}}
            <div class="mt-16 text-center bg-gradient-to-r from-teal-50 to-indigo-50 rounded-xl p-8 shadow-inner"
                data-aos="fade-up" data-aos-delay="500">
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
        {{-- Tambahkan max-w-screen-xl pada div.container --}}
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    {{-- Tambahkan kelas baru untuk menargetkan CSS garis bawah ini --}}
                    <span class="relative inline-block text-underline-animated-featured-packages">
                        Paket Wisata Unggulan
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan pengalaman wisata terbaik dengan paket-paket
                    eksklusif kami</p>
            </div>

            {{-- Pastikan grid-cols-1 untuk mobile dan lg:grid-cols-2 untuk desktop --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> {{-- Diubah dari lg:grid-cols-2 menjadi md:grid-cols-2 --}}
                @foreach ($featuredPackages as $package)
                    @php
                        $basePrice = $package->pricings->sortBy('price')->first();
                        $colors = ['teal', 'indigo', 'amber', 'emerald'];
                        $color = $colors[$loop->index % count($colors)];
                        $variantPrices = $package->pricings->groupBy('variant');
                    @endphp

                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden border-b-4 border-{{ $color }}-500 hover:shadow-xl transition duration-300">
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

                        <div class="p-6">
                            @if ($package->packageType->slug === 'one-day-tour')
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

                            <div class="mb-6">
                                <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                    <i class="fas fa-tags text-{{ $color }}-600 mr-2"></i>
                                    HARGA PAKET
                                </h4>

                                @if (count($variantPrices) > 1)
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

            <div class="text-center mt-12"> {{-- Tambahkan text-center dan mt-12 untuk menengahkan tombol --}}
                <a href="{{ route('packages.by-type', ['packageType' => 'all']) }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-teal-600 hover:bg-teal-700 transition duration-300">
                    Lihat Semua Paket <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Package Types Section -->
    @if ($packageTypes->count() > 0)
    <section class="py-16 bg-white">
            {{-- Tambahkan max-w-screen-xl pada div.container --}}
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="text-center mb-12"> {{-- Margin bottom sedikit disesuaikan --}}
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                        {{-- Tambahkan kelas baru untuk menargetkan CSS garis bawah ini --}}
                        <span class="relative inline-block text-underline-animated-package-type-heading">
                            Pilih Jenis Paket Wisata
                            {{-- Garis bawah tetap di sini, akan ditarget oleh CSS custom --}}
                            <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-30 -z-1"></span>
                        </span>
                    </h2>
                </div>

                {{-- Grid disesuaikan: grid-cols-1 untuk mobile, md:grid-cols-2 untuk tablet, lg:grid-cols-4 untuk desktop --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($packageTypes as $index => $type) {{-- Tambahkan $index untuk delay AOS --}}
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
                                'hyang-argopuro-festival' => 'calendar-alt', // Mengubah icon festival agar konsisten dengan sebelumnya
                            ];
                            $typeIcon = $typeIcons[$type->slug] ?? 'map';
                        @endphp

                        {{-- Tambahkan data-aos="fade-up" dan data-aos-delay --}}
                        <a href="{{ route('packages.by-type', ['packageType' => $type->slug]) }}"
                            class="group block bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 border-t-4 border-{{ $typeColor }}-500"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}"> {{-- Delay bertahap --}}
                            <div class="p-6">
                                <div
                                    class="w-12 h-12 bg-{{ $typeColor }}-100 rounded-full flex items-center justify-center mb-4 mx-auto"> {{-- Tambahkan mx-auto untuk menengahkan ikon --}}
                                    <i class="fas fa-{{ $typeIcon }} text-{{ $typeColor }}-600 text-lg"></i>
                                </div>
                                <h3
                                    class="text-xl font-bold text-center text-gray-800 mb-2 group-hover:text-{{ $typeColor }}-600 transition">
                                    {{ $type->name }}
                                </h3>
                                <p class="text-gray-600 text-sm text-center mb-4"> {{-- Tambahkan text-center --}}
                                    {{ Str::limit($type->description, 80) }}
                                </p>
                                <span class="text-{{ $typeColor }}-600 text-sm font-medium block text-center"> {{-- Tambahkan block text-center --}}
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

    {{-- Cottage Options Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
                    Cottage
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                </h2>
                <p class="text-lg text-gray-700">Kami menyediakan pilihan Cottage dengan fasilitas lengkap.</p>
                <div class="flex items-center bg-blue-400 px-4 py-2 rounded-full mx-auto w-fit mt-4">
                    <i class="fas fa-star text-yellow-500 mr-2"></i>
                    <span class="text-lg font-semibold text-white">Rating 5/5</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10"> {{-- Grid responsif untuk 1, 2, atau 4 kolom --}}

                {{-- Tria Maria Cottages Ngurbloat --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=400&q=80"
                                        alt="Tria Maria Cottages"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        {{-- Nama Cottage --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Tria Maria Cottages</h3>

                        {{-- Fasilitas --}}
                        <ul class="text-sm text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea</li>
                        </ul>

                        {{-- Total Room --}}
                        <div class="flex justify-end items-center mb-4 text-gray-700">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-bed text-blue-500 mr-2"></i>
                                <span>4 Room</span>
                            </div>
                        </div>

                        {{-- Button dan Harga --}}
                        <div class="flex justify-between text-sm items-center mt-4">
                            <a href="#"
                            class="bg-blue-400 text-sm text-white font-semibold px-3 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                                BOOKING
                            </a>
                            <div class="text-right">
                                <span class="block text-sm font-bold text-gray-800">Rp 500.000<span class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Noel Cottages Ngurbloat --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=400&q=80"
                                        alt="Noel Cottages"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        {{-- Nama Cottage --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Noel Cottages</h3>

                        {{-- Fasilitas --}}
                        <ul class="text-sm text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea</li>
                        </ul>

                        {{-- Total Room --}}
                        <div class="flex justify-end items-center mb-4 text-gray-700">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-bed text-blue-500 mr-2"></i>
                                <span>2 Room</span>
                            </div>
                        </div>

                        {{-- Button dan Harga --}}
                        <div class="flex justify-between text-sm items-center mt-4">
                            <a href="#"
                            class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                                BOOKING
                            </a>
                            <div class="text-right">
                                <span class="block text-sm font-bold text-gray-800">Rp 450.000<span class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tria Maria Cottages (another one) --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=400&q=80"
                                        alt="Tria Maria Cottages 2"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        {{-- Nama Cottage --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Tria Maria Cottages</h3>

                        {{-- Fasilitas --}}
                        <ul class="text-sm text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea</li>
                        </ul>

                        {{-- Total Room --}}
                        <div class="flex justify-end items-center mb-4 text-gray-700">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-bed text-blue-500 mr-2"></i>
                                <span>3 Room</span>
                            </div>
                        </div>

                        {{-- Button dan Harga --}}
                        <div class="flex justify-between text-sm items-center mt-4">
                            <a href="#"
                            class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                                BOOKING
                            </a>
                            <div class="text-right">
                                <span class="block text-sm font-bold text-gray-800">Rp 550.000<span class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stella Villa Cottages --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=400&q=80"
                                        alt="Stella Villa Cottages"
                                        class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        {{-- Nama Cottage --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1">Stella Villa Cottages</h3>

                        {{-- Fasilitas --}}
                        <ul class="text-sm text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea</li>
                        </ul>

                        {{-- Total Room --}}
                        <div class="flex justify-end items-center mb-4 text-gray-700">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-bed text-blue-500 mr-2"></i>
                                <span>2 Room</span>
                            </div>
                        </div>

                        {{-- Button dan Harga --}}
                        <div class="flex justify-between text-sm items-center mt-4">
                            <a href="#"
                            class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                                BOOKING
                            </a>
                            <div class="text-right">
                                <span class="block text-sm font-bold text-gray-800">Rp 600.000<span class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

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
