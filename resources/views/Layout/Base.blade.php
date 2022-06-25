<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Spica Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.css"
        integrity="sha256-AAqx1xXi9Bf0sAjL1wva6EMJ2z+rtAeSNSRRqVpN8cw=" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <style>
        .costume-outline {
            border: 2px solid #AEDBCE;
        }
    </style>
</head>

<body>
    <div class="container-scroller d-flex">
        @include('Layout.Sidebar')
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="navbar-brand-wrapper">
                        <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images/logo.svg') }}"
                                alt="logo"></a>
                        <a class="navbar-brand brand-logo-mini" href="#"><img src="../../images/logo-mini.svg"
                                alt="logo"></a>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Sistem Informasi Desa</h4>
                    <ul class="navbar-nav navbar-nav-right">

                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name">{{ Auth::user()->nama }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                    bootstrapdash.com 2020</span>
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed
                                    By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                        href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                        templates</a> from Bootstrapdash.com</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="modal fade" id="modal-univ">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <form id="form-univ" action="" enctype="multipart/form-data">
                                    @csrf
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btnUpdate" class="btn btn-primary">Proses</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.js"
        integrity="sha256-5fTxrI0C59yjHqwVoE/140DZIq/FVIm+f634AN9a/W8=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    @yield('script')
</body>

</html>