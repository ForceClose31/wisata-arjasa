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

@endsection