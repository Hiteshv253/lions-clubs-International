@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<!-- for Category x-axis chart -->
<script src="https://img.lionsinternational.com/lionsclubs/apexchart-js/dayjs.min.js"></script>
@endpush

@push('page-script')
<!-- candlestick charts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-candlestick.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Candlestick Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Candlestick Charts</li>
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
                        <h4 class="card-title mb-0">Basic Candlestick Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="basic_candlestick" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Candlestick Synced with Brush Chart (Combo)</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div>
                              <div id="combo_candlestick" data-colors='["--vz-info", "--vz-danger"]' class="apex-charts"
                                   dir="ltr"></div>
                              <div id="combo_candlestick_chart" data-colors='["--vz-warning", "--vz-danger"]' class="apex-charts"
                                   dir="ltr"></div>
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
                        <h4 class="card-title mb-0">Category X-Axis</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="category_candlestick" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Candlestick with line</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="candlestick_with_line"
                             data-colors='["--vz-success", "--vz-danger", "--vz-info", "--vz-warning"]' class="apex-charts"
                             dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
