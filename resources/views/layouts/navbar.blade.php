<header class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200" x-data="{ mobileMenuOpen: false }">
    <nav class="transition-all duration-300">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center relative" style="height: 40px;">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Arjasa Logo"
                    class="h-20 w-auto drop-shadow-sm hover:scale-105 transition-transform duration-300">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 font-medium uppercase text-sm tracking-wide">
                @php
                    $menus = [
                        ['label' => __('navbar.home'), 'route' => 'home'],
                        ['label' => __('navbar.profile'), 'route' => 'about.index'],
                        [
                            'label' => __('navbar.tourism'),
                            'children' => [
                                ['label' => __('navbar.tourist_destination'), 'route' => 'tourist-destination.index'],
                                ['label' => __('navbar.e_booklet'), 'route' => 'tourist-destination.index'],
                            ],
                        ],
                        ['label' => __('navbar.tour_package'), 'route' => 'tour-package.index'],
                        ['label' => __('navbar.gallery'), 'route' => 'gallery.index'],
                        ['label' => __('navbar.komotra'), 'route' => 'transport.index'],
                        ['label' => __('navbar.cottage'), 'route' => 'cottage.index'],
                        ['label' => __('navbar.contact'), 'route' => 'contact.index'],
                    ];

                @endphp

                @foreach ($menus as $menu)
                    @if (isset($menu['children']))
                        <div x-data="{ open: false }" class="relative group">
                            <button @click="open = !open"
                                class="flex items-center gap-1 text-black hover:text-blue-400 transition focus:outline-none">
                                {{ strtoupper($menu['label']) }}
                                <svg class="w-4 h-4 transform transition" :class="{ 'rotate-180': open }" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                                <div class="py-2">
                                    @foreach ($menu['children'] as $child)
                                        <a href="{{ route($child['route']) }}"
                                            class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-100">
                                            {{ strtoupper($child['label']) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route($menu['route']) }}"
                            class="{{ request()->routeIs($menu['route']) ? 'bg-blue-500 text-white px-3 py-1 rounded-md' : 'text-black hover:text-blue-400 transition' }}">
                            {{ strtoupper($menu['label']) }}
                        </a>
                    @endif
                @endforeach

                <div class="ml-4">
                    <select id="language-selector"
                        class="bg-white px-3 py-1 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        onchange="window.location.href='/lang/' + this.value">
                        <option value="id" {{ session('locale', app()->getLocale()) === 'id' ? 'selected' : '' }}>
                            🇮🇩 Bahasa Indonesia</option>
                        <option value="en" {{ session('locale', app()->getLocale()) === 'en' ? 'selected' : '' }}>
                            🇬🇧 English</option>
                    </select>

                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-blue-600 focus:outline-none">
                    <svg :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }"
                        xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }"
                        xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
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
                    @if (isset($menu['children']))
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex justify-between items-center w-full px-3 py-2 text-left text-black hover:text-blue-400 transition">
                                {{ strtoupper($menu['label']) }}
                                <svg class="w-4 h-4 transform transition" :class="{ 'rotate-180': open }" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition class="pl-4">
                                @foreach ($menu['children'] as $child)
                                    <a href="{{ route($child['route']) }}"
                                        class="block px-3 py-2 text-sm text-gray-800 hover:bg-blue-100">
                                        {{ strtoupper($child['label']) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{ route($menu['route']) }}"
                            class="{{ request()->routeIs($menu['route']) ? 'bg-blue-500 text-white px-3 py-2 rounded-md' : 'text-black hover:text-blue-400 transition' }}">
                            {{ strtoupper($menu['label']) }}
                        </a>
                    @endif
                @endforeach


                <div class="mt-4">
                    <select id="language-selector-mobile"
                        class="w-full bg-white px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                        onchange="window.location.href='/lang/' + this.value">
                        <option value="id" {{ session('locale', app()->getLocale()) === 'id' ? 'selected' : '' }}>
                            🇮🇩 Bahasa Indonesia</option>
                        <option value="en" {{ session('locale', app()->getLocale()) === 'en' ? 'selected' : '' }}>
                            🇬🇧 English</option>
                    </select>
                </div>
            </div>
        </div>
    </nav>
</header>
