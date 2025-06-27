@extends('layouts.master')

@section('content')
      <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View</li>
            </ol>
      </nav>

      <div class="my-4">
            <div class="card shadow-sm rounded-4">
                  <div class="card-header py-3">
                        <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Member Details</h4>
                  </div>

                  <div class="card-body">
                        <div class="row g-4">
                              <div class="col-md-4"><strong>Account Name:</strong><br> {{ optional($member->account)->name ?? '' }}</div>
                              <div class="col-md-4"><strong>Region:</strong><br>
                              {{ optional($member->region)->name ?? '' }}

                        </div>
                        <div class="col-md-4"><strong>Zone:</strong><br> {{ \App\Models\Zone::find($member->zone_id)->name ?? 'Not Found' }}</div>

                        <div class="col-md-4"><strong>Club:</strong><br> {{ \App\Models\Club::find($member->club_id)->name ?? 'Not Found' }}</div>
                        <div class="col-md-4"><strong>Lion ID & Member ID:</strong><br> {{ $member->membership_id }}</div>
                        <div class="col-md-4"><strong>Status:</strong><br>
                        <span class="badge {{ $member->is_active == 0 ? 'bg-success' : 'bg-danger' }}">
                              {{ $member->is_active == 0 ? 'Active' : 'Inactive' }}
                        </span>
                  </div>

                  <div class="col-md-4"><strong>First Name:</strong><br> {{ $member->first_name }}</div>
                  <div class="col-md-4"><strong>Last Name:</strong><br> {{ $member->last_name }}</div>
                  <div class="col-md-4"><strong>Gender:</strong><br> {{ $member->gender }}</div>

                  <div class="col-md-4"><strong>Address Line 1:</strong><br> {{ $member->address_line1 }}</div>
                  <div class="col-md-4"><strong>Address Line 2:</strong><br> {{ $member->address_line2 }}</div>
                  <div class="col-md-4"><strong>Address Line 3:</strong><br> {{ $member->address_line3 }}</div>

                  <div class="col-md-4"><strong>City:</strong><br>
                  {{ optional($member->city)->name ?? '' }}
            </div>
            <div class="col-md-4"><strong>State/Province:</strong><br>
            {{ optional($member->state)->name ?? '' }}
      </div>
      <div class="col-md-4"><strong>Zip/Postal Code:</strong><br> {{ $member->zipcode }}</div>

      <div class="col-md-4"><strong>Email ID:</strong><br> {{ $member->email }}</div>
      <div class="col-md-4"><strong>Mobile:</strong><br> {{ $member->mobile }}</div>
      <div class="col-md-4"><strong>Home Phone:</strong><br> {{ $member->home_phone }}</div>

      <div class="col-md-4"><strong>Occupation:</strong><br>

      {{ optional($member->occupation)->name ?? '' }}</div>
      <div class="col-md-4"><strong>Birthdate:</strong><br>
      {{ $member->birthdate ? \Carbon\Carbon::parse($member->birthdate)->format('d M, Y') : '-' }}
      </div>
      <div class="col-md-4"><strong>Lion Join Date:</strong><br>
      {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('d M, Y') : '-' }}
      </div>
      </div>

      <div class="text-end mt-4">
            <a href="{{ route('members.index') }}" class="btn btn-outline-secondary me-2">Back to List</a>
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary" style="display: none;">Edit Member</a>
      </div>
      </div>
      </div>
      </div>
      <h5 class="mt-4">Registered Events</h5>
      <ul>
            @forelse ($registrations as $registration)
                  <li>
                        {{ $registration->name }} —
                        {{ $registration->event->title ?? 'No Event Title' }} ({{ $registration->number_of_persons }} persons)
                  </li>
            @empty
                  <li>No event registrations found.</li>
            @endforelse
      </ul>



@endsection
