@extends('frontend.layouts.master')
@section('content')


@include('frontend.home_page.banner')
<!-- Feature Start -->
@include('frontend.home_page._event_list')


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
