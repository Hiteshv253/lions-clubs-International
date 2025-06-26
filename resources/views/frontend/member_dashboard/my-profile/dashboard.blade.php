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
            <div class=" ">
                  <div class="row g-4">
                  <!-- Sidebar -->
                        <div class="col-md-3">
                              <div class="p-3 bg-white rounded shadow-sm">
                                    @include('frontend.layouts._member_menu')
                              </div>
                        </div>

                  <!-- Profile -->
                        <div class="col-md-9">
                <div class="container py-1">

                    <!-- Welcome -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Welcome back, {{ $member->first_name }}!</h5>
                            <p class="text-muted">Here’s an overview of your account.</p>
                        </div>
                    </div>

                    <!-- Info Cards -->
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-calendar-alt me-2 text-primary"></i> My Events
                                    </h6>
                                    <h4 class="fw-bold">{{ $eventCount ?? 0 }}</h4>
                                    <p class="text-muted mb-0">Upcoming or Registered</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-id-card me-2 text-success"></i> Membership Status
                                    </h6>
                                    <span class="badge {{ $member->is_active == 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $member->is_active == 0 ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-user me-2 text-info"></i> My Profile
                                    </h6>
                                    <p class="mb-1">Membership ID: <strong>{{ $member->membership_id }}</strong></p>
                                    <a href="{{ route('profile.view') }}" class="btn btn-sm btn-outline-primary mt-2">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <h6>Quick Actions</h6>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('profile.events') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-calendar me-1"></i> Browse Events
                                </a>
                                <a href="{{ route('profile.profile_our_member') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-users me-1"></i> Browse Members
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Dashboard Content -->

        </div>
    </div>
</div>

@endsection
