@extends('layouts.master')

@section('content')
<nav>
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('districts.index') }}">Districts</a></li>
        <li class="breadcrumb-item active" aria-current="page">View District</li>
    </ol>
</nav>

<div class="card shadow-sm rounded-4">
    <div class="card-header"><h5>District Details</h5></div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $district->name }}</p>
        <p><strong>State:</strong> {{ $district->state->name ?? '—' }}</p>

        <a href="{{ route('districts.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
