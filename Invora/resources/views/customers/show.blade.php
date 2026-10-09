@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- View Container Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Header -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black text-slate-900">Customer Profile Details</h2>
                <p class="text-xs text-slate-500 mt-0.5">Viewing contact records and activity timeline.</p>
            </div>
            <a href="{{ route('customers.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>

        <!-- Body Details -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Customer Name</span>
                    <h3 class="text-base font-bold text-slate-900">{{ $customer->name }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</span>
                    <h3 class="text-base font-bold text-slate-800">{{ $customer->email ?? 'N/A' }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Phone Number</span>
                    <h3 class="text-base font-bold text-slate-800">{{ $customer->phone }}</h3>
                </div>

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Registered Date</span>
                    <h3 class="text-sm font-semibold text-slate-700">{{ $customer->created_at->format('F d, Y - h:i A') }}</h3>
                </div>

                <div class="space-y-1 md:col-span-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Billing Address</span>
                    <p class="text-sm font-medium text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100 mt-1">
                        {{ $customer->address ?? 'No address provided.' }}
                    </p>
                </div>
            </div>

            <!-- Action Button -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('customers.edit', $customer->id) }}" class="px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Edit Customer
                </a>
            </div>
        </div>

    </div>

</div>
@endsection