@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Recharge</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Recharge</li>
        </ol>
    </nav>
</div>
<div class="m-3">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Choose how you want to pay</h5>

                    <form method="GET" action="{{ route('recharge.index') }}" class="row g-2 mb-4">
                        <div class="col-md-4">
                            <select name="type" class="form-select" onchange="this.form.submit()">
                                <option value="">All categories</option>
                                @foreach ($types as $key => $label)
                                    <option value="{{ $key }}" @selected(($filters['type'] ?? '') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control" placeholder="Search payment methods..."
                                value="{{ $filters['search'] ?? '' }}">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button class="btn btn-primary btn-sm" type="submit">Search</button>
                        </div>
                    </form>

                    @if ($methods->isEmpty())
                        <div class="alert alert-info">No payment methods are available right now. Please try again later.</div>
                    @else
                        <div class="row">
                            @foreach ($methods as $method)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <a href="{{ route('recharge.show', $method) }}" class="text-decoration-none text-dark">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body text-center">
                                                @if ($method->image_src)
                                                    <img src="{{ $method->image_src }}" alt="{{ $method->name }}"
                                                        class="img-fluid rounded mb-2" style="max-height:90px;object-fit:contain;">
                                                @endif
                                                <h6 class="fw-bold mb-1">{{ $method->name }}</h6>
                                                <span class="badge bg-light text-dark border mb-2">{{ $method->type_label }}</span>
                                                @if ($method->description)
                                                    <p class="small text-muted mb-0">{{ \Illuminate\Support\Str::limit($method->description, 90) }}</p>
                                                @endif
                                                @if ($method->min_deposit || $method->max_deposit)
                                                    <p class="small text-muted mt-2 mb-0">
                                                        @if ($method->min_deposit)Min: ${{ number_format((float) $method->min_deposit, 2) }}@endif
                                                        @if ($method->min_deposit && $method->max_deposit) · @endif
                                                        @if ($method->max_deposit)Max: ${{ number_format((float) $method->max_deposit, 2) }}@endif
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="card-footer bg-transparent text-center">
                                                <span class="btn btn-primary btn-sm">Continue <i class="bi bi-arrow-right"></i></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
