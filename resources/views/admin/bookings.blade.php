@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Admin Dashboard | All Bookings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">All Bookings</li>
        </ol>
    </nav>
</div>
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin_dashboard')}}'">
        <i class="bi bi-house"></i>
        Back
    </button>
</div>
<x-error-message/>
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Bookings</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Budget to Invest</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $item => $booking)
                                    <tr>
                                        <td>{{$item+1}}</td>
                                        <td>{{ date("Y M d", strtotime($booking->created_at))}}</td>
                                        <td>{{ $booking->name}}</td>
                                        <td>{{ $booking->country}}</td>
                                        <td>{{ $booking->email}}</td>
                                        <td>{{ $booking->budget_to_invest}}</td>
                                        <td>
                                            @if ($booking->status == 1)
                                            <span class="badge rounded-pill bg-primary">PENDING</span>
                                            @elseif($booking->status == 2)
                                            <span class="badge rounded-pill bg-success">Approved</span>
                                            @else
                                            <span class="badge rounded-pill bg-danger">Denied</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin_bookings_view',[$booking->id])}}" class="btn btn-sm btn-info">view details</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection