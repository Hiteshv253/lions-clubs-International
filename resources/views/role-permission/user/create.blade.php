@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                        <h5 class="mb-0">Create User</h5>
                  </div>
                  <div class="card-body">
                        <form action="{{ url('users') }}" method="POST">
                              @csrf
                              <div class="row g-3">
                                    <div class="col-sm-6 col-md-3">
                                          <label class="form-label">First Name</label>
                                          <input type="text" name="f_name" class="form-control" />
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                          <label class="form-label">Last Name</label>
                                          <input type="text" name="l_name" class="form-control" />
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                          <label class="form-label">Email</label>
                                          <input type="text" name="email" class="form-control" />
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                          <label class="form-label">Password</label>
                                          <input type="password" name="password" class="form-control" />
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                          <label class="form-label">Roles</label>
                                          <select name="roles[]" class="form-select" multiple1>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                                @endforeach
                                          </select>
                                    </div>
                              </div>
                              <div class="text-end">
                                    <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" />
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection
