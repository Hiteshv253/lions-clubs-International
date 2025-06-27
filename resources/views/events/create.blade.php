@extends('layouts.master')

@section('content')
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
      </nav>

      <div class="card shadow-sm rounded-4">
            <div class="card-header">
                  <h5 class="mb-0">Create Event</h5>
            </div>
            <div class="card-body">
                  <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                              <div class="col-md-12">
                                    <label for="event_name" class="form-label">Event Name *</label>
                                    <input type="text" name="event_name" id="event_name" class="form-control @error('event_name') is-invalid @enderror" value="{{ old('event_name') }}" >
                              @error('event_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>


                              <div class="col-sm-6 col-md-4">
                                    <label for="event_start_date" class="form-label">Event Start Date & Time *</label>
                                    <input type="datetime-local" name="event_start_date" id="event_start_date" class="form-control @error('event_start_date') is-invalid @enderror" value="{{ old('event_start_date') }}" >
                              @error('event_start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label for="event_end_date" class="form-label">Event End Date & Time *</label>
                                    <input type="datetime-local" name="event_end_date" id="event_end_date" class="form-control @error('event_end_date') is-invalid @enderror" value="{{ old('event_end_date') }}" >
                              @error('event_end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>



                              <div class="col-sm-6 col-md-4">
                                    <label for="total_amount" class="form-label">Cost of Event(Inclusive of GST(INR)) *</label>
                                    <input type="number" name="total_amount" id="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount') }}" >
                                    @error('total_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label for="venue_name" class="form-label">Venue</label>
                                    <input type="text" name="venue_name" id="venue_name" class="form-control">
                                    <input type="hidden" name="flag_id" id="flag_id"  value="1">
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_event_users" class="form-label">Total Number of Register Event</label>
                                    <input type="number" name="total_event_users" id="total_event_users"  class="form-control @error('total_event_users') is-invalid @enderror" value="{{ old('total_event_users') }}" >

                                    @error('total_event_users') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_registered_user" class="form-label">Registered User Events</label>
                                    <input type="number" name="total_registered_user" id="total_registered_user" class="form-control" readonly="">
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <label for="total_pendding_users" class="form-label">Pendding Events</label>
                                    <input type="number" name="total_pendding_users" id="total_pendding_users" class="form-control" readonly="">
                              </div>
                              
                              <div class="col-sm-6 col-md-2">
                                    <label class="form-label">Limited Sheet</label>
                                    <select name="limited_sheet" id="limited_sheet" class="form-select">
                                          <option value="0" {{ old('limited_sheet', 0) == 0 ? 'selected' : '' }}>Yes</option>
                                          <option value="1" {{ old('limited_sheet', 1) == 1 ? 'selected' : '' }}>No</option>
                                    </select>
                              </div>

                              <div class="col-12">
                                    <label for="description" class="form-label">Event Description</label>
                                    <textarea name="description" id="description" rows="5"
                                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                              @error('description')
                              <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>


                              <div class="col-md-6">
                                    <label for="image" class="form-label">Event Image (optional)</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

@endsection
