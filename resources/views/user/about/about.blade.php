@extends('layouts.appCus')

@section('content')

<section class="relative h-96 overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/25 z-10"></div> {{-- Mengurangi opasitas overlay --}}
    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80"
         alt="Keindahan Alam Arjasa" {{-- Ganti alt text lebih deskriptif --}}
         class="w-full h-full object-cover transform scale-105 transition-transform duration-500 ease-in-out group-hover:scale-100"> {{-- Efek zoom in pada gambar --}}
    <div class="relative z-20 h-full flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 font-montserrat tracking-tight" data-aos="fade-up" data-aos-duration="1000">Tentang <span class="text-teal-200">Dewi Arjasa</span></h1> {{-- Penekanan pada nama Dewi Arjasa --}}
            <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                Menghubungkan Anda dengan keindahan alam dan kekayaan budaya Arjasa sejak 2010.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    {{-- Mengubah container menjadi max-w-screen-xl atau max-w-screen-2xl --}}
    {{-- atau menghilangkan `container` dan langsung menggunakan `max-w-screen-xl mx-auto px-4` --}}
    <div class="container mx-auto px-4 max-w-screen-xl"> {{-- ATAU max-w-screen-2xl --}}
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/3 mx-auto max-w-xs md:max-w-sm lg:max-w-md" data-aos="fade-right" data-aos-duration="1000"> {{-- Menambahkan breakpoint max-w untuk responsivitas gambar --}}
                <div class="relative rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Kisah Kami Dewi Arjasa"
                         class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <p class="text-sm font-semibold">Dewi Arjasa - Jejak Sejarah Sejak 2010</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-2/3" data-aos="fade-left" data-aos-duration="1000">
                <div class="max-w-2xl mx-auto lg:mx-0"> {{-- Menggunakan max-w-2xl agar teks lebih panjang --}}
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-6 font-montserrat">
                        <span class="relative text-blue-500">
                            Kisah <span class="text-blue-500">Perjalanan</span> Kami
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Berawal dari kecintaan mendalam terhadap kekayaan budaya dan pesona alam Arjasa, <span class="text-blue-500">Dewi Arjasa</span> didirikan pada tahun 2010 dengan misi mulia untuk memperkenalkan keindahan tersembunyi ini kepada dunia. Kami memulai perjalanan ini dengan semangat untuk berbagi keunikan Arjasa.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Dari sebuah tim kecil yang berdedikasi, kami telah tumbuh menjadi penyedia layanan wisata terpercaya, dikenal luas dengan <span class="text-blue-500">pendekatan personal</span> dan <span class="text-blue-500">pengetahuan mendalam</span> tentang setiap sudut Arjasa. Kami bangga dapat menjadi jembatan antara Anda dan pengalaman tak terlupakan di destinasi ini.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                        <div class="text-center p-4 bg-teal-50 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-teal-700">14+</div>
                            <div class="text-gray-700 text-sm">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center p-4 bg-indigo-50 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-indigo-700">5000+</div>
                            <div class="text-gray-700 text-sm">Wisatawan Puas</div>
                        </div>
                        <div class="text-center p-4 bg-amber-50 rounded-lg shadow-sm">
                            <div class="text-3xl font-bold text-amber-700">50+</div>
                            <div class="text-gray-700 text-sm">Destinasi Unggulan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-100"> {{-- Warna latar belakang lebih terang --}}
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    Misi & <span class="text-teal-600">Nilai Inti</span> Kami
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-40 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Fondasi yang membimbing setiap langkah dan keputusan kami dalam menyajikan pengalaman wisata terbaik di Arjasa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10"> {{-- Jarak antar kolom lebih besar --}}
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-b-4 border-teal-500" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"> {{-- Efek translate Y pada hover --}}
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mb-6 text-teal-600 mx-auto text-3xl">
                    <i class="fas fa-bullseye"></i> {{-- Ukuran ikon lebih besar --}}
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Misi Kami</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Menyediakan pengalaman wisata yang **autentik dan berkesan** di Arjasa, sekaligus secara aktif berkontribusi dalam **melestarikan warisan budaya** dan keindahan alamnya untuk generasi mendatang.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-b-4 border-indigo-500" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6 text-indigo-600 mx-auto text-3xl">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Visi Kami</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Menjadi **pintu gerbang utama** bagi dunia untuk mengenal Arjasa, sekaligus menjadi motor penggerak **peningkatan kesejahteraan masyarakat lokal** melalui pariwisata berkelanjutan.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 border-b-4 border-amber-500" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 text-amber-600 mx-auto text-3xl">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Nilai Inti</h3>
                <ul class="space-y-3 text-gray-600 text-left"> {{-- Teks daftar rata kiri --}}
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-amber-500 mt-1 mr-2 flex-shrink-0"></i> {{-- Icon lebih jelas --}}
                        <span>**Integritas** dalam setiap pelayanan dan janji kami.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-amber-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>**Penghargaan mendalam** terhadap budaya dan adat istiadat lokal.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-amber-500 mt-1 mr-2 flex-shrink-0"></i>
                        <span>**Komitmen kuat** pada keberlanjutan lingkungan dan pemberdayaan masyarakat.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    <span class="text-indigo-600">Tim</span> Hebat Kami
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-indigo-400 opacity-40 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Orang-orang berdedikasi di balik setiap pengalaman tak terlupakan dan senyum wisatawan.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10"> {{-- Jarak antar kolom lebih besar --}}
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square shadow-lg transform group-hover:scale-105 transition duration-500 ease-in-out"> {{-- Efek hover pada gambar --}}
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Budi Santoso, Founder & CEO"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 ease-in-out"> {{-- Efek grayscale pada hover --}}
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="#" class="text-white hover:text-teal-300 mx-2 text-xl"><i class="fab fa-linkedin"></i></a> {{-- Contoh link sosial media --}}
                        <a href="#" class="text-white hover:text-teal-300 mx-2 text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Budi Santoso</h3>
                <p class="text-teal-600 font-semibold mb-3">Founder & CEO</p> {{-- Font lebih tebal --}}
                <p class="text-gray-600 text-sm max-w-xs mx-auto leading-relaxed">
                    Dengan pengalaman lebih dari 15 tahun di industri pariwisata, Budi memimpin tim dengan visi yang kuat untuk masa depan Arjasa.
                </p>
            </div>

            <div class="text-center group" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square shadow-lg transform group-hover:scale-105 transition duration-500 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Dewi Lestari, Head of Operations"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="#" class="text-white hover:text-indigo-300 mx-2 text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white hover:text-indigo-300 mx-2 text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Dewi Lestari</h3>
                <p class="text-indigo-600 font-semibold mb-3">Head of Operations</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto leading-relaxed">
                    Ahli dalam logistik perjalanan, Dewi memastikan setiap detail rencana perjalanan Anda berjalan dengan sempurna dan tanpa kendala.
                </p>
            </div>

            <div class="text-center group" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square shadow-lg transform group-hover:scale-105 transition duration-500 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Ahmad Fauzi, Lead Tour Guide"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="#" class="text-white hover:text-amber-300 mx-2 text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white hover:text-amber-300 mx-2 text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Ahmad Fauzi</h3>
                <p class="text-amber-600 font-semibold mb-3">Lead Tour Guide</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto leading-relaxed">
                    Dengan pengetahuan mendalam tentang sejarah dan budaya Arjasa, tur bersama Ahmad akan sangat informatif dan menyenangkan.
                </p>
            </div>

            <div class="text-center group" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square shadow-lg transform group-hover:scale-105 transition duration-500 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Siti Rahayu, Customer Experience"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 ease-in-out">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="#" class="text-white hover:text-emerald-300 mx-2 text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white hover:text-emerald-300 mx-2 text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Siti Rahayu</h3>
                <p class="text-emerald-600 font-semibold mb-3">Customer Experience Specialist</p> {{-- Nama posisi lebih lengkap --}}
                <p class="text-gray-600 text-sm max-w-xs mx-auto leading-relaxed">
                    Siti selalu siap membantu Anda merencanakan dan menyesuaikan setiap detail perjalanan impian Anda ke Arjasa.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-100"> {{-- Warna latar belakang lebih terang --}}
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    Apa Kata <span class="text-teal-600">Mereka?</span>
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-40 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Dengarkan langsung pengalaman nyata dari para wisatawan kami yang puas.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10"> {{-- Jarak antar kolom lebih besar --}}
            <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-teal-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"> {{-- Tambah border kiri & flexbox --}}
                <div>
                    <div class="flex items-center mb-6">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg"
                             alt="Sarah Wijaya Testimonial"
                             class="w-16 h-16 rounded-full mr-4 object-cover ring-2 ring-teal-300"> {{-- Tambah ring pada foto --}}
                        <div>
                            <h4 class="font-bold text-gray-800 text-lg">Sarah Wijaya</h4>
                            <div class="flex text-amber-400 mt-1">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4 text-lg leading-relaxed">
                        "Pengalaman terbaik berwisata ke Arjasa! Tim Dewi Arjasa sangat profesional, ramah, dan pengetahuan mereka tentang budaya lokal sungguh mengesankan. Saya merasa seperti berpetualang dengan teman, bukan hanya turis."
                    </p>
                </div>
                <div class="flex items-center text-sm text-gray-500 pt-4 border-t border-gray-100"> {{-- Tambah border atas --}}
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>Tour Budaya Arjasa - Juli 2023</span>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-indigo-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg"
                             alt="Michael Chen Testimonial"
                             class="w-16 h-16 rounded-full mr-4 object-cover ring-2 ring-indigo-300">
                        <div>
                            <h4 class="font-bold text-gray-800 text-lg">Michael Chen</h4>
                            <div class="flex text-amber-400 mt-1">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star-half-alt text-sm"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4 text-lg leading-relaxed">
                        "Sebagai fotografer, saya sangat menghargai lokasi-lokasi indah yang direkomendasikan tim Dewi Arjasa. Mereka tahu spot-spot tersembunyi yang tidak ada di guidebook manapun! Hasil foto saya luar biasa berkat panduan mereka."
                    </p>
                </div>
                <div class="flex items-center text-sm text-gray-500 pt-4 border-t border-gray-100">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>Tur Fotografi Eksplorasi - April 2023</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-r from-teal-600 to-indigo-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-5xl font-extrabold mb-6 font-montserrat tracking-tight" data-aos="fade-up" data-aos-duration="1000">Siap Berpetualang di <span class="text-amber-300">Arjasa</span>?</h2> {{-- Ukuran lebih besar, highlight kata Arjasa --}}
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            Hubungi kami hari ini untuk merencanakan perjalanan tak terlupakan Anda, atau jelajahi beragam paket wisata kami!
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6 mt-10" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"> {{-- Jarak antar tombol lebih besar --}}
            <a href="{{ route('contact') }}"
               class="px-10 py-4 bg-white text-teal-700 font-bold rounded-full hover:bg-gray-100 hover:text-teal-800 transition duration-300 shadow-xl transform hover:-translate-y-1"> {{-- Tombol lebih besar, rounded, shadow, dan efek translate --}}
                <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
            </a>
            <a href="{{ route('paket.index') }}"
               class="px-10 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-indigo-700 transition duration-300 shadow-xl transform hover:-translate-y-1"> {{-- Tombol lebih besar, rounded, shadow, dan efek translate --}}
                <i class="fas fa-paper-plane mr-2"></i> Lihat Paket Wisata
            </a>
        </div>
    </div>
</section>

@endsection