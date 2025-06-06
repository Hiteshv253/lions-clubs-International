@extends('layouts.master')

@section('content')
<div class="mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Regions</li>
      </ol>
    </nav>

    <h2>Regions</h2>

    <!-- Search filter -->
    <div class="mb-3 d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2">
        <select id="filter-name" class="form-select" style="max-width: 300px;">
            <option value="">-- Select Region Name --</option>
            @foreach($allRegionNames as $regionName)
                <option value="{{ $regionName }}">{{ $regionName }}</option>
            @endforeach
        </select>

        <div class="btn-group" role="group" aria-label="Filter buttons">
            <button id="btn-search" class="btn btn-primary">Search</button>
            <button id="btn-reset" class="btn btn-secondary">Reset</button>
        </div>

        <a href="{{ route('regions.create') }}" class="btn btn-success ms-auto">+ Add New</a>
    </div>

    <table id="regions-table" class="table table-bordered table-hover w-100">
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th style="width: 120px;">Actions</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(function () {
        var table = $('#regions-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('regions.index') }}',
                data: function (d) {
                    d.name = $('#filter-name').val();
                }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'parent', name: 'parent.name', orderable: false, searchable: false},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            order: [[0, 'asc']]
        });

        $('#btn-search').click(() => table.draw());

        $('#btn-reset').click(() => {
            $('#filter-name').val('');
            table.draw();
        });
    });
</script>
@endsection
