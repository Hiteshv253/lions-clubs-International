@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">DG Team List</h2>
    <a href="{{ route('dg-teams.create') }}" class="btn btn-success mb-3">Add Member</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="dgTeamTable-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

<script>
$(document).ready(function () {
    $('#dgTeamTable-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('dg-teams.index') }}',
        columns: [
             {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'designation', name: 'designation'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},
            {data: 'is_active', name: 'is_active'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
    });
});
</script>

@endsection