@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubs.index') }}">Clubs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Edit Club</h5>
      </div>
      <div class="card-header">
            <form action="{{ route('clubs.update', $club->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="row">
                        @php
                        $fields = [
                        'account_name', 'type', 'parent_account', 'district', 'region_zone', 'lion_id',
                        'charter_established_date', 'active_member_count', 'club_specialty',
                        'club_sub_specialty', 'specialty_description', 'description', 'website',
                        'meeting_place', 'meeting_week', 'meeting_day', 'meeting_time', 'meeting_street',
                        'meeting_city', 'meeting_state', 'meeting_zip', 'meeting_country',
                        'meeting_local_place', 'meeting_local_street', 'meeting_local_city',
                        'meeting_local_zip', 'meeting_local_state', 'meeting_local_country',
                        'online_meeting_1', 'online_meeting_1_place', 'online_meeting_1_address',
                        'meeting2_place', 'meeting2_week', 'meeting2_day', 'meeting2_time',
                        'meeting2_street', 'meeting2_city', 'meeting2_state', 'meeting2_zip',
                        'meeting2_country', 'meeting2_local_place', 'meeting2_local_street',
                        'meeting2_local_city', 'meeting2_local_zip', 'meeting2_local_state',
                        'meeting2_local_country', 'online_meeting_2', 'online_meeting_2_place'
                        ];
                        @endphp

                        @foreach ($fields as $field)
                        <div class="col-md-4 mb-3">
                              <label for="{{ $field }}" class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                              <input type="text" name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" value="{{ old($field, $club->$field) }}">
                              @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        @endforeach
                  </div>
                  <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
                  </div>
            </form>
      </div>
</div>

@endsection
