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
                  <form method="POST" action="{{ route('clubs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">District*</label>
                                    <select id="district" name="district" class="form-select @error('district') is-invalid @enderror">
                                          <option value="">Select District</option>
                                           @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                          @endforeach
                                    </select>
                                    @error('district')<div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Region*</label>
                                    <select id="region" name="region" class="form-select @error('region') is-invalid @enderror" >
                                          <option value="">Select Region</option>
                                    </select>
                                    @error('region')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Zone*</label>
                                    <select name="zone_id" id="zone" class="form-select @error('zone') is-invalid @enderror">
                                          <option value="">Select Zone</option>
                                    </select>
                                     @error('zone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Name*</label>
                                    <input type="text" name="name" id="name" class="form-select @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                                     @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Number/Club ID*</label>
                                    <input type="text" id="club_number" name="club_number" class="form-select @error('club_number') is-invalid @enderror"  value="{{ old('club_number') }}">
                                    @error('club_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Charter Date</label>
                                    <input type="date" name="charter_date" id="charter_date" class="form-select" value="{{ old('charter_date') }}">
                                    
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Inauguration Date Of Club</label>
                                    <input type="date" name="inauguration_date_club" id="inauguration_date_club" class="form-select" value="{{ old('inauguration_date_club') }}">
                               </div>
                              <div class="col-md-8">
                                    <label for="image" class="form-label">Club Logo (optional)</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                      @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              <div class="col-12">
                                    <label for="about_club" class="form-label">About Club</label>
                                    <textarea name="about_club" id="about_club" rows="5" class="form-control @error('about_club') is-invalid @enderror">{{ old('about_club') }}</textarea>
                                    
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label for="is_active" class="form-label">Select Status*</label>
                                    <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror" required>
                                          <option value="0" {{ old('is_active', 0) == 0 ? 'selected' : '' }}>Active</option>
                                          <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                        </div>
                        <div class="text-end">
                              <button class="btn btn-primary">Save</button>
                              <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </form>
            </div>
      </div>


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
