@extends('layouts.master')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sponsors.index') }}">Sponsors Master</a></li>
      </ol>
</nav>
<div class="card shadow-sm rounded-4">
      <div class="card-header">
            <h5 class="mb-0">All Sponsors</h5>
      </div>
      <div class="card-header">
            <!-- Filter and Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                  <a href="{{ route('sponsors.create') }}" class="btn btn-primary">+ Add Sponsor</a>
            </div>



            <div class="card p-3 shadow-sm">
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="table-responsive">
                        <table id="sponsor-table" class="table table-bordered table-striped w-100">
                              <thead class="table-light">
                                    <tr>
                                          <th>Name</th>
                                          <th>Logo</th>
                                          <th>Website</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                        </table>
                  </div>
            </div>
      </div>
</div>
</div>


<!-- DataTables and Delete Script -->
<script>
      $(document).ready(function () {
            let table = $('#sponsor-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: "{{ route('sponsors.index') }}",
                  columns: [
                        {data: 'name', name: 'name'},
                        {data: 'logo', name: 'logo', orderable: false, searchable: false},
                        {data: 'website', name: 'website'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ]
            });

            $(document).on('click', '.delete-sponsor', function (e) {
                  e.preventDefault();
                  let url = $(this).data('url');
                  if (confirm('Delete this sponsor?')) {
                        $.ajax({
                              url: url,
                              type: 'POST',
                              data: {
                                    _token: '{{ csrf_token() }}',
                                    _method: 'DELETE'
                              },
                              success: function (result) {
                                    table.ajax.reload();
                              },
                              error: function (xhr) {
                                    alert('Failed to delete sponsor.');
                              }
                        });
                  }
            });
      });
</script>
@endsection
