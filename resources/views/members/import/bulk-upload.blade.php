@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bulk Upload</li>
      </ol>
</nav>
<div class="card shadow-sm rounded-4">
      <div class="card-header rounded-top-4">
            <h5 class="mb-0">Bulk Upload Members</h5>
      </div>
      <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('members.bulk-upload') }}"  method="POST" enctype="multipart/form-data" class="row g-3">
                  @csrf

                  <div class="col-md-6 col-lg-12">
                        <label for="file" class="form-label">
                              Upload Excel/CSV File
                              <small class="d-block">
                                    (<a href="../../sample_excel/member_sample.xlsx" target="_blank">Download Sample</a>)
                              </small>
                        </label>

                        <div class="col-md-12" style="color: red;font-size: 14px;">
                               <p class="mb-2"><strong>CSV Format:</strong> Columns must be in the following order (headers optional):</p>
                               <strong> Note: </strong><br>
                              1) Activity :  Start Day (YYYY-MM-DD), End Day(YYYY-MM-DD), Customer Name, Employee name, Frequency, Subject, Per Service Value,Start Time, End Time are mandatory fields<br>
                              2) Please download Sample file, put data according to that format and upload the same to avoid any issue<br>
                              3) Frequency Name should be: <strong> <span style="color: blue;"> daily, weekly, onetime, alternative, weekly_twice, weekly_thrice, fortnightly, monthly, monthly_thrice, bimonthly, quarterly, quarterly_twice, thrice_year keyword only </span></strong><br>
                              4) Please clear all formate from excel sheet.

                        </div>
                        <br>
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
           

            <div class="row" style="display: none;">
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

@endsection
