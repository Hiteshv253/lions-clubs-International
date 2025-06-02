@extends('layouts.master')

@section('content')
<div class="container">
    <h2>My Event Registration History</h2>

    @if($events->isEmpty())
        <div class="alert alert-info">You haven't registered for any events yet.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date & Time</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->date_time }}</td>
                    <td>{{ $event->pivot->registered_at ?? $event->pivot->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
