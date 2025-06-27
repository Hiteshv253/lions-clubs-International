@extends('layouts.master')

@section('content')

      <!-- 🧭 Breadcrumb -->
<nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm mb-3">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('event_user_registration.index') }}">Events</a></li>
                  <li class="breadcrumb-item">{{ $event->event_name }}</li>
                  <li class="breadcrumb-item active" aria-current="page">Registered</li>
      </ol>
</nav>

@php
    $registrations = $event->registrations;
    $totalPersons = $registrations->sum('number_of_persons');
    $totalCollected = $registrations->sum('calculated_total');
    $base = $event->base_amount ?? 0;
    $gst = $event->gst_amount ?? 0;
    $total = $event->total_amount ?? 0;
@endphp

      <!-- 💳 Pricing & Summary Card -->
<div class="row">
            <div class="col-lg-6 mb-4">
                  <div class="card shadow-sm h-100">
                        <div class="card-header bg-white border-bottom">
                              <h5 class="mb-0">Pricing & Registration Summary</h5>
                        </div>
                        <div class="card-body">
                              <ul class="list-unstyled mb-0">
                                    <li><strong>Registered Persons:</strong> {{ $totalPersons }}</li>
                                    <li><strong>Total Collected:</strong> ₹{{ number_format($totalCollected, 2) }}</li>
                                    <li><strong>Total Event Seats:</strong> {{ $event->total_event_users }}</li>
                                    <li><strong>Total Registered Seats :</strong> {{ $event->total_registered_user }}</li>
                                    <li><strong>Total Pendding Seats :</strong> {{ $event->total_pendding_users }}</li>
                              </ul>
                        </div>
                  </div>
            </div>

      <!-- 📅 Event Info -->
            <div class="col-lg-6 mb-4">
                  <div class="card shadow-sm h-100">
                        <div class="card-header bg-white border-bottom">
                              <h5 class="mb-0">Event Details</h5>
                        </div>
                        <div class="card-body">
                              <ul class="list-unstyled mb-0">
                                    <li><strong>Event:</strong> {{ $event->event_name }}</li>
                                    <li><strong>Description:</strong> {{ $event->description }}</li>
                                    <li><strong>Venue:</strong> {{ $event->venue_name }}</li>
                                     <li><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d, Y h:i A') }} - {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d, Y h:i A') }}</li>
                              </ul>
                        </div>
                  </div>
      </div>
</div>

      <!-- 🧾 Registered Users Table -->
<div class="card shadow-sm mb-5">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap bg-white">
                  <h5 class="mb-0">Registered Member {{$event->id}}</h5>
            </div>
            <div class="card-body">
                  @if($event->registrations->isEmpty())
                        <div class="alert alert-warning mb-0">No registrations found.</div>
                  @else
                        <div class="table-responsive">
                              <table class="table table-bordered table-striped align-middle" id="registrations-table" width="100%">
                                    <thead class="table-light">
                                          <tr>
                                                <th>#</th>
                                                <th>Member Name</th>
                                                <th>Email ID</th>
                                                <th>Contact Number</th>
                                                <th>Persons</th>
                                                <th>Total Paid</th>
                                                <th>Flag</th>
                                                <th>Registered At</th>
                                          </tr>
                                    </thead>
                              </table>
                        </div>
                  @endif
      </div>
</div>

      <!-- 🔁 DataTable Script -->
<script>
    $(function () {
        $('#registrations-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("event_user_registration.data", $event->id) }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'contact_number', name: 'contact_number' },
                { data: 'number_of_persons', name: 'number_of_persons', defaultContent: '1' },
                { data: 'calculated_total', name: 'calculated_total', render: data => '₹' + parseFloat(data).toFixed(2) },
                  {
                    data: 'flag',
                    name: 'flag',
                    render: function (data) {
                        return data == 0
                            ? '<span class="badge bg-success">Web</span>'
                            : '<span class="badge bg-secondary">Admin</span>';
                    }
                },
                { data: 'created_at', name: 'created_at' }
            ],
            order: [[0, 'desc']],
            responsive: true
        });
      });
</script>
@endsection
