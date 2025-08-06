@extends('layouts.masters')

@section('title', 'Edit Staff Payments')

@section('heading', 'Edit Staff Payment')

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
            <h4 class="mb-0">Update Staff Payment</h4>
        </div>
        <div class="card-body">
            <form id="staffForm" action="{{ route('staff-payments.update', $staffPayment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Staff</label>
                        <select class="form-select" name="staff">
                            <option disabled>Select Staff</option>
                            @foreach ($staff as $id => $name)
                                <option value="{{ $id }}" {{ $staffPayment->staff_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{ $staffPayment->amount }}" placeholder="Enter payment amount">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Payment Date</label>
                        <input type="date" class="form-control" name="payment_date" value="{{ $staffPayment->payment_date }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option disabled>Select Status</option>
                            <option value="paid" {{ $staffPayment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ $staffPayment->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        </select>
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
