@extends('layouts.appCus')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 overflow-hidden bg-gradient-to-br from-teal-600 to-indigo-700">
    <div class="absolute inset-0 bg-black/30 z-10"></div>
    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80"
         alt="About Us"
         class="w-full h-full object-cover">
    <div class="relative z-20 h-full flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 font-montserrat" data-aos="fade-up">Tentang Kami</h1>
            <p class="text-xl md:text-2xl max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Menghubungkan Anda dengan keindahan dan budaya Arjasa sejak 2010
            </p>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2" data-aos="fade-right">
                <div class="relative rounded-xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Our Story"
                         class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <p class="text-sm">Dewa Arjasa - 2010</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2" data-aos="fade-left">
                <div class="max-w-lg">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 font-montserrat">
                        <span class="relative">
                            Kisah Kami
                            <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Berawal dari kecintaan terhadap kekayaan budaya dan alam Arjasa, Dewa Arjasa didirikan pada tahun 2010 dengan misi untuk memperkenalkan keindahan tersembunyi ini kepada dunia.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        Dari tim kecil yang bersemangat, kami telah berkembang menjadi penyedia layanan wisata terpercaya yang dikenal dengan pendekatan personal dan pengetahuan mendalam tentang setiap sudut Arjasa.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-teal-600">12+</div>
                            <div class="text-gray-600">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-indigo-600">5000+</div>
                            <div class="text-gray-600">Wisatawan Puas</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <div class="text-3xl font-bold text-amber-600">50+</div>
                            <div class="text-gray-600">Destinasi Unggulan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    Misi & Nilai Kami
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Fondasi yang membimbing setiap langkah dan keputusan kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-teal-500" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mb-6 text-teal-600 mx-auto">
                    <i class="fas fa-bullseye text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Misi Kami</h3>
                <p class="text-gray-600 text-center">
                    Menyediakan pengalaman wisata yang autentik dan berkesan, sekaligus melestarikan warisan budaya dan alam Arjasa untuk generasi mendatang.
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-indigo-500" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6 text-indigo-600 mx-auto">
                    <i class="fas fa-eye text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Visi Kami</h3>
                <p class="text-gray-600 text-center">
                    Menjadi pintu gerbang utama bagi dunia untuk mengenal Arjasa, sekaligus meningkatkan kesejahteraan masyarakat lokal melalui pariwisata berkelanjutan.
                </p>
            </div>

            <!-- Values -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-t-4 border-amber-500" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 text-amber-600 mx-auto">
                    <i class="fas fa-heart text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-4">Nilai Inti</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
                        <span>Integritas dalam setiap pelayanan</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
                        <span>Penghargaan terhadap budaya lokal</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-amber-500 mt-1 mr-2"></i>
                        <span>Komitmen pada keberlanjutan</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    Tim Kami
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Orang-orang berdedikasi di balik setiap pengalaman tak terlupakan
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Team Member"
                         class="w-full h-full object-cover transition duration-300 hover:scale-105">
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Budi Santoso</h3>
                <p class="text-teal-600 font-medium mb-3">Founder & CEO</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto">
                    Dengan 15 tahun pengalaman di industri pariwisata, Budi memimpin tim dengan visi yang jelas.
                </p>
            </div>

            <!-- Team Member 2 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Team Member"
                         class="w-full h-full object-cover transition duration-300 hover:scale-105">
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Dewi Lestari</h3>
                <p class="text-indigo-600 font-medium mb-3">Head of Operations</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto">
                    Ahli dalam logistik perjalanan yang memastikan setiap detail perjalanan Anda sempurna.
                </p>
            </div>

            <!-- Team Member 3 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Team Member"
                         class="w-full h-full object-cover transition duration-300 hover:scale-105">
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Ahmad Fauzi</h3>
                <p class="text-amber-600 font-medium mb-3">Lead Tour Guide</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto">
                    Pengetahuan mendalam tentang budaya Arjasa membuat tur bersama beliau sangat informatif.
                </p>
            </div>

            <!-- Team Member 4 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="relative mb-6 overflow-hidden rounded-xl aspect-square">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                         alt="Team Member"
                         class="w-full h-full object-cover transition duration-300 hover:scale-105">
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-1">Siti Rahayu</h3>
                <p class="text-emerald-600 font-medium mb-3">Customer Experience</p>
                <p class="text-gray-600 text-sm max-w-xs mx-auto">
                    Selalu siap membantu Anda merencanakan perjalanan impian ke Arjasa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                <span class="relative">
                    Kata Mereka
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-teal-400 opacity-30 -z-1"></span>
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Pengalaman nyata dari para wisatawan kami
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg"
                         alt="Testimonial"
                         class="w-16 h-16 rounded-full mr-4 object-cover">
                    <div>
                        <h4 class="font-bold text-gray-800">Sarah Wijaya</h4>
                        <div class="flex text-amber-400 mt-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic mb-4">
                    "Pengalaman terbaik berwisata ke Arjasa! Tim Dewa Arjasa sangat profesional dan pengetahuan mereka tentang budaya lokal sungguh mengesankan."
                </p>
                <div class="flex items-center text-sm text-gray-500">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>Tour Budaya Arjasa - Juli 2023</span>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg"
                         alt="Testimonial"
                         class="w-16 h-16 rounded-full mr-4 object-cover">
                    <div>
                        <h4 class="font-bold text-gray-800">Michael Chen</h4>
                        <div class="flex text-amber-400 mt-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic mb-4">
                    "Sebagai fotografer, saya sangat menghargai lokasi-lokasi indah yang direkomendasikan tim Dewa Arjasa. Mereka tahu spot-spot tersembunyi yang tidak ada di guidebook manapun!"
                </p>
                <div class="flex items-center text-sm text-gray-500">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>Tur Fotografi - April 2023</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-teal-600 to-indigo-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 font-montserrat" data-aos="fade-up">Siap Berpetualang di Arjasa?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Hubungi kami untuk merencanakan perjalanan tak terlupakan Anda
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}"
                class="px-8 py-3 bg-white text-teal-700 font-bold rounded-lg hover:bg-gray-100 hover:text-teal-800 transition duration-300 shadow-lg">
                Hubungi Kami
            </a>
            <a href="{{ route('paket.index') }}"
                class="px-8 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-teal-700 transition duration-300">
                Lihat Paket Wisata
            </a>
        </div>
    </div>
</section>

@endsection
