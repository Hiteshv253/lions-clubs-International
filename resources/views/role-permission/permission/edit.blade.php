@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('permissions') }}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
      </ol>
</nav>

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
                        <h5 class="mb-0">Edit Permission</h5>
                  </div>
                  <div class="card-body">
                        <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
                              @csrf
                              @method('PUT')

                              <div class="mb-3">
                                    <label for="permissionName" class="form-label">Permission Name</label>
                                    <input
                                          type="text"
                                          id="permissionName"
                                          name="name"
                                          value="{{ old('name', $permission->name) }}"
                                          class="form-control @error('name') is-invalid @enderror"
                                          placeholder="Enter permission name"
                                          />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                              <div class="text-end">
                                    <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success" />
                                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                              </div>
                        </form>
                  </div>
            </div>

      </div>
</div>

@endsection
