<div class="row mt-3">
      @forelse ($my_members as $my_member)
      <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                  <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                              <div>
                                    <h5 class="fw-semibold mb-1 text-truncate">
                                          {{ $my_member->first_name }} {{ $my_member->last_name }}
                                    </h5>
                                    <p class="text-muted mb-0 fs-13">
                                          Last Login: <span class="fw-semibold">
                                                {{ $my_member->last_login_at ? \Carbon\Carbon::parse($my_member->last_login_at)->diffForHumans() : 'Never logged in' }}
                                          </span>
                                    </p>
                              </div>
                              <span class="badge bg-success fs-12">Completed</span>
                        </div>
                        <hr>
                        <div class="row">
                              <div class="col-6 mb-2">
                                    <strong class="text-muted fs-12 d-block">Member ID:</strong>
                                    <span class="fs-14">{{ $my_member->membership_id }}</span>
                              </div>
                              <div class="col-6 mb-2">
                                    <strong class="text-muted fs-12 d-block">Region:</strong>
                                    <span class="fs-14">{{ $my_member->region->name ?? 'N/A' }}</span>
                              </div>
                              <div class="col-6 mb-2">
                                    <strong class="text-muted fs-12 d-block">Club:</strong>
                                    <span class="fs-14">{{ optional($my_member->club)->name ?? 'N/A' }}</span>
                              </div>
                              <div class="col-6 mb-2">
                                    <strong class="text-muted fs-12 d-block">Zone:</strong>
                                    <span class="fs-14">{{ optional($my_member->zone)->name ?? 'N/A' }}</span>
                              </div>
                        </div>

                  </div>
            </div>
      </div>
      @empty
      <div class="col-12 text-center">
            <p>No members found.</p>
      </div>
      @endforelse
</div>
