@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Affiliate Ads Promotion</h1>
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
<div class="row">
    <img src="{{asset('assets/img/affiliate.jpg')}}" height="280" alt="Affiliate" srcset="">
</div>
<hr>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Your Product</h5>
                    <div class="card">
                        <livewire:user.affiliate_marketing />
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection