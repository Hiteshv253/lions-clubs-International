@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
      <ol class="breadcrumb mb-0 p-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>



<div class="  my-4">
      <div class="card shadow-sm">
            <div class="card-header ">
                  <h2 class="mb-4">Edit Service</h2>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                        <strong>There were some problems with your input:</strong>
                        <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                        </ul>
                  </div>
                  @endif

                  <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Basic Info --}}
                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="report_type" class="form-label">Report Type *</label>
                                    <input type="text" name="report_type" class="form-control" value="{{ old('report_type', $service->report_type) }}" required>
                              </div>
                              <div class="col-md-4">
                                    <label for="title" class="form-label">Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                              </div>
                              <div class="col-md-4">
                                    <label for="sponsor" class="form-label">Sponsor *</label>
                                    <input type="text" name="sponsor" class="form-control" value="{{ old('sponsor', $service->sponsor) }}" required>
                              </div>
                        </div>

                        {{-- Project Info --}}
                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="activity_level" class="form-label">Activity Level</label>
                                    <input type="text" name="activity_level" class="form-control" value="{{ old('activity_level', $service->activity_level) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="club_name" class="form-label">Club Name</label>
                                    <input type="text" name="club_name" class="form-control" value="{{ old('club_name', $service->club_name) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="cause" class="form-label">Cause</label>
                                    <input type="text" name="cause" class="form-control" value="{{ old('cause', $service->cause) }}">
                              </div>
                        </div>

                        <div class="row mb-3">
                              <div class="col-md-6">
                                    <label for="project_type" class="form-label">Project Type</label>
                                    <input type="text" name="project_type" class="form-control" value="{{ old('project_type', $service->project_type) }}">
                              </div>
                              <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="2">{{ old('description', $service->description) }}</textarea>
                              </div>
                        </div>

                        {{-- Date Info --}}
                        <div class="row mb-3">
                              <div class="col-md-6">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $service->start_date) }}">
                              </div>
                              <div class="col-md-6">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $service->end_date) }}">
                              </div>
                        </div>

                        {{-- Financials --}}
                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="currency" class="form-label">Currency</label>
                                    <input type="text" name="currency" class="form-control" value="{{ old('currency', $service->currency) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="total_funds_donated_inr" class="form-label">Funds Donated (INR)</label>
                                    <input type="number" step="0.01" name="total_funds_donated_inr" class="form-control" value="{{ old('total_funds_donated_inr', $service->total_funds_donated_inr) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="total_funds_donated_usd" class="form-label">Funds Donated (USD)</label>
                                    <input type="number" step="0.01" name="total_funds_donated_usd" class="form-control" value="{{ old('total_funds_donated_usd', $service->total_funds_donated_usd) }}">
                              </div>
                        </div>

                        <div class="row mb-3">
                              <div class="col-md-6">
                                    <label for="organization_served_for" class="form-label">Organization Served For</label>
                                    <input type="text" name="organization_served_for" class="form-control" value="{{ old('organization_served_for', $service->organization_served_for) }}">
                              </div>
                              <div class="col-md-3">
                                    <label for="donation_in_lcif" class="form-label">Donation in LCIF?</label>
                                    <select name="donation_in_lcif" class="form-select">
                                          <option value="0" {{ old('donation_in_lcif', $service->donation_in_lcif) == 0 ? 'selected' : '' }}>No</option>
                                          <option value="1" {{ old('donation_in_lcif', $service->donation_in_lcif) == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                              </div>
                              <div class="col-md-3">
                                    <label for="signature_activity" class="form-label">Signature Activity?</label>
                                    <select name="signature_activity" class="form-select">
                                          <option value="No" {{ old('signature_activity', $service->signature_activity) == 'No' ? 'selected' : '' }}>No</option>
                                          <option value="Yes" {{ old('signature_activity', $service->signature_activity) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                              </div>
                        </div>

                        {{-- Metrics --}}
                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="people_served" class="form-label">People Served</label>
                                    <input type="number" name="people_served" class="form-control" value="{{ old('people_served', $service->people_served) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="total_volunteer_hours" class="form-label">Volunteer Hours</label>
                                    <input type="number" step="0.1" name="total_volunteer_hours" class="form-control" value="{{ old('total_volunteer_hours', $service->total_volunteer_hours) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="trees_planted" class="form-label">Trees Planted</label>
                                    <input type="number" name="trees_planted" class="form-control" value="{{ old('trees_planted', $service->trees_planted) }}">
                              </div>
                        </div>

                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="total_funds_raised_inr" class="form-label">Funds Raised (INR)</label>
                                    <input type="number" step="0.01" name="total_funds_raised_inr" class="form-control" value="{{ old('total_funds_raised_inr', $service->total_funds_raised_inr) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="total_funds_raised_usd" class="form-label">Funds Raised (USD)</label>
                                    <input type="number" step="0.01" name="total_funds_raised_usd" class="form-control" value="{{ old('total_funds_raised_usd', $service->total_funds_raised_usd) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="non_lion_participants" class="form-label">Non-Lion Participants</label>
                                    <input type="number" name="non_lion_participants" class="form-control" value="{{ old('non_lion_participants', $service->non_lion_participants) }}">
                              </div>
                        </div>

                        <div class="row mb-3">
                              <div class="col-md-6">
                                    <label for="non_lion_family_participants" class="form-label">Non-Lion Family Participants</label>
                                    <input type="number" name="non_lion_family_participants" class="form-control" value="{{ old('non_lion_family_participants', $service->non_lion_family_participants) }}">
                              </div>
                              <div class="col-md-6">
                                    <label for="funded_by_lcif_grant" class="form-label">Funded by LCIF Grant?</label>
                                    <select name="funded_by_lcif_grant" class="form-select">
                                          <option value="0" {{ old('funded_by_lcif_grant', $service->funded_by_lcif_grant) == 0 ? 'selected' : '' }}>No</option>
                                          <option value="1" {{ old('funded_by_lcif_grant', $service->funded_by_lcif_grant) == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                              </div>
                        </div>

                        {{-- Location --}}
                        <div class="row mb-3">
                              <div class="col-md-4">
                                    <label for="venue" class="form-label">Venue</label>
                                    <input type="text" name="venue" class="form-control" value="{{ old('venue', $service->venue) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="venue_location" class="form-label">Venue Location</label>
                                    <input type="text" name="venue_location" class="form-control" value="{{ old('venue_location', $service->venue_location) }}">
                              </div>
                              <div class="col-md-4">
                                    <label for="venue_timezone" class="form-label">Venue Timezone</label>
                                    <input type="text" name="venue_timezone" class="form-control" value="{{ old('venue_timezone', $service->venue_timezone) }}">
                              </div>
                        </div>

                        {{-- Sponsor Details --}}
                        <div class="row mb-3">
                              <div class="col-md-6">
                                    <label for="sponsor_club" class="form-label">Sponsor Club</label>
                                    <input type="text" name="sponsor_club" class="form-control" value="{{ old('sponsor_club', $service->sponsor_club) }}">
                              </div>
                              <div class="col-md-6">
                                    <label for="sponsor_district" class="form-label">Sponsor District</label>
                                    <input type="text" name="sponsor_district" class="form-control" value="{{ old('sponsor_district', $service->sponsor_district) }}">
                              </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update Service</button>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
                  </form>
            </div>
      </div>
</div>

@endsection
