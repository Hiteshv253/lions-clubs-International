@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Edit Event: {{ $event->event_name }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="event_name" class="form-label">Event Name</label>
                    <input type="text" name="event_name" id="event_name"
                           class="form-control @error('event_name') is-invalid @enderror"
                           value="{{ old('event_name', $event->event_name) }}" required>
                    @error('event_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_time" class="form-label">Date & Time</label>
                    <input type="datetime-local" name="date_time" id="date_time"
                           class="form-control @error('date_time') is-invalid @enderror"
                           value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}"
                           required>
                    @error('date_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if($event->image)
                <div class="mb-3">
                    <label class="form-label">Current Image:</label>
                    <div>
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-fluid" style="max-width: 150px;">
                    </div>
                </div>
                @endif
                <div class="mb-3">
                    <label for="image" class="form-label">Replace Image (optional)</label>
                    <input type="file" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if($event->banner_image)
                <div class="mb-3">
                    <label class="form-label">Current Banner:</label>
                    <div>
                        <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Banner" class="img-fluid" style="max-width: 300px;">
                    </div>
                </div>
                @endif
                <div class="mb-3">
                    <label for="banner_image" class="form-label">Replace Banner (optional)</label>
                    <input type="file" name="banner_image" id="banner_image"
                           class="form-control @error('banner_image') is-invalid @enderror">
                    @error('banner_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           class="form-check-input" {{ $event->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">Active?</label>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Update Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
