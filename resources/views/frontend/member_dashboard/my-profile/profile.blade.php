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
                              <div class="row g-4">
                              <!-- Profile Summary -->
                                    <div class="col-xl-4">
                                          <div class="bg-white rounded p-4 text-center shadow-sm">
                                                <img src="{{ asset('frontend-assets/img/profile_picture.jpg') }}" class="rounded-circle mb-3 shadow-sm" alt="Profile" style="width: 150px; height: 150px; object-fit: cover;">
                                                <h4 class="mb-1">{{ $member->first_name }} {{ $member->last_name }}</h4>
                                                <p class="text-muted small">Your Bio or Tagline</p>
                                                <div class="d-flex justify-content-center gap-2 mt-3">
                                                      <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-twitter"></i></a>
                                                      <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                                                </div>
                                          </div>
                                    </div>

                              <!-- Detailed Info -->
                                    <div class="col-xl-8">
                                          <div class="bg-white rounded p-4 shadow-sm">
                                                <h5 class="mb-3 border-bottom pb-2">Profile Overview</h5>

                                                <div class="row mb-3">
                                                      <div class="col-md-6"><strong>Account:</strong> {{ $member->account->name ?? '-' }}</div>
                                                      <div class="col-md-6"><strong>Membership ID:</strong> {{ $member->membership_id }}</div>
                                                      <div class="col-md-6"><strong>Status:</strong>
                                                      <span class="badge {{ $member->is_active == 0 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $member->is_active == 0 ? 'Active' : 'Inactive' }}
                                                      </span>
                                                </div>
                                                <div class="col-md-6"><strong>Join Date:</strong> {{ optional($member->join_date)->format('d M, Y') }}</div>
                                          </div>

                                          <h6 class="text-primary mt-4 mb-2">Personal Information</h6>
                                          <div class="row mb-3">
                                                <div class="col-md-4"><strong>First Name:</strong> {{ $member->first_name }}</div>
                                                <div class="col-md-4"><strong>Last Name:</strong> {{ $member->last_name }}</div>
                                                <div class="col-md-4"><strong>Gender:</strong> {{ ucfirst($member->gender) }}</div>
                                                <div class="col-md-6"><strong>Birthdate:</strong> {{ optional($member->birthdate)->format('d M, Y') }}</div>
                                                <div class="col-md-6"><strong>Occupation:</strong> {{ $member->occupation->name ?? '-' }}</div>
                                          </div>

                                          <h6 class="text-primary mt-4 mb-2">Contact Information</h6>
                                          <div class="row mb-3">
                                                <div class="col-md-6"><strong>Email:</strong> {{ $member->email }}</div>
                                                <div class="col-md-6"><strong>Mobile:</strong> {{ $member->mobile }}</div>
                                                <div class="col-md-6"><strong>Home Phone:</strong> {{ $member->home_phone }}</div>
                                          </div>

                                          <h6 class="text-primary mt-4 mb-2">Address</h6>
                                          <div class="row mb-3">
                                                <div class="col-md-4"><strong>Line 1:</strong> {{ $member->address_line1 }}</div>
                                                <div class="col-md-4"><strong>Line 2:</strong> {{ $member->address_line2 }}</div>
                                                <div class="col-md-4"><strong>Line 3:</strong> {{ $member->address_line3 }}</div>
                                                <div class="col-md-4"><strong>City:</strong> {{ $member->city->name ?? '-' }}</div>
                                                <div class="col-md-4"><strong>State:</strong> {{ $member->state->name ?? '-' }}</div>
                                                <div class="col-md-4"><strong>Zip Code:</strong> {{ $member->zipcode ?? '-' }}</div>
                                          </div>

                                          <h6 class="text-primary mt-4 mb-2">Membership Info</h6>
                                          <div class="row">
                                                <div class="col-md-4"><strong>Region:</strong> {{ $member->region->name ?? '-' }}</div>
                                                <div class="col-md-4"><strong>Zone:</strong> {{ optional(\App\Models\Zone::find($member->zone_id))->name ?? '-' }}</div>
                                                <div class="col-md-4"><strong>Club:</strong> {{ optional(\App\Models\Club::find($member->club_id))->name ?? '-' }}</div>
                                          </div>

                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- End Profile -->
            </div>
      </div>
      </div>

@endsection
