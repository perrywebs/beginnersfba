<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Product' }} | BeginnersFBA</title>

    {{-- Favicon: product image or fallback --}}
    @if(!empty($productImage))
        <link rel="icon" type="image/png" href="{{ $productImage }}">
        <link rel="apple-touch-icon" href="{{ $productImage }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('homeAssets/images/favicon.png') }}">
    @endif

    {{-- Canonical --}}
    @if(!empty($canonicalUrl))
        <link rel="canonical" href="{{ $canonicalUrl }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $pageTitle ?? 'Product' }}">
    <meta property="og:description" content="{{ $metaDescription ?? '' }}">
    <meta property="og:url" content="{{ $canonicalUrl ?? url()->current() }}">
    <meta property="og:site_name" content="BeginnersFBA">
    @if(!empty($productImage))
        <meta property="og:image" content="{{ $productImage }}">
        <meta property="og:image:width" content="600">
        <meta property="og:image:height" content="600">
        <meta property="og:image:type" content="image/png">
    @endif

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle ?? 'Product' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? '' }}">
    @if(!empty($productImage))
        <meta name="twitter:image" content="{{ $productImage }}">
    @endif

    {{-- JSON-LD --}}
    @if(!empty($jsonLd))
        <script type="application/ld+json">{!! $jsonLd !!}</script>
    @endif

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f7;
            color: #1d1d1f;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        /* ── Top bar ── */
        .pp-topbar {
            background: #fff;
            border-bottom: 1px solid #e5e5e7;
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .pp-topbar-inner {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .pp-logo {
            font-size: 1.05rem;
            font-weight: 700;
            color: #00559d;
            text-decoration: none;
            letter-spacing: -0.3px;
        }
        .pp-logo:hover { opacity: 0.8; }
        .pp-topbar-link {
            font-size: 0.82rem;
            color: #666;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: color 0.2s;
        }
        .pp-topbar-link:hover { color: #00559d; }

        /* ── Main layout ── */
        .pp-main {
            max-width: 1120px;
            margin: 0 auto;
            padding: 40px 24px 60px;
        }
        .pp-grid {
            display: flex;
            gap: 48px;
            align-items: flex-start;
        }
        .pp-gallery {
            flex: 1 1 50%;
            min-width: 0;
            position: sticky;
            top: 80px;
        }
        .pp-info {
            flex: 1 1 50%;
            min-width: 0;
        }

        /* ── Gallery ── */
        .pp-main-img-wrap {
            width: 100%;
            aspect-ratio: 1 / 1;
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e5e5e7;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 16px;
        }
        .pp-main-img-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            padding: 24px;
            transition: opacity 0.25s ease;
        }
        .pp-thumbs {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .pp-thumb {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            border: 2px solid transparent;
            overflow: hidden;
            cursor: pointer;
            background: #fff;
            border: 1px solid #e5e5e7;
            transition: border-color 0.2s, box-shadow 0.2s;
            flex-shrink: 0;
        }
        .pp-thumb:hover, .pp-thumb.active {
            border-color: #00559d;
            box-shadow: 0 0 0 3px rgba(0,85,157,0.12);
        }
        .pp-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 4px;
        }
        .pp-no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #ccc;
            font-size: 3rem;
        }

        /* ── Product info ── */
        .pp-title {
            font-size: 1.85rem;
            font-weight: 700;
            color: #1d1d1f;
            line-height: 1.25;
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }
        .pp-price {
            font-size: 2.1rem;
            font-weight: 700;
            color: #00559d;
            margin-bottom: 28px;
        }
        .pp-divider {
            border: none;
            border-top: 1px solid #e5e5e7;
            margin: 0 0 24px;
        }
        .pp-section-label {
            font-size: 0.72rem;
            font-weight: 600;
            color: #86868b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 14px;
        }
        .pp-meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 28px;
            margin-bottom: 28px;
        }
        .pp-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .pp-meta-item i {
            color: #00559d;
            font-size: 1rem;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .pp-meta-label {
            font-size: 0.78rem;
            color: #86868b;
        }
        .pp-meta-value {
            font-size: 0.92rem;
            color: #1d1d1f;
            font-weight: 500;
        }
        .pp-desc {
            color: #424245;
            line-height: 1.75;
            font-size: 0.95rem;
            white-space: pre-line;
        }
        .pp-seller {
            background: #f5f5f7;
            border: 1px solid #e5e5e7;
            border-radius: 12px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .pp-seller-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #00559d;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            font-weight: 600;
            flex-shrink: 0;
        }
        .pp-seller-name {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1d1d1f;
        }
        .pp-seller-label {
            font-size: 0.78rem;
            color: #86868b;
        }

        /* ── Stock badge ── */
        .pp-stock {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 600;
        }
        .pp-stock-in { background: #d4edda; color: #155724; }
        .pp-stock-out { background: #f8d7da; color: #721c24; }

        /* ── Footer ── */
        .pp-footer {
            text-align: center;
            padding: 32px 24px 40px;
            font-size: 0.82rem;
            color: #86868b;
        }
        .pp-footer a {
            color: #00559d;
            text-decoration: none;
        }
        .pp-footer a:hover { text-decoration: underline; }

        /* ── Not-promoted state ── */
        .np-wrap {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
        }
        .np-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e5e5e7;
            padding: 56px 44px;
            text-align: center;
            max-width: 440px;
            width: 100%;
        }
        .np-icon {
            width: 72px;
            height: 72px;
            background: #f5f5f7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
        }
        .np-icon i { font-size: 1.8rem; color: #86868b; }
        .np-card h2 { font-size: 1.2rem; font-weight: 700; margin-bottom: 10px; }
        .np-card p { color: #666; line-height: 1.65; margin-bottom: 32px; font-size: 0.92rem; }
        .np-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #00559d;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
        }
        .np-btn:hover { background: #003d6e; color: #fff; transform: translateY(-1px); }

        /* ── Responsive ── */
        @media (max-width: 900px) {
            .pp-grid { flex-direction: column; gap: 32px; }
            .pp-gallery { position: static; }
        }
        @media (max-width: 600px) {
            .pp-main { padding: 24px 16px 40px; }
            .pp-title { font-size: 1.35rem; }
            .pp-price { font-size: 1.6rem; }
            .pp-meta-grid { grid-template-columns: 1fr; gap: 12px; }
            .pp-seller { flex-direction: column; text-align: center; }
            .pp-main-img-wrap { border-radius: 12px; }
            .np-card { margin: 0 8px; padding: 44px 24px; }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
