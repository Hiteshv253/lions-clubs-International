@extends('layouts.master')

@section('content')

<!-- 🧭 Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('event_user_registration.index') }}">Event</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ $event->event_name }}</li>
            <li class="breadcrumb-item active" aria-current="page">Registrations</li>
      </ol>
</nav>

<!-- 📋 Event Registrations -->
<div class="row mt-3">
      <div class="col-12">
            <div class="card shadow-sm">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h4 class="card-title mb-0">{{ $event->event_name }} - Registrations</h4>
                  </div>
                  <div class="card-body">
                        <p><strong>Date & Time:</strong>
                              {{ \Carbon\Carbon::parse($event->event_start_date)->format('M d, Y h:i A') }}
                              - {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d, Y h:i A') }}
                        </p>

                        @if($event->registrations->isEmpty())
                        <div class="alert alert-warning mb-0">No registrations yet.</div>
                        @else
                        <div class="table-responsive">
                              <table class="table table-bordered table-striped" id="registrations-table">
                                    <thead class="table-light">
                                          <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact Number</th>
                                                <th>Registered At</th>
                                          </tr>
                                    </thead>
                              </table>
                        </div>
                        @endif
                  </div>
            </div>
      </div>
</div>

<script>
      $(function () {
            $('#registrations-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: '{{ route("event_user_registration.data", $event->id) }}',
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'contact_number', name: 'contact_number'},
                        {data: 'created_at', name: 'created_at'}
                  ]
            });
      });
</script>
@endsection
