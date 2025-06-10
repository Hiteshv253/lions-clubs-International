@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>

<div class="container-fluid my-4">
      <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                  <h5 class="mb-0">Add Member</h5>
            </div>

            {{-- Global error messages --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                  <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                  </ul>
            </div>
            @endif
            <div class="card-body">
                  <form action="{{ route('members.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror" value="{{ old('account_name') }}" required>
                                    @error('account_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Parent Region</label>
                                    <input type="text" name="parent_region" class="form-control" value="{{ old('parent_region') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Parent Zone</label>
                                    <input type="text" name="parent_zone" class="form-control" value="{{ old('parent_zone') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Member ID</label>
                                    <input type="text" name="member_id" class="form-control" value="{{ old('member_id') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Address Line 1</label>
                                    <input type="text" name="address_line1" class="form-control" value="{{ old('address_line1') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Address Line 2</label>
                                    <input type="text" name="address_line2" class="form-control" value="{{ old('address_line2') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Address Line 3</label>
                                    <input type="text" name="address_line3" class="form-control" value="{{ old('address_line3') }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">State/Province</label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Zip/Postal Code</label>
                                    <input type="text" name="zip" class="form-control" value="{{ old('zip') }}">
                              </div>

                              <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Personal Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <label class="form-label">Home Phone</label>
                                    <input type="text" name="home_phone" class="form-control" value="{{ old('home_phone') }}">
                              </div>

                              <div class="col-sm-6 col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                          <option value="">-- Select --</option>
                                          <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                          <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                          <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                              </div>

                              <div class="col-sm-6 col-md-6">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control" value="{{ old('occupation') }}">
                              </div>

                              <div class="col-sm-6 col-md-6">
                                    <label class="form-label">Lion Join Date</label>
                                    <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
                              </div>
                        </div>

                        <div class="text-end">
                              <button type="submit" class="btn btn-success">Submit</button>
                              <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection
