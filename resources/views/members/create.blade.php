@extends('layouts.master')

@section('content')

<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>
<div class="card shadow-sm rounded-4">
      <div class="card-header">
            <h5 class="mb-0 ">Add Member</h5>
      </div>
      {{-- Global error messages --}}
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
            <form action="{{ route('members.store') }}" method="POST">
                  @csrf
                  <div class="row g-3">
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Accounts</label>
                              <select id="account_id" name="account_id" class="form-control" value="{{ old('account_id') }}">
                                    <option value="">All Accounts</option>
                                    @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }} - ({{ $account->code }})</option>
                                    @endforeach
                              </select>
                              @error('account_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Region</label>
                              <select id="region_id" name="region_id" class="form-select">
                                    <option value="">Select Region</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Zone</label>
                              <select id="zone_id" name="zone_id" class="form-select" disabled>
                                    <option value="">Select Zone</option>
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label>Club</label>
                              <select id="club_id" name="club_id" class="form-select" disabled>
                                    <option value="">Select Club</option>
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Lion ID & Member ID</label>
                              <input type="text" name="member_id" id="member_id" class="form-control" value="{{ $member_id }}" readonly>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">First Name</label>
                              <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                              @error('first_name')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Last Name</label>
                              <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                              @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-4 col-md-3">
                              <label class="form-label">Gender</label>
                              <select name="gender" id="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Birthdate</label>
                              <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 1</label>
                              <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 2</label>
                              <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 3</label>
                              <input type="text" name="address_line3" id="address_line3" class="form-control" value="{{ old('address_line3') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Personal Email ID</label>
                              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                              @error('email')
                              <input type="text" class="form-control is-invalid">
                              <div class="invalid-feedback">This field is required.{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Mobile</label>
                              <input type="number" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Home Phone</label>
                              <input type="number" name="home_phone" id="home_phone" class="form-control" value="{{ old('home_phone') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">State</label>
                              <select id="state_id" name="state_id" class="form-control">
                                    <option value="">-- Select State --</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">City</label>
                              <select id="city" name="city" class="form-control">
                                    <option value="">-- Select City --</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Zip Code</label>
                              <select id="zipcode" name="zipcode" class="form-control">
                                    <option value="">-- Select Zip Code --</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Occupation</label>
                              <select id="occupation_id" name="occupation_id" class="form-control">
                                    <option value="">-- Select Occupation --</option>
                                    @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Lion Join Date</label>
                              <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label for="is_active" id="is_active" class="form-label">Status</label>
                              <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="1" {{ old('is_active', $account->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $account->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                              </select>
                              @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                  </div>

                  <div class="text-end">
                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success" />
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

<script>
      $(document).ready(function () { /* code here */
            $('#state_id').on('change', function () {
                  let stateId = $(this).val();
                  $('#city').html('<option value="">Loading...</option>');
                  $('#zipcode').html('<option value="">-- Select Zip Code --</option>');

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
      });
</script>
<script>
      $(document).ready(function () {
            $('#region_id').on('change', function () {
                  var regionId = $(this).val();
                  $('#zone_id').html('<option value="">Loading...</option>').prop('disabled', true);
                  $('#club_id').html('<option value="">Select Club</option>').prop('disabled', true);

                  if (regionId) {
                        $.get("/get-zones/" + regionId, function (data) {
                              $('#zone_id').empty().append('<option value="">Select Zone</option>');
                              $.each(data, function (id, name) {
                                    $('#zone_id').append('<option value="' + id + '">' + name + '</option>');
                              });
                              $('#zone_id').prop('disabled', false);
                        });
                  } else {
                        $('#zone_id').html('<option value="">Select Zone</option>').prop('disabled', true);
                  }
            });

            $('#zone_id').on('change', function () {
                  var zoneId = $(this).val();
                  $('#club_id').html('<option value="">Loading...</option>').prop('disabled', true);

                  if (zoneId) {
                        $.get("/get-clubs/" + zoneId, function (data) {
                              $('#club_id').empty().append('<option value="">Select Club</option>');
                              $.each(data, function (id, name) {
                                    $('#club_id').append('<option value="' + id + '">' + name + '</option>');
                              });
                              $('#club_id').prop('disabled', false);
                        });
                  } else {
                        $('#club_id').html('<option value="">Select Club</option>').prop('disabled', true);
                  }
            });
      });


      $('#email').on('blur', function () {
            let email = $(this).val();
            $('#email-error').text(''); // Clear previous error

            $.ajax({
                  url: '{{ route("members.validate") }}',
                  method: 'POST',
                  data: {
                        _token: '{{ csrf_token() }}',
                        email: email
                  },
                  success: function (response) {
                        if (response.valid === false) {
                              $('#email-error').text(response.message);
                        }
                  }
            });
      });
</script>

@endsection
