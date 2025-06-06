@extends('layouts.master')

@section('content')
<div class="mt-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accounts</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div class="w-auto">
            <label for="filter-type" class="form-label me-2">Filter by Type</label>
            <select id="filter-type" class="form-select d-inline-block w-auto">
                <option value="">-- All Types --</option>
                @foreach(['Asset','Liability','Equity','Income','Expense'] as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('accounts.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="accounts-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th style="width: 110px;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>

</div>

<script>
$(function () {
    var table = $('#accounts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('accounts.index') }}',
            data: function (d) {
                d.type = $('#filter-type').val();
            }
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
            { data: 'type', name: 'type' },
            {
                data: 'is_active',
                name: 'is_active',
                render: function(data) {
                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                }
            },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        order: [[0, 'asc']]
    });

    $('#filter-type').on('change', function () {
        table.draw();
    });
});
</script>
@endsection
