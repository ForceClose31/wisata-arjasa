@extends('layouts.appCus')

@section('content')
    <!-- Article Hero Section -->
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

    <!-- Article Content Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <!-- Featured Image -->
                <div class="mb-12 rounded-xl overflow-hidden shadow-lg" data-aos="fade-up">
                    <img src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : 'https://via.placeholder.com/800x450?text=No+Thumbnail' }}"
                        alt="{{ $article->title }}" class="w-full h-auto object-cover">
                </div>

                <!-- Article Content -->
                <article class="prose max-w-none" data-aos="fade-up">
                    {!! $article->content !!}
                </article>

                <!-- Tags -->
                <div class="mt-12 flex flex-wrap gap-2" data-aos="fade-up">
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('articles.byTag', $tag->slug) }}"
                            class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full hover:bg-teal-100 hover:text-teal-800 transition">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Share Buttons -->
                <div class="mt-8 pt-8 border-t border-gray-200" data-aos="fade-up">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Artikel:</h4>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center hover:bg-red-700 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-pink-600 text-white flex items-center justify-center hover:bg-pink-700 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center font-montserrat" data-aos="fade-up">
                Artikel Terkait
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($relatedArticles as $related)
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ route('articles.show', $related->slug) }}">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $related->thumbnail ? asset('storage/' . $related->thumbnail) : 'https://via.placeholder.com/400x225?text=No+Thumbnail' }}"
                                    alt="{{ $related->title }}"
                                    class="w-full h-full object-cover transition duration-300 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span
                                        class="px-2 py-1 bg-teal-100 text-teal-800 text-xs font-medium rounded-full">{{ $related->category }}</span>
                                    <span
                                        class="ml-2 text-xs text-gray-500">{{ $related->created_at->diffForHumans() }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-teal-600 transition">
                                    {{ $related->title }}</h3>
                                <p class="text-gray-600 line-clamp-2">{{ Str::limit(strip_tags($related->content), 100) }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
