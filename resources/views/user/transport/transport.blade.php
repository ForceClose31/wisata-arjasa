@extends('layouts.appCus') {{-- Asumsi ini adalah layout utama Anda --}}

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

{{-- Bagian Daftar Mobil Rental --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 max-w-screen-xl">
        {{-- Judul dan Sub-judul --}}
        <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-extrabold text-blue-500 mb-2 font-montserrat"><span class="text-blue-900">Komoda</span> Transportasi</h2>
            <p class="text-lg text-gray-700">Price List Sewa Mobil Kepulauan Kei.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10"> {{-- Grid responsif untuk 1, 2, atau 3 kolom --}}

            {{-- Card untuk Toyota Avanza --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1617469767053-d3b523a0b982?q=80&w=1231&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=600&q=80"
                         alt="Toyota Avanza"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold py-2 px-4 rounded-bl-lg">
                        RENT CAR
                    </div>
                    <div class="absolute top-4 left-4 text-white text-lg font-semibold">Sewa Mobil <br>Maluku</div>
                </div>
                <div class="p-6 text-center">
                    {{-- Info Kontak (Telepon & Website) dipindahkan ke atas nama mobil --}}
                    <div class="flex justify-between items-center text-xs text-gray-600 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                            <span>0811477719</span>
                        </div>
                        <div class="flex items-center">
                            <span>mtckeitourandtravel.com</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-800 mb-4">Toyota Avanza</h3>
                    <div class="flex justify-around items-center text-gray-700 text-sm mb-6">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-user-friends text-blue-500 text-lg mb-1"></i>
                            <span>Supir</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-gas-pump text-blue-500 text-lg mb-1"></i>
                            <span>BBM</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-car text-blue-500 text-lg mb-1"></i>
                            <span>Car</span>
                        </div>
                    </div>
                    {{-- Button dan Harga digabungkan dalam satu flex container --}}
                    <div class="flex justify-between items-center mt-6"> {{-- mt-6 untuk jarak dari fasilitas --}}
                        <button class="bg-blue-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            Book Now
                        </button>
                        <div class="text-xl font-bold text-gray-800">
                            Rp 750.000 <span class="text-lg text-gray-600">/ 12 Jam</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card untuk Mobilio --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1617469767053-d3b523a0b982?q=80&w=1231&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=600&q=80"
                         alt="Mobilio"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold py-2 px-4 rounded-bl-lg">
                        RENT CAR
                    </div>
                    <div class="absolute top-4 left-4 text-white text-lg font-semibold">Sewa Mobil <br>Maluku</div>
                </div>
                <div class="p-6 text-center">
                    {{-- Info Kontak (Telepon & Website) --}}
                    <div class="flex justify-between items-center text-xs text-gray-600 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                            <span>0811477719</span>
                        </div>
                        <div class="flex items-center">
                            <span>mtckeitourandtravel.com</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-800 mb-4">Mobilio</h3>
                    <div class="flex justify-around items-center text-gray-700 text-sm mb-6">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-user-friends text-blue-500 text-lg mb-1"></i>
                            <span>Supir</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-gas-pump text-blue-500 text-lg mb-1"></i>
                            <span>BBM</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-car text-blue-500 text-lg mb-1"></i>
                            <span>Car</span>
                        </div>
                    </div>
                    {{-- Button dan Harga digabungkan dalam satu flex container --}}
                    <div class="flex justify-between items-center mt-6">
                        <button class="bg-blue-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            Book Now
                        </button>
                        <div class="text-xl font-bold text-gray-800">
                            Rp 750.000 <span class="text-lg text-gray-600">/ 12 Jam</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card untuk Toyota Xpander --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1617469767053-d3b523a0b982?q=80&w=1231&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&w=600&q=80"
                         alt="Toyota Xpander"
                         class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold py-2 px-4 rounded-bl-lg">
                        RENT CAR
                    </div>
                    <div class="absolute top-4 left-4 text-white text-lg font-semibold">Sewa Mobil <br>Maluku</div>
                </div>
                <div class="p-6 text-center">
                    {{-- Info Kontak (Telepon & Website) --}}
                    <div class="flex justify-between items-center text-xs text-gray-600 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                            <span>0811477719</span>
                        </div>
                        <div class="flex items-center">
                            <span>mtckeitourandtravel.com</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-800 mb-4">Toyota Xpander</h3>
                    <div class="flex justify-around items-center text-gray-700 text-sm mb-6">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-user-friends text-blue-500 text-lg mb-1"></i>
                            <span>Supir</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-gas-pump text-blue-500 text-lg mb-1"></i>
                            <span>BBM</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-car text-blue-500 text-lg mb-1"></i>
                            <span>Car</span>
                        </div>
                    </div>
                    {{-- Button dan Harga digabungkan dalam satu flex container --}}
                    <div class="flex justify-between items-center mt-6">
                        <button class="bg-blue-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                            Book Now
                        </button>
                        <div class="text-xl font-bold text-gray-800">
                            Rp 750.000 <span class="text-lg text-gray-600">/ 12 Jam</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection