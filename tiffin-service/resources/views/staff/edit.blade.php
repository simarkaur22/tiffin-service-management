@extends('layouts.masters')

@section('title', 'Edit Staff')

@section('heading', 'Edit Staff Member')

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
            <h4 class="mb-0">Update Staff Details</h4>
        </div>
        <div class="card-body">
            <form id="staffForm" action="{{ route('staff.update', $staff->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Staff Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $staff->name }}" placeholder="Enter staff name">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role">
                            <option disabled>Select Role</option>
                            <option value="cook" {{ $staff->role == 'cook' ? 'selected' : '' }}>Cook</option>
                            <option value="delivery" {{ $staff->role == 'delivery' ? 'selected' : '' }}>Delivery</option>
                            <option value="helper" {{ $staff->role == 'helper' ? 'selected' : '' }}>Helper</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Salary</label>
                        <input type="number" class="form-control" name="salary" value="{{ $staff->salary }}" placeholder="Enter salary amount">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="tel" class="form-control" name="contact" value="{{ $staff->contact }}" placeholder="Enter contact number">
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
