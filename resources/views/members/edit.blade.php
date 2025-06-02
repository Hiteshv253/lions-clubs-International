@extends('layouts.master')

@section('content')
<div class=" ">
    <h1>Edit Member</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name *</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $member->first_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name *</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $member->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control" value="{{ old('birthday', $member->birthday ? $member->birthday->format('Y-m-d') : '') }}">
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select gender</option>
                <option value="Male" {{ old('gender', $member->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $member->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender', $member->gender) == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" name="occupation" class="form-control" value="{{ old('occupation', $member->occupation) }}">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}">
        </div>

        <div class="mb-3">
            <label for="work_email" class="form-label">Work Email</label>
            <input type="email" name="work_email" class="form-control" value="{{ old('work_email', $member->work_email) }}">
        </div>

        <div class="mb-3">
            <label for="membership_club_id" class="form-label">Membership Club ID</label>
            <input type="number" name="membership_club_id" class="form-control" value="{{ old('membership_club_id', $member->membership_club_id) }}">
        </div>

        <div class="mb-3">
            <label for="zone_id" class="form-label">Zone ID</label>
            <input type="number" name="zone_id" class="form-control" value="{{ old('zone_id', $member->zone_id) }}">
        </div>

        <div class="mb-3">
            <label for="district_id" class="form-label">District ID</label>
            <input type="number" name="district_id" class="form-control" value="{{ old('district_id', $member->district_id) }}">
        </div>

        <div class="mb-3">
            <label for="region_id" class="form-label">Region ID</label>
            <input type="number" name="region_id" class="form-control" value="{{ old('region_id', $member->region_id) }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $member->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Is Active</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_create_by" class="form-check-input" id="is_create_by" {{ old('is_create_by', $member->is_create_by) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_create_by">Is Created By</label>
        </div>

        <button type="submit" class="btn btn-success">Update Member</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
