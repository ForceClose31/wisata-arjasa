@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Paket Wisata</h3>
                <p class="mt-2 text-3xl font-bold text-blue-600">{{ $tourPackageCount }}</p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="text-blue-600 fas fa-suitcase-rolling text-2xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                Lihat semua <i class="ml-1 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Destinasi Wisata</h3>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ $destinationCount }}</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <i class="text-green-600 fas fa-map-marked-alt text-2xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="#" class="text-sm font-medium text-green-600 hover:text-green-800">
                Lihat semua <i class="ml-1 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Gallery Card -->
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Galeri Foto</h3>
                <p class="mt-2 text-3xl font-bold text-purple-600">{{ $galleryCount }}</p>
            </div>
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="text-purple-600 fas fa-images text-2xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <a href="#" class="text-sm font-medium text-purple-600 hover:text-purple-800">
                Lihat semua <i class="ml-1 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg shadow-md">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Aktivitas Terakhir</h3>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                        <i class="text-blue-600 fas fa-plus"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Paket wisata baru ditambahkan</p>
                    <p class="text-sm text-gray-500">2 jam yang lalu</p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                        <i class="text-green-600 fas fa-edit"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Destinasi wisata diperbarui</p>
                    <p class="text-sm text-gray-500">1 hari yang lalu</p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full">
                        <i class="text-purple-600 fas fa-image"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Foto baru ditambahkan ke galeri</p>
                    <p class="text-sm text-gray-500">2 hari yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
