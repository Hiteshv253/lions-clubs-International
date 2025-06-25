@extends('frontend.layouts.master')

@section('content')

<!-- Header -->
      <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                  <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">My Profile</h4>
            </div>
      </div>

<!-- Profile Layout -->
      <div class="container-fluid bg-light py-5">
            <div class="container">
                  <div class="row g-4">

                  <!-- Sidebar -->
                        <div class="col-md-3">
                              <div class="p-3 bg-white rounded shadow-sm">
                                    @include('frontend.layouts._member_menu')
                              </div>
                        </div>

                  <!-- Profile Section -->
                        <div class="col-md-9">
                              <div class="row">
                                    <div class="col-12">
                                          <h5 class="mb-4">My Registered Events</h5>

                                          @if($events->isEmpty())
                                                <p class="text-muted">You haven’t registered for any events yet.</p>
                                          @else
                                                <div class="table-responsive">
                                                      <table class="table table-bordered align-middle table-hover">
                                                            <thead class="table-light">
                                                                  <tr>
                                                                        <th style="width: 60px;">Image</th>
                                                                        <th>Event Name</th>
                                                                        <th>Date</th>
                                                                        <th>Total Amount (₹)</th>
                                                                        <th>Status</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  @foreach($events as $event)
                                                                        <tr>
                                                                              <td>
                                                                                    <img src="{{ asset('storage/' . $event->banner_image) }}"   class="img-thumbnail" style="height: 50px; width: 50px; object-fit: cover;">
                                                                              </td>
                                                                              <td>{{ $event->event_name }}</td>
                                                                              <td>
                                                                                    {{ \Carbon\Carbon::parse($event->event_start_date)->format('d M Y') }}
                                                                  -
                                                                                    {{ \Carbon\Carbon::parse($event->event_end_date)->format('d M Y') }}
                                                                              </td>
                                                                              <td>{{ number_format($event->total_amount, 2) }}</td>
                                                                              <td>
                                                                                    <span class="badge bg-{{ $event->is_active ? 'success' : 'secondary' }}">
                                                                                          {{ $event->is_active == 0 ? 'Active' : 'Inactive' }}
                                                                                    </span>
                                                                              </td>
                                                                        </tr>
                                                                  @endforeach
                                                            </tbody>
                                                      </table>
                                                </div>
                                          @endif

                                          <a href="{{ url('/event') }}" class="btn btn-link mt-3">View All Events</a>
                                    </div>
                              </div>
                        </div>
                  <!-- End Profile Section -->

                  </div>
            </div>
      </div>

@endsection
