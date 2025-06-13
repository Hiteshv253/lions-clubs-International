@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('states.index') }}">States Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New</li>
      </ol>
</nav>

<div class="row mt-3">
      <div class="col-xl-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">States List</h4>
                        <a href="{{ route('states.create') }}" class="btn btn-primary">Add New States</a>
                  </div>

                  <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="table-responsive">
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
                                    </table>
                              </div>
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
                  order: [[0, 'desc']], // 👈 Sort by first column (id) in descending order
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
