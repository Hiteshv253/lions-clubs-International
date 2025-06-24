<style>
    .event-card {
        transition: all 0.3s ease-in-out;
        border-radius: 1rem;
        overflow: hidden;
    }
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .event-image {
        height: 180px;
        object-fit: cover;
    }
</style>

<div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
    <div class="card event-card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="position-relative">

              @if($event->image)
              <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-100 event-image">
              @else
              <img src="{{ asset('images/default-event.png') }}" alt="Default Image" class="w-100 event-image">
              @endif

            <div class="position-absolute top-0 start-0 p-2 bg-primary text-white rounded-bottom-end small">
                <i class="fa fa-calendar me-1"></i>
                {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d') }} -
                {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d') }}
            </div>
        </div>

        <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate mb-1">{{ $event->event_name }}</h5>

            <div class="mb-2 small">
                <span class="text-muted">Base:</span> ₹{{ number_format($event->base_amount, 2) }}<br>
                <span class="text-muted">GST ({{ $event->gst_rate }}%):</span> ₹{{ number_format($event->gst_amount, 2) }}<br>
                <strong>Total:</strong> ₹{{ number_format($event->total_amount, 2) }}
            </div>

            <p class="small text-muted mb-2">
                <i class="fa fa-clock me-1 text-primary"></i>
                {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y h:i A') }}
            </p>

            <p class="card-text small text-muted mb-3">
                {!! \Illuminate\Support\Str::limit(strip_tags($event->description), 90) !!}
            </p>

            <div class="mt-auto d-flex justify-content-between">
                  <a style="display: none;"  href="#" class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#registerModal{{ $event->id }}">
                    Register
                </a>
                <a href="{{ route('show_event', $event->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    Read More
                </a>
                
            </div>
        </div>
    </div>
</div>




<!-- Registration Modal -->
<div class="modal fade" id="registerModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('event.register') }}">
                  @csrf
                  <input type="hidden" name="event_id" value="{{ $event->id }}">
                  <div class="modal-header">
                        <h5 class="modal-title">Register for {{ $event->event_name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                        <div class="mb-3">
                              <label>Name</label>
                              <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                              <label>Contact Number</label>
                              <input name="contact_number" id="contact_number" type="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                              <label>Email ID</label>
                              <input name="email" type="email" id="email" class="form-control" required>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submitBtn{{ $event->id }}">
                              <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                              <span class="btn-text">Submit</span>
                        </button>
                  </div>
            </form>
      </div>
</div>
<script>
      $(document).ready(function () {
            $('form').on('submit', function () {
                  const btn = $(this).find('button[type="submit"]');
                  btn.prop('disabled', true);
                  btn.find('.spinner-border').removeClass('d-none');
                  btn.find('.btn-text').text('Submitting...');
            });
      });
</script>
