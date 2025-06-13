@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
      </ol>
</nav>



<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">{{ $event->event_name }}</h5>
      </div>
      <div class="card-body">
            <p><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($event->date_time)->format('F j, Y - g:i A') }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $event->description }}</p>

            @if($event->image)
            <div class="mb-3">
                  <strong>Image:</strong><br>
                  <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid" style="max-width: 200px;">
            </div>
            @endif

            @if($event->banner_image)
            <div class="mb-3">
                  <strong>Banner:</strong><br>
                  <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Banner Image" class="img-fluid" style="max-width: 400px;">
            </div>
            @endif

            <p><strong>Active:</strong> {{ $event->is_active ? 'Yes' : 'No' }}</p>
      </div>
      <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
</div>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
</script>
@endsection
