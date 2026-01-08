@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Edit Berita</h2>

        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Indonesian Content -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Konten (Bahasa Indonesia)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul *</label>
                        <input type="text" name="title_id"
                            value="{{ old('title_id', $news->getTranslation('title', 'id')) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('title_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan *</label>
                        <textarea name="excerpt_id" rows="3" required maxlength="500"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt_id', $news->getTranslation('excerpt', 'id')) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Maksimal 500 karakter</p>
                        @error('excerpt_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konten *</label>
                        <textarea name="content_id" rows="10" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content_id', $news->getTranslation('content', 'id')) }}</textarea>
                        @error('content_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- SEO Fields ID -->
                    <div class="border-t pt-4 mt-4">
                        <h4 class="text-sm font-semibold mb-3 text-gray-700">Optimasi SEO</h4>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Title</label>
                            <input type="text" name="meta_title_id"
                                value="{{ old('meta_title_id', $news->getTranslation('meta_title', 'id')) }}" maxlength="70"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Optimal: 50-60 karakter</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Description</label>
                            <textarea name="meta_description_id" rows="2" maxlength="160"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description_id', $news->getTranslation('meta_description', 'id')) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Optimal: 150-160 karakter</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_id"
                                value="{{ old('meta_keywords_id', $news->getTranslation('meta_keywords', 'id')) }}"
                                maxlength="255"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma</p>
                        </div>
                    </div>
                </div>

                <!-- English Content -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Content (English)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                        <input type="text" name="title_en"
                            value="{{ old('title_en', $news->getTranslation('title', 'en')) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('title_en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt *</label>
                        <textarea name="excerpt_en" rows="3" required maxlength="500"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt_en', $news->getTranslation('excerpt', 'en')) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Maximum 500 characters</p>
                        @error('excerpt_en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Content *</label>
                        <textarea name="content_en" rows="10" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content_en', $news->getTranslation('content', 'en')) }}</textarea>
                        @error('content_en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- SEO Fields EN -->
                    <div class="border-t pt-4 mt-4">
                        <h4 class="text-sm font-semibold mb-3 text-gray-700">SEO Optimization</h4>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Title</label>
                            <input type="text" name="meta_title_en"
                                value="{{ old('meta_title_en', $news->getTranslation('meta_title', 'en')) }}"
                                maxlength="70"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Optimal: 50-60 characters</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Description</label>
                            <textarea name="meta_description_en" rows="2" maxlength="160"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('meta_description_en', $news->getTranslation('meta_description', 'en')) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Optimal: 150-160 characters</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_en"
                                value="{{ old('meta_keywords_en', $news->getTranslation('meta_keywords', 'en')) }}"
                                maxlength="255"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Separate with commas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, WebP (Max: 2MB). Kosongkan jika tidak ingin
                        mengubah.</p>
                    @if ($news->featured_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $news->featured_image) }}" alt="Current featured image"
                                class="h-32 rounded-lg">
                        </div>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">OG Image (Optional)</label>
                    <input type="file" name="og_image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <p class="text-xs text-gray-500 mt-1">For social media sharing (1200x630px recommended)</p>
                    @if ($news->og_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $news->og_image) }}" alt="Current OG image"
                                class="h-32 rounded-lg">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Publish Status -->
            <div class="mt-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ $news->is_published ? 'checked' : '' }}
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-sm text-gray-700">Publikasikan berita</span>
                </label>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.news.index') }}"
                    class="mr-4 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Update Berita
                </button>
            </div>
        </form>
    </div>
@endsection
