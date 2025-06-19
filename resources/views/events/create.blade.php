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
                              <label for="event_start_date" class="form-label">Event Start Date & time</label>
                              <input type="datetime-local" name="event_start_date" id="event_start_date"
                                     class="form-control @error('event_start_date') is-invalid @enderror"
                                     value="{{ old('event_start_date') }}" required>
                              @error('event_start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label for="event_end_date" class="form-label">Event End Date & time</label>
                              <input type="datetime-local" name="event_end_date" id="event_end_date"
                                     class="form-control @error('event_end_date') is-invalid @enderror"
                                     value="{{ old('event_end_date') }}" required>
                              @error('event_end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!--===========================-->
                          <div class="col-sm-6 col-md-3">
    <label for="base_amount" class="form-label">Base Amount(INR)</label>
    <input type="number" name="base_amount" id="base_amount"
           class="form-control" value="{{ old('base_amount') }}" required>
</div>

  <div class="col-sm-6 col-md-3">
    <label for="gst_rate" class="form-label">GST Rate (%)</label>
    <input type="number" step="0.01" name="gst_rate" id="gst_rate"
           class="form-control" value="{{ old('gst_rate') }}" required>
</div>

  <div class="col-sm-6 col-md-3">
    <label for="gst_amount" class="form-label">GST Amount(INR)</label>
    <input type="text" name="gst_amount" id="gst_amount"
           class="form-control" readonly>
</div>

  <div class="col-sm-6 col-md-3">
    <label for="total_amount" class="form-label">Total Amount(INR)</label>
    <input type="text" name="total_amount" id="total_amount"
           class="form-control" readonly>
</div>

                        <!--===========================-->




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
