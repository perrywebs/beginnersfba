@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Admin Dashboard | Approve Bookings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">Approve Bookings</li>
        </ol>
    </nav>
</div>
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin_bookings')}}'">
        <i class="bi bi-house"></i>
        Back
    </button>
</div>
<x-error-message textColor="text-dark" />
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Booking Information</h5>
                    <div class="card">
                        <livewire:admin.view-bookings :bookings="$bookings"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection