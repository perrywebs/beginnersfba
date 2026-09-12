<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showBySlug($slug)
    {
        $product = AddProduct::with('user')
            ->where('slug', $slug)
            ->where('is_promoted', true)
            ->where('status', 2)
            ->first();

        if (!$product) {
            return view('home.product-not-promoted');
        }

        $photos = json_decode($product->photos, true);
        $photos = $photos ?? [];

        $pageTitle = $product->productName . ' | BeginnersFBA';
        $firstImage = !empty($photos) ? asset('storage/' . $photos[0]) : null;
        $productUrl = route('product.show', $product->slug);
        $description = $product->productDescription
            ? mb_strimwidth(strip_tags($product->productDescription), 0, 160, '...')
            : $product->productName;

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->productName,
            'description' => $product->productDescription ?? $product->productName,
            'url' => $productUrl,
            'image' => $firstImage,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'BeginnersFBA',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => $product->price,
                'priceCurrency' => 'USD',
                'availability' => $product->soldInStock == 1
                    ? 'https://schema.org/InStock'
                    : 'https://schema.org/OutOfStock',
                'url' => $productUrl,
            ],
        ];

        if ($product->user) {
            $jsonLd['seller'] = [
                '@type' => 'Organization',
                'name' => $product->user->name,
            ];
        }

        return view('home.product-detail', [
            'product' => $product,
            'photos' => $photos,
            'pageTitle' => $pageTitle,
            'productImage' => $firstImage,
            'canonicalUrl' => $productUrl,
            'metaDescription' => $description,
            'jsonLd' => json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        ]);
    }

    public function showById($id)
    {
        $product = AddProduct::with('user')
            ->where('id', $id)
            ->where('is_promoted', true)
            ->where('status', 2)
            ->first();

        if (!$product) {
            return view('home.product-not-promoted');
        }

        if ($product->slug) {
            return redirect()->route('product.show', $product->slug, 301);
        }

        $photos = json_decode($product->photos, true);
        $photos = $photos ?? [];

        $pageTitle = $product->productName . ' | BeginnersFBA';
        $firstImage = !empty($photos) ? asset('storage/' . $photos[0]) : null;
        $productUrl = url()->current();
        $description = $product->productDescription
            ? mb_strimwidth(strip_tags($product->productDescription), 0, 160, '...')
            : $product->productName;

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->productName,
            'description' => $product->productDescription ?? $product->productName,
            'url' => $productUrl,
            'image' => $firstImage,
            'brand' => [
                '@type' => 'Brand',
                'name' => 'BeginnersFBA',
            ],
            'offers' => [
                '@type' => 'Offer',
                'price' => $product->price,
                'priceCurrency' => 'USD',
                'availability' => $product->soldInStock == 1
                    ? 'https://schema.org/InStock'
                    : 'https://schema.org/OutOfStock',
                'url' => $productUrl,
            ],
        ];

        if ($product->user) {
            $jsonLd['seller'] = [
                '@type' => 'Organization',
                'name' => $product->user->name,
            ];
        }

        return view('home.product-detail', [
            'product' => $product,
            'photos' => $photos,
            'pageTitle' => $pageTitle,
            'productImage' => $firstImage,
            'canonicalUrl' => $productUrl,
            'metaDescription' => $description,
            'jsonLd' => json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
        ]);
    }
}
