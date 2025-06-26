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

<!-- 🧭 Event Header -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $event->event_name }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"></ol>
      </div>
</div>

<!-- 📄 Event Detail + Registration -->
<section class="py-5 form-section">
      <div class="container">
            <div class="row gy-4 align-items-start">

                  <!-- 📋 Event Information -->
                  <div class="col-lg-12">
                        <h2 class="mb-2">{{ $event->event_name }}</h2>
                        <p class="text-muted small mb-2">
                              <i class="fa fa-calendar me-2"></i>
                              {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d') }} –
                              {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d') }}
                        </p>
                        <p class="mb-3 small"><strong>Description:</strong><br>{!! $event->description !!}</p>
                  </div>

                  <!-- 📸 Event Image -->
                  <div class="col-lg-6">
                        
                        ##<img src="{{ $event->image}}" class="img-fluid rounded shadow w-100" alt="{{ $event->event_name }}">
                  </div>

                  <!-- 📝 Price & Registration Form -->
                  <div class="col-lg-6">

                        <!-- 💳 Price Card -->
                        <div class="card mb-3 shadow-sm">
                              <div class="card-body p-3">
                                    <h6 class="mb-3">Event Pricing (Per Person)</h6>
                                    <div class="d-flex justify-content-between small mb-1">
                                          <span>Base Amount</span>
                                          <span>₹{{ number_format($event->base_amount, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between small mb-1">
                                          <span>GST ({{ $event->gst_rate }}%)</span>
                                          <span>₹{{ number_format($event->gst_amount, 2) }}</span>
                                    </div>
                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between fw-semibold">
                                          <span>Total Per Person</span>
                                          <span class="text-success">₹{{ number_format($event->total_amount, 2) }}</span>
                                    </div>
                              </div>
                        </div>



                        @auth
                        @if (auth()->user()->hasRole('member'))
                        <?php $user = Auth::user(); ?>
                        <!-- 🧾 Registration Form -->
                        <form class="border rounded p-3 bg-light shadow-sm" method="POST" action="{{ route('event.register') }}">
                              @csrf
                              <input type="hidden" name="event_id" value="{{ $event->id }}">

                              <h6 class="mb-3">Register for this Event</h6>

                              <div class="mb-2">
                                    <input name="name" type="text" class="form-control" placeholder="Full Name" required value="{{$user->first_name}} {{$user->last_name}}">
                              </div>

                              <div class="mb-2">
                                    <input name="contact_number" type="text" class="form-control" placeholder="Contact Number" required value="{{ optional(\App\Models\MemberMaster::where('user_id', $user->id)->first())->mobile ?? 'N/A' }}">
                              </div>

                              <div class="mb-2">
                                    <input name="email" type="email" class="form-control" placeholder="Email Address" required value="{{$user->email}}">
                              </div>

                              <div class="mb-2">
                                    <input name="number_of_persons" id="number_of_persons" type="number" class="form-control"
                                           min="1" value="1" required placeholder="Number of Persons">
                              </div>

                              <div class="mb-3">
                                    <input type="text" id="calculated_total" class="form-control bg-white text-success fw-semibold" readonly>
                                    <input type="hidden" name="calculated_total" id="hidden_total">
                              </div>

                              <button type="submit" class="btn btn-success w-100" id="submitBtn{{ $event->id }}">
                                    <span class="spinner-border spinner-border-sm d-none fade" role="status" aria-hidden="true"></span>
                                    <span class="btn-text">Register Now</span>
                              </button>
                        </form>
                        @endif
                        @else
                        <a href="/login" class="nav-item nav-link {{ request()->is('login*') ? 'active' : '' }}" style="font-weight: 600;">
                              
                              only members can register for an event and must be logged in using member credentials
                        </a>
                        @endauth




                  </div>
            </div>
      </div>
</section>

<!-- 💡 JavaScript -->
<script>
      document.addEventListener('DOMContentLoaded', function () {
      const submitBtn = document.querySelector('#submitBtn{{ $event->id }}');
      if (submitBtn) {
      submitBtn.addEventListener('click', function () {
      const spinner = this.querySelector('.spinner-border');
      const btnText = this.querySelector('.btn-text');
      if (spinner) {
      spinner.classList.remove('d-none');
      setTimeout(() => spinner.classList.add('show'), 10);
      }
      if (btnText) btnText.textContent = 'Processing...';
      });
      }

      const perPerson = {{ $event->total_amount }};
      const personInput = document.getElementById('number_of_persons');
      const totalDisplay = document.getElementById('calculated_total');
      const hiddenTotal = document.getElementById('hidden_total');
      function updateTotal() {
      const persons = parseInt(personInput.value) || 1;
      const total = perPerson * persons;
      totalDisplay.value = '₹' + total.toFixed(2);
      hiddenTotal.value = total.toFixed(2);
      }

      personInput.addEventListener('input', updateTotal);
      updateTotal(); // Initialize total on load
      });
</script>

@endsection
