@extends('layouts.master')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Account Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New</li>
      </ol>
</nav>
<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Account Master</h5>
            </div>
            <div class="card-header">
                  <!-- Filter and Add Button -->
                  <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                              <label for="filter-type" class="form-label me-2 mb-0">Filter by Type:</label>
                              <select id="filter-type" class="form-select w-auto">
                                    <option value="">-- All Types --</option>
                                    @foreach(['Asset','Liability','Equity','Income','Expense'] as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                              </select>
                        </div>
                        <a href="{{ route('accounts.create') }}" class="btn btn-primary">Add New</a>
                  </div>

                  <!-- Flash Message -->
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <!-- Table -->
                  <div class="card ">
                        <div class="table-responsive">
                              <table id="accounts-table" class="table table-bordered table-striped w-100">
                                    <thead class="table-light">
                                          <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Account No</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 120px;">Actions</th>
                                          </tr>
                                    </thead>
                              </table>
                        </div>

                  </div>
            </div>
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
                        {data: 'name', name: 'name'},
                        {data: 'code', name: 'code'},
                        {data: 'account_no', name: 'account_no'},
                        {data: 'type', name: 'type'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  ],
                  order: [[0, 'asc']]
            });

            $('#filter-type').on('change', function () {
                  table.draw();
            });
      });
</script>
@endsection
