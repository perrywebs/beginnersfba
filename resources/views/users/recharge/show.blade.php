@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Recharge via {{ $method->name }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('recharge.index') }}">Recharge</a></li>
            <li class="breadcrumb-item active">{{ $method->name }}</li>
        </ol>
    </nav>
</div>
<div class="m-3 d-flex gap-2">
    <a href="{{ route('recharge.index') }}" class="dash-back-btn"><i class="bi bi-arrow-left"></i> All methods</a>
</div>

<x-error-message />

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Submit your recharge</h5>

                    <form method="POST" action="{{ route('recharge.store', $method) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-3">
                            <label for="amount" class="form-label">Amount (USD) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" min="0" name="amount" id="amount"
                                    class="form-control" value="{{ old('amount') }}" required
                                    placeholder="@if($method->min_deposit)Min ${{ number_format((float) $method->min_deposit, 2) }}@else Enter amount @endif">
                            </div>
                            @error('amount')
                                <em class="text-danger">{{ $message }}</em>
                            @enderror
                        </div>

                        @include('components.payment-fields', ['fields' => $fields])

                        <div class="col-12 mb-3">
                            <label for="proof" class="form-label">Upload Payment Proof <span class="text-danger">*</span></label>
                            <input type="file" name="proof" id="proof" class="form-control"
                                accept=".jpg,.jpeg,.png,.webp,.pdf" required>
                            <small class="form-text text-muted">Screenshot, receipt or transfer confirmation (JPG, PNG, WEBP or PDF, max 5MB).</small>
                            @error('proof')
                                <em class="text-danger d-block">{{ $message }}</em>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary px-4">Submit Recharge</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $method->name }}</h5>
                    @if ($method->image_src)
                        <img src="{{ $method->image_src }}" alt="{{ $method->name }}" class="img-fluid rounded mb-3"
                            style="max-height:200px;object-fit:contain;">
                    @endif
                    <p><span class="badge bg-light text-dark border">{{ $method->type_label }}</span></p>
                    @if ($method->description)
                        <p class="small text-muted">{{ $method->description }}</p>
                    @endif
                    @if ($method->min_deposit || $method->max_deposit)
                        <p class="small">
                            @if ($method->min_deposit)<span class="badge bg-info">Min: ${{ number_format((float) $method->min_deposit, 2) }}</span>@endif
                            @if ($method->max_deposit)<span class="badge bg-secondary">Max: ${{ number_format((float) $method->max_deposit, 2) }}</span>@endif
                        </p>
                    @endif
                </div>
            </div>

            @if ($method->instructions)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Instructions</h5>
                        <p class="small" style="white-space:pre-line;">{{ $method->instructions }}</p>
                    </div>
                </div>
            @endif

            @if ($fields->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Details</h5>
                        <ul class="list-group list-group-flush small">
                            @foreach ($fields as $field)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>{{ $field->label }}</span>
                                    <span class="text-muted">{{ $field->type === 'select' ? implode(', ', $field->options_list) : (\App\Models\PaymentMethod::FIELD_TYPES[$field->type] ?? $field->type) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
