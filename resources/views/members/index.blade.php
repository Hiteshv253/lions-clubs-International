@extends('layouts.master')

@section('content')
<div class=" ">
      <h1>Members List</h1>
      <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Add New Member</a>

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <table id="members-table" class="table table-bordered">
            <thead>
                  <tr>
                        <th>ID</th>
                        <th>Name Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
      </table>
</div>

<script>
      $(function () {
            $('#members-table').DataTable({
//        processing: true,
//        serverSide: true,
                  ajax: '{{ route('members.index') }}',
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'gender', name: 'gender'},
                        {data: 'mobile', name: 'mobile'},
                        {data: 'work_email', name: 'work_email'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });
      });
</script>


@endsection
