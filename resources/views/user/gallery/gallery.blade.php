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

<section class="py-20 bg-white"> {{-- Menggunakan latar belakang putih seperti yang terlihat di gambar gallery --}}
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="mb-10" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-extrabold text-blue-500 mb-2 font-montserrat">Gallery</h2>
            <p class="text-lg text-gray-700">Butuh bantuan? Hubungi kami!</p>
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