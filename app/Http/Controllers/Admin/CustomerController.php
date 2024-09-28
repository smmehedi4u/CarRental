<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
     // List all customers
     public function index()
     {
         $customers = User::where('usertype', 'customer')->get();
         return view('admin.customers.index', compact('customers'));
     }

     // Show form to create a new customer
     public function create()
     {
         return view('admin.customers.create');
     }

     // Store a new customer in the database
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'phone_number' => 'nullable|string|max:15',
             'address' => 'nullable|string|max:255',
         ]);

         User::create([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'phone_number' => $validatedData['phone_number'],
             'address' => $validatedData['address'],
             'usertype' => 'customer',
             'password' => bcrypt('password'), // Default password for new customers
         ]);

         return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully.');
     }

     // Show form to edit customer details
     public function edit($id)
     {
         $customer = User::findOrFail($id);
         return view('admin.customers.edit', compact('customer'));
     }

     // Update customer details
     public function update(Request $request, $id)
     {
         $customer = User::findOrFail($id);

         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $customer->id,
             'phone_number' => 'nullable|string|max:15',
             'address' => 'nullable|string|max:255',
         ]);

         $customer->update($validatedData);

         return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
     }

     // Delete a customer
     public function destroy($id)
     {
         $customer = User::findOrFail($id);
         $customer->delete();

         return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
     }

     // Show customer details including rental history
     public function show($id)
     {
         $customer = User::with('rentals.car')->findOrFail($id);
         return view('admin.customers.show', compact('customer'));
     }
}
