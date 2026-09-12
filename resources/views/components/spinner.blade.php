@props(['size' => 'default'])

@php
    $sizeClasses = [
        'sm' => 'w-4 h-4',
        'default' => 'w-5 h-5',
        'lg' => 'w-6 h-6'
    ];
@endphp

<div {{ $attributes->merge(['class' => "spinner {$sizeClasses[$size]}"]) }}>
    <div class="spinner-inner"></div>
</div>

<style>
    .spinner {
        display: inline-block;
        position: relative;
        vertical-align: middle;
    }

    .spinner-inner {
        width: 100%;
        height: 100%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>