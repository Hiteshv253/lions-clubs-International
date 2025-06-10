@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('occupations.index') }}">Occupations</a></li>
      </ol>
</nav>
<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Occupations List</h4>
                        <a href="{{ route('occupations.create') }}" class="btn btn-primary">Add New Occupations</a>
                  </div>
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="card-body">
                    
<!--                        <div class="row gy-2 gx-3 mb-3">
                              <div class="col-sm-6 col-md-2">
                                    <select id="filter-is-active" class="form-select form-select-sm">
                                          <option value="">All</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                    </select>
                              </div>
                        </div>-->
                        <div class="mb-3">
                              <!--<button id="btn-filter" class="btn btn-sm btn-primary">Search</button>-->
                              <!--<button id="btn-reset" class="btn btn-sm btn-secondary">Reset</button>-->
                              <!--<button id="btn-delete-selected" class="btn btn-danger btn-sm" disabled>Delete Selected</button>-->
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <div class="">
                              <div class="table-responsive">
                                    <table id="occupations-table" class="table table-bordered table-striped w-100">
                                          <thead class="table-light">
                                                <tr>
                                                      <th><input type="checkbox" id="select-all"></th>
                                                      <th>#</th>
                                                      <th>Name Name</th>
                                                      <th>Actions</th>
                                                </tr>
                                          </thead>
                                          <tbody></tbody>
                                    </table>
                              </div>

                        </div>
                  </div>
            </div>
      </div>
</div>

<script>
      $(function () {
      $('#occupations-table').DataTable({
      ajax: '{{ route('occupations.index') }}',
              columns: [
              {
              data: 'id',
                      render: function (data) {
                      return '<input type="checkbox" class="row-checkbox" value="' + data + '">';
                      },
                      orderable: false,
                      searchable: false
              },
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'actions', name: 'actions', orderable: false, searchable: false},
              ]
      });
      });
      // Handle "select all" checkbox
      $('#select-all').on('click', function () {
      $('.row-checkbox').prop('checked', this.checked);
      });
      // Handle delete
      $('#delete-selected').on('click', function () {
      let selectedIds = $('.row-checkbox:checked').map(function () {
      return $(this).val();
      }).get();
      if (selectedIds.length === 0) {
      alert('No records selected.');
      return;
      }

      if (!confirm('Are you sure you want to delete selected records?')) return;
      $.ajax({
      url: '{{ route('occupations.bulkDelete') }}',
              method: 'POST',
              data: {
              _token: '{{ csrf_token() }}',
                      ids: selectedIds
              },
              success: function (response) {
              $('#occupations-table').DataTable().ajax.reload();
              alert(response.message);
              }
      });
      });

</script>


@endsection
