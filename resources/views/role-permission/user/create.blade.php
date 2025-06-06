@extends('layouts.master')

@section('content')
<div class="mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
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

            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create User</h5>
                    <a href="{{ url('users') }}" class="btn btn-sm btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('users') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Roles</label>
                            <select name="roles[]" class="form-select" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
