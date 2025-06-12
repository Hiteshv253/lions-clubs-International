@extends('layouts.master')

@section('content')
<nav>
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Club</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header"><h5>View Club</h5></div>
      <div class="card-body">
            <dl class="row">
                  <dt class="col-sm-3">District</dt>
                  <dd class="col-sm-9">{{ $club->zone->region->district->name }}</dd>

                  <dt class="col-sm-3">Region</dt>
                  <dd class="col-sm-9">{{ $club->zone->region->name }}</dd>

                  <dt class="col-sm-3">Zone</dt>
                  <dd class="col-sm-9">{{ $club->zone->name }}</dd>

                  <dt class="col-sm-3">Club Name</dt>
                  <dd class="col-sm-9">{{ $club->name }}</dd>

                  <dt class="col-sm-3">club_number</dt>
                  <dd class="col-sm-9">{{ $club->club_number }}</dd>

                  <dt class="col-sm-3">Charter Date</dt>
                  <dd class="col-sm-9">{{ $club->charter_date }}</dd>
                  
                  <dt class="col-sm-3">Inauguration Date of Club</dt>
                  <dd class="col-sm-9">{{ $club->inauguration_date_club }}</dd>
            </dl>
            <div class="text-end">
                  <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Back</a>
            </div>
      </div>
</div>
@endsection
