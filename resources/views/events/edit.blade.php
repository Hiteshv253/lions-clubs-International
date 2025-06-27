@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
      </nav>
<!-- Edit Event Form -->
      <div class="card shadow-sm rounded-4">
            <div class="card-header">
                  <h5 class="mb-0">Edit Event: {{ $event->event_name }}</h5>
            </div>
            <div class="card-body">
                  <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                        <!-- Event Name -->
                              <div class="col-md-12">
                                    <label for="event_name" class="form-label">Event Name</label>
                                    <input type="text" name="event_name" id="event_name" class="form-control @error('event_name') is-invalid @enderror" value="{{ old('event_name', $event->event_name) }}" >
                                    @error('event_name')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                        <!-- Date & Time -->
                              <div class="col-sm-6 col-md-3" style="display: none;">
                                    <label for="date_time" class="form-label">Date & Time</label>
                                    <input type="datetime-local" name="date_time" id="date_time" class="form-control @error('date_time') is-invalid @enderror" value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}" >
                                    @error('date_time')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                        <!-- Event Start -->
                              <div class="col-sm-6 col-md-4">
                                    <label for="event_start_date" class="form-label">Event Start Date & Time</label>
                                    <input type="datetime-local" name="event_start_date" id="event_start_date" class="form-control @error('event_start_date') is-invalid @enderror" value="{{ old('event_start_date', \Carbon\Carbon::parse($event->event_start_date)->format('Y-m-d\TH:i')) }}" >
                                    @error('event_start_date')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                        <!-- Event End -->
                              <div class="col-sm-6 col-md-4">
                                    <label for="event_end_date" class="form-label">Event End Date & Time</label>
                                    <input type="datetime-local" name="event_end_date" id="event_end_date" class="form-control @error('event_end_date') is-invalid @enderror"  value="{{ old('event_end_date', \Carbon\Carbon::parse($event->event_end_date)->format('Y-m-d\TH:i')) }}" >
                                    @error('event_end_date')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>



                              <div class="col-sm-6 col-md-4">
                                    <label for="total_amount" class="form-label">Cost of Event(Inclusive of GST(INR))</label>
                                    <input type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', $event->total_amount) }}" class="form-control" readonly>

                                    @error('total_amount')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label for="total_amount" class="form-label">Venue</label>
                                    <input type="text" name="venue_name" id="venue_name" value="{{ old('venue_name', $event->venue_name) }}" class="form-control">
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_event_users" class="form-label">Total Number of Register Event</label>
                                    <input type="number" name="total_event_users" id="total_event_users" value="{{ old('total_event_users', $event->total_event_users) }}" class="form-control">
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_registered_user" class="form-label">Registered User Events</label>
                                    <input type="number" name="total_registered_user" id="total_registered_user" value="{{ old('total_registered_user', $event->total_registered_user) }}" class="form-control" >
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_pendding_users" class="form-label">Pendding Events</label>
                                    <input type="number" name="total_pendding_users" id="total_pendding_users" value="{{ old('total_pendding_users', $event->total_pendding_users) }}" class="form-control" >
                              </div>
                             <div class="col-sm-6 col-md-2">
                                    <label class="form-label">Limited Sheet</label>
                                    <select name="limited_sheet" id="limited_sheet" class="form-select">
                                          <option value="0" {{ old('limited_sheet', $event->limited_sheet) == 0 ? 'selected' : '' }}>Yes</option>
                                          <option value="1" {{ old('limited_sheet', $event->limited_sheet) == 1 ? 'selected' : '' }}>No</option>
                                    </select>
                              </div>


                        <!-- Description -->
                              <div class="col-md-12">
                                    <label for="description" class="form-label">Event Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $event->description) }}</textarea>
                                    @error('description')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                        <!-- Image Preview + Upload -->
                              <div class="col-md-6">
                                    @if($event->image)
                                          <label class="form-label d-block">Event Current Image:</label>
                                          <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-thumbnail mb-2" style="max-width: 150px;">
                                    @endif

                                    <label for="image" class="form-label">Event Image (Replace optional)</label>
                                    <input type="file" name="image" id="image"
                                     class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                        <!-- Status -->
                              <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                    <select name="is_active" id="is_active" class="form-select">
                                          <option value="0" {{ old('is_active', $event->is_active) == 0 ? 'selected' : '' }}>Active</option>
                                          <option value="1" {{ old('is_active', $event->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                              </div>


                        <!-- Submit & Cancel -->
                              <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-success">Update Event</button>
                                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
      <script>
document.getElementById('total_registered_user').addEventListener('input', function () {
    const total = parseInt(document.getElementById('total_event_users').value) || 0;
    const registered = parseInt(this.value) || 0;

    if (registered > total) {
        alert('Registered User Events cannot exceed Total Number of Register Event.');
        this.value = total; // reset to max allowed
    }
});
      </script>

@endsection
