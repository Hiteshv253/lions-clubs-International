@extends('layouts.master')

@section('content')
<div class="container">
    <h1>All Events</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date &amp; Time</th>
                <th>Active?</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->date_time }}</td>
                <td>{{ $event->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this event?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $events->links() }}
</div>
@endsection
