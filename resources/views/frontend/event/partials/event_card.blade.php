<style>
    .event-card {
        transition: 0.3s;
        border-radius: 1rem;
        overflow: hidden;
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
    <div class="card event-card h-100 shadow-sm border-0">
        <div class="position-relative">
             <img src="{{ $event->image}}" class="w-100 event-image" alt="Event Image">

            <div class="position-absolute top-0 start-0 p-2 bg-primary text-white rounded-bottom-end small">
                <i class="fa fa-calendar me-1"></i>
                {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d') }} -
                {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d') }}
            </div>
        </div>
        <div class="card-body">
            <h6 class="card-title text-truncate">{{ $event->event_name }}</h6>
            <p class="small text-muted mb-2">Inclusive of GST : ₹{{ number_format($event->total_amount, 2) }}</p>
            <p class="small text-muted mb-2">
                {!! \Illuminate\Support\Str::limit(strip_tags($event->description), 70) !!}
            </p>
            <a href="#" class="small text-primary" data-bs-toggle="modal" data-bs-target="#registerModal{{ $event->id }}">View & Register</a>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="row g-3">
                <div class="col-lg-6">
                    <h5 class="fw-bold">{{ $event->event_name }}</h5>
                    <p class="small text-muted mb-2">
                        <i class="fa fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d') }} -
                        {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d') }}
                    </p>
                    <p class="small">{!! \Illuminate\Support\Str::limit(strip_tags($event->description), 150) !!}</p>
                    <img src="{{ $event->image}}"
                         class="img-fluid rounded shadow-sm mt-2" alt="Event Banner">
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded p-3 mb-3">
                        <h6 class="fw-semibold mb-2">Pricing</h6>
                        <div class="d-flex justify-content-between small">
                            <span>Total (Inclusive of GST)</span><span class="text-success">₹{{ number_format($event->total_amount, 2) }}</span>
                        </div>
                    </div>

                    @auth
                        @if(auth()->user()->hasRole('member'))
                            <?php $user = Auth::user(); ?>
                            <form method="POST" action="{{ route('event.register') }}">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <div class="mb-2">
                                    <input name="name" type="text" class="form-control form-control-sm" required
                                           value="{{ $user->first_name }} {{ $user->last_name }}" placeholder="Full Name">
                                </div>

                                <div class="mb-2">
                                    <input name="contact_number" type="text" class="form-control form-control-sm" required
                                           value="{{ optional(\App\Models\MemberMaster::where('user_id', $user->id)->first())->mobile ?? '' }}"
                                           placeholder="Contact Number">
                                </div>

                                <div class="mb-2">
                                    <input name="email" type="email" class="form-control form-control-sm" required
                                           value="{{ $user->email }}" placeholder="Email Address">
                                </div>

                                <div class="mb-2">
                                    <input name="number_of_persons" id="number_of_persons{{ $event->id }}" type="number"
                                           class="form-control form-control-sm number-input" min="1" value="1" required
                                           placeholder="No. of Persons" data-event-id="{{ $event->id }}"
                                           data-price="{{ $event->total_amount }}">
                                </div>

                                <div class="mb-3">
                                    <input type="text" id="calculated_total{{ $event->id }}"
                                           class="form-control form-control-sm bg-white text-success fw-semibold" readonly placeholder="Total">
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
                            Only members can register. <a href="/login" class="text-primary">Login here</a>.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JS Scripts -->
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

