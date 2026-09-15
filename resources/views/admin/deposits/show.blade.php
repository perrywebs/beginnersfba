@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Review Recharge</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_deposits.index') }}">Recharges</a></li>
            <li class="breadcrumb-item active">{{ $deposit->reference ?? '#'.$deposit->id }}</li>
        </ol>
    </nav>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Request Details</h5>
                    <dl class="row">
                        <dt class="col-sm-4">User</dt>
                        <dd class="col-sm-8">{{ $deposit->user->name ?? '—' }} ({{ $deposit->user->email ?? '' }})</dd>
                        <dt class="col-sm-4">Reference</dt>
                        <dd class="col-sm-8">{{ $deposit->reference ?? '—' }}</dd>
                        <dt class="col-sm-4">Amount</dt>
                        <dd class="col-sm-8"><strong>${{ number_format($deposit->amount) }}</strong></dd>
                        <dt class="col-sm-4">Payment Method</dt>
                        <dd class="col-sm-8">{{ $deposit->method_name }}
                            @if ($deposit->paymentMethod)<span class="badge bg-light text-dark border">{{ $deposit->paymentMethod->type_label }}</span>@endif
                        </dd>
                        <dt class="col-sm-4">Date</dt>
                        <dd class="col-sm-8">{{ $deposit->created_at->format('Y-m-d h:i a') }}</dd>
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            @if ($deposit->status == 1)<span class="badge bg-primary">PENDING</span>
                            @elseif($deposit->status == 2)<span class="badge bg-success">Approved</span>
                            @else<span class="badge bg-danger">Denied</span>@endif
                        </dd>
                        @if ($deposit->admin_remark)
                            <dt class="col-sm-4">Admin Remark</dt>
                            <dd class="col-sm-8">{{ $deposit->admin_remark }}</dd>
                        @endif
                    </dl>

                    <h6>Submitted Payment Information</h6>
                    @include('components.submitted-details', ['details' => $deposit->details ?? [], 'snapshot' => $deposit->method_snapshot ?? []])

                    @if ($deposit->proof_image)
                        <h6 class="mt-3">Payment Proof</h6>
                        <a href="{{ asset('storage/'.$deposit->proof_image) }}" target="_blank" rel="noopener" class="btn btn-info btn-sm">
                            <i class="ri-eye-line"></i> View Proof
                        </a>
                    @endif
                    @if ($deposit->payment_method === 'Gift Card' || $deposit->gift_card_front)
                        <h6 class="mt-3">Gift Card Images</h6>
                        @if ($deposit->gift_card_front)
                            <a href="{{ asset('storage/'.$deposit->gift_card_front) }}" target="_blank" rel="noopener" class="btn btn-primary btn-sm">Front</a>
                        @endif
                        @if ($deposit->gift_card_receipt)
                            <a href="{{ asset('storage/'.$deposit->gift_card_receipt) }}" target="_blank" rel="noopener" class="btn btn-info btn-sm">Receipt</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Decision</h5>
                    @if ($deposit->status == 1)
                        <form method="POST" action="{{ route('admin_deposits.approve', $deposit) }}" class="mb-3"
                            onsubmit="return confirm('Approve this recharge and credit the user?');">
                            @csrf
                            <div class="d-grid">
                                <button class="btn btn-success" type="submit"><i class="ri-checkbox-circle-line"></i> Approve & Credit User</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin_deposits.reject', $deposit) }}"
                            onsubmit="return confirm('Reject this recharge?');">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Reason / Remark (shown to user)</label>
                                <textarea name="admin_remark" class="form-control" rows="3" maxlength="1000"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-danger" type="submit"><i class="ri-delete-bin-2-line"></i> Reject</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info mb-0">This request has already been reviewed. No further action is possible.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
