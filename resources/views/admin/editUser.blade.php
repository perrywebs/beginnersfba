@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Admin Dashboard | Edit User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>
</div>
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('admin_dashboard')}}'"><i
            class="bi bi-house"></i>
        Back </button>
</div>
<x-error-message textColor="text-dark" />
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="row">
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Acount Balance</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>${{format_number_shorthand($user->account_bal,2) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Sales <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$user->number_of_sales }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                {{-- <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Sales <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart text-warning"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$user->total_sales}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card --> --}}
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Product <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag-check-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$user->total_product}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
            </div>
            <hr>
            <livewire:admin.edit-user-account :user_data="$user" />
            <hr>
            <livewire:admin.edit-user-withdrawal-codes :user_data="$user" />
            <hr>
            <livewire:admin.transactions :user_data="$user" />
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Affilates Product Uploads</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Link</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Description</th>
                                    <th scope="col">Ecomerce Plateform</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($affiliates as $item => $affiliate)
                                <tr>
                                    <td>{{$item+1}}</td>
                                    <td>{{ date("Y M d", strtotime($affiliate->created_at))}}</td>
                                    <td>
                                        <a href="{{asset('storage/'.$affiliate->product_image)}}" target="blank">
                                            <span class="badge rounded-pill bg-primary">
                                                <i class="ri-eye-line"></i>
                                                View image
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{$affiliate->product_link}}</td>
                                    <td>${{$affiliate->product_price}}</td>
                                    <td>{{$affiliate->product_description}}</td>
                                    <td>{{$affiliate->ecommerce_platform}}</td>
                                </tr>
                                @empty
                                <tr></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- End Table with stripped rows -->

                </div>
            </div>
            <livewire:admin.upload-product :add_products="$add_products" :user="$user" />
            <livewire:admin.k-y-c :add_products="$add_products" :user="$user" />
        </div>
    </div>
</section>


@endsection