<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

      <head>

            <meta charset="utf-8" />
            <title>Lions International | Dashboard</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="lionsinternational" name="author" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

            <!-- plugin css -->
            <link href="{{ asset('') }}assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

            @stack('vendor-style')

            <!-- Layout config Js -->
            <script src="{{ asset('') }}assets/js/layout.js"></script>
            <!-- Bootstrap Css -->
            <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
            <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
            <!-- App Css-->
            <link href="{{ asset('') }}assets/css/app.min.css" rel="stylesheet" type="text/css" />
            <!-- custom Css-->
            <link href="{{ asset('') }}assets/css/custom.min.css" rel="stylesheet" type="text/css" />

            <!-- In your layouts/master.blade.php -->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

      </head>

      <body>

            @include('layouts.header')

            @include('layouts.sidebar')

            <!-- Begin page -->
            <div id="layout-wrapper">
                  <div class="main-content">
                        <div class="page-content">
                              <div class="container-fluid">
                                    @yield('content')
                              </div>
                        </div>
                  </div>
            </div>


            @include('layouts.footer')

            <!-- JAVASCRIPT -->
            <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
            <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
            <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>
            <script src="{{ asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
            <script src="{{ asset('') }}assets/js/plugins.js"></script>

            <!-- apexcharts -->
            <script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

            @stack('vendor-script')
            @stack('page-script')

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link  href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

            <!-- App js -->
            <script src="{{ asset('') }}assets/js/app.js"></script>
      </body>

</html>
