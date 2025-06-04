@extends('layouts.master')
@section('content')
<div class="container">
      <h2>States List</h2>
      <a href="{{ route('states.create') }}" class="btn btn-primary mb-2">Add State</a>
      <table class="table table-bordered" id="states-table">
            <thead>
                  <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Actions</th>
                  </tr>
            </thead>
      </table>
</div>



<script>
      $(function () {
            $('#states-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ route("states.index") }}',
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
            });
      });
</script>
@endsection
