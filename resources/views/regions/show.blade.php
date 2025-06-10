@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Region</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show</li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h4 class="mb-0">Create Region</h4>
      </div>
      <div class="card-body">

            <p class="card-text">
                  <strong>Parent Region:</strong>
                  @if($region->parent)
                  {{ $region->parent->name }}
                  @else
                  <em>No Parent Region</em>
                  @endif
            </p>

            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('regions.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
</div>
</div>
@endsection
