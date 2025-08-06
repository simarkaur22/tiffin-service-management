@extends('layouts.masters')

@section('title', 'Dashboard')

<style>
  
</style>
@section('heading', 'Dashboard')

@section('main_content')

<div class="row">
    <!-- Total Orders -->
    <div class="col-md-4 mt-5">
        <div class="card bg-light shadow-sm">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title" style="font-weight: 500">Total Customers </h5>
                <p class="display-6 text-primary mt-3"> {{ $total_customers }}</p>
            </div>
        </div>
    </div>

       <!-- Total Orders -->
    <div class="col-md-4 mt-5">
        <div class="card bg-light shadow-sm">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title" style="font-weight: 500">Total Orders</h5>
                <p class="display-6 text-primary mt-3"> {{ $total_orders }}</p>
            </div>
        </div>
    </div>

 
    <!-- Today's Deliveries -->
    <div class="col-md-4 mt-5">
        <div class="card bg-light shadow-sm">
            <div class="card-body d-flex flex-column justify-content-center"">
                <h5 class="card-title" style="font-weight: 500">Total  Delivered</h5>
                <p class="display-6 text-warning mt-3"> {{ $total_delivered }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
