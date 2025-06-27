<!-- Action Buttons -->
<a href="{{ route('events.show', $row->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('events.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('events.destroy', $row->id) }}" method="POST" style="display:inline">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Delete this event?')" class="btn btn-sm btn-danger">Delete</button>
</form>

<!-- Event Status Actions -->
@php
    use Carbon\Carbon;
    $event = \App\Models\EventMaster::where('id', $row->id)
        ->where('event_end_date', '>=', Carbon::today())
        ->first();
@endphp

@if($event)
    @if($event->is_active == 0)
            @if($event->total_event_users != $event->total_registered_user)
                  <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal{{ $row->id }}">Self Register</a>
            @else
                  <span class="btn btn-warning btn-sm">No Seats Available</span>
            @endif
      @else
            <span class="btn btn-danger btn-sm">Event Inactive</span>
      @endif
@else
      <span class="btn btn-danger btn-sm">Event Expired</span>
@endif

<a href="{{ route('event_user_registration.showRegistrations', $row->id) }}" class="btn btn-sm btn-warning">View Registrations</a>

<!-- Modal -->
<div class="modal fade" id="registerModal{{ $row->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-3">
                  <div class="row g-3">
                        <div class="col-lg-6">
                              <h5 class="fw-bold">{{ $row->event_name }}</h5>
                    @if($event->limited_sheet === 0)
                                    <span class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 small rounded-start">
                                    Limited Seats Left
                                    </span>
                              @endif

                              <p class="small text-muted mb-2">
                                    <i class="fa fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($row->event_start_date)->format('M d') }} -
                                    {{ \Carbon\Carbon::parse($row->event_end_date)->format('M d') }}
                              </p>
                              <p class="small">{!! \Illuminate\Support\Str::limit(strip_tags($row->description), 150) !!}</p>
                              @php
                        $imgPath = $row->image && file_exists(public_path('storage/' . $row->image))
                            ? asset('storage/' . $row->image)
                            : 'https://3.imimg.com/data3/CK/HV/MY-10570443/corporate-events.jpg';
                    @endphp
                              <img src="{{ $imgPath }}" class="img-fluid rounded shadow-sm mt-2" alt="Event Banner">
                        </div>

                        <div class="col-lg-6">
                              <div class="bg-light rounded p-3 mb-3">
                                    <h6 class="fw-semibold mb-2">Pricing</h6>
                                    <div class="d-flex justify-content-between small">
                                          <span>Total Cost (Inclusive of GST)</span>
                                          <span class="text-success">₹{{ number_format($row->total_amount, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between small">
                                          <span>Seats Remaining</span>
                                          <span class="text-success">{{ $event->total_pendding_users ?? 0 }}</span>
                                    </div>
                              </div>

                              @php $user = Auth::user(); @endphp

                              <form action="{{ route('events.self_registraion_save') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $row->id }}">

                                    <div class="mb-2">
                                          <label class="form-label">Select Member</label>
                                          <select class="form-select" name="membership_id" id="membership_id{{ $row->id }}">
                                                <option value="">-- None --</option>
                                @foreach($allmembers as $parent)
                                                      <option
                                                      value="{{ $parent->id }}"
                                                      data-name="{{ $parent->first_name }} {{ $parent->last_name }}"
                                                      data-email="{{ $parent->user->email ?? '' }}"
                                                      data-contact="{{ $parent->mobile ?? '' }}">
                                                            {{ $parent->id }} - {{ $parent->first_name }} {{ $parent->last_name }} ({{ $parent->membership_id }})
                                                      </option>
                                                @endforeach
                                          </select>
                                    </div>

                                    <div class="mb-2">
                                          <input name="name" type="text" id="member_name{{ $row->id }}"
                                                 class="form-control form-control-sm" required
                                                 value="{{ $user->first_name }} {{ $user->last_name }}" placeholder="Full Name">
                                    </div>

                                    <div class="mb-2">
                                          <input name="contact_number" type="text" id="member_contact{{ $row->id }}"
                                                 class="form-control form-control-sm" required
                                                 value="{{ optional($user->member)->mobile ?? '' }}" placeholder="Contact Number">
                                    </div>

                                    <div class="mb-2">
                                          <input name="email" type="email" id="member_email{{ $row->id }}"
                                                 class="form-control form-control-sm" required
                                                 value="{{ $user->email }}" placeholder="Email Address">
                                    </div>

                                    <div class="mb-2">
                                          <input name="number_of_persons" id="number_of_persons{{ $row->id }}" type="number"
                                                 class="form-control form-control-sm number-input" min="1" value="1"
                                                 required placeholder="No. of Persons"
                                                 data-event-id="{{ $row->id }}" data-price="{{ $row->total_amount }}"
                                                 max="{{ $event->total_pendding_users }}">
                                    </div>

                                    <div class="mb-3">
                                          <input type="text" id="calculated_total{{ $row->id }}"
                                                 class="form-control form-control-sm bg-white text-success fw-semibold"
                                                 readonly placeholder="Total">
                                          <input type="hidden" name="calculated_total" id="hidden_total{{ $row->id }}">
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-success w-100">
                                          <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                          <span class="btn-text">Register Now</span>
                                    </button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>

<!-- JS for Calculating Total and Autofill -->
<script>
$(document).ready(function () {
    $('.number-input').on('input', function () {
        let persons = parseInt($(this).val()) || 0;
        let price = parseFloat($(this).data('price')) || 0;
        let eventId = $(this).data('event-id');
        let total = persons * price;
        $('#calculated_total' + eventId).val('₹' + total.toFixed(2));
        $('#hidden_total' + eventId).val(total.toFixed(2));
    }).trigger('input');

    $('#membership_id{{ $row->id }}').on('change', function () {
        const selected = $(this).find(':selected');
        $('#member_name{{ $row->id }}').val(selected.data('name') || '');
        $('#member_email{{ $row->id }}').val(selected.data('email') || '');
        $('#member_contact{{ $row->id }}').val(selected.data('contact') || '');
    });
});
</script>
