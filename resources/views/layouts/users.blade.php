<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{env('APP_NAME')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('homeAssets/images/favicon.png')}}" rel="shortcut icon"
        type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL('assets/css/style.css') }}" rel="stylesheet">

    <style>
        * {
            /* font-size: 20px; */
        }

        .table-responsive-x {
            overflow-x: auto;
        }

        .flex-container-user {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .flex-item-user {
            flex: 1;
            /* margin: 5px; */
            padding: 5px;
            text-align: center;
            border: none;
            background-color: #f8f9fa;
        }

        /* Dashboard preloader */
        #dashboard-preloader {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            max-height: 100vh !important;
            background: #fff;
            z-index: 99999;
            display: flex;
            align-items: center !important;
            justify-content: center !important;
            flex-direction: column;
            transition: opacity 0.4s ease;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden !important;
        }
        #dashboard-preloader.preloader-hidden {
            display: none !important;
            pointer-events: none !important;
        }
        #dashboard-preloader img {
            max-width: 180px;
            width: 180px;
            height: auto;
            flex-shrink: 0;
            animation: dashPreloaderPulse 1.2s ease-in-out infinite;
        }
        @keyframes dashPreloaderPulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
        }

        /* Dashboard link rows - light orange accent */
        .dash-link-row {
            border-bottom: 3px solid #f5d5b0 !important;
            transition: background 0.2s ease, padding-left 0.2s ease;
            margin-left: 8px;
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 6px;
        }
        .dash-link-row:last-child {
            border-bottom: 1px solid #f5d5b0 !important;
        }
        .dash-link-row:hover {
            background-color: #fef8f2;
        }
        .dash-link-row:hover .text-dark {
            color: #00559d !important;
        }

        /* Dashboard back button */
        .dash-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #fff;
            color: #555;
            border: 1px solid #dde1e6;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, border-color 0.2s, color 0.2s;
            cursor: pointer;
            line-height: 1.4;
        }
        .dash-back-btn:hover {
            background: #f0f4f8;
            border-color: #00559d;
            color: #00559d;
        }
        .dash-back-btn i {
            font-size: 0.9rem;
        }
        @media (max-width: 768px) {
            .flex-container-user {
                flex-direction: column;
                gap: 8px;
            }
            .flex-item-user {
                flex: none;
                width: 100%;
            }
            .main {
                padding-left: 4px !important;
                padding-right: 4px !important;
                overflow-x: hidden;
            }
            #main .row {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
    @livewireStyles
</head>

<body>

    <!-- Dashboard Preloader -->
    <div id="dashboard-preloader">
        <img src="{{ asset('homeAssets/images/preloadimg.png') }}" alt="Loading...">
    </div>
    <script>
        (function() {
            var preloader = document.getElementById('dashboard-preloader');
            if (preloader) {
                function hidePreloader() {
                    preloader.style.opacity = '0';
                    setTimeout(function() {
                        preloader.classList.add('preloader-hidden');
                        preloader.style.pointerEvents = 'none';
                        setTimeout(function() {
                            if (preloader.parentNode) {
                                preloader.parentNode.removeChild(preloader);
                            }
                        }, 500);
                    }, 400);
                }
                window.addEventListener('load', function() {
                    setTimeout(hidePreloader, 300);
                });
                setTimeout(hidePreloader, 8000);
            }
        })();
    </script>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center" style="height: 200px">
                <span class="d-none d-lg-block">DASHBOARD</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <div class="d-flex align-items-center ms-5">
                <img src="{{ URL('homeAssets/images/logo.png') }}" alt="seller logo"
                    style="width: 150px; vertical-align: middle; border-radius: 20%;">
                {{-- <span class="fw-bold m-2">SELLERS DASHBOARD</span> --}}
            </div>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0 text-dark" href="#"
                        data-bs-toggle="dropdown">
                        <span class="m-1"><i class="bi bi-gear"></i></span>
                        <i class="bi bi-chevron-down me-2 fw-bold"></i>
                    </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->email }}</h6>
                            <span></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <div class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-person-circle"></i>
                                <a class="btn" href="{{ route('user.profile') }}">Profile Settings </a>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-item d-flex align-items-center">
                                {{-- sign out --}}
                                <livewire:user.logout />
                            </div>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <livewire:user.sidebar />
    <!-- End Sidebar-->


    <!-- content goes here -->
    <main id="main" class="main p-2">
        @yield('content')
    </main>
    
    <livewire:user.fund-modal />

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>{{env('APP_NAME')}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- live chat -->
    {{-- <script id="chatway" async="true" src="https://cdn.chatway.app/widget.js?id=09fTEhjKN73h"></script> --}}

    <!-- Vendor JS Files -->
    <script src="{{ URL('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ URL('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL('assets/js/main.js') }}"></script>
    <script>
        function navigateToDashboard(event) {
            event.preventDefault();
            window.location.href = "{{ route('dashboard') }}";
        }
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = "{{ route('dashboard') }}";
            }
        }
    </script>
    @livewireScripts
</body>

</html>
