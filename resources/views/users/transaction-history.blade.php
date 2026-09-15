@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Transactions History</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Transactions History</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="m-3 d-flex gap-2 flex-wrap">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
    <a href="{{ route('recharge.index') }}" class="btn btn-primary btn-sm align-self-center">+ New Recharge</a>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recharge History</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Proof</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Admin Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deposits as $item => $deposit)
                                <tr>
                                    <th scope="row">{{ $item+1}}</th>
                                    <td class="small">{{ $deposit->reference ?? '—' }}</td>
                                    <td>{{ date('Y/M/d h:i a', strtotime($deposit->created_at)) }}</td>
                                    <td>${{ number_format($deposit->amount) }}</td>
                                    <td>
                                        {{ $deposit->method_name }}
                                        @if ($deposit->paymentMethod)
                                            <br><small class="text-muted">{{ $deposit->paymentMethod->type_label }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($deposit->proof_image)
                                            <a href="{{ asset('storage/'.$deposit->proof_image) }}" target="_blank" rel="noopener">
                                                <span class="badge rounded-pill bg-primary"><i class="ri-eye-line"></i> View</span>
                                            </a>
                                        @elseif($deposit->gift_card_front)
                                            <a href="{{ asset('storage/'.$deposit->gift_card_front) }}" target="_blank" rel="noopener">
                                                <span class="badge rounded-pill bg-primary"><i class="ri-eye-line"></i> Front</span>
                                            </a>
                                            <a href="{{ asset('storage/'.$deposit->gift_card_receipt) }}" target="_blank" rel="noopener">
                                                <span class="badge rounded-pill bg-info"><i class="ri-eye-line"></i> Receipt</span>
                                            </a>
                                        @else
                                            <span class="text-muted small">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($deposit->status == 1)
                                        <span class="badge rounded-pill bg-primary">PENDING</span>
                                        @elseif($deposit->status == 2)
                                        <span class="badge rounded-pill bg-success">Completed</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Denied</span>
                                        @endif
                                    </td>
                                    <td class="small">{{ $deposit->admin_remark ?? '—' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No recharge transactions yet.</td>
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
