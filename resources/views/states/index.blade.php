@extends('layouts.master')
@section('content')


<!--<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
  <ol class="breadcrumb mb-0 p-3">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">States</li>
  </ol>
</nav>-->
<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">States Master</h5>
            </div>
            <div class="card-header">
                  <div class="  my-4">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                              <h2 class="mb-3 mb-md-0">States List</h2>
                              <a href="{{ route('states.create') }}" class="btn btn-primary">Add State</a>
                        </div>

                        <div class="table-responsive">
                              <table class="table table-bordered table-hover" id="states-table">
                                    <thead class="table-light">
                                          <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          {{-- Data will be filled by DataTables --}}
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>



<script>
      $(function () {
            $('#states-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: '{{ route("states.index") }}',
                  columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
            });
      });
</script>
@endsection
