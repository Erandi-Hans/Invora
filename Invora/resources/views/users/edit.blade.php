@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Form Container Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Form Header -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black text-slate-900">Edit User Account</h2>
                <p class="text-xs text-slate-500 mt-0.5">Modify account information and access settings.</p>
            </div>
            <a href="{{ route('users.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>

        <!-- Form Body -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('name')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('email')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field (Optional) -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">New Password <span class="text-slate-400 font-normal">(Leave blank to keep current)</span></label>
                <input type="password" name="password" placeholder="Enter new password if changing" class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('password')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('users.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Update User
                </button>
            </div>
        </form>

    </div>

</div>
@endsection