@extends('layouts.master')

@section('content')
<div class=" ">
      <h1>All Events</h1>

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <a href="{{ route('events.create') }}" class="btn btn-primary mb-3 pull-right">Create New Event</a>

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