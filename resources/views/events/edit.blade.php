@extends('layouts.master')

@section('content')

<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>



<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Edit Event: {{ $event->event_name }}</h5>
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
                         <label for="event_start_date" class="form-label">Event Start</label>
                        <input type="datetime-local" name="event_start_date" id="event_start_date"
                               class="form-control @error('event_start_date') is-invalid @enderror"
                               value="{{ old('event_start_date', \Carbon\Carbon::parse($event->event_start_date)->format('Y-m-d\TH:i')) }}"
                               required>
                        @error('event_start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="mb-3">
                            <label for="event_end_date" class="form-label">Event End</label>
                        <input type="datetime-local" name="event_end_date" id="event_end_date"
                               class="form-control @error('event_end_date') is-invalid @enderror"
                               value="{{ old('event_end_date', \Carbon\Carbon::parse($event->event_end_date)->format('Y-m-d\TH:i')) }}"
                               required>
                        @error('event_end_date')
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
                  <div class="col-sm-6 col-md-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" id="is_active" class="form-select">
                              <option value="0" {{ old('is_active', $event->is_active) == 0 ? 'selected' : '' }}>Active</option>
                              <option value="1" {{ old('is_active', $event->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                  </div>
                  <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection
