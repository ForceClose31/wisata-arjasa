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
        {{-- Tambahkan max-w-screen-xl pada container --}}
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-12 text-center" data-aos="fade-up"> {{-- Tambahkan AOS ke header --}}
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block text-underline-animated-package-tour-heading"> {{-- Tambahkan kelas baru --}}
                    Paket Tour
                    {{-- Garis bawah tetap di sini --}}
                    <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Jelajahi keindahan destinasi kami dengan beragam pilihan paket tour eksklusif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($featuredPackages as $index => $package) {{-- Tambahkan $index untuk AOS delay --}}
                    <div x-data="{
                        activeTab: 'itinerary',
                        contentExpanded: false,
                        pricingExpanded: false
                    }"
                    {{-- Tambahkan data-aos="fade-up" dan data-aos-delay --}}
                    data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}"
                        class="group relative bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            @if (isset($package->images) && count($package->images) > 0)
                                <img src="{{ $package->images[0] }}" alt="{{ $package->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <img src="https://source.unsplash.com/random/600x400?indonesia,tour"
                                    alt="{{ $package->name }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent">
                            </div>
                            <div class="absolute top-4 right-4 flex flex-col space-y-2">
                                <span
                                    class="bg-white/90 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                                    {{ $package->duration }}
                                </span>
                                {{-- Ubah warna badge package type menjadi blue-400 --}}
                                <span
                                    class="bg-blue-400/90 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm backdrop-blur-sm">
                                    {{ $package->packageType->name }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 font-serif">{{ $package->name }}</h3>

                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $package->description }}</p>

                            @if (isset($package->highlights) && count($package->highlights) > 0)
                                <div class="mb-4">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-2 flex items-center">
                                        <i class="fas fa-sparkles text-amber-400 mr-2"></i> Highlights
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach (array_slice($package->highlights, 0, 3) as $highlight)
                                            <span
                                                class="bg-amber-50 text-amber-800 text-xs px-3 py-1 rounded-full border border-amber-100">{{ $highlight }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="mb-6 bg-blue-50/50 p-4 rounded-lg border border-blue-100">
                                <h4 class="font-bold text-gray-800 mb-3 flex items-center">
                                    <i class="fas fa-tag text-blue-500 mr-2"></i> Harga Paket
                                </h4>
                                <div class="space-y-2">
                                    @foreach ($package->pricings->sortBy('price')->take(2) as $pricing)
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-700">
                                                {{ $pricing->group_size }}
                                                @if ($pricing->variant)
                                                    <span class="text-gray-500 text-xs">({{ $pricing->variant }})</span>
                                                @endif
                                            </span>
                                            <span class="font-bold text-blue-600">Rp
                                                {{ number_format($pricing->price, 0, ',', '.') }}</span>
                                        </div>
                                    @endforeach

                                    @if ($package->pricings->count() > 2)
                                        <div class="pt-2">
                                            <button @click="pricingExpanded = !pricingExpanded"
                                                class="text-xs text-blue-500 hover:text-blue-700 flex items-center">
                                                <span
                                                    x-text="pricingExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua harga (' + ({{ $package->pricings->count() }} - 2) + ')'"></span>
                                                <i class="fas"
                                                    :class="pricingExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                    class="ml-1 text-xs"></i>
                                            </button>
                                            <div x-show="pricingExpanded" x-collapse class="space-y-2 mt-2">
                                                @foreach ($package->pricings->sortBy('price')->slice(2) as $pricing)
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-sm text-gray-700">
                                                            {{ $pricing->group_size }}
                                                            @if ($pricing->variant)
                                                                <span
                                                                    class="text-gray-500 text-xs">({{ $pricing->variant }})</span>
                                                            @endif
                                                        </span>
                                                        <span class="font-bold text-blue-600">Rp
                                                            {{ number_format($pricing->price, 0, ',', '.') }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <div class="flex border-b border-gray-200">
                                    <button @click="activeTab = 'itinerary'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'itinerary', 'text-gray-500 hover:text-gray-700': activeTab !== 'itinerary' }"
                                        class="py-2 px-4 font-medium text-sm border-b-2 -mb-px transition duration-150">
                                        Itinerary
                                    </button>
                                    <button @click="activeTab = 'includes'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'includes', 'text-gray-500 hover:text-gray-700': activeTab !== 'includes' }"
                                        class="py-2 px-4 font-medium text-sm border-b-2 -mb-px transition duration-150">
                                        Includes
                                    </button>
                                    <button @click="activeTab = 'excludes'"
                                        :class="{ 'text-blue-600 border-blue-600': activeTab === 'excludes', 'text-gray-500 hover:text-gray-700': activeTab !== 'excludes' }"
                                        class="py-2 px-4 font-medium text-sm border-b-2 -mb-px transition duration-150">
                                        Excludes
                                    </button>
                                </div>

                                <div class="mt-4 relative">
                                    <div x-show="activeTab === 'itinerary'" class="space-y-3">
                                        @if (isset($package->itinerary) && count($package->itinerary) > 0)
                                            <div :class="{ 'max-h-48 overflow-hidden': !contentExpanded }">
                                                @foreach ($package->itinerary as $item)
                                                    <div class="flex items-start pb-2">
                                                        <span
                                                            class="text-blue-500 font-bold mr-2">{{ $loop->index + 1 }}.</span> {{-- Menggunakan $loop->index --}}
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->itinerary) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-sm text-blue-500 hover:text-blue-700 mt-2 flex items-center">
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat itinerary lengkap (' + {{ count($package->itinerary) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500">No itinerary available</p>
                                        @endif
                                    </div>

                                    <div x-show="activeTab === 'includes'" class="space-y-3">
                                        @if (isset($package->includes) && count($package->includes) > 0)
                                            <div :class="{ 'max-h-48 overflow-hidden': !contentExpanded }">
                                                @foreach ($package->includes as $item)
                                                    <div class="flex items-start">
                                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->includes) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-sm text-blue-500 hover:text-blue-700 mt-2 flex items-center">
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua includes (' + {{ count($package->includes) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500">No includes information</p>
                                        @endif
                                    </div>

                                    <div x-show="activeTab === 'excludes'" class="space-y-3">
                                        @if (isset($package->excludes) && count($package->excludes) > 0)
                                            <div :class="{ 'max-h-48 overflow-hidden': !contentExpanded }">
                                                @foreach ($package->excludes as $item)
                                                    <div class="flex items-start">
                                                        <i class="fas fa-times-circle text-red-500 mt-1 mr-2"></i>
                                                        <span class="text-gray-700">{{ $item }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count($package->excludes) > 4)
                                                <button @click="contentExpanded = !contentExpanded"
                                                    class="text-sm text-blue-500 hover:text-blue-700 mt-2 flex items-center">
                                                    <span
                                                        x-text="contentExpanded ? 'Tampilkan lebih sedikit' : 'Lihat semua excludes (' + {{ count($package->excludes) }} + ')'"></span>
                                                    <i class="fas"
                                                        :class="contentExpanded ? 'fa-chevron-up' : 'fa-chevron-down'"
                                                        class="ml-1 text-xs"></i>
                                                </button>
                                            @endif
                                        @else
                                            <p class="text-gray-500">No excludes information</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <a href="{{ route('tour-packages.show', $package->slug) }}"
                                    {{-- Ubah bg-gradient-to-r from-blue-500 to-teal-500 menjadi from-blue-400 to-blue-500 --}}
                                    {{-- Ubah hover:from-blue-600 hover:to-teal-600 menjadi hover:from-blue-500 hover:to-blue-600 --}}
                                    class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                    Detail Paket
                                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10" data-aos="fade-up"> {{-- Ubah col-span-3 menjadi col-span-full untuk responsivitas --}}
                        <div class="bg-white p-8 rounded-xl shadow-md max-w-md mx-auto">
                            <i class="fas fa-compass text-4xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-medium text-gray-700">Belum ada paket tersedia</h3>
                            <p class="text-gray-500 mt-2">Kami sedang mempersiapkan paket wisata terbaik untuk Anda.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-12" data-aos="fade-up"> {{-- Tambahkan AOS ke pagination --}}
                {{ $featuredPackages->links() }}
            </div>
        </div>
    </section>
@endsection