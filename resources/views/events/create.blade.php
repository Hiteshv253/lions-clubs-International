@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Create Event</h5>
      </div>
      <div class="card-body">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="row g-3">
                        <div class="col-md-6">
                              <label for="event_name" class="form-label">Event Name</label>
                              <input type="text" name="event_name" id="event_name"
                                     class="form-control @error('event_name') is-invalid @enderror"
                                     value="{{ old('event_name') }}" required>
                              @error('event_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label for="date_time" class="form-label">Date & Time</label>
                              <input type="datetime-local" name="date_time" id="date_time"
                                     class="form-control @error('date_time') is-invalid @enderror"
                                     value="{{ old('date_time') }}" required>
                              @error('date_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label for="event_start_date" class="form-label">Event Start</label>
                              <input type="datetime-local" name="event_start_date" id="event_start_date"
                                     class="form-control @error('event_start_date') is-invalid @enderror"
                                     value="{{ old('event_start_date') }}" required>
                              @error('event_start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label for="event_end_date" class="form-label">Event End</label>
                              <input type="datetime-local" name="event_end_date" id="event_end_date"
                                     class="form-control @error('event_end_date') is-invalid @enderror"
                                     value="{{ old('event_end_date') }}" required>
                              @error('event_end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                              <label for="description" class="form-label">Description</label>
                              <textarea name="description" id="description" rows="5"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                              @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>


                        <div class="col-md-6">
                              <label for="image" class="form-label">Image (optional)</label>
                              <input type="file" name="image" id="image"
                                     class="form-control @error('image') is-invalid @enderror">
                              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label for="banner_image" class="form-label">Banner Image (optional)</label>
                              <input type="file" name="banner_image" id="banner_image"
                                     class="form-control @error('banner_image') is-invalid @enderror">
                              @error('banner_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                              <label for="is_active" class="form-label">Status</label>
                              <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                              @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                  </div>

                  <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success me-2">Save Event</button>
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
