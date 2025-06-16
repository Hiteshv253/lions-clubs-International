@extends('layouts.master')

@section('content')

<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>
<div class="card shadow-sm rounded-4">
      <div class="card-header">
            <h5 class="mb-0">Edit Member</h5>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger">
            <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif

      <div class="card-body">
            <form action="{{ route('members.update', $member->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row g-3">
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Accounts</label>
                              <select id="account_id" name="account_id" class="form-control">
                                    <option value="">All Accounts</option>
                                    @foreach($accounts as $account)
                                    <option value="{{ $account->id }}" {{ old('account_id', $member->account_id) == $account->id ? 'selected' : '' }}>{{ $account->name }} - ({{ $account->code }})</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Region</label>
                              <select id="region_id" name="region_id" class="form-select">
                                    <option value="">Select Region</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $member->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Zone</label>
                              <select id="zone_id" name="zone_id" class="form-select">
                                    <option value="">Select Zone</option>
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Club</label>
                              <select id="club_id" name="club_id" class="form-select">
                                    <option value="">Select Club</option>
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Lion ID & Member ID</label>
                              <input type="text" name="member_id" id="member_id" class="form-control" value="{{ $member->member_id }}" readonly>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">First Name</label>
                              <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $member->first_name) }}">
                              @error('first_name') <div class="email-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Last Name</label>
                              <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $member->last_name) }}">
                              @error('last_name') <div class="email-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-4 col-md-3">
                              <label class="form-label">Gender</label>
                              <select name="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Male" {{ old('gender', $member->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $member->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender', $member->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Birthdate</label>
                              <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $member->birthdate) }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Personal Email ID</label>
                              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}">
                              <small id="email-error" class="text-danger"></small>
                              @error('email')<div class="email-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 1</label>
                              <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1', $member->address_line1) }}">
                              <small id="email-error" class="text-danger"></small>
                              @error('address_line1')<div class="email-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 2</label>
                              <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2', $member->address_line2) }}">
                              <small id="email-error" class="text-danger"></small>
                              @error('address_line2')<div class="email-error">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 3</label>
                              <input type="text" name="address_line3" id="address_line3" class="form-control" value="{{ old('address_line3', $member->address_line3) }}">
                              <small id="email-error" class="text-danger"></small>
                              @error('address_line3')<div class="email-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Mobile</label>
                              <input type="number" name="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Home Phone</label>
                              <input type="number" name="home_phone" id="home_phone" class="form-control" value="{{ old('home_phone', $member->home_phone) }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">State</label>
                              <select id="state_id" name="state_id" class="form-control">
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state_id', $member->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">City</label>
                              <select id="city" name="city" class="form-control">
                                    <option value="">-- Select City --</option>
                                    @foreach($citys as $city)
                                    <option value="{{ $city->id }}" {{ old('city', $member->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Zip Code</label>
                              <select id="zipcode" name="zipcode" class="form-control">
                                    <option value="">-- Zip Code@ --</option>
                                    @foreach($ZipCodes as $ZipCode)
                                          <option value="{{ $ZipCode->zipcode }}" {{ old('zipcode', $member->zip_code) == $ZipCode->zipcode ? 'selected' : '' }}>{{ $ZipCode->zip_code }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Occupation</label>
                              <select name="occupation_id" class="form-control">
                                    <option value="">-- Select Occupation --</option>
                                    @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}" {{ old('occupation_id', $member->occupation_id) == $occupation->id ? 'selected' : '' }}>{{ $occupation->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Join Date</label>
                              <input type="date" name="join_date" class="form-control" value="{{ old('join_date', $member->join_date) }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Status</label>
                              <select name="is_active" class="form-select">
                                    <option value="0" {{ old('is_active', $member->is_active) == 0 ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ old('is_active', $member->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                        </div>
                  </div>
                  <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

<script>
      $(document).ready(function () {
            let regionId = '{{ old("region_id", $member->region_id) }}';
            let zoneId = '{{ old("zone_id", $member->zone_id) }}';
            let clubId = '{{ old("club_id", $member->club_id) }}';

            if (regionId) {
                  $.get("/get-zones/" + regionId, function (data) {
                        $('#zone_id').empty().append('<option value="">Select Zone</option>');
                        $.each(data, function (id, name) {
                              $('#zone_id').append(`<option value="${id}" ${id == zoneId ? 'selected' : ''}>${name}</option>`);
                        });
                        $('#zone_id').prop('disabled', false);

                        if (zoneId) {
                              $.get("/get-clubs/" + zoneId, function (data) {
                                    $('#club_id').empty().append('<option value="">Select Club</option>');
                                    $.each(data, function (id, name) {
                                          $('#club_id').append(`<option value="${id}" ${id == clubId ? 'selected' : ''}>${name}</option>`);
                                    });
                                    $('#club_id').prop('disabled', false);
                              });
                        }
                  });
            }

            $('#region_id').on('change', function () {
                  let regionId = $(this).val();
                  $('#zone_id').html('<option value="Loading...">Loading...</option>').prop('disabled', true);
                  $('#club_id').html('<option value="">Select Club</option>').prop('disabled', true);
                  if (regionId) {
                        $.get("/get-zones/" + regionId, function (data) {
                              $('#zone_id').empty().append('<option value="">Select Zone</option>');
                              $.each(data, function (id, name) {
                                    $('#zone_id').append(`<option value="${id}">${name}</option>`);
                              });
                              $('#zone_id').prop('disabled', false);
                        });
                  }
            });

            $('#zone_id').on('change', function () {
                  let zoneId = $(this).val();
                  $('#club_id').html('<option value="Loading...">Loading...</option>').prop('disabled', true);
                  if (zoneId) {
                        $.get("/get-clubs/" + zoneId, function (data) {
                              $('#club_id').empty().append('<option value="">Select Club</option>');
                              $.each(data, function (id, name) {
                                    $('#club_id').append(`<option value="${id}">${name}</option>`);
                              });
                              $('#club_id').prop('disabled', false);
                        });
                  }
            });

            // Handle state -> city -> zipcode
            let stateId = '{{ old("state_id", $member->state_id) }}';
            let cityId = '{{ old("city", $member->city) }}';
            let zipCode = '{{ old("zipcode", $member->zipcode) }}';

            if (stateId) {
                  $.get("/get-cities/" + stateId, function (data) {
//                        $('#city').empty().append('<option value="">-- Select City --</option>');
//                        data.forEach(city => {
//                              $('#city').append(`<option value="${city.id}" ${city.id == cityId ? 'selected' : ''}>${city.name}</option>`);
//                        });

                        if (cityId) {
                              $.get("/get-zipcodes/" + cityId, function (data) {
                                    $('#zipcode').empty().append('<option value="">-- Select Zip Code --</option>');
                                    data.forEach(zip => {
                                          $('#zipcode').append(`<option value="${zip.zip_code}" ${zip.zip_code == zipCode ? 'selected' : ''}>${zip.zip_code}</option>`);
                                    });
                              });
                        }
                  });
            }

            $('#state_id').on('change', function () {
                  let stateId = $(this).val();
                  $('#city').html('<option value="">Loading...</option>');
                  if (stateId) {
                        $.get('/get-cities/' + stateId, function (data) {
                              let cityOptions = '<option value="">-- Select City --</option>';
                              data.forEach(city => {
                                    cityOptions += `<option value="${city.id}">${city.name}</option>`;
                              });
                              $('#city').html(cityOptions);
                        });
                  }
            });

            $('#city').on('change', function () {
                  let cityId = $(this).val();
                  $('#zipcode').html('<option value="">Loading...</option>');
                  if (cityId) {
                        $.get('/get-zipcodes/' + cityId, function (data) {
                              let zipOptions = '<option value="">-- Select Zip Code --</option>';
                              data.forEach(zip => {
                                    zipOptions += `<option value="${zip.zip_code}">${zip.zip_code}</option>`;
                              });
                              $('#zipcode').html(zipOptions);
                        });
                  }
            });

            $('#email').on('blur', function () {
                  let email = $(this).val();
                  $('#email-error').text('');
                  $.ajax({
                        url: '{{ route("members.validate") }}',
                        method: 'POST',
                        data: {
                              _token: '{{ csrf_token() }}',
                              email: email,
                              id: '{{ $member->id }}'
                        },
                        success: function (response) {
                              if (response.valid === false) {
                                    $('#email-error').text(response.message);
                              }
                        }
                  });
            });
      });
</script>
@endsection
