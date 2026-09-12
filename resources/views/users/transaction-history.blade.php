@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Transactions History</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Transactions History</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="m-3">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
</div>


<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transactions History</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deposits as $item => $deposit)
                                <tr>
                                    <th scope="row">{{ $item+1}}</th>
                                    <td>{{ date('Y/M/d h:i a', strtotime($deposit->created_at)) }}</td>
                                    <td>${{ number_format($deposit->amount) }}</td>
                                    <td>{{$deposit->payment_method}}</td>
                                    <td>
                                        @if ($deposit->status == 1)
                                        <span class="badge rounded-pill bg-primary">PENDING</span>
                                        @elseif($deposit->status == 2)
                                        <span class="badge rounded-pill bg-success">Completed</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Denied</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                </tr>
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