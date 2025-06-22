<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    {{-- Anda memiliki dua link Font Awesome, saya sarankan gunakan yang terbaru saja (6.x.x) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    {{-- Duplikasi Montserrat, saya biarkan yang lebih spesifik --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&family=Lily+Script+One&display=swap" rel="stylesheet">

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Alpine.js --}}
    {{-- Anda memiliki dua link Alpine.js, pilih salah satu yang paling baru --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Leaflet CSS (jika digunakan untuk peta) --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        /* Global Animations & Utilities */
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

        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }

        /* Form Styles (dari kode asli Anda) */
        .register-bg {
            background-image: url('https://bandungbergerak.id/cdn/2/0/3/1/2031.JPG');
            background-size: cover;
            background-position: center;
        }
        .form-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s ease;
        }
        .confirm {
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
            padding-left: 0.8rem;
            padding-right: 0.8rem;
            background: rgb(53, 206, 15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgb(0, 0, 0);
            transition: all 0.3s ease;
        }
        .form-input:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #FBC02D;
            box-shadow: 0 0 0 2px rgba(251, 192, 45, 0.3);
        }
        .form-select {
            background: rgba(255, 255, 255, 0.05) url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23FFEB3B' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e") right 0.75rem center/1.5em 1.5em no-repeat;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .form-select:focus {
            border-color: #FBC02D;
            box-shadow: 0 0 0 2px rgba(251, 192, 45, 0.3);
        }
        .login-bg {
            background-image: url('assets/img/kecak.jpg');
            background-size: cover;
            background-position: center;
        }

        /* AOS hidden state for elements that will be animated */
        [x-cloak] {
            display: none !important;
        }

        /* Custom pagination styling (dari kode asli Anda) */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 2rem;
        }
        .pagination li {
            margin: 0 0.25rem;
        }
        .pagination li a,
        .pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-weight: 600;
            color: #4b5563;
            background-color: #f3f4f6;
            transition: all 0.3s ease;
        }
        .pagination li.active a {
            background-color: #20f2f6; /* Ini warna yang ada di pagination Anda, bukan blue-500 */
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .pagination li a:hover {
            background-color: #e5e7eb;
            color: #1f2937;
        }
        .pagination li:first-child a,
        .pagination li:last-child a {
            width: auto;
            padding: 0 1rem;
            border-radius: 9999px;
        }

        /* Line Clamp Utilities (dari kode asli Anda) */
        .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

        /* --- PENTING: Gaya untuk Tombol Filter Kategori --- */
        .category-btn.active {
            background-color: #3B82F6 !important; /* blue-500, pakai !important untuk prioritas */
            color: #fff !important;
            border-color: #3B82F6 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* Opsional: tambah shadow */
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
                        'montserrat': ['Montserrat', 'sans-serif'],
                        'poppins': ['Poppins', 'sans-serif'],
                        'lily': ['"Lily Script One"', 'cursive'],
                        'lato': ['Lato', 'sans-serif'],
                        'playfair': ['"Playfair Display"', 'serif']
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
    mobileSubMenuOpen: false,
    mobileAccountMenuOpen: false,
    currentSlide: 0,
    slides: [{
            title: '{{ __('layouts.Jelajahi Keindahan Desa Wisata Adat Arjasa') }}',
            subtitle: '{{ __('layouts.Temukan kekayaan warisan budaya Indonesia') }}',
            image: 'assets/img/gandrung.jpg',
            cta: 'Mulai Jelajahi'
        },
        {
            title: '{{ __('layouts.Ikuti Event Budaya Terdekat') }}',
            subtitle: '{{ __('layouts.Bergabunglah dengan komunitas pelestari budaya') }}',
            image: 'assets/img/event.jpg',
            cta: 'Lihat Event'
        }
    ],
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    }
}">

    @include('layouts.navbar')


    <div class="min-h-screen">
        @yield('content')
    </div>

    @include('layouts.footer')

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS global
        AOS.init({
            duration: 800, // Durasi default untuk semua animasi AOS
            easing: 'ease-in-out',
            once: true,    // Animasi hanya terjadi sekali saat elemen masuk viewport
            mirror: false  // Jangan mengulang animasi saat scroll ke atas
        });

        // Contoh Auto slide change (jika ini memang untuk bagian lain di halaman Anda)
        // Jika ini untuk Alpine.js slides di X-data, ini harus ada di luar DOMContentLoaded
        // dan diakses via Alpine.store
        document.addEventListener('alpine:init', () => {
            // Check if Alpine.store has 'nextSlide' method before trying to call it
            if (typeof Alpine.store().nextSlide === 'function') {
                setInterval(() => {
                    Alpine.store().nextSlide();
                }, 5000);
            }
        });
    </script>

    @stack('scripts') {{-- Ini adalah tempat script spesifik halaman akan di-render --}}

</body>

</html>
