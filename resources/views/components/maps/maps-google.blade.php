@extends('layouts.master')

@push('vendor-script')
<!-- prismjs plugin -->
<script src="{{ asset('') }}assets/libs/prismjs/prism.js"></script>

<!-- google maps api -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

<!-- gmaps plugins -->
<script src="{{ asset('') }}assets/libs/gmaps/gmaps.min.js"></script>
@endpush

@push('page-script')
<!-- gmaps init -->
<script src="{{ asset('') }}assets/js/pages/gmaps.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Google Maps</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Maps</a></li>
                              <li class="breadcrumb-item active">Google Maps</li>
                        </ol>
                  </div>

            </div>
      </div>
</div>
<!-- end page title -->

<div class="row">
      <div class="col-lg-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Markers</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="gmaps-markers" class="gmaps"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-lg-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Overlays</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="gmaps-overlay" class="gmaps"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<div class="row">
      <div class="col-lg-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Street View Panoramas</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="panorama" class="gmaps-panaroma"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->

      <div class="col-lg-6">
            <div class="card">
                  <div class="card-header">
                        <h4 class="card-title mb-0">Map Types</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <div id="gmaps-types" class="gmaps"></div>
                  </div><!-- end card-body -->
            </div><!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
