@extends('layouts.appCus')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-6 font-montserrat" data-aos="fade-up">
                    Semua Artikel
                </h1>
                <p class="text-xl text-gray-600 mb-8" data-aos="fade-up" data-aos-delay="100">
                    Temukan artikel menarik seputar teknologi, bisnis, dan pengembangan diri
                </p>
                <div class="relative max-w-md mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('articles.all') }}" method="GET">
                        <input type="text" name="search" placeholder="Cari artikel..."
                            class="w-full px-6 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ request('search') }}">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-blue-500">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <!-- Categories Filter -->
            <div class="mb-8 flex flex-wrap justify-center gap-2" data-aos="fade-up">
                <a href="{{ route('articles.all') }}"
                    class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                    Semua Kategori
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('articles.all', ['category' => $category]) }}"
                        class="px-4 py-2 rounded-full {{ request('category') == $category ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                        {{ $category }}
                    </a>
                @endforeach
            </div>

            <!-- Articles Grid -->
            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <article
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <!-- Make sure your article has these properties -->
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/400x225?text=No+Thumbnail' }}"
                                        alt="{{ $article->title }}"
                                        class="w-full h-full object-cover transition duration-300 hover:scale-105">
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center mb-3">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                            {{ $article->category }}
                                        </span>
                                        <span class="ml-2 text-xs text-gray-500">
                                            {{ $article->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-blue-500 transition">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-gray-600 line-clamp-2">
                                        {{ Str::limit(strip_tags($article->excerpt), 100) }}
                                    </p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-sm text-gray-500">
                                            <i class="far fa-eye mr-1"></i>
                                            {{ $article->views_count ?? 0 }} views
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12" data-aos="fade-up">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-12" data-aos="fade-up">
                    <img src="{{ asset('images/no-articles.svg') }}" alt="No articles found" class="max-w-xs mx-auto mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada artikel yang ditemukan</h3>
                    <p class="text-gray-600">Coba dengan kata kunci atau kategori yang berbeda</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Popular Tags Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 font-montserrat" data-aos="fade-up">
                    Populer Tags
                </h2>
                <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($popularTags as $tag)
                        <a href="{{ route('articles.byTag', $tag->slug) }}"
                            class="px-4 py-2 bg-white text-gray-800 rounded-full shadow-sm hover:bg-blue-100 hover:text-teal-800 transition flex items-center">
                            #{{ $tag->name }}
                            <span class="ml-2 text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded-full">
                                {{ $tag->articles_count }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
