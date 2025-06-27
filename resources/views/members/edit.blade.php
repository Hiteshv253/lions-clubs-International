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
    <div class="card-body">
        <form action="{{ route('members.update', $member->id) }}" method="POST" id="editMemberForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="member_id" value="{{ $member->id }}">

            <div class="row g-3">
                <!-- Account Dropdown -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Accounts</label>
                    <select name="account_id" class="form-control">
                        <option value="">All Accounts</option>
                        @foreach($accounts as $account)
                        <option value="{{ $account->id }}" {{ old('account_id', $member->account_id) == $account->id ? 'selected' : '' }}>
                            {{ $account->name }} - ({{ $account->code }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Region Dropdown -->
                <div class="col-sm-6 col-md-3">
                    <label>Region</label>
                    <select id="region_id" name="region_id" class="form-select">
                        <option value="">Select Region</option>
                        @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ old('region_id', $member->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Zone Dropdown (Populated Dynamically) -->
                <div class="col-sm-6 col-md-3">
                    <label>Zone</label>
                    <select id="zone_id" name="zone_id" class="form-select">
                        <option value="">Select Zone</option>
                    </select>
                </div>

                <!-- Club Dropdown (Populated Dynamically) -->
                <div class="col-sm-6 col-md-3">
                    <label>Club</label>
                    <select id="club_id" name="club_id" class="form-select">
                        <option value="">Select Club</option>
                    </select>
                </div>

                <!-- Membership ID (readonly) -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Lion ID & Member ID *</label>
                    <input type="text" name="membership_id" id="membership_id" class="form-control" value="{{ $member->membership_id }}" readonly>
                </div>

                <!-- First Name -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">First Name *</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $member->first_name) }}">
                </div>

                <!-- Last Name -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Last Name *</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $member->last_name) }}">
                </div>

                <!-- Gender -->
                <div class="col-sm-4 col-md-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">-- Select --</option>
                        <option value="Male" {{ old('gender', $member->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $member->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender', $member->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Email -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Email ID*</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $member->email) }}">
                </div>

                <!-- Mobile -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}">
                </div>
                 <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Home Phone </label>
                                    <input type="number" name="home_phone" id="home_phone" class="form-control" value="{{ old('mobile', $member->home_phone) }}">
                                    
                              </div>

                <!-- Birthdate -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Birthdate</label>
                    <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $member->birthdate) }}">
                </div>


                <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Address Line 1</label>
                                    <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1', $member->address_line1) }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Address Line 2</label>
                                    <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2', $member->address_line2) }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Address Line 3</label>
                                    <input type="text" name="address_line3" id="address_line3" class="form-control" value="{{ old('address_line3', $member->address_line3) }}">
                              </div>


                <!-- State -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">State</label>
                    <select id="state_id" name="state_id" class="form-control">
                        <option value="">-- Select State --</option>
                        @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ old('state_id', $member->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">City</label>
                    <select id="city_id" name="city_id" class="form-control">
                        <option value="">-- Select City --</option>
                    </select>
                </div>

                <!-- Zip Code -->
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
                                          <option value="{{ $occupation->id }}" {{ old('occupation_id', $member->occupation_id) == $occupation->id ? 'selected' : '' }}>{{ $occupation->name }}</option>
                                           @endforeach
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Lion Join Date</label>
                                    <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date', $member->join_date) }}">
                              </div>
                <div class="col-sm-6 col-md-3">
                    <label for="is_active" class="form-label">Status*</label>
                    <select name="is_active" id="is_active"  class="form-select @error('is_active') is-invalid @enderror" required>
                        <option value="0" {{ old('is_active', $member->is_active) == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ old('is_active', $member->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>


            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const regionId = '{{ old("region_id", $member->region_id) }}';
    const zoneId = '{{ old("zone_id", $member->zone_id) }}';
    const clubId = '{{ old("club_id", $member->club_id) }}';
    const stateId = '{{ old("state_id", $member->state_id) }}';
    const cityId = '{{ old("city_id", $member->city_id) }}';
    const zipCode = '{{ old("zipcode", $member->zip_code) }}';

    // Load Zones & Clubs
    if (regionId) {
        $.get("/get-zones/" + regionId, function (zones) {
            $('#zone_id').empty().append('<option value="">Select Zone</option>');
            $.each(zones, function (id, name) {
                $('#zone_id').append(`<option value="${id}" ${id == zoneId ? 'selected' : ''}>${name}</option>`);
            });

            if (zoneId) {
                $.get("/get-clubs/" + zoneId, function (clubs) {
                    $('#club_id').empty().append('<option value="">Select Club</option>');
                    $.each(clubs, function (id, name) {
                        $('#club_id').append(`<option value="${id}" ${id == clubId ? 'selected' : ''}>${name}</option>`);
                    });
                });
            }
        });
    }

    // Load Cities & Zip Codes
    if (stateId) {
        $.get("/get-cities/" + stateId, function (cities) {
            $('#city_id').empty().append('<option value="">-- Select City --</option>');
            $.each(cities, function (_, city) {
                $('#city_id').append(`<option value="${city.id}" ${city.id == cityId ? 'selected' : ''}>${city.name}</option>`);
            });

            if (cityId) {
                $.get("/get-zipcodes/" + cityId, function (zips) {
                    $('#zipcode').empty().append('<option value="">-- Select Zip Code --</option>');
                    $.each(zips, function (_, zip) {
                        $('#zipcode').append(`<option value="${zip}" ${zip == zipCode ? 'selected' : ''}>${zip}</option>`);
                    });
                });
            }
        });
    }

    // Region Change → Zones
    $('#region_id').on('change', function () {
        const id = $(this).val();
        $('#zone_id').html('<option>Loading...</option>');
        $('#club_id').html('<option value="">Select Club</option>');

        if (id) {
            $.get("/get-zones/" + id, function (zones) {
                $('#zone_id').empty().append('<option value="">Select Zone</option>');
                $.each(zones, function (id, name) {
                    $('#zone_id').append(`<option value="${id}">${name}</option>`);
                });
            });
        }
    });

    // Zone Change → Clubs
    $('#zone_id').on('change', function () {
        const id = $(this).val();
        $('#club_id').html('<option>Loading...</option>');

        if (id) {
            $.get("/get-clubs/" + id, function (clubs) {
                $('#club_id').empty().append('<option value="">Select Club</option>');
                $.each(clubs, function (id, name) {
                    $('#club_id').append(`<option value="${id}">${name}</option>`);
                });
            });
        }
    });

    // State Change → Cities
    $('#state_id').on('change', function () {
        const id = $(this).val();
        $('#city_id').html('<option>Loading...</option>');
        $('#zipcode').html('<option>-- Select Zip Code --</option>');

        if (id) {
            $.get("/get-cities/" + id, function (cities) {
                $('#city_id').empty().append('<option value="">-- Select City --</option>');
                $.each(cities, function (_, city) {
                    $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                });
            });
        }
    });

    // City Change → Zip Codes
    $('#city_id').on('change', function () {
        const id = $(this).val();
        $('#zipcode').html('<option>Loading...</option>');

        if (id) {
            $.get("/get-zipcodes/" + id, function (zips) {
                $('#zipcode').empty().append('<option value="">-- Select Zip Code --</option>');
                $.each(zips, function (_, zip) {
                    $('#zipcode').append(`<option value="${zip}">${zip}</option>`);
                });
            });
        }
    });
});
</script>
@endsection
