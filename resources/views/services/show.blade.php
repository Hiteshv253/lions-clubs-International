@extends('layouts.master')
@section('content')
<div class=" ">
      <h2>Service Details</h2>
      <a href="{{ route('services.index') }}" class="btn btn-secondary mb-3">Back to List</a>

      <div class="card shadow-sm rounded-4">
            <div class="card-body">
                  <h5 class="card-title">{{ $service->title }}</h5>
                  <p><strong>Report Type:</strong> {{ $service->report_type }}</p>
                  <p><strong>Sponsor:</strong> {{ $service->sponsor }}</p>
                  <p><strong>Club Name:</strong> {{ $service->club_name }}</p>
                  <p><strong>Activity Level:</strong> {{ $service->activity_level }}</p>
                  <p><strong>Cause:</strong> {{ $service->cause }}</p>
                  <p><strong>Project Type:</strong> {{ $service->project_type }}</p>
                  <p><strong>Description:</strong> {{ $service->description }}</p>

                  <p><strong>Start Date:</strong> {{ $service->start_date }}</p>
                  <p><strong>End Date:</strong> {{ $service->end_date }}</p>
                  <p><strong>Currency:</strong> {{ $service->currency }}</p>
                  <p><strong>Funds Donated (INR):</strong> ₹{{ $service->total_funds_donated_inr }}</p>
                  <p><strong>Funds Donated (USD):</strong> ${{ $service->total_funds_donated_usd }}</p>

                  <p><strong>People Served:</strong> {{ $service->people_served }}</p>
                  <p><strong>Volunteer Hours:</strong> {{ $service->total_volunteer_hours }}</p>
                  <p><strong>Funds Raised (INR):</strong> ₹{{ $service->total_funds_raised_inr }}</p>
                  <p><strong>Funds Raised (USD):</strong> ${{ $service->total_funds_raised_usd }}</p>
                  <p><strong>Non-Lion Participants:</strong> {{ $service->non_lion_participants }}</p>
                  <p><strong>Non-Lion Family Participants:</strong> {{ $service->non_lion_family_participants }}</p>
                  <p><strong>Trees Planted:</strong> {{ $service->trees_planted }}</p>

                  <p><strong>Venue:</strong> {{ $service->venue }}</p>
                  <p><strong>Venue Location:</strong> {{ $service->venue_location }}</p>
                  <p><strong>Timezone:</strong> {{ $service->venue_timezone }}</p>

                  <p><strong>Sponsor Club:</strong> {{ $service->sponsor_club }}</p>
                  <p><strong>Sponsor District:</strong> {{ $service->sponsor_district }}</p>

                  <p><strong>LCIF Funded:</strong> {{ $service->funded_by_lcif_grant ? 'Yes' : 'No' }}</p>
                  <p><strong>Signature Activity:</strong> {{ $service->signature_activity }}</p>
                  <p><strong>Donation in LCIF:</strong> {{ $service->donation_in_lcif ? 'Yes' : 'No' }}</p>

                  <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
      </div>
</div>
@endsection