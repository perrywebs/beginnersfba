@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Transfer</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Transfer</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="m-3">
    <button type="button" class="dash-back-btn" onclick="goBack()">
        <i class="bi bi-arrow-left"></i> Back
    </button>
</div>
<x-error-message textColor="text-white" />
<hr>
<section class="section">
    <div class="row">
        <livewire:user.withdrawal :withdrawals="$withdrawals"/>
    </div>
</section>
@endsection