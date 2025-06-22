<footer class="bg-blue-400 text-white py-12"> {{-- Custom dark blue background color --}}
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-10"> {{-- Adjusted gap for spacing --}}
        <div class="flex flex-col"> {{-- Removed justify-between here, as copyright is moved --}}
            <div>
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-16 mb-4"> {{-- Changed logo source & size --}}
            </div>
            <p class="text-sm">{{ __('layouts.Budaya adalah warisan yang lebih berharga dari permata.') }}</p> {{-- Original description --}}
        </div>

        <div>
            <h4 class="text-lg font-bold mb-5">{{ __('layouts.Alamat') }}</h4> {{-- Adjusted margin-bottom --}}
            <div class="flex items-start space-x-3 mb-4"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-map-marker-alt mt-1 text-white text-base"></i> {{-- Icon size adjusted --}}
                <p class="text-sm leading-relaxed mt-1">{{ __('layouts.Desa Wisata Adat Arjasa, Jember, Indonesia') }}</p>
            </div>
            <div class="flex space-x-3 mt-6"> {{-- Added margin-top to separate from address text --}}
                <a href="#" class="bg-white text-red-600 rounded-full w-9 h-9 flex items-center justify-center hover:bg-blue-200 transition">
                    <i class="fab fa-instagram text-lg"></i>
                </a>
                <a href="#" class="bg-white text-blue-600  rounded-full w-9 h-9 flex items-center justify-center hover:bg-blue-200 transition">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>
                <a href="#" class="bg-white text-red-600 rounded-full w-9 h-9 flex items-center justify-center hover:bg-blue-200 transition">
                    <i class="fab fa-youtube text-lg"></i>
                </a>
                <a href="#" class="bg-white text-black  rounded-full w-9 h-9 flex items-center justify-center hover:bg-blue-200 transition">
                    <i class="fab fa-tiktok text-lg"></i>
                </a>
            </div>
        </div>

        <div>
            <h4 class="text-lg font-bold mb-5">{{ __('layouts.Kontak') }}</h4> {{-- Adjusted margin-bottom --}}
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-phone-alt text-base"></i>
                <span>Telephone: 082323577199</span>
            </div>
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fab fa-whatsapp text-base"></i>
                <span>Whatsapp: 082323577199</span>
            </div>
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-envelope text-base"></i>
                <span>desaadatarjasa@gmail.com</span>
            </div>
        </div>
    </div>

    <div class="mt-12 pt-6 border-t border-white-400 text-center text-sm text-white"> {{-- Increased mt- --}}
        <p>&copy; {{ __('layouts.2025 Desa Wisata Adat Arjasa. Hak Cipta Dilindungi Undang-Undang.') }}</p>
    </div>
</footer>
