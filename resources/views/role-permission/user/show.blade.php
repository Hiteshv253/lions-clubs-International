@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>
<!-- Page Content -->
<div class="row">
      <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-warning">
                  <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                  </ul>
            </div>
            @endif
            <div class="card shadow-sm rounded-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">View User<</h5>
                  </div>
                  <div class="card-body">
                        <form action="{{ url('users/'.$user->id) }}" method="POST">
                              @csrf
                              @method('PUT')

                              <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                              </div>
                              <div class="mb-3">
                                    <label class="form-label">Email ID</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly />
                              </div>
                              <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current" />
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                              </div>
                              <div class="mb-3">
                                    <label class="form-label">Roles</label>
                                    <select name="roles[]" class="form-select" multiple>
                                          <option value="">Select Role</option>
                                          @foreach ($roles as $role)
                                          <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                                {{ $role }}
                                          </option>
                                          @endforeach
                                    </select>
                                    @error('roles') <small class="text-danger">{{ $message }}</small> @enderror
                              </div>
                              <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>

@endsection
