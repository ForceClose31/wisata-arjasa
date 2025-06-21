@extends('layouts.appCus')

@section('content')
    <!-- AlpineJS Component untuk Gallery -->
    <div x-data="galleryApp()" @keydown.escape="closeModal">
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

        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 max-w-screen-xl">
                <div class="mb-10 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2 font-montserrat relative inline-block">
                        Gallery
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-400 opacity-70 -z-1"></span>
                    </h2>
                    <p class="text-lg text-gray-700">Temukan keindahan setiap sudut Arjasa dalam galeri foto kami.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                    @foreach ($galleries as $gallery)
                        <div class="relative w-full pb-[100%] rounded-lg overflow-hidden shadow-lg group transform transition-transform duration-300 hover:scale-105 cursor-pointer"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                            @click="openModal('{{ $gallery->title }}', 'storage/{{ $gallery->image_path }}', '{{ $gallery->description }}', '{{ $gallery->location }}')">
                            <img src="storage/{{ $gallery->image_path }}" alt="{{ $gallery->title }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <h3 class="font-bold text-sm">{{ $gallery->title }}</h3>
                                <p class="text-xs opacity-80">{{ $gallery->description }}</p>
                                @if ($gallery->location)
                                    <div class="absolute bottom-3 right-3 text-white">
                                        <i class="fas fa-map-marker-alt text-lg"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Modal Popup -->
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75" @click.self="closeModal">
            <div class="relative bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-auto">
                <!-- Close Button -->
                <button @click="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Modal Content -->
                <div class="p-6">
                    <div class="mb-4">
                        <img x-bind:src="currentImage" x-bind:alt="currentTitle"
                            class="w-full h-auto max-h-[70vh] object-contain rounded-lg">
                    </div>

                    <div class="mt-4">
                        <h3 x-text="currentTitle" class="text-2xl font-bold text-gray-800"></h3>
                        <p x-text="currentDescription" class="text-gray-600 mt-2"></p>
                        <div x-show="currentLocation" class="flex items-center mt-2 text-gray-600">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span x-text="currentLocation"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function galleryApp() {
            return {
                isOpen: false,
                currentTitle: '',
                currentImage: '',
                currentDescription: '',
                currentLocation: '',

                openModal(title, image, description, location) {
                    this.currentTitle = title;
                    this.currentImage = image;
                    this.currentDescription = description;
                    this.currentLocation = location;
                    this.isOpen = true;
                    document.body.classList.add('overflow-hidden');
                },

                closeModal() {
                    this.isOpen = false;
                    document.body.classList.remove('overflow-hidden');
                }
            }
        }
    </script>
@endpush
