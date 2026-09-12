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

<div class="pp-main">
    <div class="pp-grid">
        {{-- Gallery --}}
        <div class="pp-gallery">
            @if(!empty($photos))
                <div class="pp-main-img-wrap">
                    <img id="ppMainImg"
                         src="{{ asset('storage/' . $photos[0]) }}"
                         alt="{{ $product->productName }}">
                </div>
                @if(count($photos) > 1)
                    <div class="pp-thumbs">
                        @foreach($photos as $i => $photo)
                            <div class="pp-thumb {{ $i === 0 ? 'active' : '' }}"
                                 onclick="ppChangeImage('{{ asset('storage/' . $photo) }}', this)">
                                <img src="{{ asset('storage/' . $photo) }}" alt="Thumbnail {{ $i + 1 }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="pp-main-img-wrap">
                    <div class="pp-no-image">
                        <i class="bi bi-image"></i>
                    </div>
                </div>
            @endif
        </div>

        {{-- Info --}}
        <div class="pp-info">
            <h1 class="pp-title">{{ $product->productName }}</h1>

            <div class="pp-price">${{ number_format($product->price, 2) }}</div>

            <hr class="pp-divider">

            <div class="pp-section-label">Product Details</div>
            <div class="pp-meta-grid">
                <div class="pp-meta-item">
                    <i class="bi bi-shop"></i>
                    <div>
                        <div class="pp-meta-label">Platform</div>
                        <div class="pp-meta-value">{{ $product->ecommercePlatform }}</div>
                    </div>
                </div>
                <div class="pp-meta-item">
                    <i class="bi bi-calendar3"></i>
                    <div>
                        <div class="pp-meta-label">Listed</div>
                        <div class="pp-meta-value">{{ date('M d, Y', strtotime($product->created_at)) }}</div>
                    </div>
                </div>
                <div class="pp-meta-item">
                    <i class="bi bi-box-seam"></i>
                    <div>
                        <div class="pp-meta-label">Quantity</div>
                        <div class="pp-meta-value">{{ $product->productQuantity }} units</div>
                    </div>
                </div>
                <div class="pp-meta-item">
                    <div>
                        <div class="pp-meta-label">Availability</div>
                        @if($product->soldInStock == 1)
                            <span class="pp-stock pp-stock-in"><i class="bi bi-check-circle-fill"></i> In Stock</span>
                        @else
                            <span class="pp-stock pp-stock-out"><i class="bi bi-x-circle-fill"></i> Sold Out</span>
                        @endif
                    </div>
                </div>
            </div>

            @if($product->productDescription)
                <hr class="pp-divider">
                <div class="pp-section-label">Description</div>
                <div class="pp-desc">{{ $product->productDescription }}</div>
            @endif

            @if($product->user)
                <hr class="pp-divider">
                <div class="pp-section-label">Seller</div>
                <div class="pp-seller">
                    <div class="pp-seller-avatar">
                        {{ strtoupper(substr($product->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="pp-seller-name">{{ $product->user->name }}</div>
                        <div class="pp-seller-label">Seller</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="pp-footer">
    &copy; {{ date('Y') }} <a href="{{ route('home') }}">BeginnersFBA</a>. All rights reserved.
</div>

<script>
function ppChangeImage(src, thumb) {
    var img = document.getElementById('ppMainImg');
    img.style.opacity = '0';
    setTimeout(function() {
        img.src = src;
        img.style.opacity = '1';
    }, 180);
    document.querySelectorAll('.pp-thumb').forEach(function(t) { t.classList.remove('active'); });
    thumb.classList.add('active');
}
</script>
@endsection
