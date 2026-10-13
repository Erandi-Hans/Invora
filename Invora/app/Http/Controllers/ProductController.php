<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // To show all the inventory
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // show form to add new product
    public function create()
    {
        return view('products.create');
    }

    // To save product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|regex:/^[A-Za-z0-9\-\_]+$/|unique:products,code',
            'cost' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0|gte:cost',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ], [
            'code.regex' => 'Product code must only contain letters, numbers, hyphens, and underscores.',
            'cost.min' => 'Cost cannot be a negative value.',
            'price.min' => 'Price cannot be a negative value.',
            'price.gte' => 'Selling price must be greater than or equal to the cost price.',
            'quantity.min' => 'Quantity cannot be a negative number.',
            'quantity.integer' => 'Quantity must be a whole number.',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|regex:/^[A-Za-z0-9\-\_]+$/|unique:products,code,' . $product->id,
            'cost' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0|gte:cost',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ], [
            'code.regex' => 'Product code must only contain letters, numbers, hyphens, and underscores.',
            'cost.min' => 'Cost cannot be a negative value.',
            'price.min' => 'Price cannot be a negative value.',
            'price.gte' => 'Selling price must be greater than or equal to the cost price.',
            'quantity.min' => 'Quantity cannot be a negative number.',
            'quantity.integer' => 'Quantity must be a whole number.',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // show more details about the product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
