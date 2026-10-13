<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        // Fetch all customers ordered by latest
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\.\-]+$/' // Accepts only letters, spaces, dots, and hyphens (No numbers)
            ],
            'email' => 'nullable|string|email|max:255|unique:customers,email',
            'phone' => [
                'required',
                'regex:/^[0-9]+$/', // Accepts digits only (No letters/symbols)
                'digits:10',        // Validates exact 10 digits mobile number
            ],
            'address' => 'nullable|string|max:500',
        ], [
            'name.regex' => 'The customer name must contain only letters and spaces.',
            'phone.regex' => 'The mobile number must contain only digits.',
            'phone.digits' => 'The mobile number must be exactly 10 digits.',
        ]);

        // Create new customer record
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer details.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validate incoming update data
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\.\-]+$/'
            ],
            'email' => 'nullable|string|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => [
                'required',
                'regex:/^[0-9]+$/',
                'digits:10',
            ],
            'address' => 'nullable|string|max:500',
        ], [
            'name.regex' => 'The customer name must contain only letters and spaces.',
            'phone.regex' => 'The mobile number must contain only digits.',
            'phone.digits' => 'The mobile number must be exactly 10 digits.',
        ]);

        // Update customer details
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
