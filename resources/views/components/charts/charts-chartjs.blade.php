@extends('layouts.master')

@push('vendor-script')
<!-- Chart JS -->
<script src="{{ asset('') }}assets/libs/chart.js/chart.umd.js"></script>
@endpush

@push('page-script')
<!-- chartjs init -->
<script src="{{ asset('') }}assets/js/pages/chartjs.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Chartjs</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                              <li class="breadcrumb-item active">Chartjs</li>
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
                        <h4 class="card-title mb-0">Line Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="lineChart" class="chartjs-chart"
                                data-colors='["--vz-primary-rgb, 0.2", "--vz-primary", "--vz-success-rgb, 0.2", "--vz-success"]'></canvas>
                  </div>
            </div>
      </div> <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Bar Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="bar" class="chartjs-chart"
                                data-colors='["--vz-primary-rgb, 0.8", "--vz-primary-rgb, 0.9"]'></canvas>

                  </div>
            </div>
      </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Pie Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="pieChart" class="chartjs-chart" data-colors='["--vz-success", "--vz-light"]'></canvas>
                  </div>
            </div>
      </div> <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Donut Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="doughnut" class="chartjs-chart" data-colors='["--vz-primary", "--vz-light"]'></canvas>
                  </div>
            </div>
      </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Polar Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="polarArea" class="chartjs-chart"
                                data-colors='["--vz-danger", "--vz-success", "--vz-warning", "--vz-primary"]'> </canvas>
                  </div>
            </div>
      </div> <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Radar Chart</h4>
                  </div>
                  <div class="card-body">
                        <canvas id="radar" class="chartjs-chart"
                                data-colors='["--vz-success-rgb, 0.2", "--vz-success", "--vz-primary-rgb, 0.2", "--vz-primary"]'></canvas>
                  </div>
            </div>
      </div> <!-- end col -->
</div> <!-- end row -->
@endsection
