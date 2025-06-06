@extends('layouts.master')

@push('vendor-style')
<!-- gridjs css -->
<link rel="stylesheet" href="{{ asset('') }}assets/libs/gridjs/theme/mermaid.min.css">
@endpush

@push('vendor-script')
<!-- prismjs plugin -->
<script src="{{ asset('') }}assets/libs/prismjs/prism.js"></script>

<!-- gridjs js -->
<script src="{{ asset('') }}assets/libs/gridjs/gridjs.umd.js"></script>
@endpush

@push('page-script')
<!-- gridjs init -->
<script src="{{ asset('') }}assets/js/pages/gridjs.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Grid Js</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                              <li class="breadcrumb-item active">Grid Js</li>
                        </ol>
                  </div>

            </div>
      </div>
</div>
<!-- end page title -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Base Example</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-gridjs"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Card Table</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-card" class="table-card"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Pagination</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-pagination"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Search</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-search"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Sorting</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-sorting"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Loading State</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-loading-state"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Fixed Header</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-fixed-header"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Hidden Columns</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="table-hidden-column"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
