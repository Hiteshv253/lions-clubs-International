@extends('layouts.master')

@push('vendor-style')
<!-- swiper css -->
<link rel="stylesheet" href="{{ asset('') }}assets/libs/swiper/swiper-bundle.min.css">
@endpush
@push('vendor-script')
<!-- swiper js -->
<script src="{{ asset('') }}assets/libs/swiper/swiper-bundle.min.js"></script>
@endpush
@push('page-script')
<!-- profile init js -->
<script src="{{ asset('') }}assets/js/pages/profile.init.js"></script>
@endpush

@section('content')
<div class="profile-foreground position-relative mx-n4 mt-n4">
      <div class="profile-wid-bg">
            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
      </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
      <div class="row g-4">
            <div class="col-auto">
                  <div class="avatar-lg">
                        <img src="https://picsum.photos/100/100?random=705" alt="user-img" class="img-thumbnail rounded-circle" />
                  </div>
            </div>
            <!--end col-->
            <div class="col">
                  <div class="p-2">
                        <h3 class="text-white mb-1">

                              @if ($member)
                              {{ $member->first_name }} {{ $member->last_name }}
                              @else
                              {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                              @endif




                        </h3>
                        <p class="text-white text-opacity-75">
                              @foreach(auth()->user()->getRoleNames() as $role)
                              <span>Role : {{ Ucfirst($role) }}</span>
                              @endforeach
                              ||  Lion ID & Member ID : {{ $member->membership_id ?? 'N/A' }}
                        </p>
                        <div class="hstack text-white-50 gap-1">
                              <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                    Email ID: {{ optional($user)->email ?? 'Not Available' }}
                              </div>
                              <div>
                                    <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                    Region-Club:
                                    @if ($member)
                                    {{ $member->region->name ?? 'Region not available' }}
                                    ({{ $member->club_id ?? 'Club not available' }})
                                    @else
                                    Member info not found
                                    @endif

                              </div>
                        </div>
                  </div>
            </div>
            <!--end col-->
            <div class="col-12 col-lg-auto order-last order-lg-0">
                  <div class="row text text-white-50 text-center">
                        <div class="col-lg-6 col-4">
                              <div class="p-2">
                                    <h4 class="text-white mb-1">24.3K</h4>
                                    <p class="fs-14 mb-0">Followers</p>
                              </div>
                        </div>
                        <div class="col-lg-6 col-4">
                              <div class="p-2">
                                    <h4 class="text-white mb-1">1.3K</h4>
                                    <p class="fs-14 mb-0">Following</p>
                              </div>
                        </div>
                  </div>
            </div>
            <!--end col-->

      </div>
      <!--end row-->
</div>

<div class="row">
      <div class="col-lg-12">
            <div>
                  <div class="d-flex profile-wrapper">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                              <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                          <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Overview</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                          <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Activities</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#my-members" role="tab">
                                          <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">My Members</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                          <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Documents</span>
                                    </a>
                              </li>
                        </ul>
                        <div class="flex-shrink-0">
                              <a href="{{route('profile.edit') }}" class="btn btn-success"><i
                                          class="ri-edit-box-line align-bottom"></i> Edit Profile@</a>
                        </div>
                  </div>
                  <!-- Tab panes -->
                  <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                              <div class="row">
                                    <div class="col-xxl-3">
                                          <!--                                          <div class="card">
                                                                                          <div class="card-body">
                                                                                                <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                                                                <div class="progress animated-progress custom-progress progress-label">
                                                                                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 30%"
                                                                                                           aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                                                                            <div class="label">30%</div>
                                                                                                      </div>
                                                                                                </div>
                                                                                          </div>
                                                                                    </div>-->

                                          <div class="card">
                                                <div class="card-body">
                                                      <h5 class="card-title mb-3">Info</h5>
                                                      <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                  <tbody>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Full Name :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->first_name }} {{ $member->last_name }}
                                                                                    @else
                                                                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                                                                    @endif

                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Account Name :</th>
                                                                              <td class="text-muted">{{ optional($member?->account)->name ?? 'Not Found' }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Mobile :</th>
                                                                              <td class="text-muted">{{ $member->mobile ?? 'N/A' }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Gender :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->gender ?? 'N/A' }} 
                                                                                    @else
                                                                                    N/A
                                                                                    @endif

                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">City :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->city->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">State :</th>
                                                                              <td class="text-muted">

                                                                                    @if ($member)
                                                                                    {{ $member->state->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>

                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Region :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->region->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif


                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Club :</th>
                                                                              <td class="text-muted">

                                                                                    @if ($member)
                                                                                    {{ optional(\App\Models\Club::find($member->club_id))->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif

                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Zone :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ optional(\App\Models\Zone::find($member->zone_id))->name ?? 'N/A' }}

                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Occupation :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ optional($member->occupation)->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Birthdate :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->birthdate ? \Carbon\Carbon::parse($member->birthdate)->format('d M Y') : 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Address :</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->address_line1 }} {{ $member->address_line2 }} {{ $member->address_line3 }}<br>
                                                                                    {{ optional($member->city)->name ?? '' }},
                                                                                    {{ optional($member->state)->name ?? '' }}
                                                                                    {{ $member->zipcode }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <th class="ps-0" scope="row">Joining Date</th>
                                                                              <td class="text-muted">
                                                                                    @if ($member)
                                                                                    {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('d M Y') : 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif
                                                                              </td>

                                                                        </tr>
                                                                  </tbody>
                                                            </table>
                                                      </div>
                                                </div><!-- end card body -->
                                          </div><!-- end card -->

                                          <div class="card">
                                                <div class="card-body">
                                                      <h5 class="card-title mb-4">Portfolio</h5>
                                                      <div class="d-flex flex-wrap gap-2">
                                                            <div>
                                                                  <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                        <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                                                              <i class="ri-github-fill"></i>
                                                                        </span>
                                                                  </a>
                                                            </div>
                                                            <div>
                                                                  <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                        <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                                              <i class="ri-global-fill"></i>
                                                                        </span>
                                                                  </a>
                                                            </div>
                                                            <div>
                                                                  <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                        <span class="avatar-title rounded-circle fs-16 bg-success">
                                                                              <i class="ri-dribbble-fill"></i>
                                                                        </span>
                                                                  </a>
                                                            </div>
                                                            <div>
                                                                  <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                        <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                                              <i class="ri-pinterest-fill"></i>
                                                                        </span>
                                                                  </a>
                                                            </div>
                                                      </div>
                                                </div><!-- end card body -->
                                          </div><!-- end card -->

                                          <div class="card">
                                                <div class="card-body">
                                                      <h5 class="card-title mb-4">Skills</h5>
                                                      <div class="d-flex flex-wrap gap-2 fs-15">
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">Photoshop</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">illustrator</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">HTML</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">CSS</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">Javascript</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">Php</a>
                                                            <a href="javascript:void(0);"
                                                               class="badge bg-primary-subtle text-primary">Python</a>
                                                      </div>
                                                </div><!-- end card body -->
                                          </div><!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-9">
                                          <div class="card">
                                                <div class="card-body">
                                                      <h5 class="card-title mb-3">About</h5>
                                                      <p>Hi I'm Anna Adame, It will be as simple as Occidental; in fact, it will be
                                                            Occidental. To an English person, it will seem like simplified English, as a
                                                            skeptical Cambridge friend of mine told me what Occidental is European languages
                                                            are members of the same family.</p>
                                                      <p>You always want to make sure that your fonts work well together and try to limit
                                                            the number of fonts you use to three or less. Experiment and play around with
                                                            the fonts that you already have in the software youâre working with reputable
                                                            font websites. This may be the most commonly encountered tip I received from the
                                                            designers I spoke with. They highly encourage that you use different fonts in
                                                            one design, but do not over-exaggerate and go overboard.</p>
                                                      <div class="row">
                                                            <div class="col-6 col-md-4">
                                                                  <div class="d-flex mt-4">
                                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                              <div
                                                                                    class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                                    <i class="ri-user-2-fill"></i>
                                                                              </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                              <p class="mb-1">Designation :</p>
                                                                              <h6 class="text-truncate mb-0">Lead Designer / Developer</h6>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-6 col-md-4">
                                                                  <div class="d-flex mt-4">
                                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                              <div
                                                                                    class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                                    <i class="ri-global-line"></i>
                                                                              </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                              <p class="mb-1">Website :</p>
                                                                              <a href="#" class="fw-semibold">www.lionsclubs.com</a>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="col-6 col-md-4">
                                                                  <div class="d-flex mt-4">
                                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                              <div
                                                                                    class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                                    <i class="ri-global-line"></i>
                                                                              </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 overflow-hidden">
                                                                              <p class="mb-1">Occupation  :</p>
                                                                              <a href="#" class="fw-semibold">
                                                                                    @if ($member)
                                                                                    {{ optional($member->occupation)->name ?? 'N/A' }}
                                                                                    @else
                                                                                    N/A
                                                                                    @endif</a>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!--end col-->
                                                      </div>
                                                      <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                          </div><!-- end card -->

                                          <div class="card">
                                                <div class="card-body">
                                                      <h5 class="card-title">My Members ({{ count($my_members) }})</h5>
                                                      <div class="input-group mb-3">
                                                            <input type="text" id="memberSearch" class="form-control" placeholder="Search member by name or ID...">
                                                            <button id="searchBtn" class="btn btn-primary">Search</button>
                                                            <button id="resetBtn" class="btn btn-secondary">Reset</button>
                                                      </div>
                                                      <div id="memberCards">
                                                            @include('role-permission.user.profile.partials.cards', ['my_members' => $my_members])
                                                      </div>
                                                </div>
                                          </div>
                                          <!--end card-->
                                    </div>
                                    <!--end col-->
                              </div>
                              <!--end row-->
                        </div>
                        <div class="tab-pane fade" id="activities" role="tabpanel">
                              <div class="card">
                                    <div class="card-body">
                                          <h5 class="card-title mb-3">Activities</h5>
                                          <div class="acitivity-timeline">
                                                <div class="acitivity-item d-flex">
                                                      <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-1.jpg" alt=""
                                                                 class="avatar-xs rounded-circle acitivity-avatar" />
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Oliver Phillips <span
                                                                        class="badge bg-primary-subtle text-primary align-middle">New</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">We talked about a project on linkedin.</p>
                                                            <small class="mb-0 text-muted">Today</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                            <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                                  N
                                                            </div>
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Nancy Martino <span
                                                                        class="badge bg-secondary-subtle text-secondary align-middle">In
                                                                        Progress</span></h6>
                                                            <p class="text-muted mb-2"><i class="ri-file-text-line align-middle ms-2"></i>
                                                                  Create new project Buildng product</p>
                                                            <div class="avatar-group mb-2">
                                                                  <a href="javascript: void(0);" class="avatar-group-item"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                                     data-bs-original-title="Christi">
                                                                        <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                             class="rounded-circle avatar-xs" />
                                                                  </a>
                                                                  <a href="javascript: void(0);" class="avatar-group-item"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                                     data-bs-original-title="Frank Hook">
                                                                        <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                             class="rounded-circle avatar-xs" />
                                                                  </a>
                                                                  <a href="javascript: void(0);" class="avatar-group-item"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                                     data-bs-original-title=" Ruby">
                                                                        <div class="avatar-xs">
                                                                              <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                    R
                                                                              </div>
                                                                        </div>
                                                                  </a>
                                                                  <a href="javascript: void(0);" class="avatar-group-item"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                                     data-bs-original-title="more">
                                                                        <div class="avatar-xs">
                                                                              <div class="avatar-title rounded-circle">
                                                                                    2+
                                                                              </div>
                                                                        </div>
                                                                  </a>
                                                            </div>
                                                            <small class="mb-0 text-muted">Yesterday</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                 class="avatar-xs rounded-circle acitivity-avatar" />
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Natasha Carey <span
                                                                        class="badge bg-success-subtle text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">Adding a new event with attachments</p>
                                                            <div class="row">
                                                                  <div class="col-xxl-4">
                                                                        <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                              <div class="col-4">
                                                                                    <img src="assets/images/small/img-2.jpg" alt=""
                                                                                         class="img-fluid rounded" />
                                                                              </div>
                                                                              <!--end col-->
                                                                              <div class="col-4">
                                                                                    <img src="assets/images/small/img-3.jpg" alt=""
                                                                                         class="img-fluid rounded" />
                                                                              </div>
                                                                              <!--end col-->
                                                                              <div class="col-4">
                                                                                    <img src="assets/images/small/img-4.jpg" alt=""
                                                                                         class="img-fluid rounded" />
                                                                              </div>
                                                                              <!--end col-->
                                                                        </div>
                                                                        <!--end row-->
                                                                  </div>
                                                            </div>
                                                            <small class="mb-0 text-muted">25 Nov</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-6.jpg" alt=""
                                                                 class="avatar-xs rounded-circle acitivity-avatar" />
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Bethany Johnson</h6>
                                                            <p class="text-muted mb-2">added a new member to lionsclubs dashboard</p>
                                                            <small class="mb-0 text-muted">19 Nov</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                  <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                                        <i class="ri-shopping-bag-line"></i>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Your order is placed <span
                                                                        class="badge bg-danger-subtle text-danger align-middle ms-1">Out of
                                                                        Delivery</span></h6>
                                                            <p class="text-muted mb-2">These customers can rest assured their order has
                                                                  been placed.</p>
                                                            <small class="mb-0 text-muted">16 Nov</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-7.jpg" alt=""
                                                                 class="avatar-xs rounded-circle acitivity-avatar" />
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Lewis Pratt</h6>
                                                            <p class="text-muted mb-2">They all have something to say
                                                                  beyond the words on the page. They can come across as
                                                                  casual or neutral, exotic or graphic. </p>
                                                            <small class="mb-0 text-muted">22 Oct</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item py-3 d-flex">
                                                      <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                  <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                                        <i class="ri-line-chart-line"></i>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Monthly sales report</h6>
                                                            <p class="text-muted mb-2">
                                                                  <span class="text-danger">2 days left</span> notification to submit the
                                                                  monthly sales report. <a href="javascript:void(0);"
                                                                                           class="link-warning text-decoration-underline">Reports Builder</a>
                                                            </p>
                                                            <small class="mb-0 text-muted">15 Oct</small>
                                                      </div>
                                                </div>
                                                <div class="acitivity-item d-flex">
                                                      <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-8.jpg" alt=""
                                                                 class="avatar-xs rounded-circle acitivity-avatar" />
                                                      </div>
                                                      <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">New ticket received <span
                                                                        class="badge bg-success-subtle text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span>
                                                                  submitted a ticket.</p>
                                                            <small class="mb-0 text-muted">26 Aug</small>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <!--end card-body-->
                              </div>
                              <!--end card-->
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="my-members" role="tabpanel">
                              <div class="card">
                                    <div class="card-body">
                                          <div class="row">
                                                <div class="input-group mb-3">
                                                      <input type="text" id="memberSearch" class="form-control" placeholder="Search member by name or ID...">
                                                      <button id="searchBtn" class="btn btn-primary">Search</button>
                                                      <button id="resetBtn" class="btn btn-secondary">Reset</button>
                                                </div>
                                                <div id="memberCards">

                                                      @include('role-permission.user.profile.partials.cards', ['my_members' => $my_members])
                                                </div>
                                          </div>
                                          <!--end row-->
                                    </div>
                                    <!--end card-body-->
                              </div>
                              <!--end card-->
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="documents" role="tabpanel">
                              <div class="card">
                                    <div class="card-body">
                                          <div class="d-flex align-items-center mb-4">
                                                <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                                <div class="flex-shrink-0">
                                                      <input class="form-control d-none" type="file" id="formFile">
                                                      <label for="formFile" class="btn btn-danger"><i
                                                                  class="ri-upload-2-fill me-1 align-bottom"></i> Upload File</label>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-lg-12">
                                                      <div class="table-responsive">
                                                            <table class="table table-borderless align-middle mb-0">
                                                                  <thead class="table-light">
                                                                        <tr>
                                                                              <th scope="col">File Name</th>
                                                                              <th scope="col">Type</th>
                                                                              <th scope="col">Size</th>
                                                                              <th scope="col">Upload Date</th>
                                                                              <th scope="col">Action</th>
                                                                        </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-primary-subtle text-primary rounded fs-20">
                                                                                                      <i class="ri-file-zip-fill"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0"><a
                                                                                                            href="javascript:void(0)">Artboard-documents.zip</a>
                                                                                                </h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>Zip File</td>
                                                                              <td>4.57 MB</td>
                                                                              <td>12 Dec 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink15" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink15">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-danger-subtle text-danger rounded fs-20">
                                                                                                      <i class="ri-file-pdf-fill"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0"><a
                                                                                                            href="javascript:void(0);">Bank Management
                                                                                                            System</a></h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>PDF File</td>
                                                                              <td>8.89 MB</td>
                                                                              <td>24 Nov 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink3" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink3">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-secondary-subtle text-secondary rounded fs-20">
                                                                                                      <i class="ri-video-line"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0"><a
                                                                                                            href="javascript:void(0);">Tour-video.mp4</a>
                                                                                                </h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>MP4 File</td>
                                                                              <td>14.62 MB</td>
                                                                              <td>19 Nov 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink4" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink4">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-success-subtle text-success rounded fs-20">
                                                                                                      <i class="ri-file-excel-fill"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0"><a
                                                                                                            href="javascript:void(0);">Account-statement.xsl</a>
                                                                                                </h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>XSL File</td>
                                                                              <td>2.38 KB</td>
                                                                              <td>14 Nov 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink5" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink5">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                                </li>
                                                                                                <li class="dropdown-divider"></li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-info-subtle text-info rounded fs-20">
                                                                                                      <i class="ri-folder-line"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0"><a
                                                                                                            href="javascript:void(0);">Project Screenshots
                                                                                                            Collection</a></h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>Floder File</td>
                                                                              <td>87.24 MB</td>
                                                                              <td>08 Nov 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink6" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink6">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                                                </li>
                                                                                                <li>
                                                                                                      <a class="dropdown-item"
                                                                                                         href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                        <tr>
                                                                              <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                          <div class="avatar-sm">
                                                                                                <div
                                                                                                      class="avatar-title bg-danger-subtle text-danger rounded fs-20">
                                                                                                      <i class="ri-image-2-fill"></i>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="ms-3 flex-grow-1">
                                                                                                <h6 class="fs-15 mb-0">
                                                                                                      <a href="javascript:void(0);">lionsclubs-logo.png</a>
                                                                                                </h6>
                                                                                          </div>
                                                                                    </div>
                                                                              </td>
                                                                              <td>PNG File</td>
                                                                              <td>879 KB</td>
                                                                              <td>02 Nov 2021</td>
                                                                              <td>
                                                                                    <div class="dropdown">
                                                                                          <a href="javascript:void(0);"
                                                                                             class="btn btn-light btn-icon"
                                                                                             id="dropdownMenuLink7" data-bs-toggle="dropdown"
                                                                                             aria-expanded="true">
                                                                                                <i class="ri-equalizer-fill"></i>
                                                                                          </a>
                                                                                          <ul class="dropdown-menu dropdown-menu-end"
                                                                                              aria-labelledby="dropdownMenuLink7">
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item"
                                                                                                       href="javascript:void(0);"><i
                                                                                                                  class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                                                </li>
                                                                                                <li>
                                                                                                      <a class="dropdown-item"
                                                                                                         href="javascript:void(0);"><i
                                                                                                                  class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                                                </li>
                                                                                          </ul>
                                                                                    </div>
                                                                              </td>
                                                                        </tr>
                                                                  </tbody>
                                                            </table>
                                                      </div>
                                                      <div class="text-center mt-3">
                                                            <a href="javascript:void(0);" class="text-success"><i
                                                                        class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load
                                                                  more </a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!--end tab-pane-->
                  </div>
                  <!--end tab-content-->
            </div>
      </div>
      <!--end col-->
</div>
<!--end row-->
<script>
function fetchMembers(query = '') {
      $.ajax({
            url: '{{ route("members.search") }}',
            type: 'GET',
            data: {search: query},
            success: function (data) {
                  $('#memberCards').html(data);
            }
      });
}

$('#searchBtn').click(function () {
      let query = $('#memberSearch').val();
      fetchMembers(query);
});

$('#resetBtn').click(function () {
      $('#memberSearch').val('');
      fetchMembers(); // Load all members
});

// Optional: Enter key triggers search
$('#memberSearch').on('keypress', function (e) {
      if (e.which === 13) {
            $('#searchBtn').click();
      }
});
</script>


@endsection
