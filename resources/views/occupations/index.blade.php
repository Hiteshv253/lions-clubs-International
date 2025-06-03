@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h4 class="mb-0">Occupations</h4>
            <a href="{{ route('occupations.create') }}" class="btn btn-light btn-sm">Add New</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($occupations->isEmpty())
                <p class="text-muted">No occupations found.</p>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($occupations as $occupation)
                            <tr>
                                <td>{{ $occupation->name }}</td>
                                <td>
                                    <a href="{{ route('occupations.edit', $occupation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('occupations.destroy', $occupation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
