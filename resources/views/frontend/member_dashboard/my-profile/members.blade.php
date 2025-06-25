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
                              <div class="row mt-1">
                                    <div class="col-12">
                                          <h5 class="mb-3">Our Members</h5>

                                          @if($members->isEmpty())
                                                <p class="text-muted">No active members found.</p>
                                          @else
                                                <div class="table-responsive">
                                                      <table class="table table-bordered table-hover align-middle">
                                                            <thead class="table-light">
                                                                  <tr>
                                                                        <th>Name</th>
                                                                        <th>Membership ID</th>
                                                                        <th>Region</th>
                                                                        <th>Club</th>
                                                                        <th>Email</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  @foreach($members as $m)
                                                                        <tr>
                                                                              <td>{{ $m->first_name }} {{ $m->last_name }}</td>
                                                                              <td>{{ $m->membership_id }}</td>
                                                                              <td>{{ $m->region->name ?? '-' }}</td>
                                                                              <td>{{ optional($m->club)->name ?? '-' }}</td>
                                                                              <td>{{ $m->email }}</td>
                                                                        </tr>
                                                                  @endforeach
                                                            </tbody>
                                                      </table>
                                                </div>
                                                <a href="/members/members-ui" class="btn btn-outline-primary mt-3">View All Members</a>
                                          @endif
                                    </div>
                              </div>

                        </div>
                  <!-- End Profile -->
                  </div>
            </div>
      </div>

@endsection
