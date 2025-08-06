<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customers;
use App\Models\Tiffin;
use Illuminate\Http\Request;

class TiffinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiffins = Tiffin::with('customer')->get(); 
        return view('tiffins.index', compact('tiffins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::pluck('name', 'id')->toArray(); 
        return view('tiffins.add', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tiffins = new Tiffin();
        $tiffins->customer_id = $request->customer_id;
        $tiffins->date = $request->date;
        $tiffins->quantity = $request->quantity;
        $tiffins->status = $request->status; 
        
        $tiffins->save();           
        return redirect()->route('tiffins.index')->with('success', 'Tiffin created successfully.');
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
        $tiffins = Tiffin::findOrFail($id);
        $customers = Customer::pluck('name', 'id')->toArray(); 
        return view('tiffins.edit', compact('tiffins', 'customers'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tiffins = Tiffin::findOrFail($id);
        $tiffins->customer_id = $request->customer_id;
        $tiffins->date = $request->date;
        $tiffins->status = $request->status; 
        
        $tiffins->save();           
        return redirect()->route('tiffins.index')->with('success', 'Tiffin updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tiffins = Tiffin::findOrFail($id);
        $tiffins->delete();
        
        return redirect()->route('tiffins.index')->with('success', 'Tiffin deleted successfully.'); 
    }
}
