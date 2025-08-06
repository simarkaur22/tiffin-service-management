@extends('layouts.masters')

@section('title', 'Customers')

@section('heading', 'Customer List')

@section('main_content')

    <div class="card shadow-sm mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('customers.create') }}" class="btn btn-primary fw-bold btn-shadow ms-auto">
                <i class="bi bi-plus-circle"></i> Add Customer
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Tiffin Quantity</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->tiffin_quantity }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ ucfirst($customer->type) }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $customer->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $customer->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i> 
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                                <td colspan="9" class="text-center text-muted">No customers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
