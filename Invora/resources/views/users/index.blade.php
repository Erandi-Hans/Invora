@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Page Header Bar -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Users Management</h1>
            <p class="text-sm text-slate-500 mt-0.5">Manage system administrators, staff accounts, and access permissions.</p>
        </div>
        <div>
            <a href="{{ route('users.create') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition duration-150 flex items-center gap-2 whitespace-nowrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New User
            </a>
        </div>
    </div>

    <!-- Success Alert Notification -->
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl shadow-sm flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Users Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Email Address</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50/60 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-base font-bold text-slate-900">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-semibold">
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <!-- View Details Button -->
                                <a href="{{ route('users.show', $user->id) }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                    View
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('users.edit', $user->id) }}" class="bg-sky-500 hover:bg-sky-600 text-white px-3.5 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                                    Edit
                                </a>
                                <!-- Trigger Custom Delete Modal Button with Data Attribute -->
                                <button type="button" data-url="{{ route('users.destroy', $user->id) }}" onclick="openDeleteModal(this)" class="bg-rose-600 hover:bg-rose-700 text-white px-3.5 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-sm text-slate-500">
                            <div class="flex flex-col items-center justify-center space-y-2">
                                <span class="text-4xl">👥</span>
                                <p class="font-bold text-slate-700 text-base">No users found in the system.</p>
                                <p class="text-xs text-slate-500">Click on 'Add New User' to create staff accounts.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Custom Modern Blur Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-sm hidden">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 mx-4 border border-slate-200 transform transition-all space-y-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-xl flex-shrink-0">
                ⚠️
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-900">Delete User</h3>
                <p class="text-xs text-slate-500">Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Handling -->
<script>
    function openDeleteModal(button) {
        const deleteUrl = button.getAttribute('data-url');
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');

        form.action = deleteUrl;
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
</script>
@endsection