@extends('frontend.layouts.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Events</h4>
            <!--            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                              <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">Pages</a></li>
                              <li class="breadcrumb-item active text-primary">Our Events</li>
                        </ol>-->
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
                  <div class="row g-4 justify-content-center" id="event-container">
                        @foreach ($fetchEvents as $event)
                        @include('frontend.event.partials.event_card', ['event' => $event])
                        @endforeach
                  </div>
                  <div id="load-spinner" style="display: none;">
                        <div class="text-center my-3">
                              <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                              </div>
                        </div>
                  </div>
                  <div class="col-12 text-center mt-4">
                        <button id="load-more" class="btn btn-primary rounded-pill py-3 px-5">Load More</button>
                  </div>
            </div>
      </div>
</div> 



<script>
      let offset = 8;

      $('#load-more').on('click', function () {
            $('#load-spinner').show(); // Show loader
            $.ajax({
                  url: '{{ route("events_frnt.load_more") }}',
                  type: 'GET',
                  data: {offset: offset},
                  success: function (response) {
                        $('#event-container').append(response.html);
                        offset += response.count;

                        if (response.count < 8) {
                              $('#load-more').hide();
                        }
                  },
                  error: function (xhr) {
                        alert('Failed to load more events.');
                        console.log(xhr.responseText);
                  },
                  complete: function () {
                        $('#load-spinner').hide(); // Always hide loader
                  }
            });
      });
</script>

@endsection
