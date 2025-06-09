@extends('layouts.master')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $sponsor->name }}</li>
        </ol>
    </nav>

    <div class="card shadow-sm p-4">
        <h2 class="mb-3">{{ $sponsor->name }}</h2>

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
