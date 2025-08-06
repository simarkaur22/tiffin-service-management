<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Http\Request;

class StaffPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffPayment = StaffPayment::all();
        return view('staffPayments.index', compact('staffPayment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = Staff::pluck('name', 'id')->toArray(); 
        return view('staffPayments.add', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staffPayment = new StaffPayment(); 
        $staffPayment->staff_id = $request->staff;
        $staffPayment->amount = $request->amount;  
        $staffPayment->payment_date = $request->payment_date;
        $staffPayment->status = $request->status; 
        $staffPayment->save();

        return redirect()->route('staff-payments.index')->with('success', 'Staff payment created successfully.');
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
        $staffPayment = StaffPayment::find($id); 
        $staff = Staff::pluck('name', 'id')->toArray(); 
        return view('staffPayments.edit', compact('staffPayment', 'staff')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staffPayment = StaffPayment::find($id);
        $staffPayment->staff_id = $request->staff;
        $staffPayment->amount = $request->amount;
        $staffPayment->payment_date = $request->payment_date;
        $staffPayment->status = $request->status;
        $staffPayment->save();

        return redirect()->route('staff-payments.index')->with('success', 'Staff payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staffPayment = StaffPayment::find($id);
        $staffPayment->delete();    

        return redirect()->route('staff-payments.index')->with('success', 'Staff payment deleted successfully.');
    }
}
