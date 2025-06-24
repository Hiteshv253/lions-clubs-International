@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clubs</li>
    </ol>
</nav>

<div class="mt-1">
    <div class="card shadow-sm rounded-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Clubs List</h5>
            <a href="{{ route('clubs.create') }}" class="btn btn-primary btn-sm">Add Club</a>
        </div>

        <div class="card-body">
            <!-- Filters -->
            <div class="row mb-3 align-items-end g-2">
                <div class="col-md-3">
                    <label for="filterRegion" class="form-label fw-semibold">Filter by Region</label>
                    <select id="filterRegion" class="form-select">
                        <option value="">All Regions</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->name }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="filterDistrict" class="form-label fw-semibold">Filter by District</label>
                    <select id="filterDistrict" class="form-select">
                        <option value="">All Districts</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->name }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 d-flex gap-2 mt-3 mt-md-0">
                    <button id="btnSearch" class="btn btn-primary">Search</button>
                    <button id="btnReset" class="btn btn-secondary">Reset</button>
                </div>
            </div>

            <!-- Alerts -->
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

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="clubs-table" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Club Name</th>
                            <th>Zone</th>
                            <th>Region</th>
                            <th>District</th>
                            <th>Club Number</th>
                            <th>Inauguration Date</th>
                            <th>Charter Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        let table = $('#clubs-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: {
                url: "{{ route('clubs.index') }}",
                data: function (d) {
                    d.region = $('#filterRegion').val();
                    d.district = $('#filterDistrict').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'zone_name', name: 'zone.name'},
                {data: 'region_name', name: 'zone.region.name'},
                {data: 'district_name', name: 'zone.region.district.name'},
                {data: 'club_number', name: 'club_number'},
                {data: 'inauguration_date_club', name: 'inauguration_date_club'},
                {data: 'charter_date', name: 'charter_date'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ]
        });

        $('#btnSearch').click(() => table.ajax.reload());
        $('#btnReset').click(() => {
            $('#filterRegion').val('');
            $('#filterDistrict').val('');
            table.ajax.reload();
        });
    });
</script>
@endsection
