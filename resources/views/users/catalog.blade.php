@extends('layouts.users')

@section('content')
<style>
    .catalog-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 12px;
    }
    .catalog-header h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
    }
    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 16px;
    }
    @media (max-width: 992px) {
        .catalog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 576px) {
        .catalog-grid {
            grid-template-columns: 1fr;
        }
    }
    .product-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    .product-card-image {
        position: relative;
        background: #f9f9f9;
        padding-top: 80%;
        overflow: hidden;
    }
    .product-card-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 12px;
        background: #fff;
    }
    .product-card-badge {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .badge-promoted {
        background: #d1e7dd;
        color: #0f5132;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        border: 1px solid #badbcc;
    }
    .badge-not-promoted {
        background: #f0f0f0;
        color: #777;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        border: 1px solid #e0e0e0;
    }
    .product-card-body {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .product-card-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: #1a1a1a;
        margin: 0 0 6px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.6em;
    }
    .product-card-price {
        font-size: 1.15rem;
        font-weight: 700;
        color: #00559d;
        margin-bottom: 8px;
    }
    .product-card-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .meta-item {
        font-size: 0.78rem;
        color: #888;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .meta-item i {
        font-size: 0.8rem;
        color: #999;
    }
    .stock-badge {
        display: inline-block;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .stock-in { background: #d4edda; color: #155724; }
    .stock-out { background: #f8d7da; color: #721c24; }
    .product-card-share {
        margin-top: auto;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
    }
    .share-section {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }
    .share-link {
        font-size: 0.78rem;
        color: #00559d;
        text-decoration: none;
        word-break: break-all;
        transition: color 0.2s;
        flex: 1;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .share-link:hover {
        color: #003d6e;
        text-decoration: underline;
    }
    .share-disabled {
        font-size: 0.78rem;
        color: #aaa;
        cursor: default;
    }
    .copy-btn {
        background: #00559d;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: 0.72rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .copy-btn:hover {
        background: #003d6e;
    }
    .copy-btn.copied {
        background: #198754;
    }
    .not-promoted-note {
        font-size: 0.72rem;
        color: #999;
        line-height: 1.4;
        margin-top: 4px;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #888;
    }
    .empty-state i {
        font-size: 3rem;
        color: #ddd;
        margin-bottom: 16px;
        display: block;
    }
    .empty-state h4 {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
    }
    .pagination-wrapper {
        margin-top: 30px;
        text-align: center;
    }
</style>

<div class="catalog-header">
    <div>
        <button type="button" class="dash-back-btn" onclick="window.history.back();">
            <i class="bi bi-arrow-left"></i> Back
        </button>
    </div>
    <h2>My Catalog</h2>
    <div></div>
</div>

<x-error-message />

@if($catalogs->count() > 0)
<div class="catalog-grid">
    @foreach($catalogs as $catalog)
    <div class="product-card">
        <div class="product-card-image">
            @php
                $products = json_decode($catalog->photos, true);
                $firstPhoto = (!empty($products) && is_array($products)) ? $products[0] : null;
            @endphp
            @if($firstPhoto)
                <img src="{{ asset('storage/' . $firstPhoto) }}" alt="{{ $catalog->productName }}">
            @else
                <div style="position:absolute;top:0;left:0;width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#ccc;">
                    <i class="bi bi-image" style="font-size:2.5rem;"></i>
                </div>
            @endif

            <div class="product-card-badge">
                @if($catalog->is_promoted)
                    <span class="badge-promoted"><i class="bi bi-globe"></i> Public</span>
                @else
                    <span class="badge-not-promoted"><i class="bi bi-lock"></i> Private</span>
                @endif
            </div>
        </div>

        <div class="product-card-body">
            <h3 class="product-card-name" title="{{ $catalog->productName }}">{{ $catalog->productName }}</h3>

            <div class="product-card-price">${{ number_format($catalog->price, 2) }}</div>

            <div class="product-card-meta">
                <span class="meta-item">
                    <i class="bi bi-box-seam"></i> {{ $catalog->productQuantity }} units
                </span>
                <span class="meta-item">
                    <i class="bi bi-shop"></i> {{ $catalog->ecommercePlatform }}
                </span>
                @if($catalog->soldInStock == 1)
                    <span class="stock-badge stock-in">In Stock</span>
                @else
                    <span class="stock-badge stock-out">Sold Out</span>
                @endif
            </div>

            <div class="product-card-share">
                @if($catalog->is_promoted && $catalog->slug)
                    <div class="share-section">
                        <a href="{{ route('product.show', $catalog->slug) }}"
                           target="_blank"
                           class="share-link"
                           title="{{ route('product.show', $catalog->slug) }}">
                            {{ route('product.show', $catalog->slug) }}
                        </a>
                        <button class="copy-btn"
                                onclick="copyShareLink(this, '{{ route('product.show', $catalog->slug) }}')"
                                title="Copy link">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                @else
                    <div>
                        <div class="share-disabled"><i class="bi bi-link-45deg"></i> Not promoted for visitors</div>
                        <div class="not-promoted-note">Enable visitor promotion to share this product publicly.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination-wrapper">
    {{ $catalogs->links() }}
</div>
@else
<div class="empty-state">
    <i class="bi bi-inbox"></i>
    <h4>No uploaded products yet</h4>
    <p>Your approved products will appear here.</p>
</div>
@endif

<script>
function copyShareLink(btn, url) {
    navigator.clipboard.writeText(url).then(function() {
        var originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check2"></i> Copied';
        btn.classList.add('copied');
        setTimeout(function() {
            btn.innerHTML = originalHTML;
            btn.classList.remove('copied');
        }, 2000);
    }).catch(function() {
        var textarea = document.createElement('textarea');
        textarea.value = url;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        var originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check2"></i> Copied';
        btn.classList.add('copied');
        setTimeout(function() {
            btn.innerHTML = originalHTML;
            btn.classList.remove('copied');
        }, 2000);
    });
}
</script>
@endsection
