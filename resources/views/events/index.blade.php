@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
      </ol>
</nav>
<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card shadow-sm rounded-4">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Events Master</h4>
                        <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Add Event</a>
                  </div>

                  <div class="p-3 shadow-sm">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="events-responsive">
                              <table id="events-table" class="table table-bordered table-striped w-100">
                                    <thead class="table-light">
                                          <tr>
                                                <th>#</th>
                                                <th>Event Name</th>
                                                <th>Date & Time</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Base Amount</th>
                                                <th>GST Amount</th>
                                                <th>GST Rate(%)</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                          </tr>
                                    </thead>
                              </table>

                        </div>

                  </div>
            </div>
      </div>
</div>
<script>
      $(function () {
            $('#events-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ route('events.index') }}',
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'event_name', name: 'event_name'},
                        {data: 'date_time', name: 'date_time'},
                        {data: 'event_start_date', name: 'event_start_date'},
                        {data: 'event_end_date', name: 'event_end_date'},
                        {data: 'base_amount', name: 'base_amount'},
                        {data: 'gst_amount', name: 'gst_amount'},
                        {data: 'gst_rate', name: 'gst_rate'},
                        {data: 'total_amount', name: 'total_amount'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 0
                                            ? '<span class="badge bg-success">Active</span>'
                                            : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });
      });
</script>
@endsection