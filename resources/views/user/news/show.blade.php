@extends('layouts.customer')

@section('content')
    @push('head')
        <!-- SEO Meta Tags -->
        <meta name="description" content="{{ $news->meta_description }}">
        <meta name="keywords" content="{{ $news->getTranslation('meta_keywords', app()->getLocale()) }}">
        <meta name="author" content="{{ $news->admin->username }}">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $news->meta_title }}">
        <meta property="og:description" content="{{ $news->meta_description }}">
        <meta property="og:image" content="{{ asset('storage/' . ($news->og_image ?: $news->featured_image)) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">
        <meta property="article:published_time" content="{{ $news->published_at->toIso8601String() }}">
        <meta property="article:author" content="{{ $news->admin->username }}">

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $news->meta_title }}">
        <meta name="twitter:description" content="{{ $news->meta_description }}">
        <meta name="twitter:image" content="{{ asset('storage/' . ($news->og_image ?: $news->featured_image)) }}">

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Schema.org Structured Data -->
        <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "{{ $news->getTranslation('title', app()->getLocale()) }}",
        "image": "{{ asset('storage/' . $news->featured_image) }}",
        "datePublished": "{{ $news->published_at->toIso8601String() }}",
        "dateModified": "{{ $news->updated_at->toIso8601String() }}",
        "author": {
        "@type": "Person",
        "name": "{{ $news->admin->username }}"
        },
        "publisher": {
        "@type": "Organization",
        "name": "Desa Wisata Adat Arjasa",
        "logo": {
        "@type": "ImageObject",
        "url": "{{ asset('assets/img/logo.png') }}"
        }
        },
        "description": "{{ $news->getTranslation('excerpt', app()->getLocale()) }}"
        }
    </script>
    @endpush

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fas fa-home mr-2"></i>
                            {{ __('user.Beranda') }}
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400"></i>
                            <a href="{{ route('news.index') }}"
                                class="ml-2 text-sm font-medium text-gray-700 hover:text-blue-600">
                                Berita
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400"></i>
                            <span class="ml-2 text-sm font-medium text-gray-500">
                                {{ Str::limit($news->getTranslation('title', app()->getLocale()), 50) }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <article class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Featured Image -->
                        <div class="relative h-96">
                            <img src="{{ asset('storage/' . $news->featured_image) }}"
                                alt="{{ $news->getTranslation('title', app()->getLocale()) }}"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        </div>

                        <!-- Article Header -->
                        <div class="p-8">
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <time datetime="{{ $news->published_at->toIso8601String() }}">
                                        {{ $news->published_at->format('d F Y') }}
                                    </time>
                                </div>
                                <span class="mx-3">•</span>
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>{{ $news->admin->username }}</span>
                                </div>
                                <span class="mx-3">•</span>
                                <div class="flex items-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span>{{ number_format($news->views_count) }} views</span>
                                </div>
                            </div>

                            <h1 class="text-4xl font-bold text-gray-900 mb-6">
                                {{ $news->getTranslation('title', app()->getLocale()) }}
                            </h1>

                            <div class="text-xl text-gray-600 mb-8 italic border-l-4 border-blue-500 pl-4">
                                {{ $news->getTranslation('excerpt', app()->getLocale()) }}
                            </div>

                            <!-- Article Content -->
                            <div class="prose prose-lg max-w-none">
                                {!! nl2br(e($news->getTranslation('content', app()->getLocale()))) !!}
                            </div>

                            <!-- Share Buttons -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <h3 class="text-lg font-semibold mb-4">{{ __('user.Bagikan') }} Artikel:</h3>
                                <div class="flex space-x-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->getTranslation('title', app()->getLocale())) }}"
                                        target="_blank" rel="noopener"
                                        class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                                        <i class="fab fa-twitter mr-2"></i> Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($news->getTranslation('title', app()->getLocale()) . ' ' . url()->current()) }}"
                                        target="_blank" rel="noopener"
                                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="bg-white rounded-xl shadow-lg p-8 mt-8" id="comments">
                        <h2 class="text-2xl font-bold mb-6">
                            Komentar ({{ $news->approvedComments->count() }})
                        </h2>

                        @if (session('success'))
                            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        <!-- Comment Form -->
                        <form action="{{ route('news.comments.store', $news) }}" method="POST" class="mb-8">
                            @csrf
                            <input type="hidden" name="parent_id" id="parent_id" value="">

                            <div id="reply-info" class="hidden mb-4 p-3 bg-blue-50 border-l-4 border-blue-500">
                                <span class="text-sm">Membalas komentar dari <strong id="reply-name"></strong></span>
                                <button type="button" onclick="cancelReply()"
                                    class="ml-4 text-red-600 hover:text-red-800">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama *</label>
                                    <input type="text" name="name" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Nama Anda" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                    <input type="email" name="email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="email@example.com" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Komentar *</label>
                                <textarea name="comment" rows="4" required maxlength="1000"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Tulis komentar Anda...">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Maksimal 1000 karakter</p>
                            </div>
                            <button type="submit"
                                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-paper-plane mr-2"></i> Kirim Komentar
                            </button>
                        </form>

                        <!-- Comments List -->
                        <div class="space-y-6">
                            @forelse($news->approvedComments as $comment)
                                <div class="border-b border-gray-200 pb-6 last:border-0"
                                    id="comment-{{ $comment->id }}">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-blue-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="font-semibold text-gray-900">{{ $comment->name }}</h4>
                                                    <p class="text-sm text-gray-500">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                                <button
                                                    onclick="replyComment({{ $comment->id }}, '{{ $comment->name }}')"
                                                    class="text-sm text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-reply mr-1"></i> Balas
                                                </button>
                                            </div>
                                            <p class="mt-2 text-gray-700">{{ $comment->comment }}</p>

                                            <!-- Replies -->
                                            @if ($comment->replies->count() > 0)
                                                <div class="mt-4 space-y-4 pl-8 border-l-2 border-gray-200">
                                                    @foreach ($comment->replies as $reply)
                                                        <div class="flex items-start" id="comment-{{ $reply->id }}">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                                                    <i class="fas fa-user text-gray-600"></i>
                                                                </div>
                                                            </div>
                                                            <div class="ml-3 flex-1">
                                                                <div>
                                                                    <h5 class="font-semibold text-gray-900 text-sm">
                                                                        {{ $reply->name }}</h5>
                                                                    <p class="text-xs text-gray-500">
                                                                        {{ $reply->created_at->diffForHumans() }}</p>
                                                                </div>
                                                                <p class="mt-1 text-gray-700 text-sm">
                                                                    {{ $reply->comment }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <i class="fas fa-comments text-4xl text-gray-300 mb-2"></i>
                                    <p class="text-gray-500">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <!-- Related News -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold mb-4">Berita Terkait</h3>
                        <div class="space-y-4">
                            @foreach ($relatedNews as $related)
                                <a href="{{ route('news.show', $related->slug) }}"
                                    class="flex items-start group hover:bg-gray-50 p-2 rounded-lg transition">
                                    <img src="{{ asset('storage/' . $related->featured_image) }}"
                                        alt="{{ $related->title }}"
                                        class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                    <div class="ml-3">
                                        <h4 class="font-semibold text-sm group-hover:text-blue-600 line-clamp-2">
                                            {{ $related->getTranslation('title', app()->getLocale()) }}
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $related->published_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Popular Tags -->
                    @if ($news->getTranslation('meta_keywords', app()->getLocale()))
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-xl font-bold mb-4">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach (explode(',', $news->getTranslation('meta_keywords', app()->getLocale())) as $keyword)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                                        {{ trim($keyword) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function replyComment(commentId, commentName) {
                document.getElementById('parent_id').value = commentId;
                document.getElementById('reply-name').textContent = commentName;
                document.getElementById('reply-info').classList.remove('hidden');
                document.querySelector('textarea[name="comment"]').focus();

                // Smooth scroll to form
                document.querySelector('form').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

            function cancelReply() {
                document.getElementById('parent_id').value = '';
                document.getElementById('reply-info').classList.add('hidden');
            }

            @if (session('success'))
                setTimeout(() => {
                    const alert = document.querySelector('.bg-green-100');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            @endif
        </script>
    @endpush
@endsection
