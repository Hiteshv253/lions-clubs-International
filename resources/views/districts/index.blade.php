@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">District</li>
    </ol>
</nav>

<div class="row mt-3">
    <div class="col-xl-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="card-title mb-0">Districts Master</h4>
                <a href="{{ route('districts.create') }}" class="btn btn-primary btn-sm">Add District</a>
            </div>

            <div class="card-body">
                <!-- Filter -->
                <div class="row mb-3 align-items-end g-2">
                    <div class="col-md-3">
                        <label for="filter-state" class="form-label fw-semibold">Filter by State</label>
                        <select id="filter-state" class="form-select">
                            <option value="">All States</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 d-flex gap-2 align-items-end">
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

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="districts-table" style="width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>State Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTable Script -->
<script>
    let table = $('#districts-table').DataTable({
        processing: true,
        serverSide: true,
        order: [[0, 'desc']],
        ajax: {
            url: '{{ route("districts.index") }}',
            data: function (d) {
                d.state_id = $('#filter-state').val();
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'state_name', name: 'state.name'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
    });

    $('#filter-state').change(function () {
        table.draw();
    });

    $('#btnSearch').click(function () {
        table.draw();
    });

    $('#btnReset').click(function () {
        $('#filter-state').val('');
        table.draw();
    });
</script>
@endsection
