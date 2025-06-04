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
                        <th>Account Name</th>
                        <th>Parent Region</th>
                        <th>Parent Zone</th>
                        <th>Member ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address Line 1</th>
                        <th>Address Line 2</th>
                        <th>Address Line 3</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Home Phone</th>
                        <th>Gender</th>
                        <th>Occupation</th>
                        <th>Join Date</th>
                        <th>Is Active</th>
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
                        {data: 'account_name', name: 'account_name'},
                        {data: 'parent_region', name: 'parent_region'},
                        {data: 'parent_zone', name: 'parent_zone'},
                        {data: 'member_id', name: 'member_id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'address_line1', name: 'address_line1'},
                        {data: 'address_line2', name: 'address_line2'},
                        {data: 'address_line3', name: 'address_line3'},
                        {data: 'city', name: 'city'},
                        {data: 'state', name: 'state'},
                        {data: 'zip', name: 'zip'},
                        {data: 'birthdate', name: 'birthdate'},
                        {data: 'email', name: 'email'},
                        {data: 'mobile', name: 'mobile'},
                        {data: 'home_phone', name: 'home_phone'},
                        {data: 'gender', name: 'gender'},
                        {data: 'occupation', name: 'occupation'},
                        {data: 'join_date', name: 'join_date'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data ? 'Yes' : 'No';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });
      });
</script>


@endsection
