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
                    <a href="{{route('peta-budaya')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">TOUR PACKAGE</a>
                    <a href="{{route('peta-budaya')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">TRANSPORT</a>
                    <a href="{{route('peta-budaya')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">COTTAGE</a>
                    <a href="{{route('peta-budaya')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">GALLERY</a>
                    <a href="{{route('peta-budaya')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">ARTICLE</a>
                    <a href="{{route('konten.index')}}" class="menu-item font-bold transition duration-200 hover:text-budanes">KONTEN BUDAYA</a>
                    <a href="{{route('event.index')}}"  class="menu-item font-bold transition duration-200 hover:text-budanes">EVENT BUDAYA</a>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
            class="md:hidden bg-white shadow-lg absolute w-full z-50 border-b-4 border-budanes" x-cloak>
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
                <a href="/" class="py-2 font-bold border-b border-gray-100">HOME</a>
                <a href="{{route('konten.index')}} class="py-2 font-bold border-b border-gray-100">KONTEN BUDAYA</a>
                <a href="/event" class="py-2 font-bold border-b border-gray-100">EVENT BUDAYA</a>
            </div>
        </div>
    </header>
