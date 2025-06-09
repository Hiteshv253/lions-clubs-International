@extends('layouts.master')
@section('content')
<h1>Edit Service Activity Type</h1>

<form method="POST" action="{{ route('service-activity-types.update', $service_activity_type->id) }}">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $service_activity_type->name) }}"><br>
    @error('name') <small style="color:red">{{ $message }}</small><br> @enderror

    <label>Description:</label><br>
    <textarea name="description">{{ old('description', $service_activity_type->description) }}</textarea><br>

    <button type="submit">Update</button>
</form>
@endsection
