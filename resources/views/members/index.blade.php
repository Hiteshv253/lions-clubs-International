@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Members</li>
      </ol>
</nav>

<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card">

                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                  
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Members List</h4>
                        <a href="{{ route('members.create') }}" class="btn btn-primary">Add New Member</a>
                  </div>

                  <div class="card-body">
                        {{-- Filters --}}
                        <div class="row gy-2 gx-3 mb-3">
                              <div class="col-sm-6 col-md-2">
                                    <select id="filter-parent-region" class="form-select form-select-sm">
                                          <option value="">All Regions</option>
                                          @foreach($regions as $region)
                                          <option value="{{ $region->id }}">{{ $region->name }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <input id="filter-member-id" class="form-control form-control-sm" placeholder="Member ID">
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <select id="filter-account-name" class="form-select form-select-sm">
                                          <option value="">All Accounts</option>
                                          @foreach($accounts as $account)
                                          <option value="{{ $account->id }}">{{ $account->name }} - ({{ $account->code }})</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="col-sm-6 col-md-2">
                                    <select id="filter-occupation" class="form-select form-select-sm">
                                          <option value="">All Occupation</option>
                                          @foreach($occupations as $occupation)
                                          <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <!--                              <div class="col-sm-6 col-md-2">
                                                                  <input id="filter-join-date" class="form-control form-control-sm" type="date">
                                                            </div>-->
                              <div class="col-sm-6 col-md-2">
                                    <select id="filter-is-active" class="form-select form-select-sm">
                                          <option value="">All</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                    </select>
                              </div>
                        </div>

                        <div class="mb-3">
                              <button id="btn-filter" class="btn btn-sm btn-primary">Search</button>
                              <button id="btn-reset" class="btn btn-sm btn-secondary">Reset</button>
                              <a href="{{ route('members.bulk-upload') }}" class="btn btn-sm btn-secondary">Bulk Upload</a>
                              <!--<button id="btn-delete-selected" class="btn btn-danger btn-sm" disabled>Delete Selected</button>-->
                        </div>
                        <div class="table-responsive">
                              <table id="members-table" class="table table-bordered table-striped w-100">
                                    <thead class="table-light">
                                          <tr>
                                                <!--<th><input type="checkbox" id="select-all"></th>  checkbox column -->
                                                <th>#</th>
                                                <th>Account Name</th>
                                                <th>Member ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address Line</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Birthdate</th>
                                                <th>Mobile</th>
                                                <th>Email ID</th>
                                                <th>Home Phone</th>
                                                <th>Gender</th>
                                                <th>Occupation</th>
                                                <th>Region</th>
                                                <th>Join Date</th>
                                                <th>Is Active</th>
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

<script>
      $(function () {
            const table = $('#members-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                        url: '{{ route('members.index') }}',
                        data: function (d) {
                              d.region_id = $('#filter-parent-region').val();
                              d.member_id = $('#filter-member-id').val();
                              d.account_name = $('#filter-account-name').val();
                              d.occupation = $('#filter-occupation').val();
//                              d.join_date = $('#filter-join-date').val();
                              d.is_active = $('#filter-is-active').val();
                        }
                  },
                  columns: [
//                        {
//                              data: 'id',
//                              name: 'id',
//                              orderable: false,
//                              searchable: false,
//                              render: function (data, type, row) {
//                                    return `<input type="checkbox" class="row-checkbox" value="${data}">`;
//                              }
//                        },
                        {data: 'id', name: 'id'},
                        {data: 'account_name', name: 'account_name'},
                        {data: 'member_id', name: 'member_id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'address_line1', name: 'address_line1'},
                        {data: 'state', name: 'state'},
                        {data: 'city', name: 'city'},
                        {data: 'birthdate', name: 'birthdate'},
                        {data: 'mobile', name: 'mobile'},
                        {data: 'email', name: 'email'},
                        {data: 'home_phone', name: 'home_phone'},
                        {data: 'gender', name: 'gender'},
                        {data: 'occupation', name: 'occupation'},
                        {data: 'region', name: 'region'},
                        {data: 'join_date', name: 'join_date'},
                        {
                              data: 'is_active',
                              name: 'is_active',
                              render: function (data) {
                                    return data == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
                              }
                        },
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  ]
            });
            $('#btn-filter').click(function () {
                  table.draw();
            });
            $('#btn-reset').click(function () {
                  $('#filter-parent-region, #filter-member-id, #filter-account-name, #filter-occupation, #filter-join-date, #filter-is-active').val('');
                  table.draw();
            });
      });
//      $(function () {
//            // DataTable initialization code as before...
//
//            const table = $('#members-table').DataTable({
//                  // ... your existing DataTable options ...
//            });
//
//            // Select/deselect all checkboxes
//            $('#select-all').on('click', function () {
//                  const checked = $(this).is(':checked');
//                  $('.row-checkbox').prop('checked', checked);
//                  toggleDeleteSelectedBtn();
//            });
//
//            // Toggle "Delete Selected" button
//            $('#members-table tbody').on('change', '.row-checkbox', function () {
//                  // If any checkbox is unchecked, uncheck "select all"
//                  if (!this.checked) {
//                        $('#select-all').prop('checked', false);
//                  }
//                  toggleDeleteSelectedBtn();
//            });
//
//            function toggleDeleteSelectedBtn() {
//                  const selectedCount = $('.row-checkbox:checked').length;
//                  $('#btn-delete-selected').prop('disabled', selectedCount === 0);
//            }
//
//            // Single delete with confirmation
//            $('#members-table tbody').on('click', '.btn-delete', function () {
//                  const memberId = $(this).data('id');
//                  if (confirm('Are you sure you want to delete this member?')) {
//                        deleteMembers([memberId]);
//                  }
//            });
//
//            // Bulk delete button click
//            $('#btn-delete-selected').on('click', function () {
//                  const selectedIds = $('.row-checkbox:checked').map(function () {
//                        return $(this).val();
//                  }).get();
//
//                  if (selectedIds.length === 0) {
//                        alert('Please select at least one member to delete.');
//                        return;
//                  }
//
//                  if (confirm(`Are you sure you want to delete ${selectedIds.length} selected member(s)?`)) {
//                        deleteMembers(selectedIds);
//                  }
//            });
//
//            // AJAX delete function
//            function deleteMembers(ids) {
//                  $.ajax({
//                        url: '{{ route("members.bulkDelete") }}', // create this route in Laravel
//                        type: 'POST',
//                        data: {
//                              _token: '{{ csrf_token() }}',
//                              ids: ids
//                        },
//                        success: function (response) {
//                              alert(response.message || 'Deleted successfully');
//                              table.ajax.reload(null, false); // reload table without resetting pagination
//                              $('#select-all').prop('checked', false);
//                              toggleDeleteSelectedBtn();
//                        },
//                        error: function (xhr) {
//                              alert('An error occurred while deleting members.');
//                        }
//                  });
//            }
//
//            // Your existing filter button handlers...
//      });

</script>
@endsection
