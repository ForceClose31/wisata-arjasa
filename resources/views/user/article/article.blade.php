@extends('layouts.appCus')

@section('content')
    <!-- Article Content Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <!-- Featured Image -->
                <div class="mb-12 rounded-xl overflow-hidden shadow-lg" data-aos="fade-up">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/800x450?text=No+Thumbnail' }}"
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
                                <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/400x225?text=No+Thumbnail' }}"
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
