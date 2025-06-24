@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('permissions') }}">Permissions</a></li>
            <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
      </ol>
</nav>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
      <div class="col-md-12">
            <!-- Permissions Card -->
            <div class="card shadow-sm border-0">
                  <div class="card-header d-flex justify-content-between align-items-center ">
                        <h5 class="mb-0">Permissions</h5>
                        @can('create permission')
                        <a href="{{ url('lions/permissions/create') }}" class="btn btn-primary btn-sm">Add Permission</a>
                        @endcan


                  </div>

                  <div class="card-body">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped mb-0">
                                    <thead class="table-light">
                                          <tr>
                                                <th style="width: 10%;">#</th>
                                                <th>Name</th>
                                                <th style="width: 30%;">Actions</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @forelse ($groupedPermissions as $group => $perms)
                                          <tr>
                                                <td colspan="3" class="fw-bold bg-light text-primary">{{ ucfirst($group) }} Permissions</td>
                                          </tr>
                                          @foreach ($perms as $permission)
                                          <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ ucfirst(str_replace('_', ' ', $permission->name)) }}</td>
                                                <td>
                                                      @can('update permission')
                                                      <a href="{{ url('lions/permissions/'.$permission->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                                      @endcan

                                                      @can('delete permission')
                                                      <form action="{{ url('lions/permissions/'.$permission->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm ms-1" style="display: none;">Delete</button>
                                                      </form>
                                                      @endcan
                                                </td>
                                          </tr>
                                          @endforeach
                                          @empty
                                          <tr>
                                                <td colspan="3" class="text-center text-muted">No permissions found.</td>
                                          </tr>
                                          @endforelse
                                    </tbody>

                              </table>
                        </div>
                  </div>

                  {{-- Uncomment if using pagination --}}
                  {{-- <div class="card-footer text-center">
            {{ $permissions->links() }}
            </div> --}}
      </div>
</div>

@endsection
