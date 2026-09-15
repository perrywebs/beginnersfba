@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Review Withdrawal</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin_withdrawals.index') }}">Withdrawals</a></li>
            <li class="breadcrumb-item active">{{ $withdrawal->reference ?? '#'.$withdrawal->id }}</li>
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
                        <dd class="col-sm-8">{{ $withdrawal->user->name ?? '—' }} ({{ $withdrawal->user->email ?? '' }})</dd>
                        <dt class="col-sm-4">Reference</dt>
                        <dd class="col-sm-8">{{ $withdrawal->reference ?? '—' }}</dd>
                        <dt class="col-sm-4">Amount</dt>
                        <dd class="col-sm-8"><strong>${{ number_format($withdrawal->amount) }}</strong></dd>
                        <dt class="col-sm-4">Payment Method</dt>
                        <dd class="col-sm-8">{{ $withdrawal->paymentMethod->name ?? 'Legacy bank transfer' }}
                            @if ($withdrawal->paymentMethod)<span class="badge bg-light text-dark border">{{ $withdrawal->paymentMethod->type_label }}</span>@endif
                        </dd>
                        <dt class="col-sm-4">Date</dt>
                        <dd class="col-sm-8">{{ $withdrawal->created_at->format('Y-m-d h:i a') }}</dd>
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            @if ($withdrawal->status == 1)<span class="badge bg-primary">PENDING</span>
                            @elseif($withdrawal->status == 2)<span class="badge bg-success">Approved</span>
                            @else<span class="badge bg-danger">Denied</span>@endif
                        </dd>
                        @if ($withdrawal->admin_remark)
                            <dt class="col-sm-4">Admin Remark</dt>
                            <dd class="col-sm-8">{{ $withdrawal->admin_remark }}</dd>
                        @endif
                    </dl>

                    <h6>User's Submitted Payment Details</h6>
                    @include('components.submitted-details', [
                        'details' => $withdrawal->details ?? [],
                        'snapshot' => $withdrawal->method_snapshot ?? [],
                        'legacy' => [
                            'Account Name' => $withdrawal->account_name,
                            'Bank Name' => $withdrawal->bank_name,
                            'Account Number' => $withdrawal->account_number,
                            'Account Type' => $withdrawal->account_type,
                            'Address' => $withdrawal->address,
                            'SWIFT/BIC Code' => $withdrawal->swift_bic_code,
                        ],
                    ])
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Decision</h5>
                    @if ($withdrawal->status == 1)
                        <p class="small text-muted">The amount was already deducted from the user's balance when requested. Approving only marks it complete; rejecting refunds the balance.</p>
                        <form method="POST" action="{{ route('admin_withdrawals.approve', $withdrawal) }}" class="mb-3"
                            onsubmit="return confirm('Approve this withdrawal?');">
                            @csrf
                            <div class="d-grid">
                                <button class="btn btn-success" type="submit"><i class="ri-checkbox-circle-line"></i> Approve</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin_withdrawals.reject', $withdrawal) }}"
                            onsubmit="return confirm('Reject this withdrawal and refund the user?');">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Reason / Remark (shown to user)</label>
                                <textarea name="admin_remark" class="form-control" rows="3" maxlength="1000"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-danger" type="submit"><i class="ri-delete-bin-2-line"></i> Reject & Refund</button>
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
