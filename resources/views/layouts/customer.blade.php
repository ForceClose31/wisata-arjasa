<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&family=Lily+Script+One&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-delay-100 {
            animation-delay: 0.1s;
        }

        .animate-delay-200 {
            animation-delay: 0.2s;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .category-btn.active {
            background-color: #3B82F6 !important;
            color: #fff !important;
            border-color: #3B82F6 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'budanes': '#A41313',
                        'budanes-dark': '#e4e00c',
                        'budanes-darker': '#c30000',
                        'dark': '#111827',
                        'darker': '#0D1321'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out forwards',
                    }
                }
            }
        }
    </script>

</head>

<body class="font-poppins bg-gray-50" x-data="{
    mobileMenuOpen: false,
    currentSlide: 0,
    slides: [
        {
            title: '{{ __('layouts.Jelajahi Keindahan Desa Wisata Adat Arjasa') }}',
            subtitle: '{{ __('layouts.Dari Suara Lokal ke Kebanggaan Global.') }}',
            image: 'assets/img/gandrung.jpg',
            cta: '{{ __('layouts.Mulai Jelajahi') }}'
        },
        {
            title: '{{ __('layouts.Ikuti Event Budaya Terdekat') }}',
            subtitle: '{{ __('layouts.Bergabunglah dengan komunitas pelestari budaya') }}',
            image: 'assets/img/event.jpg',
            cta: '{{ __('layouts.Lihat Event') }}'
        }
    ],
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    }
}">

    @if (!request()->is('admin/login') && !request()->is('admin/login/*'))
        @include('layouts.navbar')
    @endif

    <main class="min-h-screen">
        @yield('content')
    </main>

    @if (!request()->is('admin/login') && !request()->is('admin/login/*'))
        @include('layouts.footer')
    @endif

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        document.addEventListener('alpine:init', () => {
            if (typeof Alpine.store().nextSlide === 'function') {
                setInterval(() => {
                    Alpine.store().nextSlide();
                }, 5000);
            }
        });
    </script>

    <script>
        function getSlideLink(cta) {
            if (cta === '{{ __('layouts.Mulai Jelajahi') }}') {
                return '{{ url('/about') }}';
            } else if (cta === '{{ __('layouts.Lihat Event') }}') {
                return '{{ url('/event-budaya') }}';
            }
            return '#';
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('sliderController', () => ({
                getSlideLink
            }));
        });
    </script>

    @stack('scripts')
</body>

</html>
