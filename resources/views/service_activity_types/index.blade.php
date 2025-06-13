@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('service-activity-types.index') }}">Service Activity Types</a></li>
      </ol>
</nav>
<div class="card shadow-sm">
      <div class="card-header">
            <h5 class="mb-0">Service Activity Types Master</h5>
      </div>
      <div class="card-header">

            <a href="{{ route('service-activity-types.create') }}" class="btn btn-success mb-3">+ Add New</a>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table id="activity-types-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Actions</th>
                        </tr>
                  </thead>
            </table>

      </div>
</div>

<script>
      $(document).ready(function () {
            let table = $('#activity-types-table').DataTable({
                  processing: true,
                  serverSide: true,
                  responsive: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: "{{ route('service-activity-types.index') }}",
                  columns: [
                        {data: 'name', name: 'name'},
                        {data: 'description', name: 'description'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ],
                  createdRow: function (row, data, dataIndex) {
                        // Replace CSRF token
                        $(row).find('form').each(function () {
                              $(this).find('input[name="_token"]').val('{{ csrf_token() }}');
                        });
                  }
            });

            // AJAX delete handler
            $(document).on('submit', '.delete-form', function (e) {
                  e.preventDefault();
                  const form = $(this);
                  if (confirm("Are you sure you want to delete this activity type?")) {
                        $.ajax({
                              url: form.attr('action'),
                              method: 'POST',
                              data: form.serialize(),
                              success: function (response) {
                                    table.ajax.reload(null, false);
                              },
                              error: function () {
                                    alert("Failed to delete.");
                              }
                        });
                  }
            });
      });
</script>
@endsection
