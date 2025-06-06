@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Region Details</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $region->name }}</h5>

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
