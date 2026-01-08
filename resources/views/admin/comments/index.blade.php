@extends('layouts.admin')

@section('title', 'Kelola Komentar Berita')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Komentar Berita</h1>
            <a href="{{ route('admin.dashboard') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-2 bg-yellow-100 rounded-lg">
                        <i class="fas fa-clock text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Pending</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Approved</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-2 bg-red-100 rounded-lg">
                        <i class="fas fa-times-circle text-red-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Rejected</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['rejected'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <i class="fas fa-comments text-purple-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Daftar Komentar</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Berita
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pengirim
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Komentar
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($comments as $comment)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $comment->news->title }}
                                    </div>
                                    @if ($comment->parent)
                                        <div class="text-xs text-gray-500 mt-1">
                                            <i class="fas fa-reply mr-1"></i>Balasan untuk: {{ $comment->parent->name }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $comment->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $comment->email }}</div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        <i class="fas fa-globe mr-1"></i>{{ $comment->ip_address }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-md">
                                        {{ Str::limit($comment->comment, 100) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $comment->status_color }}">
                                        {{ ucfirst($comment->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                    <div class="text-xs text-gray-400">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        @if ($comment->status === 'pending')
                                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:text-green-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menyetujui komentar ini?')"
                                                    title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.comments.reject', $comment) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menolak komentar ini?')"
                                                    title="Tolak">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @elseif($comment->status === 'approved')
                                            <form action="{{ route('admin.comments.reject', $comment) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menolak komentar ini?')"
                                                    title="Tolak">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:text-green-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menyetujui komentar ini?')"
                                                    title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                    <i class="fas fa-comments text-3xl text-gray-300 mb-2 block mx-auto"></i>
                                    Belum ada komentar yang perlu dikelola
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-hide success alert after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.bg-green-100');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
@endpush
