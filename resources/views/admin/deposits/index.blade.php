@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Recharge Requests</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Recharges</li>
        </ol>
    </nav>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recharge Requests</h5>
                    <form method="GET" class="row g-2 mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search ref, method, user..."
                                value="{{ $filters['search'] ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-select form-select-sm">
                                <option value="">All statuses</option>
                                <option value="1" @selected(($filters['status'] ?? '') == '1')>Pending</option>
                                <option value="2" @selected(($filters['status'] ?? '') == '2')>Approved</option>
                                <option value="3" @selected(($filters['status'] ?? '') == '3')>Rejected</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-secondary btn-sm" type="submit">Filter</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deposits as $deposit)
                                    <tr>
                                        <td class="small">{{ $deposit->reference ?? '#'.$deposit->id }}</td>
                                        <td>{{ $deposit->user->name ?? '—' }}<br><small class="text-muted">{{ $deposit->user->email ?? '' }}</small></td>
                                        <td>${{ number_format($deposit->amount) }}</td>
                                        <td>{{ $deposit->method_name }}</td>
                                        <td class="small">{{ $deposit->created_at->format('Y M d') }}</td>
                                        <td>
                                            @if ($deposit->status == 1)<span class="badge bg-primary">PENDING</span>
                                            @elseif($deposit->status == 2)<span class="badge bg-success">Approved</span>
                                            @else<span class="badge bg-danger">Denied</span>@endif
                                        </td>
                                        <td><a href="{{ route('admin_deposits.show', $deposit) }}" class="btn btn-info btn-sm">Review</a></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" class="text-center text-muted">No recharge requests.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $deposits->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
