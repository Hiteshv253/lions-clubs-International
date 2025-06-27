@extends('frontend.layouts.master')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Events</h4>
    </div>
</div>
<!-- Header End -->

<!-- Service Start -->
<div class="container-fluid service py-1">
    <div class="container py-1">
        <div class="text-center mx-auto pb-1 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-4 mb-4">Our Events</h1>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="row g-4 justify-content-center" id="event-container">
                @forelse ($fetchEvents as $event)
                    @include('frontend.event.partials.event_card', ['event' => $event])
                @empty
                    <div class="text-center text-muted">No upcoming events available.</div>
                @endforelse
            </div>

            <div id="load-spinner" style="display: none;">
                <div class="text-center my-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-4">
                <button id="load-more" class="btn btn-primary rounded-pill py-3 px-5"
                        @if($fetchEvents->count() < 8) style="display:none;" @endif>
                    Load More
                </button>
            </div>

            <div id="no-events-msg" class="text-center text-muted mt-3" style="display: none;">
                No upcoming events available.
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let offset = 8;

$('#load-more').on('click', function () {
    $('#load-spinner').show(); // Show loader

    $.ajax({
        url: '{{ route("events_frnt.load_more") }}',
        type: 'GET',
        data: { offset: offset },
        success: function (response) {
            if (response.html && response.count > 0) {
                $('#event-container').append(response.html);
                offset += response.count;
            }

            if (!response.hasMore) {
                $('#load-more').hide(); // Hide Load More
                $('#no-events-msg').show(); // Show message
            }
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to load more events!',
                footer: '<small>Check your internet or try again later.</small>'
            });
            console.error(xhr.responseText);
        },
        complete: function () {
            $('#load-spinner').hide(); // Always hide loader
        }
    });
});
</script>
@endsection
