@extends('layouts.appAdmin')

@section('content')
    <div class="py-12 pl-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Events Management</h2>
                    <button onclick="openModal('eventModal')"
                            class="px-4 py-2 bg-[#800000] text-white rounded-md hover:bg-[#600000] transition-colors">
                        Create Event
                    </button>
                </div>
            </div>

            <!-- Events Table -->
            <div class="w-full min-h-screen bg-white py-12 ">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-[#800000]">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Thumbnail</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Jadwal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tempat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Views Count</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($events as $event)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($event->thumbnail)
                                        <img src="{{ Storage::url($event->thumbnail) }}"
                                             alt="{{ $event->judul }}"
                                             class="h-10 w-10 rounded object-cover">
                                    @else
                                        <div class="h-10 w-10 rounded bg-gray-200 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->judul }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->jadwal)->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->tempat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $event->status === 'approved' ? 'bg-green-100 text-green-800' :
                                           ($event->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $event->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openModal('eventModal', {{ $event->id }})"
                                            class="text-[#800000] hover:text-[#600000] mr-3">Edit</button>
                                    <button onclick="confirmDelete({{ $event->id }})"
                                            class="text-red-600 hover:text-red-900">Delete</button>
                                    <form id="deleteForm-{{ $event->id }}"
                                          action="{{ route('admin.events.destroy', $event->id) }}"
                                          method="POST"
                                          class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $event->views_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Event Modal (Create/Edit) -->
    <div id="eventModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="eventForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="methodField"></div>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
                            <div class="mt-1 flex items-center">
                                <div id="thumbnailPreview" class="h-32 w-32 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="file"
                                       name="thumbnail"
                                       id="thumbnail"
                                       accept="image/*"
                                       class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#800000]">
                            </div>
                        </div>

                        <input type="hidden" name="akun_id" value="{{ Auth::id() }}">

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                            <input type="text"
                                   name="judul"
                                   id="judul"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jadwal</label>
                            <input type="datetime-local"
                                   name="jadwal"
                                   id="jadwal"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tempat</label>
                            <input type="text"
                                   name="tempat"
                                   id="tempat"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                            <select name="kategori"
                                    id="kategori"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="tarian">Tarian</option>
                                <option value="musik">Musik</option>
                                <option value="kuliner">Kuliner</option>
                                <option value="upacara">Upacara</option>
                                <option value="kerajinan">Kerajinan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Views Count</label>
                            <input type="number"
                                   name="views_count"
                                   id="views_count"
                                   min="0"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   placeholder="Enter views count">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status"
                                    id="status"
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Isi</label>
                            <textarea name="isi"
                                      id="isi"
                                      rows="4"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#800000] text-base font-medium text-white hover:bg-[#600000] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            <span id="submitButtonText">Create</span>
                        </button>
                        <button type="button"
                                onclick="closeModal('eventModal')"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
function openModal(modalId, eventId = null) {
    const form = document.getElementById('eventForm');
    const methodField = document.getElementById('methodField');
    const submitButtonText = document.getElementById('submitButtonText');
    const modal = document.getElementById(modalId);

    if (eventId) {
        // Edit mode
        form.action = `/admin/events/${eventId}`;
        methodField.innerHTML = `<input type="hidden" name="_method" value="PUT">`;
        submitButtonText.textContent = 'Update';

        // Show loading state
        const thumbnailPreview = document.getElementById('thumbnailPreview');
        thumbnailPreview.innerHTML = `
            <div class="flex items-center justify-center h-full">
                <svg class="animate-spin h-8 w-8 text-[#800000]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>`;

        // Fetch event data
        fetch(`/admin/events/${eventId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Received data:', data); // Debug log

                // Populate form fields
                document.getElementById('judul').value = data.judul || '';
                document.getElementById('tempat').value = data.tempat || '';
                document.getElementById('kategori').value = data.kategori || '';
                document.getElementById('status').value = data.status || '';
                document.getElementById('views_count').value = data.views_count || 0;
                document.getElementById('isi').value = data.isi || '';
                document.getElementById('jadwal').value = data.jadwal || '';

                // Handle thumbnail preview
                if (data.thumbnail) {
                    thumbnailPreview.innerHTML =
                        `<img src="/storage/${data.thumbnail}" class="h-full w-full object-cover" alt="Thumbnail">`;
                } else {
                    thumbnailPreview.innerHTML = `
                        <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>`;
                }
            })
            .catch(error => {
                console.error('Error fetching event data:', error);
                thumbnailPreview.innerHTML = `
                    <div class="text-red-500 text-center p-2">
                        Error loading thumbnail
                    </div>`;

                // Show more detailed error message
                alert(`Error loading event data: ${error.message}`);
            });
    } else {
        // Create mode
        form.action = "{{ route('admin.events.store') }}";
        methodField.innerHTML = '';
        submitButtonText.textContent = 'Create';
        form.reset();

        // Reset thumbnail preview
        document.getElementById('thumbnailPreview').innerHTML = `
            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>`;
    }

    // Show modal
    modal.classList.remove('hidden');
}

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function confirmDelete(eventId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#800000',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`deleteForm-${eventId}`).submit();
            }
        });
    }

    // Tambahkan event listener untuk preview thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('thumbnailPreview').innerHTML =
                    `<img src="${e.target.result}" class="h-full w-full object-cover" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
