@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Regions</li>
    </ol>
</nav>

<div class="row mt-3">
    <div class="col-xl-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="card-title mb-0">Regions Master</h4>
                <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm">Add Region</a>
            </div>

            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-3 align-items-end g-2">
                    <div class="col-md-3">
                        <label for="filterDistrict" class="form-label">Filter by District</label>
                        <select id="filterDistrict" class="form-select">
                            <option value="">All Districts</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 d-flex gap-2">
                        <button id="btnSearch" class="btn btn-primary">Search</button>
                        <button id="btnReset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>

                <!-- Alerts -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- DataTable -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="region-table" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Region Name</th>
                                <th>District</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- card-body -->
        </div> <!-- card -->
    </div>
</div>

<!-- Scripts -->
<script>
    $(function () {
        let table = $('#region-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: {
                url: '{{ route("regions.index") }}',
                data: function (d) {
                    d.district_id = $('#filterDistrict').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'district_name', name: 'district.name'},
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

        $('#btnSearch').click(function () {
            table.ajax.reload();
        });

        $('#btnReset').click(function () {
            $('#filterDistrict').val('');
            table.ajax.reload();
        });
    });
</script>
@endsection
