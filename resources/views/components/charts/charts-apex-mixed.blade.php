@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
@endpush

@push('page-script')
<!-- mixed charts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-mixed.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Mixed Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Mixed Charts</li>
                        </ol>
                  </div>

            </div>
      </div>
</div>
<!-- end page title -->

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Line & Column Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_column_chart" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Multiple Y-Axis Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="multi_chart" data-colors='["--vz-primary", "--vz-info", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Line & Area Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_area_chart" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Line, Column & Area Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_area_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                             class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
