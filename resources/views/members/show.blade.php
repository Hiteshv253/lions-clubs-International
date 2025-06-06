@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
      <ol class="breadcrumb mb-0 p-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
      </ol>
</nav>



<div class="  my-4">
      <div class="card shadow-sm">
            <div class="card-header text-white">
            <h5 class="mb-0">Member Details</h5>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4"><strong>Account Name:</strong> {{ $member->account_name }}</div>
                <div class="col-md-4"><strong>Parent Region:</strong> {{ $member->parent_region }}</div>
                <div class="col-md-4"><strong>Parent Zone:</strong> {{ $member->parent_zone }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><strong>Member ID:</strong> {{ $member->member_id }}</div>
                <div class="col-md-4"><strong>First Name:</strong> {{ $member->first_name }}</div>
                <div class="col-md-4"><strong>Last Name:</strong> {{ $member->last_name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><strong>Address Line 1:</strong> {{ $member->address_line1 }}</div>
                <div class="col-md-4"><strong>Address Line 2:</strong> {{ $member->address_line2 }}</div>
                <div class="col-md-4"><strong>Address Line 3:</strong> {{ $member->address_line3 }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3"><strong>City:</strong> {{ $member->city }}</div>
                <div class="col-md-3"><strong>State/Province:</strong> {{ $member->state }}</div>
                <div class="col-md-3"><strong>Zip/Postal Code:</strong> {{ $member->zip }}</div>
                <div class="col-md-3"><strong>Birthdate:</strong> {{ $member->birthdate ? \Carbon\Carbon::parse($member->birthdate)->format('d M, Y') : '' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4"><strong>Email:</strong> {{ $member->email }}</div>
                <div class="col-md-4"><strong>Mobile:</strong> {{ $member->mobile }}</div>
                <div class="col-md-4"><strong>Home Phone:</strong> {{ $member->home_phone }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Gender:</strong> {{ $member->gender }}</div>
                <div class="col-md-6"><strong>Occupation:</strong> {{ $member->occupation }}</div>
            </div>

            <div class="mb-3">
                <strong>Lion Join Date:</strong> {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('d M, Y') : '' }}
            </div>

            <div class="text-end">
                <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit Member</a>
            </div>
        </div>
    </div>
</div>
@endsection
