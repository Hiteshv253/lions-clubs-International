@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clubs</li>
      </ol>
</nav> 

<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Club List</h5>
            </div>
            <div class="card-header">

                  <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                              <select id="filterRegion" class="form-select">
                                    <option value="">Select Region</option>
                                    <option value="North">North</option>
                                    <option value="South">South</option>
                              </select>
                        </div>

                        <div class="col-md-2">
                              <select id="filterDistrict" class="form-select">
                                    <option value="">Select District</option>
                                    <option value="District 1">District 1</option>
                                    <option value="District 2">District 2</option>
                              </select>
                        </div>

                        <div class="col-md-2">
                              <select id="filterType" class="form-select">
                                    <option value="">Select Type</option>
                                    <option value="Type A">Type A</option>
                                    <option value="Type B">Type B</option>
                              </select>
                        </div>

                        <div class="col-md-6 d-flex gap-2">
                              <button id="btnSearch" class="btn btn-primary">Search</button>
                              <button id="btnReset" class="btn btn-secondary">Reset</button>
                              <a href="{{ route('clubs.create') }}" class="btn btn-success">Add New Club</a>
                              <a href="{{ route('clubs.exportPdf') }}" class="btn btn-danger">Export to PDF</a>
                        </div>
                  </div>



                  <table id="clubs-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                              <tr>
                                    <th>#</th>
                                    <th>Account Name</th>
                                    <th>Type</th>
                                    <th>District</th>
                                    <th>Region</th>
                                    <th>Lion ID</th>
                                    <th>Active Members</th>
                                    <th>Website</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>
                  </table>
            </div>
      </div>
</div>



<script>
      $(document).ready(function () {
            var table = $('#clubs-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                        url: "{{ route('clubs.index') }}",
                        data: function (d) {
                              d.region_zone = $('#filterRegion').val();
                              d.district = $('#filterDistrict').val();
                              d.type = $('#filterType').val();
                        }
                  },
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'account_name', name: 'account_name'},
                        {data: 'type', name: 'type'},
                        {data: 'district', name: 'district'},
                        {data: 'region_zone', name: 'region_zone'},
                        {data: 'lion_id', name: 'lion_id'},
                        {data: 'active_member_count', name: 'active_member_count'},
                        {data: 'website', name: 'website'},
                        {
                              data: 'actions',
                              name: 'actions',
                              orderable: false,
                              searchable: false
                        }
                  ]
            });

            // Search button click - reload table with filters
            $('#btnSearch').click(function () {
                  table.ajax.reload();
            });

            // Reset button click - clear filters and reload table
            $('#btnReset').click(function () {
                  $('#filterRegion').val('');
                  $('#filterDistrict').val('');
                  $('#filterType').val('');
                  table.ajax.reload();
            });
      });
</script>


@endsection
