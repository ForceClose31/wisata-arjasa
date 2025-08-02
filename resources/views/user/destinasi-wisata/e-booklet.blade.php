@extends('layouts.appCus')

@section('content')
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-12 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">
                    {{ __('E-Booklet Desa Wisata Adat Arjasa') }}
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    {{ __('Jelajahi booklet digital kami untuk informasi lengkap tentang paket wisata dan budaya') }}
                </p>
            </div>

            <!-- E-Booklet Viewer -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                <div class="flex justify-between items-center bg-gray-100 px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Booklet Wisata Arjasa 2024</h2>
                    <div class="flex items-center space-x-4">
                        <a href="{{ asset('storage/booklets/booklet-arjasa.pdf') }}" download 
                           class="text-gray-600 hover:text-blue-600 transition" title="Download Booklet">
                            <i class="fas fa-download fa-lg"></i> Unduh Booklet
                        </a>
                    </div>
                </div>
                
                <div class="relative h-[70vh] overflow-hidden bg-gray-200">
                    @if(file_exists(public_path('storage/booklets/booklet-arjasa.pdf')))
                        <iframe src="{{ asset('storage/booklets/booklet-arjasa.pdf') }}#toolbar=0&navpanes=0" 
                                class="w-full h-full" frameborder="0"></iframe>
                    @else
                        <div class="h-full flex flex-col items-center justify-center text-center p-8">
                            <i class="fas fa-book-open text-5xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-medium text-gray-700">{{ __('Booklet tidak ditemukan') }}</h3>
                            <p class="text-gray-500 mt-2">
                                {{ __('File booklet belum tersedia. Silahkan hubungi admin.') }}</p>
                            <a href="{{ route('home') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Kembali ke Beranda
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Additional Information -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">{{ __('user.Isi Booklet') }}</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Sejarah Desa Wisata Adat Arjasa') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Peta Sebaran') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Wisata Budaya') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Destinasi Wisata') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Barang yang Dihasilkan') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Paket Wisata') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Penghargaan') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Koleksi Foto') }}</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-blue-100 p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-circle text-blue-500 text-xs"></i>
                            </div>
                            <span class="text-gray-700">{{ __('user.Orang yang Dapat Dihubungi') }}</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">{{ __('user.Panduan') }}</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-amber-100 p-2 rounded-full mr-3 flex-shrink-0">
                                <i class="fas fa-mobile-alt text-amber-500"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Kompatibilitas Perangkat</h4>
                                <p class="text-sm text-gray-600">Booklet dapat dibuka di smartphone, tablet, dan komputer</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-amber-100 p-2 rounded-full mr-3 flex-shrink-0">
                                <i class="fas fa-download text-amber-500"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Unduh untuk Membaca Offline</h4>
                                <p class="text-sm text-gray-600">Klik tombol "Unduh Booklet" untuk menyimpan file PDF</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-amber-100 p-2 rounded-full mr-3 flex-shrink-0">
                                <i class="fas fa-question-circle text-amber-500"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Bantuan</h4>
                                <p class="text-sm text-gray-600">Jika booklet tidak terbuka, pastikan perangkat Anda memiliki aplikasi PDF viewer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    iframe {
        min-height: 70vh;
    }
    .booklet-info li {
        transition: all 0.3s ease;
    }
    .booklet-info li:hover {
        transform: translateX(5px);
    }
</style>
@endpush