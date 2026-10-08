@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Customer Management</h1>
        <a href="{{ route('customers.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold shadow transition">+ Add New Customer</a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider border-b border-gray-200">
                    <th class="p-4">Name</th>
                    <th class="p-4">Phone</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Address</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @foreach($customers as $customer)
                <tr class="hover:bg-gray-50">
                    <td class="p-4 font-medium text-gray-900">{{ $customer->name }}</td>
                    <td class="p-4">{{ $customer->phone }}</td>
                    <td class="p-4">{{ $customer->email ?? '-' }}</td>
                    <td class="p-4">{{ $customer->address ?? '-' }}</td>
                    <td class="p-4 text-center">
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection