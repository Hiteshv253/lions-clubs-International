@extends('layouts.master')
@section('content')
<h1>Add Service Activity Type</h1>

<form method="POST" action="{{ route('service-activity-types.store') }}">
    @csrf
    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br>
    @error('name') <small style="color:red">{{ $message }}</small><br> @enderror

    <label>Description:</label><br>
    <textarea name="description">{{ old('description') }}</textarea><br>

    <button type="submit">Create</button>
</form>
@endsection
