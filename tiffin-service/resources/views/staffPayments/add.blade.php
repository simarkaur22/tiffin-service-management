@extends('layouts.masters')

@section('title', 'Add Staff Payments')

@section('heading', 'Add New Staff Payment')

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
            <h4 class="mb-0">Staff Payment Entry</h4>
        </div>
        <div class="card-body">
            <form id="staffForm" action="{{ route('staff-payments.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Staff</label>
                        <select class="form-select" name="staff">
                            <option selected disabled>Select Staff</option>
                            @foreach ($staff as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter payment amount">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Payment Date</label>
                        <input type="date" class="form-control" name="payment_date">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select>
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
