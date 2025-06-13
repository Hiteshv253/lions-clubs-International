<div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
      <div class="service-item">
            <div class="service-img">
                  <img src="{{ $event->image }}" class="img-fluid rounded-top w-100" alt="">
                  <div class="service-icon p-3">
                        <i class="fa fa-hospital fa-2x"></i>
                  </div>
            </div>
            <div class="service-content p-4">
                  <div class="service-content-inner">
                        <h5 class="card-title text-truncate">{{ $event->event_name }}</h5>
                        <p class="card-text small text-muted mb-2">
                              <i class="fa fa-calendar me-2"></i> {{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y h:i A') }}
                        </p>
                        <p class="card-text mb-4">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <div class="mt-auto d-flex justify-content-between">
                              <a href="{{ route('events.show_event', $event->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Read More</a>
                              <a href="#" class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#registerModal{{ $event->id }}">Register</a>
                        </div>
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
