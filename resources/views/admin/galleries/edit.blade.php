@extends('layouts.admin')

@section('title', 'Edit Gallery Wisata')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Edit Gallery Wisata</h2>

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Informasi</h3>

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" name="title" id="title" value="{{ $gallery->title }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $gallery->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                        <input type="text" name="location" id="location" value="{{ $gallery->location }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                {{--
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-800">Information (English)</h3>

                    <div class="mb-4">
                        <label for="title_en" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title_en" id="title_en" value="{{ $gallery->title['en'] }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description_en" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description_en" id="description_en" rows="4" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $gallery->description['en'] }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="location_en" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <input type="text" name="location_en" id="location_en" value="{{ $gallery->location['en'] }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="operational_hours_en" class="block text-sm font-medium text-gray-700 mb-1">Operational
                            Hours</label>
                        <input type="text" name="operational_hours_en" id="operational_hours_en"
                            value="{{ $gallery->operational_hours['en'] }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="type_en" class="block text-sm font-medium text-gray-700 mb-1">Tour Type</label>
                        <input type="text" name="type_en" id="type_en" value="{{ $gallery->type['en'] }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Facilities</label>
                        <div id="facilities-container-en">
                            @if ($gallery->facilities && isset($gallery->facilities['en']))
                                @foreach ($gallery->facilities['en'] as $facility)
                                    <div class="flex mb-2">
                                        <input type="text" name="facilities_en[]" value="{{ $facility }}"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <button type="button" onclick="this.parentElement.remove()"
                                            class="ml-2 px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <div class="flex mb-2">
                                <input type="text" name="facilities_en[]"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="button" onclick="addFacilityField('en')"
                                    class="ml-2 px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="gallery_category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="gallery_category_id" id="gallery_category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $gallery->gallery_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image_path" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama</label>
                    <input type="file" name="image_path" id="image_path" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Format: JPEG, PNG (Max: 2MB)</p>

                    @if ($gallery->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Current Image"
                                class="h-32 w-auto rounded-md">
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.galleries.index') }}"
                    class="mr-4 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Perbarui Gallery
                </button>
            </div>
        </form>
    </div>
@endsection
