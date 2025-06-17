@extends('layouts.master')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
        <li class="breadcrumb-item active" aria-current="page">Event Details</li>
    </ol>
</nav>

<!-- Event Details Card -->
<div class="card shadow-sm rounded-4">
    <div class="card-header">
        <h5 class="mb-0">Event: {{ $event->event_name }}</h5>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="fw-semibold text-muted">Date & Time:</label>
                <div>{{ \Carbon\Carbon::parse($event->date_time)->format('d M Y, h:i A') }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-semibold text-muted">Event Start:</label>
                <div>{{ \Carbon\Carbon::parse($event->event_start_date)->format('d M Y, h:i A') }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-semibold text-muted">Event End:</label>
                <div>{{ \Carbon\Carbon::parse($event->event_end_date)->format('d M Y, h:i A') }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-semibold text-muted">Status:</label>
                <div>
                    @if ($event->is_active==0)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <label class="fw-semibold text-muted">Description:</label>
                <div>{!! $event->description !!}</div>
            </div>

            @if ($event->image)
            <div class="col-md-6">
                <label class="fw-semibold text-muted">Image:</label>
                <div>
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid rounded shadow-sm" style="max-width: 100%;">
                </div>
            </div>
            @endif

            @if ($event->banner_image)
            <div class="col-md-6">
                <label class="fw-semibold text-muted">Banner Image:</label>
                <div>
                    <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Banner Image" class="img-fluid rounded shadow-sm" style="max-width: 100%;">
                </div>
            </div>
            @endif
        </div>

        <div class="mt-4 text-end">
            <a href="{{ route('events.edit', $event) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@endsection
