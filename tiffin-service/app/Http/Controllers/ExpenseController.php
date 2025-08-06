<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expenses  = new Expense();
        $expenses->category = $request->category;
        $expenses->amount = $request->amount;
        $expenses->date = $request->date;   
        $expenses->save();

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
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
        $expenses   = Expense::findOrFail($id);
        return view('expenses.edit', compact('expenses'));          
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expenses = Expense::findOrFail($id);
        $expenses->category = $request->category;
        $expenses->amount = $request->amount;
        $expenses->date = $request->date;   
        $expenses->save();

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expenses = Expense::findOrFail($id);
        $expenses->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');   
    }
}
