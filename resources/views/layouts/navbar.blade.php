    <!-- Navbar -->
    <header class="sticky top-0 z-50" x-data="{
        scrollPosition: 0,
        updateScroll() {
            this.scrollPosition = window.scrollY;
        }
    }" @scroll.window="updateScroll()">
        <nav class="bg-white shadow-md transition-all duration-300" :class="{'shadow-lg': scrollPosition > 10}">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <a href="/" class="inline-flex items-center transform hover:scale-105 transition-all duration-300">
                    <img src="{{ asset('assets/img/Budanes__1_-removebg-preview.png') }}" class="w-8 h-8 mr-2"> <span class="text-3xl font-extrabold tracking-tighter text-gray-900 font-monserrat">
                        Dewi
                    </span>
                    <span class="text-3xl font-extrabold tracking-tighter bg-budanes text-transparent bg-clip-text font-monserrat">
                        Arjasa
                    </span>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{route('home')}}" class="menu-item font-bold transition duration-200 hover:text-budanes">HOME</a>
                    <a href="{{route('about.index')}}" class="menu-item font-bold transition duration-200 hover:text-budanes">ABOUT US</a>
                    <a href="{{route('tour-package.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">TOUR PACKAGE</a>
                    <a href="{{route('about.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">TRANSPORT</a>
                    <a href="{{route('cottage.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">COTTAGE</a>
                    <a href="{{route('gallery.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">GALLERY</a>
                    <a href="{{route('about.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">ARTICLE</a>
                    <a href="{{route('event-budaya.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">EVENT BUDAYA</a>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
            class="md:hidden bg-white shadow-lg absolute w-full z-50 border-b-4 border-budanes" x-cloak>
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
                <a href="/" class="py-2 font-bold border-b border-gray-100">HOME</a>
                <a href="{{route('about.index')}} class="py-2 font-bold border-b border-gray-100">KONTEN BUDAYA</a>
                <a href="/event" class="py-2 font-bold border-b border-gray-100">EVENT BUDAYA</a>
            </div>
        </div>
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
