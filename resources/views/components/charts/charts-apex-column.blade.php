@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
@endpush

@push('page-script')
<!-- apexcharts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-column.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Column Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Column Charts</li>
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
                        <h4 class="card-title mb-0">Basic Column Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Column with Data Labels</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_chart_datalabel" data-colors='["--vz-success"]' class="apex-charts" dir="ltr">
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
                        <h4 class="card-title mb-0">Stacked Column Charts</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_stacked" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]'
                             class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Stacked Column 100</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_stacked_chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]'
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
                        <h4 class="card-title mb-0">Grouped Stacked Columns</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="grouped_stacked_columns"
                             data-colors='["--vz-success", "--vz-primary","--vz-secondary", "--vz-danger"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Dumbbell Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="dumbbell_chart" data-colors='["--vz-success", "--vz-primary"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div><!--end row-->

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Column with Markers</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_markers" data-colors='["--vz-success", "--vz-primary"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Column with Rotated Labels</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_rotated_labels" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
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
                        <h4 class="card-title mb-0">Column with Nagetive Values</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_nagetive_values" data-colors='["--vz-success", "--vz-danger", "--vz-warning"]'
                             class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Range Column Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_range" data-colors='["--vz-primary", "--vz-success"]' class="apex-charts"
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
                        <h4 class="card-title mb-0">Dynamic Loaded Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="dynamicloadedchart-wrap" dir="ltr">
                              <div id="chart-year"
                                   data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-body-color", "--vz-info"]'
                                   class="apex-charts"></div>
                              <div id="chart-quarter" class="apex-charts"></div>
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Distributed Columns Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_distributed"
                             data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-info"]'
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
                        <h4 class="card-title mb-0">Column with Group Label</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="column_group_labels" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
