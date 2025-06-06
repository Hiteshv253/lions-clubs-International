<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

      <head>

            <meta charset="utf-8" />
            <title>Sign In | lionsclubs - Admin & Dashboard Template</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="lionsinternational" name="author" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

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

      </head>

      <body>

            <!-- auth-page wrapper -->
            <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">
                  <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
                        <div class="bg-overlay"></div>

                        @yield('content')

                        <!-- footer -->
                        <footer class="footer">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-lg-12">
                                                <div class="text-center">
                                                      <p class="mb-0 text-muted">&copy;
                                                            <script>
document.write(new Date().getFullYear())
                                                            </script> lionsclubs. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                                            by lionsinternational
                                                      </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </footer>
                        <!-- end Footer -->
                  </div>

            </div>
            <!-- end auth-page-wrapper -->

            <!-- JAVASCRIPT -->
            <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
            <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
            <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>
            <script src="{{ asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
            <script src="{{ asset('') }}assets/js/plugins.js"></script>

            @stack('page-script')
      </body>

</html>
