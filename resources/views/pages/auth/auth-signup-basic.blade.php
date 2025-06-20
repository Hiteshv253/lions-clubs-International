@extends('layouts.auth.master')

@push('page-script')
<!-- particles js -->
<script src="{{ asset('') }}assets/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="{{ asset('') }}assets/js/pages/particles.app.js"></script>
<!-- validation init -->
<script src="{{ asset('') }}assets/js/pages/form-validation.init.js"></script>
<!-- password create init -->
<script src="{{ asset('') }}assets/js/pages/passowrd-create.init.js"></script>
@endpush

@section('content')
<!-- auth page content -->
<div class="auth-page-content">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                              <div>
<!--                                    <a href="index.html" class="d-inline-block auth-logo">
                                          <img src="assets/images/logo-light.png" alt="" height="20">
                                    </a>-->
                                     <a href="/" class="d-inline-block auth-logo">
                                          <img src="{{ asset('') }}assets/logo/logo.webp" alt="" height="70">
                                    </a>
                              </div>
                              <!--<p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>-->
                        </div>
                  </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                  <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                              <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                          <h5 class="text-primary">Create New Account</h5>
                                          <p class="text-muted">Get your free lionsclubs account now</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                          <form  method="POST" action="{{ route('registration') }}" class="needs-validation" novalidate >
                                                @csrf
                                                <div class="mb-3">
                                                      <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required value="{{ old('first_name') }}">
                                                      @error('first_name')
                                                      <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                      <div class="invalid-feedback"> Please first name </div>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required value="{{ old('last_name') }}">
                                                      @error('last_name')
                                                      <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                      <div class="invalid-feedback"> Please last name</div>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="email" class="form-label">Email ID <span class="text-danger">*</span></label>
                                                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required value="{{ old('email') }}">
                                                      @error('email')
                                                      <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                      <div class="invalid-feedback">Please enter email ID</div>
                                                </div>

                                                <!--                                                <div class="mb-3">
                                                                                                      <label class="form-label" for="password-input">Password</label>
                                                                                                      <div class="position-relative auth-pass-inputgroup">
                                                                                                            <input type="password" class="form-control pe-5 password-input"
                                                                                                                   onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput"
                                                                                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                                                                            <button
                                                                                                                  class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                                                                  type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                                                                            <div class="invalid-feedback"> Please enter password </div>
                                                                                                      </div>
                                                                                                </div>-->

                                                <div class="mb-4">
                                                      <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the lionsclubs
                                                            <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                      <h5 class="fs-13">Password must contain:</h5>
                                                      <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                      <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                      <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)
                                                      </p>
                                                      <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                                </div>

                                                <div class="mt-4">
                                                      <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                                </div>

                                                <div class="mt-4 text-center" style="display: none;">
                                                      <div class="signin-other-title">
                                                            <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                                      </div>

                                                      <div>
                                                            <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                                        class="ri-facebook-fill fs-16"></i></button>
                                                            <button type="button"
                                                                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                        class="ri-google-fill fs-16"></i></button>
                                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                                        class="ri-github-fill fs-16"></i></button>
                                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                                                                        class="ri-twitter-fill fs-16"></i></button>
                                                      </div>
                                                </div>
                                          </form>

                                    </div>
                              </div>
                              <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                              <p class="mb-0">Already have an account ?
                                    <a href="/login"  class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>
                        <div class="mt-4 text-center">
                              <p class="mb-0"><a href="/" class="fw-semibold text-primary text-decoration-underline"> Back To Website </a> </p>
                        </div>

                  </div>
            </div>
            <!-- end row -->
      </div>
      <!-- end container -->
</div>
<!-- end auth page content -->
@endsection
