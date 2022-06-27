<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
    <style>
        .costume-outline {
            border: 2px solid #AEDBCE;
        }
    </style>
</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>Hallo! Selamat Datang</h4>
                            <h6 class="font-weight-light" style="margin-bottom: 30px">Login Untuk Lanjut.</h6>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('statusErr'))
                                <div class="alert alert-danger">
                                    {{ session('statusErr') }}
                                </div>
                            @endif
                            <form class="pt-3" method="POST" action="{{ route('auth.process') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="username"
                                        class="form-control form-control-lg costume-outline" id=""
                                        placeholder="Username">
                                    @error('username')
                                        <small class="text-alert">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password"
                                        class="form-control form-control-lg costume-outline" id=""
                                        placeholder="Password">
                                    @error('password')
                                        <small class="text-alert">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
</body>

</html>
