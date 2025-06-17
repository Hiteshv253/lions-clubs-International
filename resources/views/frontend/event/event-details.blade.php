@extends('frontend.layouts.master')
@section('content')
<style>
      .form-section .form-control {
            border-radius: 0.5rem;
      }

      .form-section .btn {
            position: relative;
            padding-right: 2.5rem;
      }

      .form-section .btn .spinner-border {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
      }
</style>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $event->event_name }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                  <!--<li class="breadcrumb-item"><a href="/event">Event</a></li>-->
            </ol>
      </div>
</div>

<section class="py-5 form-section">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- 📸 Event Image (Left Column) -->
            <div class="col-md-6">
                <img src="{{ $event->banner_image }}" class="img-fluid rounded shadow w-100" alt="{{ $event->event_name }}">
            </div>

            <!-- 📝 Event Content + Form (Right Column) -->
            <div class="col-md-6">
                <h2 class="mb-3">{{ $event->event_name }}</h2>
                <p class="text-muted mb-2">
                    <i class="fa fa-calendar me-2"></i>
                    {{ \Carbon\Carbon::parse($event->start_date)->format('M d') }} to
                    {{ \Carbon\Carbon::parse($event->end_date)->format('M d') }}
                </p>
                <p class="mb-4">{{ $event->description }}</p>

                <form class="border rounded p-4 shadow-sm bg-light" method="POST" action="{{ route('event.register') }}">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <h5 class="mb-3">Register for this event</h5>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input name="name" id="name" type="text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input name="contact_number" id="contact_number" type="number" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input name="email" type="email" id="email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100" id="submitBtn{{ $event->id }}">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">Register Now</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>



<script>
      document.querySelector('#submitBtn{{ $event->id }}').addEventListener('click', function () {
            const btn = this;
            btn.querySelector('.spinner-border').classList.remove('d-none');
            btn.querySelector('.btn-text').textContent = 'Processing...';
      });
</script>

<!--
<script>
      $(document).ready(function () {
            $('form').on('submit', function () {
                  const btn = $(this).find('button[type="submit"]');
                  btn.prop('disabled', true);
                  btn.find('.spinner-border').removeClass('d-none');
                  btn.find('.btn-text').text('Submitting...');
            });
      });
</script>-->

@endsection
