@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
@endpush

@push('page-script')
<!-- barcharts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-bar.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Bar Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Bar Charts</li>
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
                        <h4 class="card-title mb-0">Basic Bar Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="bar_chart" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Custom DataLabels Bar</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="custom_datalabels_bar"
                             data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-primary", "--vz-success", "--vz-secondary"]'
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
                        <h4 class="card-title mb-0">Stacked Bar Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="stacked_bar"
                             data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                             class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Stacked Bars 100</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="stacked_bar_100"
                             data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
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
                        <h4 class="card-title mb-0">Bar with Negative Values</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="negative_bars" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Bar with Markers</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="bar_markers" data-colors='["--vz-success", "--vz-primary"]' class="apex-charts" dir="ltr">
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
                        <h4 class="card-title mb-0">Reversed Bar Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="reversed_bars" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Patterned Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="patterned_bars" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]'
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
                        <h4 class="card-title mb-0">Grouped Bar Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="grouped_bar" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts" dir="ltr">
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Bar with Images</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div class="live-preview">
                              <div id="bar_images" class="apex-charts" dir="ltr"></div>
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
