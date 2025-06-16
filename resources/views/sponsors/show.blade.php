@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

            <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $sponsor->name }}</li>
      </ol>
</nav>

<div class="card shadow-sm rounded-4">
      <div class="card-header">
            <h5 class="mb-0">{{ $sponsor->name }}</h5>
      </div>
      <div class="card-header">
            @if ($sponsor->logo)
            <div class="mb-3">
                  <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" width="150" class="img-thumbnail">
            </div>
            @endif

            <p class="mb-2">
                  <strong>Website:</strong>
                  <a href="{{ $sponsor->website }}" target="_blank">{{ $sponsor->website }}</a>
            </p>

            <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-primary mt-2">Edit Sponsor</a>
            <a href="{{ route('sponsors.index') }}" class="btn btn-secondary mt-2">Back to List</a>
      </div>
</div>
@endsection
