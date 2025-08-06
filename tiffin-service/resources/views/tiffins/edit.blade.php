@extends('layouts.masters')

@section('title', 'Edit Tiffin Details')

@section('heading', 'Edit Tiffin Details')

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
            <h4 class="mb-0">Update Tiffin Entry</h4>
        </div>
        <div class="card-body">
            <form id="tiffinForm" action="{{ route('tiffins.update', $tiffins->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Select Customer</label>
                        <select class="form-select" name="customer_id">
                            <option disabled>Select Customer</option>
                            @foreach($customers as $id => $name)
                                <option value="{{ $id }}" {{ $tiffins->customer_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="{{ $tiffins->date }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{ $tiffins->quantity }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option disabled>Select Status</option>
                            <option value="delivered" {{ $tiffins->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="pending" {{ $tiffins->status == 'pending' ? 'selected' : '' }}>Pending</option>
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
