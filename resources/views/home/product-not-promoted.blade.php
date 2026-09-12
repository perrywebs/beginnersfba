@extends('layouts.public-product')

@section('content')
<div class="pp-topbar">
    <div class="pp-topbar-inner">
        <a href="{{ route('home') }}" class="pp-logo">BeginnersFBA</a>
        <a href="{{ route('home') }}" class="pp-topbar-link">
            <i class="bi bi-house-fill"></i> Home
        </a>
    </div>
</div>

<div class="np-wrap">
    <div class="np-card">
        <div class="np-icon">
            <i class="bi bi-eye-slash"></i>
        </div>
        <h2>Product Not Promoted</h2>
        <p>This product is not currently available for public viewing.</p>
        <a href="{{ route('home') }}" class="np-btn">
            <i class="bi bi-arrow-left"></i> Return to homepage
        </a>
    </div>
</div>
@endsection
