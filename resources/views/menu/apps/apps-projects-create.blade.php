@extends('layouts.master')

@push('vendor-style')
<!-- Plugins css -->
<link href="{{ asset('') }}assets/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
@endpush
@push('vendor-script')
<!-- ckeditor -->
<script src="{{ asset('') }}assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<!-- dropzone js -->
<script src="{{ asset('') }}assets/libs/dropzone/dropzone-min.js"></script>
@endpush
@push('page-script')
<!-- project-create init -->
<script src="{{ asset('') }}assets/js/pages/project-create.init.js"></script>
@endpush

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Create Project</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                              <li class="breadcrumb-item active">Create Project</li>
                        </ol>
                  </div>

            </div>
      </div>
</div>
<!-- end page title -->

<div class="row">
      <div class="col-lg-8">
            <div class="card">
                  <div class="card-body">
                        <div class="mb-3">
                              <label class="form-label" for="project-title-input">Project Title</label>
                              <input type="text" class="form-control" id="project-title-input"
                                     placeholder="Enter project title">
                        </div>

                        <div class="mb-3">
                              <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                              <input class="form-control" id="project-thumbnail-img" type="file"
                                     accept="image/png, image/gif, image/jpeg">
                        </div>

                        <div class="mb-3">
                              <label class="form-label">Project Description</label>
                              <div id="ckeditor-classic">
                                    <p>It will be as simple as occidental in fact, it will be Occidental. To an English person, it
                                          will seem like simplified English, as a skeptical Cambridge friend of mine told me what
                                          Occidental is. The European languages are members of the same family. Their separate
                                          existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
                                    <ul>
                                          <li>Product Design, Figma (Software), Prototype</li>
                                          <li>Four Dashboards : Ecommerce, Analytics, Project etc.</li>
                                          <li>Create calendar, chat and email app pages.</li>
                                          <li>Add authentication pages</li>
                                    </ul>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col-lg-4">
                                    <div class="mb-3 mb-lg-0">
                                          <label for="choices-priority-input" class="form-label">Priority</label>
                                          <select class="form-select" data-choices data-choices-search-false
                                                  id="choices-priority-input">
                                                <option value="High" selected>High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                    <div class="mb-3 mb-lg-0">
                                          <label for="choices-status-input" class="form-label">Status</label>
                                          <select class="form-select" data-choices data-choices-search-false
                                                  id="choices-status-input">
                                                <option value="Inprogress" selected>Inprogress</option>
                                                <option value="Completed">Completed</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                    <div>
                                          <label for="datepicker-deadline-input" class="form-label">Deadline</label>
                                          <input type="text" class="form-control" id="datepicker-deadline-input"
                                                 placeholder="Enter due date" data-provider="flatpickr">
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                  <div class="card-header">
                        <h5 class="card-title mb-0">Attached files</h5>
                  </div>
                  <div class="card-body">
                        <div>
                              <p class="text-muted">Add Attached files here.</p>

                              <div class="dropzone">
                                    <div class="fallback">
                                          <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                          <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                          </div>

                                          <h5>Drop files here or click to upload.</h5>
                                    </div>
                              </div>

                              <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                          <!-- This is used as the file preview template -->
                                          <div class="border rounded">
                                                <div class="d-flex p-2">
                                                      <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded">
                                                                  <img src="#" alt="Project-Image" data-dz-thumbnail
                                                                       class="img-fluid rounded d-block" />
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
                  </div>
            </div>
            <!-- end card -->
            <div class="text-end mb-4">
                  <button type="submit" class="btn btn-danger w-sm">Delete</button>
                  <button type="submit" class="btn btn-secondary w-sm">Draft</button>
                  <button type="submit" class="btn btn-success w-sm">Create</button>
            </div>
      </div>
      <!-- end col -->
      <div class="col-lg-4">
            <div class="card">
                  <div class="card-header">
                        <h5 class="card-title mb-0">Privacy</h5>
                  </div>
                  <div class="card-body">
                        <div>
                              <label for="choices-privacy-status-input" class="form-label">Status</label>
                              <select class="form-select" data-choices data-choices-search-false
                                      id="choices-privacy-status-input">
                                    <option value="Private" selected>Private</option>
                                    <option value="Team">Team</option>
                                    <option value="Public">Public</option>
                              </select>
                        </div>
                  </div>
                  <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                  <div class="card-header">
                        <h5 class="card-title mb-0">Tags</h5>
                  </div>
                  <div class="card-body">
                        <div class="mb-3">
                              <label for="choices-categories-input" class="form-label">Categories</label>
                              <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                    <option value="Designing" selected>Designing</option>
                                    <option value="Development">Development</option>
                              </select>
                        </div>

                        <div>
                              <label for="choices-text-input" class="form-label">Skills</label>
                              <input class="form-control" id="choices-text-input" data-choices
                                     data-choices-limit="Required Limit" placeholder="Enter Skills" type="text"
                                     value="UI/UX, Figma, HTML, CSS, Javascript, C#, Nodejs" />
                        </div>
                  </div>
                  <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                  <div class="card-header">
                        <h5 class="card-title mb-0">Members</h5>
                  </div>
                  <div class="card-body">
                        <div class="mb-3">
                              <label for="choices-lead-input" class="form-label">Team Lead</label>
                              <select class="form-select" data-choices data-choices-search-false id="choices-lead-input">
                                    <option value="Brent Gonzalez" selected>Brent Gonzalez</option>
                                    <option value="Darline Williams">Darline Williams</option>
                                    <option value="Sylvia Wright">Sylvia Wright</option>
                                    <option value="Ellen Smith">Ellen Smith</option>
                                    <option value="Jeffrey Salazar">Jeffrey Salazar</option>
                                    <option value="Mark Williams">Mark Williams</option>
                              </select>
                        </div>

                        <div>
                              <label class="form-label">Team Members</label>
                              <div class="avatar-group">
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                          <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                          </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                          <div class="avatar-xs">
                                                <div class="avatar-title rounded-circle bg-secondary">
                                                      S
                                                </div>
                                          </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                          <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                          </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                          <div class="avatar-xs" data-bs-toggle="modal" data-bs-target="#inviteMembersModal">
                                                <div
                                                      class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                      +
                                                </div>
                                          </div>
                                    </a>
                              </div>
                        </div>
                  </div>
                  <!-- end card body -->
            </div>
            <!-- end card -->
      </div>
      <!-- end col -->
</div>
<!-- end row -->

<!-- Modal -->
<div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
     aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header p-3 ps-4 bg-success-subtle">
                        <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-4">
                        <div class="search-box mb-3">
                              <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                              <i class="ri-search-line search-icon"></i>
                        </div>

                        <div class="mb-4 d-flex align-items-center">
                              <div class="me-2">
                                    <h5 class="mb-0 fs-13">Members :</h5>
                              </div>
                              <div class="avatar-group justify-content-center">
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                          <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                          </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                          <div class="avatar-xs">
                                                <div class="avatar-title rounded-circle bg-secondary">
                                                      S
                                                </div>
                                          </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                       data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                          <div class="avatar-xs">
                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                     class="rounded-circle img-fluid">
                                          </div>
                                    </a>
                              </div>
                        </div>
                        <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                              <div class="vstack gap-3">
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a>
                                                </h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                      HB
                                                </div>
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a>
                                                </h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a>
                                                </h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer
                                                            Carter</a></h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                      AC
                                                </div>
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a>
                                                </h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                                    <div class="d-flex align-items-center">
                                          <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-7.jpg" alt=""
                                                     class="img-fluid rounded-circle">
                                          </div>
                                          <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a>
                                                </h5>
                                          </div>
                                          <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-light btn-sm">Add</button>
                                          </div>
                                    </div>
                                    <!-- end member item -->
                              </div>
                              <!-- end list -->
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success w-xs">Invite</button>
                  </div>
            </div>
            <!-- end modal-content -->
      </div>
      <!-- modal-dialog -->
</div>
<!-- end modal -->
@endsection
