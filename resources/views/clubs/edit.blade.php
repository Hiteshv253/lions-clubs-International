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
                  <form method="POST" action="{{ route('clubs.update', $club->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">District</label>
                                    <select id="district" class="form-select">
                                          <option value="">Select District</option>
                                    @foreach($districts as $district)
                                                <option value="{{ $district->id }}" {{ $district->id == $club->zone->region->district_id ? 'selected' : '' }}>
                                                      {{ $district->name }}
                                                </option>
                                          @endforeach
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Region</label>
                                    <select id="region" class="form-select">
                                          <option value="{{ $club->zone->region->id }}">{{ $club->zone->region->name }}</option>
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Zone</label>
                                    <select name="zone_id" id="zone" class="form-select">
                                          <option value="{{ $club->zone_id }}">{{ $club->zone->name }}</option>
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $club->name }}" required>
                              </div>
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Club Number/Club ID</label>
                                    <input type="number" id="club_number" name="club_number" class="form-control" required value="{{ $club->club_number }}">
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
                                          <label class="form-label d-block">Current Image:</label>
                                          <img src="{{ asset('/storage/' . $club->image) }}" alt="Event Image" class="img-thumbnail mb-2" style="max-width: 150px;">
                                    @endif

                                    <label for="image" class="form-label">Replace Image (optional)</label>
                                    <input type="file" name="image" id="image"
                                     class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="col-12">
                                    <label for="about_club" class="form-label">Description</label>
                                    <textarea name="about_club" id="about_club" rows="5"
                                          class="form-control @error('about_club') is-invalid @enderror">{{ $club->about_club }}</textarea>
                              @error('about_club')
                              <div class="invalid-feedback">{{ $message }}</div> @enderror
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
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
      <script>
      CKEDITOR.replace('about_club');
      </script>
@endsection
