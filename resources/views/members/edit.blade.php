@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>



<div class="  my-4">
      <div class="card shadow-sm">
            <div class="card-header text-white">
            <h5 class="mb-0">Edit Member</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('members.update', $member->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="account_name" class="form-label">Account Name</label>
                        <input type="text" name="account_name" id="account_name" class="form-control @error('account_name') is-invalid @enderror" value="{{ old('account_name', $member->account_name) }}" required>
                        @error('account_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="parent_region" class="form-label">Parent Region</label>
                        <input type="text" name="parent_region" id="parent_region" class="form-control" value="{{ old('parent_region', $member->parent_region) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="parent_zone" class="form-label">Parent Zone</label>
                        <input type="text" name="parent_zone" id="parent_zone" class="form-control" value="{{ old('parent_zone', $member->parent_zone) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="member_id" class="form-label">Member ID</label>
                        <input type="text" name="member_id" id="member_id" class="form-control" value="{{ old('member_id', $member->member_id) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $member->first_name) }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $member->last_name) }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="address_line1" class="form-label">Address Line 1</label>
                        <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1', $member->address_line1) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="address_line2" class="form-label">Address Line 2</label>
                        <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2', $member->address_line2) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="address_line3" class="form-label">Address Line 3</label>
                        <input type="text" name="address_line3" id="address_line3" class="form-control" value="{{ old('address_line3', $member->address_line3) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $member->city) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="state" class="form-label">State/Province</label>
                        <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $member->state) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="zip" class="form-label">Zip/Postal Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip', $member->zip) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate', $member->birthdate ? \Carbon\Carbon::parse($member->birthdate)->format('Y-m-d') : '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="email" class="form-label">Personal Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="home_phone" class="form-label">Home Phone</label>
                        <input type="text" name="home_phone" id="home_phone" class="form-control" value="{{ old('home_phone', $member->home_phone) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="">-- Select --</option>
                            <option value="Male" {{ old('gender', $member->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $member->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $member->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="occupation" class="form-label">Occupation</label>
                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ old('occupation', $member->occupation) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="join_date" class="form-label">Lion Join Date</label>
                    <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date', $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('Y-m-d') : '') }}">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
