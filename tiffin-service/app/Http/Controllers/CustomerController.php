<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.add'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customers = new Customer(); 
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->contact = $request->contact;
        $customers->address = $request->address;
        $customers->tiffin_quantity = $request->tiffin_quantity;
        $customers->type = $request->customer_type;
        $customers->status = $request->status == '1' ? 1 : 0; 
        $customers->save(); 

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::findOrFail($id);
        return view('customers.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->contact = $request->contact;
        $customers->address = $request->address;
        $customers->tiffin_quantity = $request->tiffin_quantity;
        $customers->type = $request->customer_type;
        $customers->status = $request->status == '1' ? 1 : 0; 
        $customers->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.'); 
    }
}
