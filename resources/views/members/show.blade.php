@extends('layouts.master')

@section('content')
<div class=" ">
    <h1>Member Details</h1>

    <a href="{{ route('members.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $member->id }}</td></tr>
        <tr><th>First Name</th><td>{{ $member->first_name }}</td></tr>
        <tr><th>Last Name</th><td>{{ $member->last_name }}</td></tr>
        <tr><th>Birthday</th><td>{{ $member->birthday?->format('Y-m-d') }}</td></tr>
        <tr><th>Gender</th><td>{{ $member->gender }}</td></tr>
        <tr><th>Occupation</th><td>{{ $member->occupation }}</td></tr>
        <tr><th>Mobile</th><td>{{ $member->mobile }}</td></tr>
        <tr><th>Work Email</th><td>{{ $member->work_email }}</td></tr>
        <tr><th>Membership Club ID</th><td>{{ $member->membership_club_id }}</td></tr>
        <tr><th>Zone ID</th><td>{{ $member->zone_id }}</td></tr>
        <tr><th>District ID</th><td>{{ $member->district_id }}</td></tr>
        <tr><th>Region ID</th><td>{{ $member->region_id }}</td></tr>
        <tr><th>Is Active</th><td>{{ $member->is_active ? 'Yes' : 'No' }}</td></tr>
        <tr><th>Is Created By</th><td>{{ $member->is_create_by ? 'Yes' : 'No' }}</td></tr>
        <tr><th>Created At</th><td>{{ $member->created_at->format('Y-m-d H:i') }}</td></tr>
        <tr><th>Updated At</th><td>{{ $member->updated_at->format('Y-m-d H:i') }}</td></tr>
    </table>
</div>
@endsection
