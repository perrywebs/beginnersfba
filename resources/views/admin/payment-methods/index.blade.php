@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Payment Methods</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Payment Methods</li>
        </ol>
    </nav>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="card-title mb-0">Payment Methods</h5>
                        <a href="{{ route('admin_payment_methods.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Add Payment Method
                        </a>
                    </div>

                    <form method="GET" action="{{ route('admin_payment_methods.index') }}" class="row g-2 mt-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control form-control-sm"
                                placeholder="Search by name..." value="{{ $filters['search'] ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <select name="type" class="form-select form-select-sm">
                                <option value="">All types</option>
                                @foreach ($types as $key => $label)
                                    <option value="{{ $key }}" @selected(($filters['type'] ?? '') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-select form-select-sm">
                                <option value="">All statuses</option>
                                <option value="active" @selected(($filters['status'] ?? '') === 'active')>Active</option>
                                <option value="disabled" @selected(($filters['status'] ?? '') === 'disabled')>Disabled</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-secondary btn-sm" type="submit">Filter</button>
                        </div>
                    </form>

                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Deposit</th>
                                    <th>Withdrawal</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($methods as $method)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($method->image_src)
                                                    <img src="{{ $method->image_src }}" alt="" style="width:36px;height:36px;object-fit:contain;" class="rounded border">
                                                @endif
                                                <strong>{{ $method->name }}</strong>
                                            </div>
                                            <small class="text-muted">{{ $method->active_fields_count }} field(s)</small>
                                        </td>
                                        <td><span class="badge bg-light text-dark border">{{ $method->type_label }}</span></td>
                                        <td>{!! $method->deposit_enabled ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                                        <td>{!! $method->withdrawal_enabled ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                                        <td>{!! $method->is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Disabled</span>' !!}</td>
                                        <td>{{ $method->sort_order }}</td>
                                        <td class="d-flex gap-1 flex-wrap">
                                            <a href="{{ route('admin_payment_methods.edit', $method) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form method="POST" action="{{ route('admin_payment_methods.toggle', $method) }}">
                                                @csrf
                                                <button class="btn btn-warning btn-sm" type="submit">{{ $method->is_active ? 'Disable' : 'Enable' }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin_payment_methods.destroy', $method) }}"
                                                onsubmit="return confirm('Delete {{ $method->name }}? Only possible when it has no transactions.');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" class="text-center text-muted">No payment methods found. <a href="{{ route('admin_payment_methods.create') }}">Add one</a>.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $methods->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
