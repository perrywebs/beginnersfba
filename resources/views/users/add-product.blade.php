@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Add a Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Add a Product</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
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
                    <h5 class="card-title">Add a Product</h5>
                    <livewire:user.add-a-product />
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products Lists</h5>
                    <div class="table-responsive table-responsive-x">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Ecommerce Platform</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($add_products as $item => $add_product)
                                <tr>
                                    <th scope="row">{{$item+1}}</th>
                                    <td>
                                        @if ($add_product->status == 1)
                                            <span class="badge rounded-pill bg-info p-2">
                                                {{ config('app.add_product_status')[$add_product->status] }}
                                            </span>
                                        @elseif ($add_product->status == 2)
                                            <span class="badge rounded-pill bg-success p-2">{{ config('app.add_product_status')[$add_product->status] }}</span>
                                        @elseif ($add_product->status == 3)
                                            <span class="badge rounded-pill bg-danger p-2">{{ config('app.add_product_status')[$add_product->status] }}</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger p-2">ERROR Status Unknown :)</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{$add_product->productName}}</td>
                                    <td>{{$add_product->productQuantity}}</td>
                                    <td>${{$add_product->price}}</td>
                                    <td>{{$add_product->ecommercePlatform}}</td>
                                </tr>
                                @empty
                                <tr>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>
@endsection