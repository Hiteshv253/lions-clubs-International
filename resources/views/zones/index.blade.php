@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Zones</li>
    </ol>
</nav>

<div class="card shadow-sm rounded-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Zones List</h5>
        <a href="{{ route('zones.create') }}" class="btn btn-success btn-sm">Add Zone</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="zone-table" style="width: 100%">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Zone Name</th>
                        <th>Region</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#zone-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'desc']], // Sort by Zone Name (optional)
            ajax: '{{ route("zones.index") }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'region_name', name: 'region.name'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection
