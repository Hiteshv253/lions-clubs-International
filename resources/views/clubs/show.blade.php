@extends('layouts.master')

@section('content')
      <nav>
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Club</li>
            </ol>
      </nav>

      <div class="card shadow-sm rounded-4">
            <div class="card-header">
                  <h5 class="mb-0">Club Details: {{ $club->name }}</h5>
            </div>
            <div class="card-body">
                  <div class="row g-4">
                        <div class="col-md-6">
                              <dl class="row mb-0">
                                    <dt class="col-sm-5">District</dt>
                                    <dd class="col-sm-7">{{ $club->zone->region->district->name }}</dd>

                              <dt class="col-sm-5">Region</dt>
                              <dd class="col-sm-7">{{ $club->zone->region->name }}</dd>

                        <dt class="col-sm-5">Zone</dt>
                        <dd class="col-sm-7">{{ $club->zone->name }}</dd>

                  <dt class="col-sm-5">Club Name</dt>
                  <dd class="col-sm-7">{{ $club->name }}</dd>

            <dt class="col-sm-5">Club Number</dt>
            <dd class="col-sm-7">{{ $club->club_number }}</dd>

      <dt class="col-sm-5">Charter Date</dt>
                              <dd class="col-sm-7">
      {{ $club->charter_date ? \Carbon\Carbon::parse($club->charter_date)->format('d M Y') : '-' }}
      </dd>

      <dt class="col-sm-5">Inauguration Date</dt>
                              <dd class="col-sm-7">
      {{ $club->inauguration_date_club ? \Carbon\Carbon::parse($club->inauguration_date_club)->format('d M Y') : '-' }}
      </dd>

      <dt class="col-sm-5">Status</dt>
                              <dd class="col-sm-7">
      <span class="badge {{ $club->is_active == 0 ? 'bg-success' : 'bg-danger' }}">
            {{ $club->is_active == 0 ? 'Active' : 'Inactive' }}
      </span>
      </dd>
      </dl>
      </div>

      <div class="col-md-6">
            @if($club->image)
                  <label class="form-label">Club Logo</label>
                  <div class="border rounded p-2 bg-light text-center">

                        @php
                        $imgPath = $club->image && file_exists(public_path('storage/' . $club->image))
                            ? asset('storage/' . $club->image)
                            : 'https://3.imimg.com/data3/CK/HV/MY-10570443/corporate-events.jpg';
                    @endphp

                        
                        <img src="{{ $imgPath }}" alt="Club Logo" class="img-fluid img-thumbnail" style="max-height: 200px;">
                  </div>
            @endif
      </div>

      <div class="col-12">
            <label class="form-label">About Club</label>
            <div class="border rounded p-3 bg-light">
                  {!! $club->about_club ?? 'N/A' !!}
            </div>
      </div>
      </div>

      <div class="text-end mt-4">
            <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Back</a>
      </div>
      </div>
      </div>

      <div class="card shadow-sm rounded-4">
            <div class="card-header">
                  <h5 class="mb-0">Club Members Details</h5>
            </div>
            <div class="card-body">
                  <div class="row g-4">


                        @include('clubs._membser_clud')

                  </div>
            </div>
      </div>
@endsection
