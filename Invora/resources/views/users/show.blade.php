@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- View Container Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Header -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black text-slate-900">User Profile Details</h2>
                <p class="text-xs text-slate-500 mt-0.5">Viewing account information and timestamps.</p>
            </div>
            <a href="{{ route('users.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>

        <!-- Body Details -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Full Name</span>
                    <h3 class="text-base font-bold text-slate-900">{{ $user->name }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</span>
                    <h3 class="text-base font-bold text-slate-800">{{ $user->email }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Account Created</span>
                    <h3 class="text-sm font-semibold text-slate-700">{{ $user->created_at->format('F d, Y - h:i A') }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Last Updated</span>
                    <h3 class="text-sm font-semibold text-slate-700">{{ $user->updated_at->format('F d, Y - h:i A') }}</h3>
                </div>
            </div>

            <!-- Action Button -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('users.edit', $user->id) }}" class="px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Edit User
                </a>
            </div>
        </div>

    </div>

</div>
@endsection