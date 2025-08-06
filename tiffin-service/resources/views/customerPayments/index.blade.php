@extends('layouts.masters')

@section('title', 'Customer Payments')

@section('heading', 'Customer Payment List')

@section('main_content')

<div class="card shadow-sm mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('customer-payments.create') }}" class="btn btn-primary fw-bold btn-shadow ms-auto">
            <i class="bi bi-plus-circle"></i> Add  Customer Payment
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
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customerPayments as $customer)
                        <tr>
                            <td>{{ $customer->customer->name }}</td>
                            <td>{{ $customer->amount }}</td>
                            <td>{{ $customer->payment_date }}</td>
                            <td>{{ $customer->status }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('customer-payments.edit', $customer->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('customer-payments.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="5" class="text-center text-muted">No customer payments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
