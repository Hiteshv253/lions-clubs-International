@extends('layouts.master')

@push('vendor-script')
<!-- apexcharts -->
<script src="{{ asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<!-- for Category x-axis chart -->
<script src="https://img.lionsinternational.com/lionsclubs/apexchart-js/dayjs.min.js"></script>
@endpush

@push('page-script')
<!-- range-area charts init -->
<script src="{{ asset('') }}assets/js/pages/apexcharts-range-area.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Range Area Charts</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Apexcharts</a></li>
                              <li class="breadcrumb-item active">Range Area Charts</li>
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
                        <h4 class="card-title mb-0">Basic Range Area Chart</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="basic_range_area" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-xl-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Combo</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div>
                              <div id="combo_range_area" data-colors='["--vz-info", "--vz-danger"]' class="apex-charts"
                                   dir="ltr"></div>
                        </div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
