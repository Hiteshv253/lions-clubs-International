@extends('layouts.master')

@section('content')
<nav>
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">clubs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Clubs</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header"><h5>Create Club</h5></div>
      <div class="card-body">
            <form method="POST" action="{{ route('clubs.store') }}">
                  @csrf

                  <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                              <label>District</label>
                              <select id="district" class="form-select">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Region</label>
                              <select id="region" class="form-select">
                                    <option value="">Select Region</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Zone</label>
                              <select name="zone_id" id="zone" class="form-select">
                                    <option value="">Select Zone</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-4">
                              <label>Club Name</label>
                              <input type="text" name="name" class="form-control" required>
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
