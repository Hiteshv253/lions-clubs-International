<div class="col-12 mt-4">
      <h5>Members</h5>
    @if($club->members->count())
            <div class="table-responsive">
                  <table class="table table-bordered table-hover mt-2">
                        <thead class="table-light">
                              <tr>
                                    <th>#</th>
                                    <th>View</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joined On</th>
                              </tr>
                        </thead>
                        <tbody>
                              @foreach($club->members as $index => $member)
                                    <tr>
                                          <td>{{ $index + 1 }}</td>
                                          <td>
                                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-info">View</a>
                                          </td>
                                          <td>{{ $member->first_name }} {{$member->last_name }}</td>
                                          <td>{{ $member->email }}</td>
                                          <td>{{ $member->mobile }}</td>
                                          <td>{{ \Carbon\Carbon::parse($member->join_date)->format('d M Y') }}</td>
                                    </tr>
                              @endforeach
                        </tbody>
                  </table>
            </div>
      @else
            <p class="text-muted">No members found in this club.</p>
      @endif
</div>
