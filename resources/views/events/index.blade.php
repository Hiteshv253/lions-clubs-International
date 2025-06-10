@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
      </ol>
</nav>

<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">DG Team List</h5>
      </div>
      <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex align-items-center mb-3">
                  <a href="{{ route('events.create') }}" class="btn btn-success">Add Events </a>
            </div>

            <table id="events-table" class="table">
                  <thead>
                        <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Date & Time</th>
                              <th>Active?</th>
                              <th>Actions</th>
                        </tr>
                  </thead>
            </table>

      </div>



      <script>
            $(function () {
                  $('#events-table').DataTable({
                        //        processing: true,
                        //        serverSide: true,
                        ajax: '{{ route('events.index') }}',
                        columns: [
                              {data: 'id', name: 'id'},
                              {data: 'event_name', name: 'event_name'},
                              {data: 'date_time', name: 'date_time'},
                              {data: 'is_active', name: 'is_active'},
                              {data: 'actions', name: 'actions', orderable: false, searchable: false},
                        ]
                  });
            });
      </script>


      @endsection