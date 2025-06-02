@extends('layouts.master')

@section('content')
<div class="container">
      <h1>{{ $event->event_name }}</h1>
      <p><strong>Date &amp; Time:</strong> {{ $event->date_time }}</p>
      <p><strong>Description:</strong></p>
      <p>{{ $event->description }}</p>

      @if($event->image)
      <div class="mb-3">
            <strong>Image:</strong><br>
            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="max-width: 200px;">
      </div>
      @endif

      @if($event->banner_image)
      <div class="mb-3">
            <strong>Banner:</strong><br>
            <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Banner" style="max-width: 400px;">
      </div>
      @endif

      <p><strong>Active:</strong> {{ $event->is_active ? 'Yes' : 'No' }}</p>

      <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
      <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
