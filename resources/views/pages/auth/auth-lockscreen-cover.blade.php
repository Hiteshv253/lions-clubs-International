@extends('layouts.auth.master-cover')

@section('content')
<!-- auth-page content -->
<div class="auth-page-content overflow-hidden pt-lg-5">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="card overflow-hidden">
                              <div class="row justify-content-center g-0">
                                    <div class="col-lg-6">
                                          <div class="p-lg-5 p-4 auth-one-bg h-100">
                                                <div class="bg-overlay"></div>
                                                <div class="position-relative h-100 d-flex flex-column">
                                                      <div class="mb-4">
                                                            <a href="index.html" class="d-block">
                                                                  <img src="assets/images/logo-light.png" alt="" height="18">
                                                            </a>
                                                      </div>
                                                      <div class="mt-auto">
                                                            <div class="mb-3">
                                                                  <i class="ri-double-quotes-l display-4 text-success"></i>
                                                            </div>

                                                            <div id="qoutescarouselIndicators" class="carousel slide"
                                                                 data-bs-ride="carousel">
                                                                  <div class="carousel-indicators">
                                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                                                aria-label="Slide 1"></button>
                                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                                  </div>
                                                                  <div class="carousel-inner text-center text-white-50 pb-5">
                                                                        <div class="carousel-item active">
                                                                              <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy
                                                                                    for customization. Thanks very much! "</p>
                                                                        </div>
                                                                        <div class="carousel-item">
                                                                              <p class="fs-15 fst-italic">" The theme is really great with an
                                                                                    amazing customer support."</p>
                                                                        </div>
                                                                        <div class="carousel-item">
                                                                              <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy
                                                                                    for customization. Thanks very much! "</p>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!-- end carousel -->
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                          <div class="p-lg-5 p-4 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/hzomhqxz.json" trigger="loop"
                                                           colors="primary:#405189,secondary:#08a88a"
                                                           style="width:180px;height:180px"></lord-icon>

                                                <div class="mt-4 pt-2">
                                                      <h5>You are Logged Out</h5>
                                                      <p class="text-muted">Thank you for using <span class="fw-semibold">lionsclubs</span>
                                                            admin template</p>
                                                      <div class="mt-4">
                                                            <a href="auth-signin-basic.html" class="btn btn-success w-100">Sign In</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <!-- end col -->
                              </div>
                              <!-- end row -->
                        </div>
                        <!-- end card -->
                  </div>
                  <!-- end col -->

            </div>
            <!-- end row -->
      </div>
      <!-- end container -->
</div>
<!-- end auth page content -->
@endsection
