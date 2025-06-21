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

<section class="py-20 bg-white"> {{-- Menggunakan latar belakang putih seperti yang terlihat di gambar gallery --}}
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
            Gallery
            <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
        </h2>
        <p class="text-lg text-gray-700">Temukan keindahan setiap sudut Arjasa dalam galeri foto kami.</p>
    </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4"> {{-- Grid responsif untuk berbagai ukuran layar --}}

            {{-- Gallery Item 1 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Sunset"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">The finest white sand in the world</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 2 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1590439474776-80f4f9f4d1e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Pulau Adranan"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Pulau Adranan</h3>
                    <p class="text-xs opacity-80">Hidden gem with crystal clear water</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 3 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1601004113063-23a9d943b177?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ohoilertawun Beach"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ohoilertawun Beach</h3>
                    <p class="text-xs opacity-80">Swing by the beach</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 4 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="400">
                <img src="https://images.unsplash.com/photo-1596700030623-018e6c7d1e8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Sand"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">Kei Islands Wonder</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 5 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ba6f60060?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Paddleboard"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">The finest white sand in the world</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 6 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                <img src="https://images.unsplash.com/photo-1563275752-9c3f0b2f2e5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Goa Hawang"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Goa Hawang</h3>
                    <p class="text-xs opacity-80">Mystical Cave Pool</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 7 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="700">
                <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Sunset 2"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">Golden Hour Beauty</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 8 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="800">
                <img src="https://images.unsplash.com/photo-1506017255953-61ce58e578a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach People"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">The finest white sand</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 9 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="900">
                <img src="https://images.unsplash.com/photo-1596700030623-018e6c7d1e8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Wide"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">The finest white sand</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>

            {{-- Gallery Item 10 --}}
            <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="1000">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ba6f60060?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ngurbloat Beach Paddleboard Group"
                         class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="font-bold text-sm">Ngurbloat Beach</h3>
                    <p class="text-xs opacity-80">SUP Fun</p>
                    <div class="absolute bottom-3 right-3 text-white">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                </div>
            </div>
            
            {{-- Add more gallery items as needed, following the same structure --}}

        </div>
    </div>
</section>

@endsection