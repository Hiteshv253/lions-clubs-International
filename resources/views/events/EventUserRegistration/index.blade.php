@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('event_user_registration.index') }}">Event User Registered</a></li>
      </ol>
</nav>

<div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-sm-2 row-cols-1">
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
      <div class="col" style="display: none;">
            <div class="card">
                  <div class="card-body d-flex">
                        <div class="flex-grow-1">
                              <h4>{{ $totalRegisteredUsers }}</h4>
                              <h6 class="text-muted fs-13 mb-0">Total Registered Users:</h6>
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
                  <div class="row">
                        @forelse ($event_registrations as $event_registration)
                        <div class="col-xxl-3 col-md-6">
                              <div class="card mb-2 ribbon-box ribbon-fill right">
                                    <div class="ribbon ribbon-info shadow-none"><i class="ri-flashlight-fill me-1"></i> {{ $event_registration['registrations_count'] }}</div>
                                    <div class="card-body">
                                          <div class="d-flex mb-3">
                                                <div class="flex-shrink-0 avatar-sm">
                                                      <div class="avatar-title bg-light rounded material-shadow">
                                                            <img src="{{ $event_registration['image'] }}" alt="" class="avatar-xxs">
                                                      </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                      <h5 class="fs-15 mb-1">{{ $event_registration['event_name'] }}</h5>
                                                      <!--<p class="text-muted mb-2">Blockchain Services</p>-->
                                                </div>
                                                <div class="me-4">
                                                      <a href="{{ route('event_user_registration.showRegistrations', $event_registration['id']) }}" class="badge bg-primary-subtle text-primary">
                                                            Visit Users Registered <i class="ri-arrow-right-up-line align-bottom"></i></a>
                                                </div>
                                          </div>
                                          <a href="{{ route('event_user_registration.showRegistrations', $event_registration['id']) }}">
                                                <h6 class="text-muted mb-0">
                                                      Event Registered : {{ $event_registration['registrations_count'] }}
                                                      <!--<span class="badge bg-success-subtle text-success">86.61%</span>-->
                                                </h6>
                                          </a>
                                    </div>
                                    <div class="card-body border-top border-top-dashed">
                                          <div class="d-flex">
                                                <div class="flex-grow-1">
                                                      <!--<h6 class="mb-0">4.9 <i class="ri-star-fill align-bottom text-warning"></i></h6>-->
                                                </div>
                                                <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i>
                                                      {{ \Carbon\Carbon::parse($event_registration['event_start_date'])->format('M d, Y ') }} -
                                                      {{ \Carbon\Carbon::parse($event_registration['event_end_date'])->format('M d, Y ') }}

                                                </h6>
                                          </div>
                                    </div>
                              </div>
                              <!--end card-->

                              <!--end card-->


                              <!--end card-->
                        </div>
                        @empty
                        <p class="text-muted">No events found.</p>
                        @endforelse
                  </div>
            </div>
      </div>
</div>
@endsection
