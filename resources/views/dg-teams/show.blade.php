@extends('layouts.master')

@section('content')
<div class="container">
      <h2>DG Team Member Details</h2>
      <ul class="list-group">
            <li class="list-group-item"><strong>Name:</strong> {{ $dgTeam->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $dgTeam->email }}</li>
            <li class="list-group-item"><strong>Designation:</strong> {{ $dgTeam->designation }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $dgTeam->phone }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $dgTeam->address }}</li>
      </ul>
      <a href="{{ route('dg-teams.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
