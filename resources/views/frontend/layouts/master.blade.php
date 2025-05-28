<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
      <head>
            <meta charset="utf-8" />
            <title>##Lions Clubs International</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="Themesbrand" name="author" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">



            <!-- Icon Font Stylesheet -->
            <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/all.css"/>
            <link href="{{ asset('frontend-assets') }}/css/bootstrap-icons.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link rel="stylesheet" href="{{ asset('frontend-assets') }}/lib/animate/animate.min.css"/>
            <link href="{{ asset('frontend-assets') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
            <link href="{{ asset('frontend-assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


            <!-- Customized Bootstrap Stylesheet -->
            <link href="{{ asset('frontend-assets') }}/css/bootstrap.min.css" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="{{ asset('frontend-assets') }}/css/style.css" rel="stylesheet">

      </head>

      <body>

            @include('frontend.layouts.header')
            @include('frontend.layouts.navbar')


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

            @include('frontend.layouts.footer')

            <!-- JAVASCRIPT -->
            <!-- JavaScript Libraries -->
            <script src="{{ asset('frontend-assets') }}/js/jquery/3.6.4/jquery.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/js/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/wow/wow.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/easing/easing.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/waypoints/waypoints.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/counterup/counterup.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/lightbox/js/lightbox.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="{{ asset('frontend-assets') }}/js/main.js"></script>

            @stack('vendor-script')
            @stack('page-script')

      </body>

</html>
