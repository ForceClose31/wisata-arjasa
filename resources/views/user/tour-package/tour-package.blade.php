@extends('layouts.appCus')

@section('content')
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
                    Paket Tour
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                </h2>
                <p class="text-lg text-gray-700">Jelajahi keindahan destinasi kami dengan beragam pilihan paket tour.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse ($featuredPackages as $package)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden group transform transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative">
                            @if (isset($package->images) && count($package->images) > 0)
                                <img src="{{ $package->images[0] }}" alt="{{ $package->name }}"
                                    class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                    alt="{{ $package->name }}"
                                    class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                            @endif

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent flex flex-col justify-between p-4 text-white">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="font-bold text-lg">{{ $package->packageType->name }}</span>
                                    </div>
                                    <span class="text-sm opacity-90">{{ $package->duration }}</span>
                                </div>
                                <div class="text-right text-sm opacity-90">
                                    @if (isset($package->highlights) && count($package->highlights) > 0)
                                        {{ $package->highlights[0] }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4 text-sm mb-3">
                                <div>
                                    <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">DESTINASI</p>
                                    <ul class="space-y-1 text-gray-600">
                                        @if (isset($package->itinerary) && count($package->itinerary) > 0)
                                            @foreach (array_slice($package->itinerary, 0, 4) as $item)
                                                <li class="flex items-center"><i
                                                        class="fas fa-map-marker-alt text-blue-400 mr-2"></i>{{ $item }}
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="flex items-center"><i
                                                    class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Destinasi Wisata
                                            </li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Lokasi Menarik</li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Tempat Bersejarah
                                            </li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-map-marker-alt text-blue-400 mr-2"></i>Spot Foto</li>
                                        @endif
                                    </ul>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-700 mb-2 border-b border-gray-200 pb-1">INCLUDE</p>
                                    <ul class="space-y-1 text-gray-600">
                                        @if (isset($package->includes) && count($package->includes) > 0)
                                            @foreach (array_slice($package->includes, 0, 4) as $item)
                                                <li class="flex items-center"><i
                                                        class="fas fa-check-circle text-blue-800 mr-2"></i>{{ $item }}
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="flex items-center"><i
                                                    class="fas fa-check-circle text-blue-800 mr-2"></i>Transportasi</li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-check-circle text-blue-800 mr-2"></i>Makanan</li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-check-circle text-blue-800 mr-2"></i>Pemandu Wisata</li>
                                            <li class="flex items-center"><i
                                                    class="fas fa-check-circle text-blue-800 mr-2"></i>Dokumentasi</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-white border-t border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $package->name }}</h3>
                            <p class="text-gray-600 text-sm mb-3"><i
                                    class="fas fa-map-marker-alt text-gray-400 mr-1"></i>Desa Arjasa, Jember</p>
                            <div class="flex items-center mb-4">
                                <div class="flex text-amber-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-gray-500 text-xs ml-2">(4.5/5)</span>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('tour-packages.show', $package->slug) }}"
                                    class="bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow-md transform hover:-translate-y-1">
                                    DETAIL PAKET
                                </a>
                                <div class="text-right">
                                    <span class="text-gray-500 text-sm">Mulai dari</span>
                                    <span class="block text-xl font-bold text-gray-800">
                                        Rp
                                        {{ number_format($package->pricings->sortBy('price')->first()->price, 0, ',', '.') }}
                                        <span class="text-base text-gray-600">/Pax</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10">
                        <p class="text-gray-500">Tidak ada paket tour yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $featuredPackages->links() }}
            </div>
        </div>
    </section>
@endsection
