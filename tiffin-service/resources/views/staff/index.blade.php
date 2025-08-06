@extends('layouts.masters')

@section('title', 'Staffs')

@section('heading', 'Staff List')

@section('main_content')

<div class="card shadow-sm mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('staff.create') }}" class="btn btn-primary fw-bold btn-shadow ms-auto">
            <i class="bi bi-plus-circle"></i> Add New Staff
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
                        <th>Role</th>
                        <th>Salary</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($staff as $staffs)
                        <tr>
                            <td>{{ $staffs->name }}</td>
                            <td>{{ $staffs->role }}</td>
                            <td>{{ $staffs->salary }}</td>
                            <td>{{ $staffs->contact }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('staff.edit', $staffs->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('staff.destroy', $staffs->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="5" class="text-center text-muted">No staff records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
