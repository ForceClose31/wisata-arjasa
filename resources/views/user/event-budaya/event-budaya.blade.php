@extends('layouts.appCus') {{-- Pastikan path ke layout Anda benar --}}

@section('content')

{{-- Bagian Banner Atas --}}
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

{{-- Bagian Kategori Event dan Daftar Event --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 max-w-screen-xl">
        {{-- Judul dan Sub-judul Kategori Event --}}
        <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
                {{ __('user.Kategori Event') }}
                <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
            </h2>
            <p class="text-lg text-gray-700" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">{{ __('user.Pilih kategori event yang ingin Anda jelajahi.') }}</p>
        </div>

        {{-- Tombol Kategori Event --}}
        <div id="event-categories" class="flex flex-wrap justify-center gap-4 mb-16">
            <button class="category-btn bg-blue-500 text-white px-5 py-3 rounded-full font-semibold text-sm hover:hover:bg-gray-100 transition duration-300 shadow-md" active" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" data-category="Semua">
                {{ __('user.Semua Event') }}
            </button>
            <button class="category-btn bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-category="Seni Pertunjukan">
                Seni Pertunjukan
            </button>
            <button class="category-btn bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" data-category="Festival">
                Festival
            </button>
            <button class="category-btn bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" data-category="Workshop & Pameran">
                Workshop & Pameran
            </button>
            <button class="category-btn bg-white text-gray-800 px-5 py-3 rounded-full font-semibold text-sm border border-gray-300 hover:bg-gray-100 transition duration-300 shadow-md" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000" data-category="Upacara Adat">
                Upacara Adat
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl event-card" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000" data-category="Festival">
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
                            {{ __('user.LIHAT DETAIL') }}
                        </a>
                        <span class="text-lg font-bold text-green-600">Gratis</span>
                    </div>
                </div>
            </div>

            {{-- Event Card 2 (Kategori Seni Pertunjukan) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl event-card" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-category="Seni Pertunjukan">
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

            {{-- Event Card 3 (Kategori Workshop & Pameran) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl event-card" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000" data-category="Workshop & Pameran">
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

            {{-- Contoh Event Card untuk Upacara Adat --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl event-card" data-aos="fade-up" data-aos-delay="1100" data-aos-duration="1000" data-category="Upacara Adat">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                             alt="Upacara Adat"
                             class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        Ongoing
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-400 mr-2"></i>20 Juli 2025</span>
                        <span class="text-sm text-gray-600"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>Desa Adat</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Upacara Bersih Desa</h3>
                    <p class="text-gray-700 text-sm mb-4">
                        Acara tahunan untuk membersihkan desa dan memohon berkah, melibatkan seluruh masyarakat.
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="#"
                           class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            LIHAT DETAIL
                        </a>
                        <span class="text-lg font-bold text-orange-600">Terbatas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const eventCards = document.querySelectorAll('.event-card'); // Menggunakan class 'event-card'

        // Fungsi untuk menampilkan/menyembunyikan kartu event
        function filterEvents(category) {
            eventCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (category === 'Semua' || cardCategory === category) {
                    card.style.display = 'block'; // Menampilkan kartu
                } else {
                    card.style.display = 'none'; // Menyembunyikan kartu
                }
            });
            AOS.refreshHard();
        }

        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-blue-500', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-800', 'border', 'border-gray-300');
                });

                this.classList.add('active', 'bg-blue-500', 'text-white');
                this.classList.remove('bg-white', 'text-gray-800', 'border', 'border-gray-300');

                const selectedCategory = this.getAttribute('data-category');
                filterEvents(selectedCategory);
            });
        });

        const allButton = document.querySelector('.category-btn[data-category="Semua"]');
        if (allButton) {
            setTimeout(() => {
                allButton.click(); // Simulasikan klik pada tombol "Semua Event" untuk inisialisasi awal
            }, 50); // Delay kecil, bisa disesuaikan jika perlu
        } else {
            filterEvents('Semua'); // Fallback jika tombol "Semua" tidak ditemukan
        }
    });
</script>
@endpush
