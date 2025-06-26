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
                              <input type="text" name="event_name" id="event_name"
                                     class="form-control @error('event_name') is-invalid @enderror"
                                     value="{{ old('event_name', $event->event_name) }}" required>
                              @error('event_name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <!-- Date & Time -->
                         <div class="col-sm-6 col-md-3" style="display: none;">
                              <label for="date_time" class="form-label">Date & Time</label>
                              <input type="datetime-local" name="date_time" id="date_time"
                                     class="form-control @error('date_time') is-invalid @enderror"
                                     value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}" required>
                              @error('date_time')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <!-- Event Start -->
                        <div class="col-sm-6 col-md-4">
                              <label for="event_start_date" class="form-label">Event Start Date & Time</label>
                              <input type="datetime-local" name="event_start_date" id="event_start_date"
                                     class="form-control @error('event_start_date') is-invalid @enderror"
                                     value="{{ old('event_start_date', \Carbon\Carbon::parse($event->event_start_date)->format('Y-m-d\TH:i')) }}" required>
                              @error('event_start_date')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <!-- Event End -->
                        <div class="col-sm-6 col-md-4">
                              <label for="event_end_date" class="form-label">Event End Date & Time</label>
                              <input type="datetime-local" name="event_end_date" id="event_end_date"
                                     class="form-control @error('event_end_date') is-invalid @enderror"
                                     value="{{ old('event_end_date', \Carbon\Carbon::parse($event->event_end_date)->format('Y-m-d\TH:i')) }}" required>
                              @error('event_end_date')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <!--===========================-->
                        <div class="col-sm-6 col-md-3" style="display: none;">
                              <label for="base_amount" class="form-label">Base Amount(INR)</label>
                              <input type="number" name="base_amount" id="base_amount"
                                     class="form-control" value="{{ old('base_amount', $event->base_amount) }}" required>
                        </div>

                        <div class="col-sm-6 col-md-3" style="display: none;">
                              <label for="gst_rate" class="form-label">GST Rate (%)</label>
                              <input type="number" step="0.01" name="gst_rate" id="gst_rate"
                                     class="form-control" value="{{ old('gst_rate', $event->gst_rate) }}" required>
                        </div>

                        <div class="col-sm-6 col-md-3" style="display: none;">
                              <label for="gst_amount" class="form-label">GST Amount(INR)</label>
                              <input type="text" name="gst_amount" id="gst_amount" value="{{ old('gst_amount', $event->gst_amount) }}"
                                     class="form-control" readonly>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label for="total_amount" class="form-label">Inclusive of GST(INR)</label>
                              <input type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', $event->total_amount) }}"
                                     class="form-control" readonly>
                        </div>

                        <!--===========================-->
                        <!-- Description -->
                        <div class="col-md-12">
                              <label for="description" class="form-label">Description</label>
                              <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description', $event->description) }}</textarea>
                              @error('description')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <!-- Image Preview + Upload -->
                        <div class="col-md-6">
                              @if($event->image)
                              <label class="form-label d-block">Current Image:</label>
                              <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="img-thumbnail mb-2" style="max-width: 150px;">
                              @endif

                              <label for="image" class="form-label">Replace Image (optional)</label>
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
                              <button type="submit" class="btn btn-success">Update</button>
                              <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </div>
            </form>
      </div>
</div>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description');
</script>
<script>
    function calculateGST() {
        let base = parseFloat($('#base_amount').val()) || 0;
        let rate = parseFloat($('#gst_rate').val()) || 0;

        let gst = (base * rate) / 100;
        let total = base + gst;

        $('#gst_amount').val(gst.toFixed(2));
        $('#total_amount').val(total.toFixed(2));
    }

    $(document).ready(function () {
        $('#base_amount, #gst_rate').on('input', calculateGST);
    });
</script>
@endsection
