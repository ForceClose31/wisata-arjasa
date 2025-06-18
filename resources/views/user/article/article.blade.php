@extends('layouts.appCus')

@section('content')
    <!-- Article Hero Section -->
    <section class="relative py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6">
                    <span
                        class="px-3 py-1 bg-teal-100 text-teal-800 text-sm font-medium rounded-full">{{ $article->category }}</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-6 font-montserrat" data-aos="fade-up">
                    {{ $article->title }}</h1>
                <div class="flex items-center justify-center space-x-4 text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="far fa-eye mr-2"></i>
                        <span>{{ $article->views_count }} views</span>
                    </div>
                    <div class="flex items-center">
                        <i class="far fa-comments mr-2"></i>
                        <span>{{ $article->comments->count() }} comments</span>
                    </div>
                </div>
            </div>
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

    <!-- Comments Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 font-montserrat" data-aos="fade-up">
                    Komentar ({{ $article->comments->count() }})
                </h2>

                <!-- Comment Form -->
                @auth
                    <div class="bg-white p-6 rounded-xl shadow-sm mb-8" data-aos="fade-up">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Tinggalkan Komentar</h4>
                        <form action="{{ route('comments.store', $article->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <textarea name="content" rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                    placeholder="Tulis komentar Anda..."></textarea>
                            </div>
                            <button type="submit"
                                class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition font-medium">
                                Kirim Komentar
                            </button>
                        </form>
                    </div>
                @else
                    <div class="bg-white p-6 rounded-xl shadow-sm mb-8 text-center" data-aos="fade-up">
                        <p class="text-gray-600 mb-4">Anda harus login untuk meninggalkan komentar</p>
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition font-medium inline-block">
                            Login Sekarang
                        </a>
                    </div>
                @endauth

                <!-- Comments List -->
                <div class="space-y-6">
                    @foreach ($article->comments as $comment)
                        <div class="bg-white p-6 rounded-xl shadow-sm" data-aos="fade-up">
                            <div class="flex items-start mb-4">
                                <div class="flex-shrink-0 mr-4">
                                    <div
                                        class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                        {{ substr($comment->user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ $comment->user->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-700">{{ $comment->content }}</p>

                            @auth
                                @if (auth()->user()->id === $comment->user_id)
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 text-sm hover:text-red-800 transition flex items-center">
                                                <i class="fas fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @endforeach
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
