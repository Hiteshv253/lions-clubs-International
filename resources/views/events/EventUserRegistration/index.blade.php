@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('event_user_registration.index') }}">Event User Registered</a></li>
      </ol>
</nav>
<style>
      .hover-scale {
            transition: transform 0.2s ease;
      }

      .hover-scale:hover {
            transform: scale(1.02);
      }

      .object-fit-cover {
            object-fit: cover;
      }
</style>

      <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-sm-2 row-cols-1" style="display: none;">
      <div class="col">
            <div class="card">
                  <div class="card-body d-flex">
                        <div class="flex-grow-1">
                              <h4>{{ $totalEvents }}</h4>
                              <h6 class="text-muted fs-13 mb-0">Total Events:</h6>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                              <div class="avatar-title bg-warning-subtle text-warning fs-22 rounded">
                                    <i class="ri-download-2-line"></i>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="col">
            <div class="card">
                  <div class="card-body d-flex">
                        <div class="flex-grow-1">
                              <h4>{{ $totalActiveEvents }}</h4>
                              <h6 class="text-muted fs-13 mb-0">Total Active Events:</h6>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                              <div class="avatar-title bg-warning-subtle text-warning fs-22 rounded">
                                    <i class="ri-download-2-line"></i>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!--end col-->
      <div class="col">
            <div class="card">
                  <div class="card-body d-flex">
                        <div class="flex-grow-1">
                              <h4>{{ $totalInActiveEvents }}</h4>
                              <h6 class="text-muted fs-13 mb-0">Total Inactive Events:</h6>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                              <div class="avatar-title bg-success-subtle text-success fs-22 rounded">
                                    <i class="ri-remote-control-line"></i>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!--end col-->
      <div class="col">
            <div class="card">
                  <div class="card-body d-flex">
                        <div class="flex-grow-1">
                              <h4>₹ {{ $totalCollectedFromActive }}</h4>
                              <h6 class="text-muted fs-13 mb-0">Total Collected:</h6>
                        </div>
                        <div class="flex-shrink-0 avatar-sm">
                              <div class="avatar-title bg-info-subtle text-info fs-22 rounded">
                                    <i class="ri-flashlight-fill"></i>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>



<div class="row mt-0">
      <div class="col-xl-12">
            <div class="card shadow-sm">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Events Registered</h4>
                        <form method="GET" class="d-flex" style="gap: 10px;">
                              <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search event name">
                              <button type="submit" class="btn btn-primary">Filter</button>
                              <a href="{{ route('event_user_registration.index') }}" class="btn btn-secondary">Reset</a>
                        </form>
                  </div>
                  <div class="container">
                        <div class="row p-2">
                              @forelse ($event_registrations as $event_registration)
                              <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0 position-relative hover-scale">
                                          <!-- Event Image Banner -->
                                          <img src="{{ $event_registration['image'] }}"
                                               class="card-img-top rounded-top object-fit-cover"
                                               style="height: 180px; width: 100%;" alt="event">

                                          <!-- Card Body -->
                                          <div class="card-body">
                                                <h5 class="card-title mb-2">{{ $event_registration['event_name'] }}</h5>
                                                <p class="small text-muted mb-2">
                                                      <i class="ri-calendar-line me-1"></i>
                                                      {{ \Carbon\Carbon::parse($event_registration['event_start_date'])->format('M d, Y') }}
                                                      –
                                                      {{ \Carbon\Carbon::parse($event_registration['event_end_date'])->format('M d, Y') }}
                                                </p>

                                                <!-- Pricing Summary -->
                                                <div class="mb-3">
                                                      <div class="d-flex justify-content-between fw-semibold">
                                                            <span>Total</span>
                                                            <span class="text-success">₹{{ number_format($event_registration['total_amount'], 2) }}</span>
                                                      </div>
                                                </div>

                                                <!-- Footer Metrics -->
                                                <ul class="list-unstyled small text-muted mb-0">
                                                      <li><strong>Registered:</strong> {{ $event_registration->total_persons ?? 0 }}</li>
                                                      <li><strong>Collected:</strong> ₹{{ number_format($event_registration->total_collected ?? 0, 2) }}</li>
                                                </ul>
                                          </div>

                                          <!-- Action -->
                                          <div class="card-footer bg-transparent border-top-0 pt-0">
                                                <a href="{{ route('event_user_registration.showRegistrations', $event_registration['id']) }}"
                                                   class="btn btn-outline-primary w-100">
                                                      View Registrations
                                                </a>
                                          </div>
                                    </div>
                              </div>


                              @empty
                              <p class="text-muted">No events found.</p>
                              @endforelse
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection
