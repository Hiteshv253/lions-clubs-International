@extends('frontend.layouts.master')



@section('content')
@include('frontend.home_page.banner')



<!-- Feature Start -->
<div class="container-fluid feature bg-light py-5">
      <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                  <h4 class="text-primary">Our Features</h4>
                  <h1 class="display-4 mb-4">Insurance Provide you a Better Future</h1>
                  <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                  </p>
            </div>
            <div class="row g-4">
                  <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4 pt-0">
                              <div class="feature-icon p-4 mb-4">
                                    <i class="far fa-handshake fa-3x"></i>
                              </div>
                              <h4 class="mb-4">Trusted Company</h4>
                              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                              </p>
                              <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4 pt-0">
                              <div class="feature-icon p-4 mb-4">
                                    <i class="fa fa-dollar-sign fa-3x"></i>
                              </div>
                              <h4 class="mb-4">Anytime Money Back</h4>
                              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                              </p>
                              <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4 pt-0">
                              <div class="feature-icon p-4 mb-4">
                                    <i class="fa fa-bullseye fa-3x"></i>
                              </div>
                              <h4 class="mb-4">Flexible Plans</h4>
                              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                              </p>
                              <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="feature-item p-4 pt-0">
                              <div class="feature-icon p-4 mb-4">
                                    <i class="fa fa-headphones fa-3x"></i>
                              </div>
                              <h4 class="mb-4">24/7 Fast Support</h4>
                              <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                              </p>
                              <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                  </div>
            </div>
      </div>
</div>


<!-- Feature End -->
<!-- auth page content -->
<div class="auth-page-content">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="text-center mt-sm-5 pt-4 mb-4">
                              <div class="mb-sm-5 pb-sm-4 pb-5">
                                    <img src="assets/images/comingsoon.png" alt="" height="120" class="move-animation">
                              </div>
                              <div class="mb-5">
                                    <h1 class="display-2 coming-soon-text">Coming Soonasdfasd</h1>
                              </div>
                              <div>
                                    <div class="row justify-content-center mt-5">
                                          <div class="col-lg-8">
                                                <div id="countdown" class="countdownlist"></div>
                                          </div>
                                    </div>

                                    <div class="mt-5">
                                          <h4>Get notified when we launch</h4>
                                          <p class="text-muted">Don't worry we will not spam you ð</p>
                                    </div>

                                    <div class="input-group countdown-input-group mx-auto my-4">
                                          <input type="email" class="form-control border-light shadow"
                                                 placeholder="Enter your email address" aria-label="search result"
                                                 aria-describedby="button-email">
                                          <button class="btn btn-success" type="button" id="button-email">Send<i
                                                      class="ri-send-plane-2-fill align-bottom ms-2"></i></button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <!-- end row -->

      </div>
      <!-- end container -->
</div>
<!-- end auth page content -->
@endsection
