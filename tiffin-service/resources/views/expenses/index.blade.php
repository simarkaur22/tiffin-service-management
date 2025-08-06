@extends('layouts.masters')

@section('title', 'Expenses')

@section('heading', 'Expense List')

@section('main_content')

<div class="card shadow-sm mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('expenses.create') }}" class="btn btn-primary fw-bold btn-shadow ms-auto">
            <i class="bi bi-plus-circle"></i> Add New Expense
        </a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle table-striped">
                <thead class="bgcolor text-white">
                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($expenses as $expense)
                        <tr>
                            <td>{{ $expense->category }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->date }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No expense records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
