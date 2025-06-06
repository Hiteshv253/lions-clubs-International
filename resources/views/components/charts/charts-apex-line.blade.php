@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="https://img.lionsinternational.com/lionsclubs/apexchart-js/stock-prices.js"></script>
@endpush

@push('page-script')
<!-- linecharts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-line.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Line Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Line Charts</li>
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
                        <h4 class="card-title mb-0">Basic Line Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_basic" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Zoomable Timeseries</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_zoomable" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
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
                        <h4 class="card-title mb-0">Line with Data Labels</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_datalabel" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Dashed Line</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_dashed" data-colors='["--vz-primary", "--vz-danger", "--vz-success"]'
                             class="apex-charts" dir="ltr"></div>
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
                        <h4 class="card-title mb-0">Line with Annotations</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_annotations" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr">
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Brush Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div>
                              <div id="brushchart_line2" data-colors='["--vz-danger"]' class="apex-charts" dir="ltr"></div>
                              <div id="brushchart_line" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
                        </div>
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
                        <h4 class="card-title mb-0">Stepline Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_stepline" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Gradient Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_gradient" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
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
                        <h4 class="card-title mb-0">Missing Data/ Null Value Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_missing_data" data-colors='["--vz-primary", "--vz-danger", "--vz-success"]'
                             class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Realtimes Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="line_chart_realtime" data-colors='["--vz-success"]' class="apex-charts" dir="ltr">
                        </div>
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
                        <h4 class="card-title mb-0">Syncing Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div>
                              <div id="chart-syncing-line" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr">
                              </div>
                              <div id="chart-syncing-line2" data-colors='["--vz-warning"]' class="apex-charts" dir="ltr">
                              </div>
                              <div id="chart-syncing-area" data-colors='["--vz-success"]' class="apex-charts" dir="ltr">
                              </div>
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
@endsection
