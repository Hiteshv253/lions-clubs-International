@extends('layouts.master')
@section('content')
<div class="py-3">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-light px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bulk Upload</li>
        </ol>
    </nav>

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

            <form action="{{ route('members.bulk-upload') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-8 col-lg-6">
                    <label for="file" class="form-label">
                        Upload Excel/CSV File
                        <small class="d-block">
                            (<a href="../../sample_excel/member_sample.xlsx" target="_blank">Download Sample</a>)
                        </small>
                    </label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required accept=".xlsx,.xls,.csv">
                    @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-2">Upload</button>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

            <hr class="my-4">
            <p class="mb-2"><strong>CSV Format:</strong> Columns must be in the following order (headers optional):</p>

            <div class="row">
                <ul class="col-md-6 mb-0 list-unstyled">
                    <li>Account Name</li>
                    <li>Parent Region</li>
                    <li>Parent Zone</li>
                    <li>Member ID</li>
                    <li>First Name</li>
                    <li>Last Name</li>
                    <li>Address Line1</li>
                    <li>Address Line2</li>
                    <li>Address Line3</li>
                    <li>City</li>
                </ul>
                <ul class="col-md-6 mb-0 list-unstyled">
                    <li>State</li>
                    <li>Zip</li>
                    <li>Birthdate (YYYY-MM-DD)</li>
                    <li>Email</li>
                    <li>Mobile</li>
                    <li>Home Phone</li>
                    <li>Gender</li>
                    <li>Occupation</li>
                    <li>Join Date (YYYY-MM-DD)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
