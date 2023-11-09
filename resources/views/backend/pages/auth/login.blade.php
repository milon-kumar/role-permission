<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 08:56:13 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Login 2 | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/backend/images/favicon.ico">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('/')}}assets/backend/libs/owl.carousel/{{asset('/')}}assets/backend/owl.carousel.min.css">

    <link rel="stylesheet" href="{{asset('/')}}assets/backend/libs/owl.carousel/{{asset('/')}}assets/backend/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/')}}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
<div>
    <div class="container-fluid p-0">
        <div class="row g-0">

            <div class="col-xl-9">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                        <div class="bg-overlay"></div>
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="display-5 fw-bolder">Role Permission management</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5">
                                <a href="index.html" class="d-block auth-logo">
                                    <img src="{{asset('/')}}assets/backend/images/logo-dark.png" alt="" height="18" class="auth-logo-dark">
                                    <img src="{{asset('/')}}assets/backend/images/logo-light.png" alt="" height="18" class="auth-logo-light">
                                </a>
                            </div>
                            <div class="my-auto">

                                <div>
                                    <h5 class="text-primary">Welcome Back !</h5>
                                </div>
                                <div class="mt-4">
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="username" placeholder="Enter Email Address">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                                                @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('/')}}assets/backend/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/node-waves/waves.min.js"></script>

<!-- owl.carousel js -->
<script src="{{asset('/')}}assets/backend/libs/owl.carousel/owl.carousel.min.js"></script>

<!-- auth-2-carousel init -->
<script src="{{asset('/')}}assets/backend/js/pages/auth-2-carousel.init.js"></script>

<!-- App js -->
<script src="{{asset('/')}}assets/backend/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jul 2023 08:56:13 GMT -->
</html>
