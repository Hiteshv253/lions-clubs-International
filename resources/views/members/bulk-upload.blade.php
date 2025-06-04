@extends('layouts.master')

@section('content')
<div class="container py-4">
      <div class="card shadow-sm rounded-4">
            <div class="card-header bg-primary text-white rounded-top-4">
                  <h5 class="mb-0">Bulk Upload Members</h5>
            </div>

            <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                  <form action="{{ route('members.bulk-upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                              <label for="file" class="form-label">Upload Excel/CSV File</label>
                              <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required accept=".xlsx,.xls,.csv">
                              @error('file')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                  </form>

                  <hr>
                  <p><strong>CSV Format:</strong> Make sure your CSV columns are in this order (headers optional):</p>
                  <ul>
                        <li>account_name</li>
                        <li>parent_region</li>
                        <li>parent_zone</li>
                        <li>member_id</li>
                        <li>first_name</li>
                        <li>last_name</li>
                        <li>address_line1</li>
                        <li>address_line2</li>
                        <li>address_line3</li>
                        <li>city</li>
                        <li>state</li>
                        <li>zip</li>
                        <li>birthdate (YYYY-MM-DD)</li>
                        <li>email</li>
                        <li>mobile</li>
                        <li>home_phone</li>
                        <li>gender</li>
                        <li>occupation</li>
                        <li>join_date (YYYY-MM-DD)</li>
                  </ul>
            </div>
      </div>
</div>
@endsection
