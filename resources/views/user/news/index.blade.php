@extends('layouts.customer')
@push('head')
    <meta name="description" content="Berita terbaru seputar Desa Wisata Adat Arjasa">
    <meta name="keywords" content="berita arjasa, wisata jember, budaya arjasa">
@endpush

@section('content')
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-bold mb-4">Berita & Artikel</h1>
                <p class="text-gray-600">Informasi terkini seputar Desa Wisata Adat Arjasa</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    @forelse($newsList as $news)
                        <article class="bg-white rounded-xl shadow-md overflow-hidden mb-8 hover:shadow-lg transition">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}"
                                        class="w-full h-48 md:h-full object-cover">
                                </div>
                                <div class="p-6 md:w-2/3">
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <span>{{ $news->published_at->format('d M Y') }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $news->admin->username }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $news->approved_comments_count }} Komentar</span>
                                    </div>
                                    <h2 class="text-2xl font-bold mb-3">
                                        <a href="{{ route('news.show', $news->slug) }}" class="hover:text-blue-600">
                                            {{ $news->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600 mb-4">{{ $news->excerpt }}</p>
                                    <a href="{{ route('news.show', $news->slug) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="text-center text-gray-500">Belum ada berita tersedia</p>
                    @endforelse

                    {{ $newsList->links() }}
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h3 class="text-xl font-bold mb-4">Berita Terbaru</h3>
                        @foreach ($latestNews as $latest)
                            <div class="mb-4 pb-4 border-b last:border-0">
                                <a href="{{ route('news.show', $latest->slug) }}" class="hover:text-blue-600">
                                    <h4 class="font-semibold mb-1">{{ $latest->title }}</h4>
                                    <p class="text-xs text-gray-500">{{ $latest->published_at->diffForHumans() }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
