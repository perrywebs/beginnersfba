<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{env('APP_NAME')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('homeAssets/images/favicon.png') }}" rel="shortcut icon"
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
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center" style="height: 200px">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ URL('homeAssets/images/logo.png') }}" alt="Profile"
                            class="">
                        <i class="bi bi-chevron-down ms-2 pt-3"></i>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{auth()->user()->email}}</h6>
                            <span></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
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
    <livewire:admin.sidebar />
    <!-- End Sidebar-->


    <!-- content goes here -->
    <main id="main" class="main">
        @yield('content')
    </main>


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
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                var button = event.target.closest('.confirm');
                if (!button) return;

                var result = confirm("Are you sure you want to take this action?");
                if (!result) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });
        });
    </script>

</body>

</html>