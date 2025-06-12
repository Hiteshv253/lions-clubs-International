@extends('layouts.master')

@section('content')
<!--<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('event_user_registration.index') }}">Events User Registration</a></li>
      </ol>
</nav>-->

<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card shadow-sm">


                  <div class="row container">
                        <div class="col-xxl-3 col-md-6">
                              <div class="card card-animate">
                                    <div class="card-body">
                                          <div class="d-flex mb-3">
                                                <div class="flex-grow-1">
                                                      <lord-icon src="https://cdn.lordicon.com/fhtaantg.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px"></lord-icon>
                                                </div>

                                          </div>
                                          <h3 class="mb-2">#<span class="counter-value" data-target="{{ $totalActiveEvents }}"></span></h3>
                                          <h6 class="text-muted mb-0">Total Active Events: </h6>
                                    </div>
                              </div>
                              <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-md-6">
                              <div class="card card-animate">
                                    <div class="card-body">
                                          <div class="d-flex mb-3">
                                                <div class="flex-grow-1">
                                                      <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px"></lord-icon>
                                                </div>

                                          </div>
                                          <h3 class="mb-2">#<span class="counter-value" data-target="{{ $totalRegisteredUsers }}"></span></h3>
                                          <h6 class="text-muted mb-0">Total Registered Users: </h6>
                                    </div>
                              </div>
                              <!--end card-->
                        </div>
                      
                  </div>



                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Events Registration</h4>
                        <form method="GET" class="d-flex" style="gap: 10px;">
                              <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search event name">
                              <button type="submit" class="btn btn-primary">Filter</button>
                              <a href="{{ route('event_user_registration.index') }}" class="btn btn-secondary">Reset</a>
                        </form>
                  </div>

                  <div class="row p-4">
                        @forelse ($event_registrations as $event_registration)
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
                              <div class="card h-100">
                                    <div class="card-body d-flex">
                                          <div class="flex-shrink-0">
                                                <img src="{{ $event_registration['image'] }}" alt="" class="avatar-sm object-fit-cover rounded">
                                          </div>
                                          <div class="ms-3 flex-grow-1">
                                                <a href="{{ route('event_user_registration.showRegistrations', $event_registration['id']) }}">
                                                      <h5 class="mb-1">{{ $event_registration['event_name'] }}</h5>
                                                </a>
                                                <a href="{{ route('event_user_registration.showRegistrations', $event_registration['id']) }}" class="btn btn-outline-primary btn-sm">
                                                      View ({{ $event_registration['registrations_count'] }}) Registrations
                                                </a>
                                          </div>
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
@endsection
