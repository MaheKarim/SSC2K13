@extends('layouts.admin')

@section('page-title', 'Jersey Sizes')

@section('content')
    <div class="space-y-4 md:space-y-6">
        <!-- Add New Button -->
        <div class="flex justify-end">
            <button onclick="document.getElementById('addModal').classList.remove('hidden')"
                class="mobile-btn btn-primary flex items-center justify-center w-full sm:w-auto">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Size
            </button>
        </div>

        <!-- Jersey Sizes List -->
        <div class="card overflow-hidden">
            @if ($jerseySizes->count() > 0)
                <div class="overflow-x-auto -mx-4 md:mx-0">
                    <div class="min-w-[400px] md:min-w-0 px-4 md:px-0">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Size</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Status</th>
                                    <th
                                        class="text-left py-2.5 md:py-3 px-2 md:px-4 text-[10px] md:text-sm font-medium text-gray-600">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jerseySizes as $size)
                                    <tr class="border-b border-gray-100">
                                        <td
                                            class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm font-semibold text-gray-800">
                                            {{ $size->size }}
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <span
                                                class="inline-flex items-center px-1.5 md:px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-medium
                                            @if ($size->active) bg-green-100 text-green-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                                {{ $size->active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="py-2.5 md:py-3 px-2 md:px-4 text-xs md:text-sm">
                                            <div class="flex items-center space-x-2 md:space-x-3">
                                                <button
                                                    onclick="editSize({{ $size->id }}, '{{ $size->size }}', {{ $size->active ? 'true' : 'false' }})"
                                                    class="text-blue-600 hover:text-blue-700 font-medium text-[10px] md:text-xs">
                                                    Edit
                                                </button>
                                                <button onclick="toggleSize({{ $size->id }})"
                                                    class="text-{{ $size->active ? 'yellow' : 'green' }}-600 hover:text-{{ $size->active ? 'yellow' : 'green' }}-700 font-medium text-[10px] md:text-xs">
                                                    {{ $size->active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                                <button onclick="deleteSize({{ $size->id }})"
                                                    class="text-red-600 hover:text-red-700 font-medium text-[10px] md:text-xs">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="text-center py-12 md:py-16 px-6">
                    <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <p class="text-gray-500 text-sm md:text-base">No jersey sizes added yet</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-2xl p-4 md:p-6 w-full max-w-md">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Add Jersey Size</h3>
            <form action="{{ route('admin.jersey-sizes.store') }}" method="POST">
                @csrf
                <div class="mb-3 md:mb-4">
                    <label class="label text-xs md:text-sm">Size</label>
                    <input type="text" name="size" class="input-field text-sm" placeholder="e.g., S, M, L, XL, XXL"
                        required>
                </div>
                <div class="mb-4 md:mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="active" checked class="w-4 h-4 text-primary-600 rounded">
                        <span class="ml-2 text-xs md:text-sm text-gray-600">Active</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-2 md:space-x-3">
                    <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')"
                        class="mobile-btn px-3 md:px-4 py-2 text-gray-600 hover:text-gray-800 text-sm">
                        Cancel
                    </button>
                    <button type="submit" class="mobile-btn btn-primary text-sm">Add Size</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-2xl p-4 md:p-6 w-full max-w-md">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-4">Edit Jersey Size</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="mb-3 md:mb-4">
                    <label class="label text-xs md:text-sm">Size</label>
                    <input type="text" id="edit_size" name="size" class="input-field text-sm" required>
                </div>
                <div class="mb-4 md:mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" id="edit_active" name="active" class="w-4 h-4 text-primary-600 rounded">
                        <span class="ml-2 text-xs md:text-sm text-gray-600">Active</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-2 md:space-x-3">
                    <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')"
                        class="mobile-btn px-3 md:px-4 py-2 text-gray-600 hover:text-gray-800 text-sm">
                        Cancel
                    </button>
                    <button type="submit" class="mobile-btn btn-primary text-sm">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Toggle Form -->
    <form id="toggleForm" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        function editSize(id, size, active) {
            document.getElementById('editForm').action = `/admin/jersey-sizes/${id}`;
            document.getElementById('edit_size').value = size;
            document.getElementById('edit_active').checked = active;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function deleteSize(id) {
            if (confirm('Are you sure you want to delete this size?')) {
                document.getElementById('deleteForm').action = `/admin/jersey-sizes/${id}`;
                document.getElementById('deleteForm').submit();
            }
        }

        function toggleSize(id) {
            document.getElementById('toggleForm').action = `/admin/jersey-sizes/${id}/toggle`;
            document.getElementById('toggleForm').submit();
        }
    </script>
@endsection
