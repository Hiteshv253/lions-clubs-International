@extends('frontend.layouts.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $event->event_name }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                  <!--<li class="breadcrumb-item"><a href="/event">Event</a></li>-->
            </ol>
      </div>
</div>
<!-- Header End -->
<section class="py-5">
      <div class="container">
            <div class="row g-5">
                  <!-- Event Image -->
                  <div class="col-md-6">
                        <div class="col-12 text-center">
                              <img src="{{ $event->banner_image }}" class="rounded shadow" style="max-width: 100%;" alt="{{ $event->event_name }}">
                        </div>

                  </div>

                  <!-- Event Content -->
                  <div class="col-md-6">
                        <h1 class="mb-3">{{ $event->event_name }}</h1>
                        <p class="text-muted mb-2">
                              <i class="fa fa-calendar me-2"></i>
                              {{ \Carbon\Carbon::parse($event->date_time)->format('F j, Y g:i A') }}
                        </p>
                        <p class="mb-4">{{ $event->description }}</p>

                        <form class="border rounded p-4 shadow-sm" method="POST" action="{{ route('event.register') }}" >
                              @csrf
                              <input type="hidden" name="event_id" value="{{ $event->id }}">
                              <h5 class="mb-3">Register for this event</h5>
                              <div class="mb-3">
                                    <label for="name">Your Name</label>
                                    <input name="name" type="text" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                    <label for="email">Your Email</label>
                                    <input name="email" type="email" class="form-control" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Register Now</button>
                        </form>
                  </div>
            </div>
      </div>
</section>
@endsection
