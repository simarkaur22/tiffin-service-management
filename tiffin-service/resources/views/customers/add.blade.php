@extends('layouts.masters')

@section('title', 'Add Customers')

@section('heading', 'Create Customers')

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
            <h4 class="mb-0">Customer Registration</h4>
        </div>
        <div class="card-body">
            <form id="customerForm" action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter full name">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="tel" class="form-control" name="contact" placeholder="Enter contact number">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="1" placeholder="Enter address"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tiffin Quantity</label>
                        <input type="number" class="form-control" name="tiffin_quantity" min="1" placeholder="Number of tiffins">
                    </div>

                    
                    <div class="col-md-6">
                        <label class="form-label">Customer Type</label>
                        <select class="form-select" name="customer_type">
                            <option disabled selected>Select Type</option>
                            <option value="permanent">Permanent</option>
                            <option value="temporary">Temporary</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="1" id="statusActive" checked>
                            <label class="form-check-label" for="statusActive">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="0" id="statusInactive">
                            <label class="form-check-label" for="statusInactive">Inactive</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn bgcolor text-white px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
