@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Add Member</h5>
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
                              <select id="account_name" name="account_name" class="form-control" value="{{ old('account_name') }}">
                                    <option value="">All Accounts</option>
                                    @foreach($accounts as $account)
                                    <option value="{{ $account->name }}">{{ $account->name }} - ({{ $account->code }})</option>
                                    @endforeach
                              </select>
                              @error('account_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Regions</label>
                              <select id="region" name="region" class="form-control">
                                    <option value="">All Regions</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->name }}">{{ $region->name }}</option>
                                    @endforeach
                              </select>
                              @error('region') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Parent Region</label>
                              <input type="text" name="parent_region" class="form-control" value="{{ old('parent_region') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Parent Zone</label>
                              <input type="text" name="parent_zone" class="form-control" value="{{ old('parent_zone') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Member ID</label>
                              <input type="text" name="member_id" class="form-control" value="{{ old('member_id') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">First Name</label>
                              <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                              @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Last Name</label>
                              <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                              @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-sm-4 col-md-3">
                              <label class="form-label">Gender</label>
                              <select name="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Birthdate</label>
                              <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 1</label>
                              <input type="text" name="address_line1" class="form-control" value="{{ old('address_line1') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 2</label>
                              <input type="text" name="address_line2" class="form-control" value="{{ old('address_line2') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Address Line 3</label>
                              <input type="text" name="address_line3" class="form-control" value="{{ old('address_line3') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Personal Email</label>
                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Mobile</label>
                              <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Home Phone</label>
                              <input type="text" name="home_phone" class="form-control" value="{{ old('home_phone') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">State</label>
                              <select id="state_id" name="state" class="form-control">
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
                              <select id="occupation" name="occupation" class="form-control">
                                    <option value="">-- Select Occupation --</option>
                                    @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-sm-6 col-md-3">
                              <label class="form-label">Lion Join Date</label>
                              <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
                        </div>
                        <div class="col-sm-6 col-md-3">
                              <label for="is_active" class="form-label">Status</label>
                              <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="1" {{ old('is_active', $account->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $account->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                              </select>
                              @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                  </div>

                  <div class="text-end">
                        <input type="submit"  id="submit" name="submit" value="Submit" class="btn btn-success" />
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
@endsection
