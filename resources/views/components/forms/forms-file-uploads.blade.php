@extends('layouts.master')

@push('vendor-style')
<!-- dropzone css -->
<link rel="stylesheet" href="{{ asset('') }}assets/libs/dropzone/dropzone.css" type="text/css" />

<!-- Filepond css -->
<link rel="stylesheet" href="{{ asset('') }}assets/libs/filepond/filepond.min.css" type="text/css" />
<link rel="stylesheet"
      href="{{ asset('') }}assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
@endpush

@push('vendor-script')
<!-- dropzone min -->
<script src="{{ asset('') }}assets/libs/dropzone/dropzone-min.js"></script>
<!-- filepond js -->
<script src="{{ asset('') }}assets/libs/filepond/filepond.min.js"></script>
<script src="{{ asset('') }}assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js">
</script>
<script
      src="{{ asset('') }}assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js">
</script>
<script
      src="{{ asset('') }}assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js">
</script>
<script src="{{ asset('') }}assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
@endpush

@push('page-script')
<script src="{{ asset('') }}assets/js/pages/form-file-upload.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">File Upload</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                              <li class="breadcrumb-item active">File Upload</li>
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
                        <h4 class="card-title mb-0">Dropzone</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                        <p class="text-muted">DropzoneJS is an open source library that provides dragânâdrop file uploads
                              with image previews.</p>

                        <div class="dropzone">
                              <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                              </div>
                              <div class="dz-message needsclick">
                                    <div class="mb-3">
                                          <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                              </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                              <li class="mt-2" id="dropzone-preview-list">
                                    <!-- This is used as the file preview template -->
                                    <div class="border rounded">
                                          <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                      <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                                 src="assets/images/new-document.png" alt="Dropzone-Image" />
                                                      </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                      <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                      </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                      <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                          </div>
                                    </div>
                              </li>
                        </ul>
                        <!-- end dropzon-preview -->
                  </div>
                  <!-- end card body -->
            </div>
            <!-- end card -->
      </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row mt-2">
      <div class="col-lg-12">
            <div class="justify-content-between d-flex align-items-center mb-3">
                  <h5 class="mb-0 pb-1 text-decoration-underline">Filepond</h5>
            </div>

            <div class="row">
                  <div class="col-lg-6">
                        <div class="card">
                              <div class="card-header">
                                    <h4 class="card-title mb-0">Multiple File Upload</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                    <p class="text-muted">FilePond is a JavaScript library that optimizes multiple images for faster
                                          uploads and offers a great, accessible, silky smooth user experience.</p>
                                    <input type="file" class="filepond filepond-input-multiple" multiple name="filepond"
                                           data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                              </div>
                              <!-- end card body -->
                        </div>
                        <!-- end card -->
                  </div> <!-- end col -->

                  <div class="col-lg-6">
                        <div class="card">
                              <div class="card-header">
                                    <h4 class="card-title mb-0">Profile Picture Selection</h4>
                              </div><!-- end card header -->

                              <div class="card-body">
                                    <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file upload
                                          variation.</p>
                                    <div class="avatar-xl mx-auto">
                                          <input type="file" class="filepond filepond-input-circle" name="filepond"
                                                 accept="image/png, image/jpeg, image/gif" />
                                    </div>

                              </div>
                              <!-- end card body -->
                        </div>
                        <!-- end card -->
                  </div> <!-- end col -->
            </div>
            <!-- end row -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->
@endsection
