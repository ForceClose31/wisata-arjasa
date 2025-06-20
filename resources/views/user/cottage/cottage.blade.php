@extends('layouts.appCus')

@section('content')

<section class="relative h-96 overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/25 z-10"></div>
    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80"
             alt="Keindahan Alam Arjasa"
             class="w-full h-full object-cover transform scale-105 transition-transform duration-500 ease-in-out group-hover:scale-100">
    <div class="relative z-20 h-full flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 font-montserrat tracking-tight" data-aos="fade-up" data-aos-duration="1000">Paket <span class="text-teal-200">Cottage</span></h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Kami menyediakan pilihan Cottage dengan fasilitas lengkap.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 max-w-screen-xl">
        {{-- Ini adalah bagian yang direvisi untuk menambahkan rating di samping judul --}}
        <div class="mb-10 flex justify-between items-center" data-aos="fade-up" data-aos-duration="1000">
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-blue-500 mb-2 font-montserrat">Pilihan Cottage</h2>
                <p class="text-lg text-gray-700">Kami menyediakan pilihan Cottage dengan fasilitas lengkap.</p>
            </div>
            {{-- Bagian rating 5/5 --}}
            <div class="flex items-center bg-blue-400 px-4 py-2 rounded-full ">
                <i class="fas fa-star text-yellow-500 mr-2"></i>
                <span class="text-lg font-semibold text-white">Rating 5/5</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10"> {{-- Grid responsif untuk 1, 2, atau 4 kolom --}}

            {{-- Tria Maria Cottages Ngurbloat --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
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
                            <span class="block text-sm font-bold text-blue-500">Rp 500.000<span class="text-base text-gray-600">/Night</span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Noel Cottages Ngurbloat --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
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
                            <span class="block text-sm font-bold text-blue-500">Rp 450.000<span class="text-base text-gray-600">/Night</span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tria Maria Cottages (another one) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
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
                            <span class="block text-sm font-bold text-blue-500">Rp 550.000<span class="text-base text-gray-600">/Night</span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stella Villa Cottages --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
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
                            <span class="block text-sm font-bold text-blue-500">Rp 600.000<span class="text-base text-gray-600">/Night</span></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection