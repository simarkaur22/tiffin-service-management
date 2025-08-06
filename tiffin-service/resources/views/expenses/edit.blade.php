@extends('layouts.masters')

@section('title', 'Edit Expenses')

@section('heading', 'Edit Expenses')

@section('main_content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container my-5">
    <div class="card shadow-lg border-0 col-md-8 offset-2 p-0">
        <div class="card-header bgcolor text-white">
            <h4 class="mb-0">Update Expense Details</h4>
        </div>
        <div class="card-body">
            <form id="expenseForm" action="{{ route('expenses.update', $expenses->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ $expenses->category }}" placeholder="Enter expense category">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{ $expenses->amount }}" placeholder="Enter amount">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="{{ $expenses->date }}">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn bgcolor text-white px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
