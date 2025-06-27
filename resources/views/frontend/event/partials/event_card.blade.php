@php
    $imagePath = $event->image && file_exists(public_path('storage/' . $event->image))
        ? asset('storage/' . $event->image)
        : 'https://3.imimg.com/data3/CK/HV/MY-10570443/corporate-events.jpg';
@endphp

<style>
    .event-card {
        transition: 0.3s;
        border-radius: 1rem;
        overflow: hidden;
        position: relative;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .event-image {
        height: 160px;
        object-fit: cover;
    }

    .modal-content {
        border-radius: 0.75rem;
    }

    @media (max-width: 576px) {
        .modal-lg {
            max-width: 95%;
        }
    }
</style>

<div class="col-md-6 col-lg-4 col-xl-3 mb-4">
    <div class="card event-card h-100 shadow-sm border-0 position-relative rounded-4">
        <div class="position-relative">
            <img src="{{ $imagePath }}" class="w-100 event-image rounded-top-4" alt="Event Image">

            <div class="position-absolute top-0 start-0 p-2 bg-primary text-white rounded-bottom-end small fw-semibold">
                <i class="fa fa-calendar me-1"></i>
                {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d, Y') }} -
                {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d, Y') }}
            </div>

            @if($event->limited_sheet === 0)
                <div class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 rounded-bottom-start small fw-bold">
                    Limited Seats Left
                </div>
            @endif
        </div>

        <div class="card-body d-flex flex-column">
            <h6 class="card-title fw-bold text-truncate mb-2">{{ $event->event_name }}</h6>

            <p class="small text-muted mb-1 fw-semibold">
                ₹{{ number_format($event->total_amount, 2) }}
                <span class="fw-normal">(Inclusive of GST)</span>
            </p>

            <p class="small text-muted flex-grow-1">
                {{ \Illuminate\Support\Str::limit(strip_tags($event->description), 70) }}
            </p>

            <div class="text-center mt-3">
                @if($event->total_pendding_users > 0)
                    <a href="#" class="btn btn-success btn-sm px-3" data-bs-toggle="modal" data-bs-target="#registerModal{{ $event->id }}">
                        View & Register
                    </a>
                @else
                    <span class="btn btn-warning btn-sm px-3">No Seats Available</span>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="row g-3">
                <div class="col-lg-6">
                    <h5 class="fw-bold">{{ $event->event_name }}</h5>

@if($event->limited_sheet === 0)
                <div class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 rounded-bottom-start small fw-bold">
                    Limited Seats Left
                </div>
            @endif
                    <p class="small text-muted mb-2">
                        <i class="fa fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d') }} -
                        {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d') }}
                    </p>
                    <p class="small">{{ \Illuminate\Support\Str::limit(strip_tags($event->description), 150) }}</p>
                    <p class="small">Venue: {{ $event->venue_name }}</p>
                    <img src="{{ $imagePath }}" class="img-fluid rounded shadow-sm mt-2" alt="Event Banner">
                </div>

                <div class="col-lg-6">
                    <div class="bg-light rounded p-3 mb-3">
                        <h6 class="fw-semibold mb-2">Pricing & Availability</h6>
                        <div class="d-flex justify-content-between small">
                            <span>Total Cost (Inclusive of GST)</span>
                            <span class="text-success">₹{{ number_format($event->total_amount, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between small">
                            <span>Seats Remaining</span>
                            <span class="text-danger">{{ $event->total_pendding_users }} only</span>
                        </div>
                    </div>

                    @auth
                        @if(auth()->user()->hasRole('member'))
                            <form method="POST" action="{{ route('event.register') }}">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <div class="mb-2">
                                    <input name="name" type="text" class="form-control form-control-sm" required
                                        value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                                        placeholder="Full Name">
                                </div>

                                <div class="mb-2">
                                    <input name="contact_number" type="text" class="form-control form-control-sm" required
                                        value="{{ optional(auth()->user()->member)->mobile ?? '' }}"
                                        placeholder="Contact Number">
                                </div>

                                <div class="mb-2">
                                    <input name="email" type="email" class="form-control form-control-sm" required
                                        value="{{ auth()->user()->email }}" placeholder="Email Address">
                                </div>

                                <div class="mb-2">
                                    <input name="number_of_persons" id="number_of_persons{{ $event->id }}" type="number"
                                        class="form-control form-control-sm number-input" min="1" max="{{ $event->total_pendding_users }}"
                                        value="1" required placeholder="No. of Persons"
                                        data-event-id="{{ $event->id }}" data-price="{{ $event->total_amount }}">
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="calculated_total{{ $event->id }}"
                                        class="form-control form-control-sm bg-white text-success fw-semibold"
                                        readonly placeholder="Total">
                                    <input type="hidden" name="calculated_total" id="hidden_total{{ $event->id }}">
                                </div>

                                <button type="submit" class="btn btn-sm btn-success w-100">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    <span class="btn-text">Register Now</span>
                                </button>
                            </form>
                        @endif
                    @else
                        <div class="small mt-2 text-muted">
                            Only members can register. <a href="{{ route('login') }}" class="text-primary">Login here</a>.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.number-input').on('input', function () {
            const id = $(this).data('event-id');
            const count = parseInt($(this).val()) || 0;
            const price = parseFloat($(this).data('price')) || 0;
            const total = count * price;

            $(`#calculated_total${id}`).val(`₹${total.toFixed(2)}`);
            $(`#hidden_total${id}`).val(total.toFixed(2));
        });

        $('form').on('submit', function () {
            const btn = $(this).find('button[type="submit"]');
            btn.prop('disabled', true);
            btn.find('.spinner-border').removeClass('d-none');
            btn.find('.btn-text').text('Submitting...');
        });
    });
</script>
