@extends('layouts.master')

@section('content')
      <nav>
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Club</li>
            </ol>
      </nav>
      <div class="card shadow-sm rounded-4">
            <div class="card-header"><h5>Edit Club</h5></div>
            <div class="card-body">
                  <form method="POST" action="{{ route('clubs.update', $club->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">District</label>
                                    <select id="district" name="district" class="form-select @error('district') is-invalid @enderror">
                                          <option value="">Select District*</option>
                                    @foreach($districts as $district)
                                                <option value="{{ $district->id }}" {{ $district->id == $club->zone->region->district_id ? 'selected' : '' }}>
                                                      {{ $district->name }}
                                                </option>
                                          @endforeach
                                    </select>
                                     @error('district')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Select Region*</label>
                                    <select id="region" name="region" class="form-select @error('region') is-invalid @enderror">
                                          <option value="{{ $club->zone->region->id }}">{{ $club->zone->region->name }}</option>
                                    </select>
                                     @error('region')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Select Zone*</label>
                                    <select name="zone_id" id="zone" class="form-select">
                                          <option value="{{ $club->zone_id }}">{{ $club->zone->name }}</option>
                                    </select>
                                     @error('zone_id')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>

                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Name*</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ $club->name }}" >
                                      @error('name')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>
                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Number/Club ID*</label>
                                    <input type="text" id="club_number" name="club_number" class="form-control @error('club_number') is-invalid @enderror" value="{{ $club->club_number }}">
                                    @error('club_number')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>
                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Charter Date</label>
                                    <input type="date" name="charter_date" id="charter_date" class="form-control" value="{{ $club->charter_date }}">
                                    
                              </div>
                               <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Inauguration Date Of Club</label>
                                    <input type="date" name="inauguration_date_club" id="inauguration_date_club" class="form-control" value="{{ $club->inauguration_date_club }}">
                                     
                              </div>
                        <!-- Image Preview + Upload -->
                              <div class="col-md-8">
                                    @if($club->image)
                                          <label class="form-label d-block">Current Club Logo:</label>
                                          <img src="{{ asset('/storage/' . $club->image) }}" alt="Event Image" class="img-thumbnail mb-2" style="max-width: 150px;">
                                    @endif

                                    <label for="image" class="form-label">Replace Club Logo (optional)</label>
                                    <input type="file" name="image" id="image"
                                     class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="col-12">
                                    <label for="about_club" class="form-label">About Club</label>
                                    <textarea name="about_club" id="about_club" rows="5"
                                          class="form-control @error('about_club') is-invalid @enderror">{{ $club->about_club }}</textarea>
                              @error('about_club')
                              <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                         <div class="col-sm-6 col-md-4">
                    <label for="is_active" class="form-label">Status*</label>
                    <select name="is_active" id="is_active"  class="form-select @error('is_active') is-invalid @enderror" required>
                        <option value="0" {{ old('is_active', $club->is_active) == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ old('is_active', $club->is_active) == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                        </div>
                        <div class="text-end mt-3">
                              <button class="btn btn-primary">Update</button>
                              <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </form>
            </div>
      </div>

      @include('clubs.partials.script')
 
@endsection
