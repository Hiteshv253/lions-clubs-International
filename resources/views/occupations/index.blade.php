@extends('layouts.master')

@section('content')
<div class="mt-1">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Occupations List</h5>
            </div>
            <div class="card-header">
                  <!-- Flash Message -->
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <a href="{{ route('occupations.create') }}" class="btn btn-primary mb-3">Add New Occupations</a>
                  <button id="delete-selected" class="btn btn-danger mb-3">Delete Selected</button>

                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  <table id="occupations-table" class="table table-bordered">
                        <thead>
                              <tr>
                                    <th><input type="checkbox" id="select-all"></th>

                                    <th>ID</th>
                                    <th>Name Name</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>
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
