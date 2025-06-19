@extends('layouts.appCus')

@section('content')

<section class="relative h-96 overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/25 z-10"></div>
    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80"
        alt="Pemandangan Indah Arjasa"
        class="w-full h-full object-cover transform scale-105 transition-transform duration-500 ease-in-out group-hover:scale-100">
    <div class="relative z-20 h-full flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 font-montserrat tracking-wide drop-shadow-lg" data-aos="fade-up" data-aos-duration="1000">
                Tentang <span class="text-teal-200">Dewi Arjasa</span>
            </h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90 font-lato italic text-white/80" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Menghubungkan Anda dengan keindahan alam dan kekayaan budaya Arjasa sejak 2010.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-screen-xl">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/3 mx-auto max-w-xs md:max-w-sm lg:max-w-md" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Kisah Kami Dewi Arjasa"
                        class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <p class="text-sm font-semibold font-lato tracking-wide">
                            Dewi Arjasa - Jejak Sejarah Sejak 2010
                        </p>
                    </div>
                </div>
            </div>
            <div class="lg:w-2/3" data-aos="fade-left" data-aos-duration="1000">
                <div class="max-w-2xl mx-auto lg:mx-0">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-6 font-playfair text-blue-900">
                        Kisah <span class="text-blue-500 not-italic">Perjalanan</span> Kami
                    </h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed font-lato">
                        Berawal dari kecintaan mendalam terhadap kekayaan budaya dan pesona alam Arjasa, <span class="text-blue-500 font-bold">Dewi Arjasa</span> didirikan pada tahun 2010 dengan misi mulia untuk memperkenalkan keindahan tersembunyi ini kepada dunia. Kami memulai perjalanan ini dengan semangat untuk berbagi keunikan Arjasa.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed font-lato">
                        Dari sebuah tim kecil yang berdedikasi, kami telah tumbuh menjadi penyedia layanan wisata terpercaya, dikenal luas dengan <span class="text-blue-500 font-bold">pendekatan personal</span> dan <span class="text-blue-500 font-bold">pengetahuan mendalam</span> tentang setiap sudut Arjasa. Kami bangga dapat menjadi jembatan antara Anda dan pengalaman tak terlupakan di destinasi ini.
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

@endsection
