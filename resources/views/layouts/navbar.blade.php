<header class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200"
    x-data="{ mobileMenuOpen: false }">
    <nav class="transition-all duration-300">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('assets/img/Budanes__1_-removebg-preview.png') }}" class="w-8 h-8 mr-2">
                <span class="text-2xl font-bold text-blue-600 font-montserrat">Dewi</span>
                <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 text-transparent bg-clip-text font-montserrat">Arjasa</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 font-medium uppercase text-sm tracking-wide">
                @php
                    $menus = [
                        ['label' => 'Home', 'route' => 'home'],
                        ['label' => 'About Us', 'route' => 'about.index'],
                        ['label' => 'Tour Package', 'route' => 'tour-package.index'],
                        ['label' => 'Transportation', 'route' => 'transport.index'],
                        ['label' => 'Cottage', 'route' => 'cottage.index'],
                        ['label' => 'Gallery', 'route' => 'gallery.index'],
                        ['label' => 'Blog', 'route' => 'article.index'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}"
                        class="{{ request()->routeIs($menu['route']) 
                            ? 'bg-blue-500 text-white px-3 py-1 rounded-md' 
                            : 'text-black hover:text-blue-400 transition' }}">
                        {{ strtoupper($menu['label']) }}
                    </a>
                @endforeach
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-blue-600 focus:outline-none">
                    <svg :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-t border-gray-100">
            <div class="px-4 py-4 flex flex-col space-y-3 uppercase text-sm tracking-wide">
                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}"
                        class="{{ request()->routeIs($menu['route']) 
                            ? 'bg-blue-500 text-white px-3 py-2 rounded-md' 
                            : 'text-black hover:text-blue-400 transition' }}">
                        {{ strtoupper($menu['label']) }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
</header>



        {{-- Popular Content Section --}}
    {{-- <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">Featured <span
                        class="relative">
                        Cultural Highlights
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-indigo-400 opacity-30 -z-1"></span>
                    </span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover the most engaging cultural content from our
                    community</p>
            </div>

            @if ($popularContents->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($popularContents as $content)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                            @if ($content->thumbnail)
                                <img src="{{ asset('storage/' . $content->thumbnail) }}" alt="{{ $content->judul }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Thumbnail" alt="No Thumbnail"
                                    class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span
                                        class="px-3 py-1 bg-teal-100 text-teal-800 text-xs font-semibold rounded-full">{{ $content->kategori }}</span>
                                    <span class="ml-2 text-xs text-gray-500">{{ $content->views_count }} views</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $content->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($content->isi, 100) }}</p>
                                <a href="{{ route('kontenbudaya.show', $content->id) }}"
                                    class="text-teal-600 font-semibold hover:text-teal-800 transition duration-300 flex items-center">
                                    Read More <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No content available at the moment</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('about.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-300">
                    Explore All Content <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section> --}}

    {{-- Upcoming Events Section --}}
    {{-- <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 font-montserrat">Upcoming <span
                        class="relative">
                        Cultural Events
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-amber-400 opacity-30 -z-1"></span>
                    </span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Mark your calendar for these exciting cultural events in
                    Arjasa</p>
            </div>

            @if ($upcomingEvents->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach ($upcomingEvents as $event)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 flex flex-col md:flex-row">
                            <div class="md:w-1/3 relative">
                                @if ($event->thumbnail)
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->judul }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Thumbnail" alt="No Thumbnail"
                                        class="w-full h-full object-cover">
                                @endif
                                <div class="absolute top-4 left-4 bg-white/90 px-3 py-1 rounded-lg shadow-sm">
                                    <div class="text-sm font-bold text-gray-800">{{ $event->jadwal->format('d') }}</div>
                                    <div class="text-xs text-gray-600">{{ $event->jadwal->format('M') }}</div>
                                </div>
                            </div>
                            <div class="p-6 md:w-2/3">
                                <div class="flex items-center mb-2">
                                    <span
                                        class="px-2 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded">{{ $event->tempat }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($event->isi, 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-gray-700">
                                        @if ($event->harga > 0)
                                            Rp {{ number_format($event->harga, 0, ',', '.') }}
                                        @else
                                            Free Admission
                                        @endif
                                    </span>
                                    <a href="{{ route('event.show', $event->id) }}"
                                        class="text-sm font-semibold text-teal-600 hover:text-teal-800 transition duration-300 flex items-center">
                                        Details <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No upcoming events scheduled</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('event.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition duration-300">
                    View All Events <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section> --}}
