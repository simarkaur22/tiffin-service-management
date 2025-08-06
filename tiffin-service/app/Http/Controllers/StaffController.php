<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all(); 
        return view('staff.index', compact('staff')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.add'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff = new Staff(); 
        $staff->name = $request->name;
        $staff->role = $request->role;
        $staff->salary = $request->salary;
        $staff->contact = $request->contact; 
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
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
        $staff = Staff::find($id); 
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->name = $request->name;
        $staff->role = $request->role;
        $staff->salary = $request->salary;
        $staff->contact = $request->contact; 
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
