@extends('layouts.master')

@section('content')


<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('occupations.index') }}">Occupation</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show</li>
      </ol>
</nav>
<div class="card shadow-sm rounded-4">
      <div class="card-header">
            <h5 class="mb-0">View Occupation</h5>
      </div>
      <div class="card-body">
            <form action="{{ route('occupations.update', $occupation->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                        <label for="name" class="form-label">Occupation Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $occupation->name }}" required>
                  </div>

                  <div class="d-flex justify-content-end">
                        <a href="{{ route('occupations.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>
@endsection
