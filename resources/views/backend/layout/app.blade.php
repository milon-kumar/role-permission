<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ setting('app_name') ?? config('app.name') }}@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/backend/images/favicon.ico">
    <!-- DataTables -->
    <link href="{{asset('/')}}assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/')}}assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/')}}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/backend/css/style.min.css" rel="stylesheet"/>
</head>

<body data-sidebar="dark" data-layout-mode="dark">
@include('sweetalert::alert')
<div id="layout-wrapper">
    @include('backend.includes.header')
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            @include('backend.includes.sidebar')
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            @yield('content')
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>


<!-- JAVASCRIPT -->
<script src="{{asset('/')}}assets/backend/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
<script src="{{asset('/')}}assets/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('/')}}assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/jszip/jszip.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('/')}}assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{asset('/')}}assets/backend/js/pages/datatables.init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('/')}}assets/backend/js/app.js"></script>
<script src="{{asset('/')}}assets/backend/js/index.js"></script>
@yield('script')
</body>
</html>
