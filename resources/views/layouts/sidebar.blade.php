<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="NotificationModalbtn-close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="mt-2 text-center">
                              <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                         colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                              </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                              <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                    It!</button>
                        </div>
                  </div>

            </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index" class="logo logo-dark">
                  <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                  </span>
            </a>
            <!-- Light Logo-->
            <a href="index" class="logo logo-light">
                  <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                  </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                  <i class="ri-record-circle-line"></i>
            </button>
      </div>

      <div id="scrollbar">
            <div class="container-fluid">

                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link menu-link" href="dashboard-crm" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="ri-dashboard-2-line"></i>  Dashboards</span>
                              </a>

                        </li> <!-- end Dashboard Menu -->


<!--<li class="menu-title"><span data-key="t-menu">Membership</span></li>-->
                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarEvent" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarEvent">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Events</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarEvent">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="/lions/events" class="nav-link" data-key="t-crm">Events</a>
                                          </li>

                                    </ul>
                              </div>
                        </li>  <!--end Dashboard Menu -->



                        @php
                        // Check if current URL starts with /lions/members or any other membership-related routes
                        $membershipActive = request()->is('lions/members*') ||
                        request()->is('lions/occupations*') ||
                        request()->is('lions/dg-teams*') ||
                        request()->is('lions/location*') ||
                        request()->is('lions/cities*') ||
                        request()->is('lions/states*') ||
                        request()->is('lions/clubs*') ||
                        request()->is('lions/regions*') ||
                        request()->is('lions/accounts*') ||
                        request()->is('lions/users*') ||
                        request()->is('lions/permissions*') ||
                        request()->is('lions/roles*') ||
                        request()->is('lions/services*');
                        @endphp

                        <li class="nav-item">
                              <a class="nav-link menu-link {{ $membershipActive ? 'active' : '' }}" href="#sidebarMembership" data-bs-toggle="collapse" role="button"
                                 aria-expanded="{{ $membershipActive ? 'true' : 'false' }}" aria-controls="sidebarMembership">
                                    <i class="ri-dashboard-2-line"></i>
                                    <span data-key="t-dashboards">Membership</span>
                              </a>
                              <div class="collapse menu-dropdown {{ $membershipActive ? 'show' : '' }}" id="sidebarMembership">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="{{ route('members.index') }}" class="nav-link {{ request()->is('lions/members*') ? 'active' : '' }}" data-key="t-membership">My Membership</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('occupations.index') }}" class="nav-link {{ request()->is('lions/occupations*') ? 'active' : '' }}" data-key="t-occupations">Occupations</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('dg-teams.index') }}" class="nav-link {{ request()->is('lions/dg-teams*') ? 'active' : '' }}" data-key="t-dg_teams">DG Teams</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('location.form') }}" class="nav-link {{ request()->is('lions/location*') ? 'active' : '' }}" data-key="t-location">Location</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('cities.index') }}" class="nav-link {{ request()->is('lions/cities*') ? 'active' : '' }}" data-key="t-cities">Cities</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('states.index') }}" class="nav-link {{ request()->is('lions/states*') ? 'active' : '' }}" data-key="t-states">States</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('clubs.index') }}" class="nav-link {{ request()->is('lions/clubs*') ? 'active' : '' }}" data-key="t-clubs">Clubs</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('services.index') }}" class="nav-link {{ request()->is('lions/services*') ? 'active' : '' }}" data-key="t-services">Services</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('regions.index') }}" class="nav-link {{ request()->is('lions/regions*') ? 'active' : '' }}" data-key="t-services">Regions</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('accounts.index') }}" class="nav-link {{ request()->is('lions/accounts*') ? 'active' : '' }}" data-key="t-services">Accounts</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('lions/users*') ? 'active' : '' }}" data-key="t-services">Users</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('lions/permissions*') ? 'active' : '' }}" data-key="t-services">Permissions</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('lions/roles*') ? 'active' : '' }}" data-key="t-services">Roles</a>
                                          </li>

                                    </ul>
                              </div>
                        </li>

                        <!--<li class="menu-title"><span data-key="t-menu">Service</span></li>-->
                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarService" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarService">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Service</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarService">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="dashboard-crm" class="nav-link" data-key="t-crm">Our Service</a>
                                          </li>
                                    </ul>
                              </div>
                        </li> <!-- end Dashboard Menu -->
                        <!--<li class="menu-title"><span data-key="t-menu">More</span></li>-->
                        <!--                        <li class="nav-item">
                                                      <a class="nav-link menu-link" href="#sidebarMore" data-bs-toggle="collapse" role="button"
                                                         aria-expanded="false" aria-controls="sidebarMore">
                                                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">More</span>
                                                      </a>
                                                      <div class="collapse menu-dropdown" id="sidebarMore">
                                                            <ul class="nav nav-sm flex-column">
                                                                  <li class="nav-item">
                                                                        <a href="dashboard-crm" class="nav-link" data-key="t-crm">My Club</a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                        <a href="dashboard-crm" class="nav-link" data-key="t-crm">My District/MD/CA</a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                        <a href="dashboard-crm" class="nav-link" data-key="t-crm">My Association</a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                        <a href="dashboard-crm" class="nav-link" data-key="t-crm">Online Directory</a>
                                                                  </li>
                                                                  <li class="nav-item">
                                                                        <a href="dashboard-crm" class="nav-link" data-key="t-crm">Donate</a>
                                                                  </li>
                                                            </ul>
                                                      </div>
                                                </li>  end Dashboard Menu -->


                        <!-- end Dashboard Menu -->



                        <!--<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Settings</span>-->
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarUI">
                                    <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Settings</span>
                              </a>
                              <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                                    <div class="row">
                                          <div class="col-lg-4">
                                                <ul class="nav nav-sm flex-column">
                                                      <li class="nav-item">
                                                            <a href="ui-alerts" class="nav-link" data-key="t-alerts">Settings-1</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-badges" class="nav-link" data-key="t-badges">Settings-2</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-buttons" class="nav-link" data-key="t-buttons">Settings-3</a>
                                                      </li>
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                        </li>
                  </ul>
            </div>
            <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>