@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">My Event Registered History</h2>

    @if($events->isEmpty())
        <div class="alert alert-info">You haven't Registered for any events yet.</div>
    @else
        <div class="row">
            @foreach($events as $event)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->event_name }}</h5>
                        <p class="card-text">
                            <strong>Date & Time:</strong><br>
                            {{ \Carbon\Carbon::parse($event->date_time)->format('F j, Y - g:i A') }}
                        </p>
                        <p class="card-text">
                            <strong>Registered At:</strong><br>
                            {{ \Carbon\Carbon::parse($event->pivot->registered_at ?? $event->pivot->created_at)->format('F j, Y - g:i A') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
