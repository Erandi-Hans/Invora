@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Form Container Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Form Header -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black text-slate-900">Edit Customer Information</h2>
                <p class="text-xs text-slate-500 mt-0.5">Modify contact numbers, email, or address records.</p>
            </div>
            <a href="{{ route('customers.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>

        <!-- Form Body -->
        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Customer Name</label>
                <input type="text" name="name" value="{{ old('name', $customer->name) }}" required class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('name')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('email')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" required class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                @error('phone')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address Field -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Address</label>
                <textarea name="address" rows="3" class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">{{ old('address', $customer->address) }}</textarea>
                @error('address')
                <span class="text-xs text-rose-600 font-semibold">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('customers.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Update Customer
                </button>
            </div>
        </form>

    </div>

</div>
@endsection