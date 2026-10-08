@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Customer</h2>

    @if ($errors->any())
    <div class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border-gray-300 rounded-lg shadow-sm border p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full border-gray-300 rounded-lg shadow-sm border p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address (Optional)</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-lg shadow-sm border p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address (Optional)</label>
            <textarea name="address" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm border p-2.5 focus:ring-indigo-500 focus:border-indigo-500">{{ old('address') }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('customers.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold transition">Cancel</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold shadow transition">Save Customer</button>
        </div>
    </form>
</div>
@endsection