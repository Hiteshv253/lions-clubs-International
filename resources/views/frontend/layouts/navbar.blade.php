
<!-- Spinner Start -->
<!--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
      </div>
</div>-->
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
      <div class="container">
            <div class="row gx-0 align-items-center">
                  <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                              <div class="border-end border-primary pe-3">
                                    <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                              </div>
                              <div class="ps-3">
                                    <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>example@gmail.com</a>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end">
                              <div class="d-flex border-end border-primary pe-3">
                                    <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                                    <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                              </div>
                              <div class="dropdown ms-3">
                                    <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> English</small></a>
                                    <div class="dropdown-menu rounded">
                                          <a href="#" class="dropdown-item">English</a>
                                          <a href="#" class="dropdown-item">Bangla</a>
                                          <a href="#" class="dropdown-item">French</a>
                                          <a href="#" class="dropdown-item">Spanish</a>
                                          <a href="#" class="dropdown-item">Arabic</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar px-0 px-lg-0 py-lg-0" style="background-color: var(--lwc-colorTextLink,rgb(64, 124, 202))">
      <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                  <a href="#" class="navbar-brand p-0">
                        <h1 class="text-primary mb-0">
                              <!--<i class="fab fa-slack me-2"></i>-->
                        </h1>
                        <img src="/assets/logo/logo.webp" alt="Logo">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                              <a href="/home" class="nav-item nav-link {{ request()->is('home*') ? 'active' : '' }}" style="    font-weight: 600;">Home</a>
                              <a href="/about" class="nav-item nav-link {{ request()->is('about*') ? 'active' : '' }}" style="    font-weight: 600;">About</a>
                              <!--<a href="/service" class="nav-item nav-link {{ request()->is('service*') ? 'active' : '' }}" style="    font-weight: 600;">Services</a>-->
                              <a href="/contact" class="nav-item nav-link {{ request()->is('contact*') ? 'active' : '' }}" style="    font-weight: 600;">Contact</a>
                              <!--<a href="/login" class="nav-item nav-link {{ request()->is('login*') ? 'active' : '' }}" style="    font-weight: 600;">Login</a>-->

                              <a href="blog.html" class="nav-item nav-link {{ request()->is('blog*') ? 'active' : '' }}" style="    font-weight: 600;">Blog</a>
                              <div class="nav-item dropdown">
                                    <a href="#" class="nav-link" data-bs-toggle="dropdown" style="    font-weight: 600;">
                                          <span class="dropdown-toggle">Pages</span>
                                    </a>
                                    <div class="dropdown-menu">
                                          <a href="feature.html" class="dropdown-item" style="    font-weight: 600;">Our Features</a>
                                          <a href="team.html" class="dropdown-item" style="    font-weight: 600;">Our team</a>
                                          <a href="testimonial.html" class="dropdown-item" style="    font-weight: 600;">Testimonial</a>
                                          <a href="FAQ.html" class="dropdown-item" style="    font-weight: 600;">FAQs</a>
                                          <a href="/event" class="dropdown-item {{ request()->is('event*') ? 'active' : '' }}" style="    font-weight: 600;">Event</a>
                                    </div>
                              </div>
                              @auth
                              @if(auth()->user()->hasRole('member'))

                              <div class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-weight: 600;">
                                          My Profile
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                          <a href="/members/profile-view" class="dropdown-item {{ request()->is('members-ui*') ? 'active' : '' }}">My Profile</a>
                                          <a href="/members/members-ui" class="dropdown-item">Our Club Members</a>
                                    </div>
                              </div>
                              <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <button type="button" class="nav-link text-dark bg-transparent border-0 text-start w-100" onclick="confirmLogout()">
                                          <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                              </form>

                              @endif
                              @else
                              <a href="/login" class="nav-item nav-link {{ request()->is('login*') ? 'active' : '' }}" style="font-weight: 600;">
                                    Login
                                    <!--<i class="fas fa-sign-in-alt me-1"></i>-->
                              </a>

                              @endauth







                              <!--                              <div class="nav-btn px-3">
                                                                  <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                                                                  <a href="#" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"> Get a Quote</a>
                                                            </div>-->
                        </div>
                  </div>
                  <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                        <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                              <i class="fa fa-phone-alt fa-2x"></i>
                              <div class="position-absolute" style="top: 7px; right: 12px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                              </div>
                        </a>
                        <div class="d-flex flex-column ms-3" style="color: #fff;">
                              <span>Call to Our Experts</span>
                              <a href="tel:+ 0123 456 7890"><span class="text-dark">Free: + 0123 456 7890</span></a>
                        </div>
                  </div>
            </nav>
      </div>
</div>

<!-- Navbar & Hero End -->

<!-- Modal Search Start -->
<!--<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body d-flex align-items-center bg-primary">
                        <div class="input-group w-75 mx-auto d-flex">
                              <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                              <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                  </div>
            </div>
      </div>
</div>-->
<!-- Modal Search End -->