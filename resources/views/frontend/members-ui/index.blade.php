@extends('frontend.layouts.master')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Members List</h4>
            <!--            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                              <li class="breadcrumb-item"><a href="/">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">Pages</a></li>
                              <li class="breadcrumb-item active text-primary">Service</li>
                        </ol>-->
      </div>
</div>
<!-- Header End -->





<!-- Service Start -->
<div class="container-fluid service py-1">
      <div class="container py-1">
            <div class="text-center mx-auto pb-1 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                  <!--<h4 class="text-primary">Our Events</h4>-->
                  <h1 class="display-4 mb-4">Our Members</h1>
                  <!--<p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.</p>-->
            </div>
            <div class="row g-4 justify-content-center">
                  <div class="container mt-4">
                        @include('frontend.members-ui.partials._filter')
                  </div>
                  <div class="container mt-4" id="membersContainer">
                        @foreach($members as $member)
                        @include('frontend.members-ui.partials._member_loop')
                        @endforeach
                  </div>
                  <!-- No Results Message -->
                  <div id="noResults" class="text-center text-muted my-4" style="display: none;">
                        <h5>No members found.</h5>
                  </div>

                  <!-- Members List -->

                  <!-- Loader -->
                  <div id="loader" class="text-center my-4" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                              <span class="visually-hidden">Loading...</span>
                        </div>
                  </div>

                  <!-- Load More Button -->
                  <div class="text-center my-4">
                        <button id="loadMoreBtn" class="btn btn-secondary">Load More</button>
                  </div>

            </div>
      </div>
</div>

<script>

      let page = 1;

      $('#filterForm').on('submit', function (e) {
            e.preventDefault();
            page = 1;
            fetchMembers(true);
      });

      $('#loadMoreBtn').on('click', function () {
            page++;
            fetchMembers(false);
      });

      function fetchMembers(replace = false) {
            $('#loader').show();
            $('#noResults').hide();
            $('#loadMoreBtn').hide();

            $.ajax({
                  url: "{{ route('frontend.members.ajax') }}",
                  method: "GET",
                  data: $('#filterForm').serialize() + '&page=' + page,
                  success: function (res) {
                        $('#loader').hide();

                        if (replace) {
                              $('#membersContainer').html(res.html);
                        } else {
                              $('#membersContainer').append(res.html);
                        }

                        if (res.html.trim() === '') {
                              $('#noResults').show();
                        } else {
                              $('#noResults').hide();
                        }

                        if (res.hasMore) {
                              $('#loadMoreBtn').show();
                        }
                  },
                  error: function () {
                        $('#loader').hide();
                        $('#noResults').show().text('Something went wrong. Please try again.');
                  }
            });
      }
      $('#resetBtn').on('click', function () {
            $('#filterForm')[0].reset(); // clear all inputs/selects
            page = 1;
            fetchMembers(true); // fetch fresh list with no filters
      });
</script>
@endsection
