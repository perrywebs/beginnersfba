@extends('layouts.users')

@section('content')
    <div class="pagetitle d-flex">
        <h5 class="text-dark mx-2 fw-bold"><i class="bi bi-shop"></i> SELLERS DASHBOARD </h5>
    </div>
    <x-error-message />
    @if (!auth()->user()->document || auth()->user()->document->status === 'rejected')
        <div class="alert alert-warning d-flex align-items-center p-3 rounded-3 shadow-sm">
            <i class="fas fa-user-shield fs-3 me-3 text-warning"></i>

            <div>
                <h6 class="mb-1 fw-bold">
                    {{ auth()->user()->document ? 'KYC Verification Rejected' : 'KYC Verification Required' }}
                </h6>

                <p class="mb-2 small">
                    @if (auth()->user()->document)
                        Your KYC verification was rejected. Please review your documents, upload valid copies, and submit
                        them again for verification.
                    @else
                        Complete your KYC verification to unlock all platform features, secure your account, and enable
                        deposits and withdrawals.
                    @endif
                </p>

                <a href="{{ route('user.profile') }}" class="btn btn-warning btn-sm text-white px-3">
                    {{ auth()->user()->document ? 'Resubmit KYC' : 'Complete KYC' }}
                </a>
            </div>
        </div>
    @endif
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-between text-dark mt-1 mb-3">
                    <div class="p-2 flex-fill text-center">
                        <h4><b>${{ format_number_shorthand(auth()->user()->account_bal) }}</b></h4>
                        <small>Balance</small>
                    </div>
                    <div class="p-2 flex-fill text-center">
                        <h4><b>{{ format_number_shorthand(auth()->user()->number_of_sales) }}</b></h4>
                        <small>Sales </small>
                    </div>
                    {{-- <div class="p-2 flex-fill text-center">
                    <h4><b>{{format_number_shorthand(auth()->user()->total_sales)}}</b></h4>
                    <small>Total Sales </small>
                </div> --}}
                    <div class="p-2 flex-fill text-center">
                        <h4><b>{{ format_number_shorthand(auth()->user()->total_product) }}</b></h4>
                        <small>Total Products </small>
                    </div>
                </div>
                <div class="flex-container-user">
                    <div class="flex-item-user">
                        <h6><b>Product</b></h6>
                        <br>
                        <p class="m-0"><b>USD</b></p>
                        <span>Last 30 days</span>
                    </div>
                    <div class="flex-item-user">
                        <h6><b><i class="bi bi-caret-down-fill me-2"></i> Last 30 Days</b></h6>
                        <br>
                        <p class="m-0 text-success"><b>+{{ auth()->user()->last_30_days }} %</b></p>
                        <span>Previous 30 days</span>
                    </div>
                    <div class="flex-item-user">
                        <h6><b><i class="bi bi-caret-down-fill me-2"></i> </b></h6>
                        <br>
                        <p class="m-0 text-success"><b>+{{ auth()->user()->last_year }} %</b></p>
                        <span>Last year</span>
                    </div>
                </div>
                {{-- <div class="col-12 mt-3 p-3">
                    <div class="card bg-transparent">
                        <div class="card-body">
                            <h5 class="card-title">Monthly Sales Chart</h5>

                            <canvas id="weeklyChart" style="width: 100%; height: auto; min-height: 300px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    let salesData = @json($salesData);
                                    let weekLabels = @json($weekLabels);

                                    new Chart(document.querySelector('#weeklyChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: weekLabels,
                                            datasets: [{
                                                label: 'Weekly Sales',
                                                data: salesData,
                                                backgroundColor: '#FF9B05',
                                                borderColor: '#0000',
                                                borderWidth: 1,
                                                barPercentage: 0.3, // Slim bars
                                                categoryPercentage: 0.5 // Adjust spacing
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                x: {
                                                    grid: {
                                                        display: false // Hide vertical grid lines
                                                    },
                                                    ticks: {
                                                        autoSkip: false
                                                    }
                                                },
                                                y: {
                                                    beginAtZero: true,
                                                    grid: {
                                                        drawBorder: false, // Optional: Hide axis border
                                                        color: "rgba(0, 0, 0, 0.1)" // Light grey for horizontal lines
                                                    },
                                                    ticks: {
                                                        callback: function(value) {
                                                            return value >= 1000 ? (value / 1000).toFixed(1) + 'K' : value;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                    });
                                });
                            </script>

                            <style>
                                @media (max-width: 768px) {
                                    #weeklyChart {
                                        height: 400px !important;
                                    }
                                }
                            </style>

                        </div>
                    </div>
                </div>

                <style>
                    /* Increase chart height for smaller screens */
                    @media (max-width: 768px) {
                        #barChart {
                            height: 400px !important;
                        }
                    }

                    #barChart {
                        height: 400px !important;
                    }
                </style> --}}

                <hr>
                <div class="row">
                    <div class="card">
                        <div class="row pt-3">
                            <div class="col-md-11">
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="{{ route('add_product') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-tags-fill mx-2"></i> Add a Product</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#viewSellingApplications" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-eye-fill mx-2"></i> View Selling Applications</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="{{ route('catalog') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-bag-check mx-2"></i> Manage Orders</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#manageReturns" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-bag-dash-fill mx-2"></i> Manage Returns</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-chat-left-fill mx-2"></i> Manage Caselogs</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-cart mx-2"></i> Manage Catalog</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="{{ route('affiliate_marketing') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-shop-window mx-2"></i> Affiliate Marketing</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 rounded-1 dash-link-row" style="border-bottom: 3px solid #c2c2c2 !important;">
                                            <a href="{{ route('transaction_history') }}" class="text-decoration-none text-dark d-flex justify-content-between align-items-center w-100">
                                                <div><i class="bi bi-credit-card mx-2"></i> Payments</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <livewire:user.fund-modal /> --}}

    <div class="modal fade" id="viewSellingApplications" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SELLING APPLICATIONS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Selling Platforms List -->
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/EBay_logo.svg" alt="eBay"
                            style="width: 40px; height: auto; margin-right: 15px;">
                        <span class="fs-5">eBay</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://cdn.worldvectorlogo.com/logos/shopify.svg" alt="Shopify"
                            style="width: 40px; height: auto; margin-right: 15px;">
                        <span class="fs-5">Shopify</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://cdn.worldvectorlogo.com/logos/walmart-1.svg" alt="Walmart"
                            style="width: 40px; height: auto; margin-right: 15px;">
                        <span class="fs-5">Walmart</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon"
                            style="width: 40px; height: auto; margin-right: 15px;">
                        <span class="fs-5">Amazon</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Vertically centered Modal -->

    <div class="modal fade" id="manageReturns" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h3> Returns : {{ auth()->user()->returns }}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Vertically centered Modal -->


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var copyButton = document.getElementById('copyButton');
            if (copyButton) {
                copyButton.addEventListener('click', function() {
                    var copyText = document.getElementById('copyAddress');
                    if (!copyText) return;

                    // Select the text field
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); // For mobile devices

                    // Copy the text inside the text field
                    document.execCommand("copy");

                    // Change button text to "Copied"
                    this.textContent = 'Copied';

                    // Optional: change the button text back to "Copy" after 3 seconds
                    setTimeout(() => {
                        this.textContent = 'Copy';
                    }, 3000);
                });
            }
        });
    </script>
@endsection
