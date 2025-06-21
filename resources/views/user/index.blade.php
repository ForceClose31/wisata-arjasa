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
                        class="px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-gray-100 hover:text-blue-800 transition duration-300 animate-fade-in animate-delay-200 inline-flex items-center shadow-lg">
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
                <h2
                    class="text-3xl md:text-5xl font-bold text-gray-800 mb-6 font-montserrat relative inline-block text-underline-animated-explore">
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
    <section class="py-20 bg-gray-50">
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
                            Berawal dari kecintaan mendalam terhadap kekayaan budaya dan pesona alam Arjasa, <span
                                class="text-blue-500 font-bold">Dewa Arjasa</span> didirikan pada tahun 2010 dengan misi
                            mulia untuk memperkenalkan keindahan tersembunyi ini kepada dunia. Kami memulai perjalanan ini
                            dengan semangat untuk berbagi keunikan Arjasa.
                        </p>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed font-lato">
                            Dari sebuah tim kecil yang berdedikasi, kami telah tumbuh menjadi penyedia layanan wisata
                            terpercaya, dikenal luas dengan pendekatan personal dan pengetahuan mendalam tentang setiap
                            sudut Arjasa. Kami bangga dapat menjadi jembatan antara Anda dan pengalaman tak terlupakan di
                            destinasi ini.
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
    {{-- Keunggulan Section --}}
    <section class="py-20 bg-gray-50">
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
                    <p class="text-gray-600 text-center text-sm">Kami menyediakan berbagai pilihan paket wisata terlengkap
                        di
                        Arjasa.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-indigo-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4 text-indigo-600 mx-auto">
                        <i class="fas fa-car text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">All in One</h3>
                    <p class="text-gray-600 text-center text-sm">Tersedia juga sewa motor, mobil, dan cottage untuk
                        kenyamanan
                        Anda.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-amber-500 hover:shadow-xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4 text-amber-600 mx-auto">
                        <i class="fas fa-user-tie text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-3">Professional</h3>
                    <p class="text-gray-600 text-center text-sm">Dengan dukungan tour guide profesional dan berpengalaman.
                    </p>
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
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative inline-block text-underline-animated-package-heading"> {{-- Tambahkan kelas baru untuk garis bawah --}}
                        Paket Wisata Unggulan
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-30 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan pengalaman wisata terbaik dengan paket-paket
                    eksklusif kami</p>
            </div>

            {{-- Perubahan di sini: grid-cols-1 md:grid-cols-2 lg:grid-cols-3 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredPackages as $index => $package)
                    <div x-data="{
                        activeTab: 'itinerary',
                        contentExpanded: false,
                        pricingExpanded: false
                    }"
                        class="group relative bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <!-- Package Header with Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if ($package->images && count(($package->images)) > 0)
                                <img src="{{ asset('storage/' . ($package->images)[0]) }}"
                                    alt="{{ $package->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <img src="https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&fit=crop&w=800&q=80"
                                    alt="{{ $package->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-4 right-4 flex flex-col space-y-2">
                                <span
                                    class="bg-white/90 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                                    {{ $package->duration }}
                                </span>
                                <span
                                    class="bg-blue-400/90 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                                    {{ $package->packageType->name }}
                                </span>
                            </div>
                        </div>

                        <div class="p-5"> {{-- Mengurangi padding dari p-6 menjadi p-5 --}}
                            <h3 class="text-lg font-bold text-gray-800 mb-2 font-serif"> {{-- Mengurangi ukuran teks dari text-xl menjadi text-lg --}}
                                {{ $package->name }}</h3>

                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $package->description }}</p> {{-- Mengurangi ukuran teks dari text-base menjadi text-sm dan mb-4 menjadi mb-3 --}}

                            @if (isset($package->highlights) && count($package->highlights) > 0)
                                <div class="mb-3"> {{-- Mengurangi mb-4 menjadi mb-3 --}}
                                    <h4 class="text-xs font-semibold text-gray-500 mb-1 flex items-center"> {{-- Mengurangi ukuran teks dari text-sm menjadi text-xs dan mb-2 menjadi mb-1 --}}
                                        <i class="fas fa-sparkles text-amber-400 mr-2"></i> Highlights
                                    </h4>
                                    <div class="flex flex-wrap gap-1"> {{-- Mengurangi gap dari gap-2 menjadi gap-1 --}}
                                        @foreach (array_slice($package->highlights, 0, 3) as $highlight)
                                            <span
                                                class="bg-amber-50 text-amber-800 text-xs px-2 py-0.5 rounded-full border border-amber-100"> {{-- Mengurangi padding dan ukuran teks --}}
                                                {{ $highlight }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="mb-4 bg-blue-50/50 p-3 rounded-lg border border-blue-100"> {{-- Mengurangi mb-6 menjadi mb-4 dan p-4 menjadi p-3 --}}
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center text-sm"> {{-- Mengurangi mb-3 menjadi mb-2 dan menambahkan text-sm --}}
                                    <i class="fas fa-tag text-blue-500 mr-2"></i> Harga Paket
                                </h4>
                                <div class="space-y-1"> {{-- Mengurangi space-y-2 menjadi space-y-1 --}}
                                    @foreach ($package->pricings->sortBy('price')->take(2) as $pricing)
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs text-gray-700"> {{-- Mengurangi ukuran teks dari text-sm menjadi text-xs --}}
                                                {{ $pricing->group_size }}
                                                @if ($pricing->variant)
                                                    <span class="text-gray-500 text-xs">({{ $pricing->variant }})</span>
                                                @endif
                                            </span>
                                            <span class="font-bold text-blue-600 text-sm">Rp
                                                {{ number_format($pricing->price, 0, ',', '.') }}</span> {{-- Mengurangi ukuran teks dari text-base menjadi text-sm --}}
                                        </div>
                                    @endforeach

                                    @if ($package->pricings->count() > 2)
                                        <div class="pt-1"> {{-- Mengurangi pt-2 menjadi pt-1 --}}
                                            <button @click="pricingExpanded = !pricingExpanded"
                                                class="text-xs text-blue-500 hover:text-blue-700 flex items-center">
                                                <span
                                                    x-text="pricingExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua harga (' + ({{ $package->pricings->count() }} - 2) + ')'"></span>
                                                <i class="fas"
                                                    :class="pricingExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                    class="ml-1 text-xs"></i>
                                            </button>
                                            <div x-show="pricingExpanded" x-collapse class="space-y-1 mt-1"> {{-- Mengurangi space-y-2 menjadi space-y-1 dan mt-2 menjadi mt-1 --}}
                                                @foreach ($package->pricings->sortBy('price')->slice(2) as $pricing)
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-xs text-gray-700">
                                                            {{ $pricing->group_size }}
                                                            @if ($pricing->variant)
                                                                <span
                                                                    class="text-gray-500 text-xs">({{ $pricing->variant }})</span>
                                                            @endif
                                                        </span>
                                                        <span class="font-bold text-blue-600 text-sm">Rp
                                                            {{ number_format($pricing->price, 0, ',', '.') }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <div class="flex border-b border-gray-200">
                                    <button @click="activeTab = 'itinerary'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'itinerary', 'text-gray-500 hover:text-gray-700': activeTab !== 'itinerary' }"
                                        class="py-1.5 px-3 font-medium text-xs border-b-2 -mb-px transition duration-150"> {{-- Mengurangi padding dan ukuran teks --}}
                                        Itinerary
                                    </button>
                                    <button @click="activeTab = 'includes'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'includes', 'text-gray-500 hover:text-gray-700': activeTab !== 'includes' }"
                                        class="py-1.5 px-3 font-medium text-xs border-b-2 -mb-px transition duration-150"> {{-- Mengurangi padding dan ukuran teks --}}
                                        Includes
                                    </button>
                                    <button @click="activeTab = 'excludes'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'excludes', 'text-gray-500 hover:text-gray-700': activeTab !== 'excludes' }"
                                        class="py-1.5 px-3 font-medium text-xs border-b-2 -mb-px transition duration-150"> {{-- Mengurangi padding dan ukuran teks --}}
                                        Excludes
                                    </button>
                                </div>

                                <div class="mt-3 relative"> {{-- Mengurangi mt-4 menjadi mt-3 --}}
                                    <div x-show="activeTab === 'itinerary'" class="space-y-2 text-sm"> {{-- Mengurangi space-y-3 menjadi space-y-2 dan menambahkan text-sm --}}
                                        @if (isset($package->itinerary) && count($package->itinerary) > 0)
                                            <div :class="{ 'max-h-40 overflow-hidden': !contentExpanded }"> {{-- Mengurangi max-h-48 menjadi max-h-40 --}}
                                                @foreach ($package->itinerary as $index => $item)
                                                    <div class="flex items-start pb-1"> {{-- Mengurangi pb-2 menjadi pb-1 --}}
                                                        <span
                                                            class="text-blue-500 font-bold mr-2">{{ $index + 1 }}.</span>
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->itinerary) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-xs text-blue-500 hover:text-blue-700 mt-1 flex items-center"> {{-- Mengurangi mt-2 menjadi mt-1 --}}
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat itinerary lengkap (' + {{ count($package->itinerary) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500 text-sm">No itinerary available</p>
                                        @endif
                                    </div>

                                    <div x-show="activeTab === 'includes'" class="space-y-2 text-sm"> {{-- Mengurangi space-y-3 menjadi space-y-2 dan menambahkan text-sm --}}
                                        @if (isset($package->includes) && count($package->includes) > 0)
                                            <div :class="{ 'max-h-40 overflow-hidden': !contentExpanded }"> {{-- Mengurangi max-h-48 menjadi max-h-40 --}}
                                                @foreach ($package->includes as $item)
                                                    <div class="flex items-start">
                                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->includes) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-xs text-blue-500 hover:text-blue-700 mt-1 flex items-center"> {{-- Mengurangi mt-2 menjadi mt-1 --}}
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua includes (' + {{ count($package->includes) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500 text-sm">No includes information</p>
                                        @endif
                                    </div>

                                    <div x-show="activeTab === 'excludes'" class="space-y-2 text-sm"> {{-- Mengurangi space-y-3 menjadi space-y-2 dan menambahkan text-sm --}}
                                        @if (isset($package->excludes) && count($package->excludes) > 0)
                                            <div :class="{ 'max-h-40 overflow-hidden': !contentExpanded }"> {{-- Mengurangi max-h-48 menjadi max-h-40 --}}
                                                @foreach ($package->excludes as $item)
                                                    <div class="flex items-start">
                                                        <i class="fas fa-times-circle text-red-500 mt-1 mr-2"></i>
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->excludes) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-xs text-blue-500 hover:text-blue-700 mt-1 flex items-center"> {{-- Mengurangi mt-2 menjadi mt-1 --}}
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua excludes (' + {{ count($package->excludes) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500 text-sm">No excludes information</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 text-center"> {{-- Mengurangi mt-6 menjadi mt-4 --}}
                                <a href="{{ route('tour-packages.show', $package->slug) }}"
                                    class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-md hover:shadow-lg text-sm"> {{-- Mengurangi padding dan menambahkan text-sm --}}
                                    Detail Paket
                                    <i class="fas fa-arrow-right ml-2 text-xs"></i> {{-- Mengurangi ukuran ikon --}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <a href="{{ route('packages.by-type', ['packageType' => 'all']) }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 transition duration-300">
                    Lihat Semua Paket <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

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
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    data-aos="fade-up" data-aos-delay="100">
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
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free
                                Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi
                            </li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water
                                Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea
                            </li>
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
                                <span class="block text-sm font-bold text-gray-800">Rp 500.000<span
                                        class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Noel Cottages Ngurbloat --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    data-aos="fade-up" data-aos-delay="200">
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
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free
                                Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi
                            </li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water
                                Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea
                            </li>
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
                                <span class="block text-sm font-bold text-gray-800">Rp 450.000<span
                                        class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tria Maria Cottages (another one) --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    data-aos="fade-up" data-aos-delay="300">
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
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free
                                Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi
                            </li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water
                                Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea
                            </li>
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
                                <span class="block text-sm font-bold text-gray-800">Rp 550.000<span
                                        class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stella Villa Cottages --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    data-aos="fade-up" data-aos-delay="400">
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
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free
                                Breakfast</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Free WiFi
                            </li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>Water
                                Heater</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>AC</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-blue-500 mr-2"></i>View Sea
                            </li>
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
                                <span class="block text-sm font-bold text-gray-800">Rp 600.000<span
                                        class="text-sm text-gray-600">/Night</span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Articles Section --}}
    <section class="py-20 bg-gray-50">
        {{-- Tambahkan max-w-screen-xl pada container --}}
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="text-center mb-16" data-aos="fade-up"> {{-- Tambahkan AOS ke header --}}
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative text-underline-animated-article-heading"> {{-- Tambahkan kelas baru untuk garis bawah --}}
                        Artikel Terbaru
                        {{-- Ubah warna garis bawah dari teal-400 menjadi blue-400 --}}
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan tips wisata dan informasi terbaru seputar
                    destinasi kami</p>
            </div>

            <div class="container mx-auto px-4">
                <!-- Categories Filter -->
                <div class="mb-8 flex flex-wrap justify-center gap-2" data-aos="fade-up">
                    <a href="{{ route('articles.all') }}"
                        class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-teal-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                        Semua Kategori
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('articles.all', ['category' => $category]) }}"
                            class="px-4 py-2 rounded-full {{ request('category') == $category ? 'bg-teal-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>

                <!-- Articles Grid -->
                @if ($articles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($articles as $article)
                            <article
                                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300"
                                data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    <!-- Make sure your article has these properties -->
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/400x225?text=No+Thumbnail' }}"
                                            alt="{{ $article->title }}"
                                            class="w-full h-full object-cover transition duration-300 hover:scale-105">
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center mb-3">
                                            <span
                                                class="px-2 py-1 bg-teal-100 text-teal-800 text-xs font-medium rounded-full">
                                                {{ $article->category }}
                                            </span>
                                            <span class="ml-2 text-xs text-gray-500">
                                                {{ $article->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-teal-600 transition">
                                            {{ $article->title }}
                                        </h3>
                                        <p class="text-gray-600 line-clamp-2">
                                            {{ Str::limit(strip_tags($article->excerpt), 100) }}
                                        </p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <span class="text-sm text-gray-500">
                                                <i class="far fa-eye mr-1"></i>
                                                {{ $article->views_count ?? 0 }} views
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12" data-aos="fade-up">
                        {{ $articles->links() }}
                    </div>
                @else
                    <div class="text-center py-12" data-aos="fade-up">
                        <img src="{{ asset('images/no-articles.svg') }}" alt="No articles found"
                            class="max-w-xs mx-auto mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada artikel yang ditemukan</h3>
                        <p class="text-gray-600">Coba dengan kata kunci atau kategori yang berbeda</p>
                    </div>
                @endif
            </div>
            <div class="text-center mt-12" data-aos="fade-up"> {{-- Tambahkan AOS ke tombol --}}
                <a href="/artikel" {{-- Ubah bg-teal-600 dan hover:bg-teal-700 menjadi bg-blue-400 dan hover:bg-blue-500 --}}
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-400 hover:bg-blue-500 transition duration-300">
                    Lihat Semua Artikel <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-gray-50">
        {{-- Menyesuaikan jarak kanan-kiri ke px-4 agar konsisten dengan Article Section --}}
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="text-center mb-16" data-aos="fade-up"> {{-- Menambahkan AOS ke header --}}
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    <span class="relative text-underline-animated-article-heading"> {{-- Tambahkan kelas baru untuk garis bawah --}}
                        Testimoni Traveler
                        {{-- Ubah warna garis bawah dari teal-400 menjadi blue-400 --}}
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                    </span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dengarkan apa kata pengunjung kami tentang petualangan mereka di Arjasa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100"> {{-- Menambahkan AOS --}}
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4 object-cover"> {{-- Menambahkan object-cover --}}
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

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="200"> {{-- Menambahkan AOS --}}
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4 object-cover"> {{-- Menambahkan object-cover --}}
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

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300"> {{-- Menambahkan AOS --}}
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="User"
                            class="w-12 h-12 rounded-full mr-4 object-cover"> {{-- Menambahkan object-cover --}}
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
        <section class="py-20 bg-gray-50 text-gray-800">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 font-montserrat">Siap Jelajahi Arjasa?</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Bergabunglah dengan komunitas penjelajah budaya kami dan mulai petualangan Anda di Arjasa hari ini</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ 'login' }}"
                        class="px-8 py-3 bg-white text-blue-400 font-bold rounded-lg hover:bg-gray-100 hover:text-teal-800 transition duration-300 shadow-lg">
                        Buat Akun
                    </a>
                    <a href="/about"
                        class="px-8 py-3 border-2 border-blue-400 bg-blue-400 text-white font-bold rounded-lg hover:bg-white hover:text-teal-700 transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>
    @endauth
@endsection
