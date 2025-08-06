<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPayment;
use Illuminate\Http\Request;

class CustomerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerPayments = CustomerPayment::all();
        return view('customerPayments.index', compact('customerPayments'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::pluck('name', 'id')->toArray(); 
        return view('customerPayments.add', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customerPayments = new CustomerPayment();
        $customerPayments->customer_id = $request->customer;
        $customerPayments->amount = $request->amount;
        $customerPayments->payment_date = $request->payment_date;
        $customerPayments->status = $request->status;
        $customerPayments->save();

        return redirect()->route('customer-payments.index')->with('success', 'Payment recorded successfully.');

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
        $customerPayments = CustomerPayment::findOrFail($id);
        $customers = Customer::pluck('name', 'id')->toArray(); 
        return view('customerPayments.edit', compact('customerPayments', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customerPayments = CustomerPayment::findOrFail($id);   
        $customerPayments->customer_id = $request->customer; 
         $customerPayments->amount = $request->amount;
        $customerPayments->payment_date = $request->payment_date;
        $customerPayments->status = $request->status;
        $customerPayments->save();

        return redirect()->route('customer-payments.index')->with('success', 'Payment updated successfully.');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customerPayments = CustomerPayment::findOrFail($id);
        $customerPayments->delete();

        return redirect()->route('customer-payments.index')->with('success', 'Payment deleted successfully.');  
    }
}
