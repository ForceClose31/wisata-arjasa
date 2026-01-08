@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Tambah Berita Baru</h2>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Indonesian Content -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Konten (Bahasa Indonesia)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul *</label>
                        <input type="text" name="title_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan *</label>
                        <textarea name="excerpt_id" rows="3" required maxlength="500"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        <p class="text-xs text-gray-500 mt-1">Maksimal 500 karakter</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konten *</label>
                        <textarea name="content_id" rows="10" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- SEO Fields ID -->
                    <div class="border-t pt-4 mt-4">
                        <h4 class="text-sm font-semibold mb-3 text-gray-700">Optimasi SEO</h4>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Title</label>
                            <input type="text" name="meta_title_id" maxlength="70"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Optimal: 50-60 karakter</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Description</label>
                            <textarea name="meta_description_id" rows="2" maxlength="160"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Optimal: 150-160 karakter</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_id" maxlength="255"
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
                        <input type="text" name="title_en" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt *</label>
                        <textarea name="excerpt_en" rows="3" required maxlength="500"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        <p class="text-xs text-gray-500 mt-1">Maximum 500 characters</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Content *</label>
                        <textarea name="content_en" rows="10" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- SEO Fields EN -->
                    <div class="border-t pt-4 mt-4">
                        <h4 class="text-sm font-semibold mb-3 text-gray-700">SEO Optimization</h4>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Title</label>
                            <input type="text" name="meta_title_en" maxlength="70"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Optimal: 50-60 characters</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Description</label>
                            <textarea name="meta_description_en" rows="2" maxlength="160"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Optimal: 150-160 characters</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_en" maxlength="255"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Separate with commas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Featured Image *</label>
                    <input type="file" name="featured_image" required accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, WebP (Max: 2MB)</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">OG Image (Optional)</label>
                    <input type="file" name="og_image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <p class="text-xs text-gray-500 mt-1">For social media sharing (1200x630px recommended)</p>
                </div>
            </div>

            <!-- Publish Status -->
            <div class="mt-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1"
                        class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-sm text-gray-700">Publikasikan sekarang</span>
                </label>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.news.index') }}"
                    class="mr-4 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
@endsection
