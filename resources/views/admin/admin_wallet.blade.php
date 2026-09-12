@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Admin Dashboard | All Wallets</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">All Wallets</li>
        </ol>
    </nav>
</div>
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin_dashboard')}}'">
        <i class="bi bi-house"></i>
        Back
    </button>
</div>
<x-error-message />
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All wallet addresses</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">Bitcoin</th> --}}
                                    <th scope="col">USDT</th>
                                    {{-- <th scope="col">Ethereum</th> --}}
                                    <th scope="col">PayPal</th>
                                    <th scope="col">Cash App</th>
                                    {{-- <th scope="col">MoneyGram</th> --}}
                                    {{-- <th scope="col">Western Unoin</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>{{$admin_wallets->bitcoin ?? "empty"}}</td> --}}
                                    <td>{{$admin_wallets->usdt ?? "empty"}}</td>
                                    {{-- <td>{{$admin_wallets->ethereum ?? "empty"}}</td> --}}
                                    <td>{{$admin_wallets->pay_pal ?? "empty"}}</td>
                                    <td>{{$admin_wallets->cash_app ?? "empty"}}</td>
                                    {{-- <td>{{$admin_wallets->money_gram ?? "empty"}}</td> --}}
                                    {{-- <td>{{$admin_wallets->western_union ?? "empty"}}</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
            <div class="card">
                <livewire:admin.admin-wallet />
            </div>
        </div>
    </div>
</section>
@endsection