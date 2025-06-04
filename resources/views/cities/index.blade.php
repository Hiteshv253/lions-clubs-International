@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>City List</h2>
    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Add City</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>State</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $loop->iteration + ($cities->currentPage()-1) * $cities->perPage() }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->state->name }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cities->links() }}
</div>
@endsection
