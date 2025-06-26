@extends('layouts.master')

@section('content')
      <nav>
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Club</li>
            </ol>
      </nav>
      <div class="card shadow-sm rounded-4">
            <div class="card-header"><h5>Create Club</h5></div>
            <div class="card-body">
                  <form method="POST" action="{{ route('clubs.store') }}">
                        @csrf

                        <div class="row g-3">
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">District</label>
                                    <select id="district" class="form-select">
                                          <option value="">Select District</option>
                                    @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                          @endforeach
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Region</label>
                                    <select id="region" name="region" class="form-select">
                                          <option value="">Select Region</option>
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Zone</label>
                                    <select name="zone_id" id="zone" class="form-select">
                                          <option value="">Select Zone</option>
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Number/Club ID</label>
                                    <input type="number" id="club_number" name="club_number" class="form-control" required value="{{ old('club_number') }}">
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Charter Date</label>
                                    <input type="date" name="charter_date" id="charter_date" class="form-control" value="{{ old('charter_date') }}">
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Inauguration Date Of Club</label>
                                    <input type="date" name="inauguration_date_club" id="inauguration_date_club" class="form-control" value="{{ old('inauguration_date_club') }}">
                              </div>
                              <div class="col-md-8">
                                    <label for="image" class="form-label">Image (optional)</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                              @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              <div class="col-12">
                                    <label for="about_club" class="form-label">Description</label>
                                    <textarea name="about_club" id="about_club" rows="5"
                                          class="form-control @error('about_club') is-invalid @enderror">{{ old('about_club') }}</textarea>
                              @error('about_club')
                              <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                        </div>
                        <div class="text-end">
                              <button class="btn btn-primary">Save</button>
                              <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </form>
            </div>
      </div>

 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
      <script>
      CKEDITOR.replace('about_club');
      </script>
      <script>
$('#district').on('change', function () {
let districtId = $(this).val();
$('#region').html('<option value="">Select Region</option>');
$('#zone').html('<option value="">Select Zone</option>');
if (districtId) {
      $.get('/regions-by-district/' + districtId, function (regions) {
            $.each(regions, function (key, region) {
            $('#region').append(`<option value="${region.id}">${region.name}</option>`);
            });
      });
}
});

$('#region').on('change', function () {
let regionId = $(this).val();
$('#zone').html('<option value="">Select Zone</option>');
if (regionId) {
      $.get('/zones-by-region/' + regionId, function (zones) {
            $.each(zones, function (key, zone) {
            $('#zone').append(`<option value="${zone.id}">${zone.name}</option>`);
            });
      });
}
});
      </script>
@endsection
