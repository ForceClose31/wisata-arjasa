<footer class="bg-blue-400 text-white py-12"> {{-- Custom dark blue background color --}}
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-x-12 gap-y-10"> {{-- Adjusted gap for spacing --}}
        <div class="flex flex-col"> {{-- Removed justify-between here, as copyright is moved --}}
            <div>
                <img src="{{ asset('assets/img/Budanes__1_-removebg-preview.png') }}" alt="Logo" class="h-16 mb-4"> {{-- Changed logo source & size --}}
            </div>
            <p class="text-sm">Budaya adalah warisan yang lebih berharga dari permata.</p> {{-- Original description --}}
        </div>

        <div>
            <h4 class="text-lg font-bold mb-5">Address</h4> {{-- Adjusted margin-bottom --}}
            <div class="flex items-start space-x-3 mb-4"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-map-marker-alt mt-1 text-white text-base"></i> {{-- Icon size adjusted --}}
                <p class="text-sm leading-relaxed">Pantai Ngurbloat Desa Wisata Ngilngof, Maluku Tenggara Kepulauan Kei</p>
            </div>
            {{-- Social Media Icons --}}
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
            <h4 class="text-lg font-bold mb-5">Kontak</h4> {{-- Adjusted margin-bottom --}}
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-phone-alt text-base"></i>
                <span>Telephone: 0811477719</span>
            </div>
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fab fa-whatsapp text-base"></i>
                <span>Whatsapp: 0811477719</span>
            </div>
            <div class="flex items-center text-sm mb-3 space-x-3"> {{-- Adjusted space-x and mb --}}
                <i class="fas fa-envelope text-base"></i>
                <span>wisataarjasa@gmail.com</span>
            </div>
        </div>

        <div>
            <h4 class="text-lg font-bold mb-5">Recent Posts</h4> {{-- Adjusted margin-bottom --}}
            <div class="flex items-start mb-4 space-x-3">
                <img src="https://images.unsplash.com/photo-1517457210948-709559816007?ixlib=rb-1.2.1&auto=format&fit=crop&w=60&h=60&q=80" class="w-16 h-16 object-cover" alt="Post thumbnail"> {{-- Adjusted image size and removed rounded corners --}}
                <p class="text-sm">Toko Ole-ole - Souvenir di Kepulauan Kei</p>
            </div>
            <div class="flex items-start space-x-3">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ba6f60060?ixlib=rb-1.2.1&auto=format&fit=crop&w=60&h=60&q=80" class="w-16 h-16 object-cover" alt="Post thumbnail"> {{-- Adjusted image size and removed rounded corners --}}
                <p class="text-sm">Paket Wisata Kepulauan Kei</p>
            </div>
        </div>
    </div>

    <div class="mt-12 pt-6 border-t border-white-400 text-center text-sm text-white"> {{-- Increased mt- --}}
        <p>&copy; 2025 DewaArjasa. All Rights Reserved.</p>
    </div>
</footer>