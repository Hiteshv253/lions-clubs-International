@extends('layouts.master')

@section('content')

<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
      <ol class="breadcrumb mb-0 p-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
      </ol>
</nav>

<div class="  my-4">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h2>Service List</h2>
            </div>

            <div class="card-body">
                  <!-- Filters -->
                  <form id="filter-form" class="row gy-2 gx-3 align-items-end mb-3">
                        <div class="col-6 col-md-2">
                              <label for="start_date" class="form-label d-none d-md-block">Start Date</label>
                              <input type="date" id="start_date" class="form-control" placeholder="Start Date">
                        </div>
                        <div class="col-6 col-md-2">
                              <label for="end_date" class="form-label d-none d-md-block">End Date</label>
                              <input type="date" id="end_date" class="form-control" placeholder="End Date">
                        </div>
                        <div class="col-12 col-md-3 d-flex gap-2">
                              <button type="button" id="filter" class="btn btn-primary flex-grow-1">Filter</button>
                              <button type="button" id="reset" class="btn btn-secondary flex-grow-1">Reset</button>
                        </div>
                        <div class="col-12 col-md-5 d-flex justify-content-md-end gap-2 flex-wrap">
                              <a href="{{ route('services.create') }}" class="btn btn-success flex-grow-1 flex-md-grow-0">+ Add New</a>
                              <a id="delete-selected" class="btn btn-danger flex-grow-1 flex-md-grow-0">- Delete Selected</a>
                              <a href="{{ route('services.export.pdf') }}" class="btn btn-danger flex-grow-1 flex-md-grow-0">Export PDF</a>
                        </div>
                  </form>

                  <!-- Responsive Table Wrapper -->
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="services-table">
                              <thead class="table-light">
                                    <tr>
                                          <th><input type="checkbox" id="select-all"></th>
                                          <th>ID</th>
                                          <th>Title</th>
                                          <th>Sponsor</th>
                                          <th>Start Date</th>
                                          <th>End Date</th>
                                          <th>Club</th>
                                          <th>Actions</th>
                                    </tr>
                              </thead>
                              <!-- tbody will be filled by DataTables -->
                        </table>
                  </div>
            </div>
      </div>
</div>




<script>
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      function loadTable() {
            $('#services-table').DataTable({
                  processing: true,
                  serverSide: true,
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
                  ajax: {
                        url: "{{ route('services.index') }}",
                        data: function (d) {
                              d.start_date = $('#start_date').val();
                              d.end_date = $('#end_date').val();
                        }
                  },
                  columns: [
                        {
                              data: 'id',
                              orderable: false,
                              searchable: false,
                              render: function (data) {
                                    return `<input type="checkbox" class="record-checkbox" value="${data}">`;
                              }
                        },
                        {data: 'id', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'sponsor', name: 'sponsor'},
                        {data: 'start_date', name: 'start_date'},
                        {data: 'end_date', name: 'end_date'},
                        {data: 'club_name', name: 'club_name'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {
                              data: 'id',
                              orderable: false,
                              searchable: false,
                              render: function (data) {
                                    return `
                <a href="/lions/services/${data}" class="btn btn-sm btn-info">View</a>
                <a href="/lions/services/${data}/edit" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger delete-btn" data-id="${data}">Delete</button>
            `;
                              }
                        }
                  ]
            });
      }

      $(document).ready(function () {
            loadTable();

            $('#filter').click(function () {
                  $('#services-table').DataTable().destroy();
                  loadTable();
            });

            $('#reset').click(function () {
                  $('#start_date').val('');
                  $('#end_date').val('');
                  $('#services-table').DataTable().destroy();
                  loadTable();
            });

            // Single delete
            $(document).on('click', '.delete-btn', function () {
                  const id = $(this).data('id');
                  if (confirm('Are you sure you want to delete this record?')) {
                        $.ajax({
                              url: '/lions/services/' + id,
                              type: 'DELETE',
                              _token: '{{ csrf_token() }}',
                              success: function () {
                                    $('#services-table').DataTable().ajax.reload();
                              }
                        });
                  }
            });

            // Select all checkbox
            $(document).on('change', '#select-all', function () {
                  $('.record-checkbox').prop('checked', this.checked);
            });

            // Multi-delete
            $('#delete-selected').click(function () {
                  let ids = [];
                  $('.record-checkbox:checked').each(function () {
                        ids.push($(this).val());
                  });

                  if (ids.length === 0) {
                        alert('Please select at least one record.');
                        return;
                  }

                  if (confirm('Are you sure you want to delete selected records?')) {
                        $.ajax({
                              url: '{{ route("services.bulk-delete") }}',
                              type: 'POST',
                              data: {
                                    ids: ids, _token: '{{ csrf_token() }}',
                              },
                              success: function () {
                                    $('#services-table').DataTable().ajax.reload();
                                    $('#select-all').prop('checked', false);
                              }
                        });
                  }
            });
      });
</script>
@endsection
