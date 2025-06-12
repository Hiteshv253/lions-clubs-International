@extends('frontend.layouts.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Services</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                  <li class="breadcrumb-item active text-primary">Service</li>
            </ol>
      </div>
</div>
<!-- Header End -->


<!-- Service Start -->
<div class="container-fluid service py-1">
      <div class="container py-1">
            <div class="text-center mx-auto pb-1 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                  <!--<h4 class="text-primary">Our Events</h4>-->
                  <h1 class="display-4 mb-4">Our Events</h1>
                  <!--<p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.</p>-->
            </div>
            <div class="row g-4 justify-content-center">
                 @foreach ($fetchEvents as $fetchEvent)
<div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
    <div class="service-item">
        <div class="service-img">
            <img src="{{ $fetchEvent->image }}" class="img-fluid rounded-top w-100" alt="">
            <div class="service-icon p-3">
                <i class="fa fa-hospital fa-2x"></i>
            </div>
        </div>
        <div class="service-content p-4">
            <div class="service-content-inner">
                <h5 class="card-title text-truncate">{{ $fetchEvent->event_name }}</h5>
                <p class="card-text small text-muted mb-2">
                    <i class="fa fa-calendar me-2"></i> {{ \Carbon\Carbon::parse($fetchEvent->date_time)->format('M d, Y h:i A') }}
                </p>
                <p class="card-text mb-4">{{ \Illuminate\Support\Str::limit($fetchEvent->description, 100) }}</p>
                <div class="mt-auto d-flex justify-content-between">
                    <a href="{{ route('events.show_event', $fetchEvent->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Read More</a>
                    <!-- Trigger Modal -->
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#registerModal{{ $fetchEvent->id }}">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal{{ $fetchEvent->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{ route('event.register') }}">
        @csrf
        <input type="hidden" name="event_id" value="{{ $fetchEvent->id }}">
        <div class="modal-header">
            <h5 class="modal-title">Register for {{ $fetchEvent->event_name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Name</label>
                <input name="name" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
  </div>
</div>
@endforeach

                  <!--                  <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                                          <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Services</a>
                                    </div>-->
            </div>
      </div>
</div>
<!-- Service End -->

<br>
<br>
<!-- Testimonial Start -->
<div class="container-fluid testimonial pb-5">
      <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                  <h4 class="text-primary">Testimonial</h4>
                  <h1 class="display-4 mb-4">What Our Customers Are Saying</h1>
                  <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                  </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                  <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                              <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                          <img src="{{ asset('frontend-assets') }}/img/testimonial-1.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                              </div>
                              <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                          <h4 class="text-dark mb-0">Client Name</h4>
                                          <p class="mb-3">Profession</p>
                                          <div class="d-flex text-primary mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                          </p>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                              <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                          <img src="{{ asset('frontend-assets') }}/img/testimonial-2.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                              </div>
                              <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                          <h4 class="text-dark mb-0">Client Name</h4>
                                          <p class="mb-3">Profession</p>
                                          <div class="d-flex text-primary mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star text-body"></i>
                                          </div>
                                          <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                          </p>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                              <div class="col-4  col-lg-4 col-xl-3">
                                    <div class="h-100">
                                          <img src="{{ asset('frontend-assets') }}/img/testimonial-3.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                    </div>
                              </div>
                              <div class="col-8 col-lg-8 col-xl-9">
                                    <div class="d-flex flex-column my-auto text-start p-4">
                                          <h4 class="text-dark mb-0">Client Name</h4>
                                          <p class="mb-3">Profession</p>
                                          <div class="d-flex text-primary mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star text-body"></i>
                                                <i class="fas fa-star text-body"></i>
                                          </div>
                                          <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                          </p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Testimonial End -->



 

@endsection
