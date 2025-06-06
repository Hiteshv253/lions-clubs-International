@extends('layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
      <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">New Job</h4>

                  <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                              <li class="breadcrumb-item active">New Job</li>
                        </ol>
                  </div>

            </div>
      </div>
</div>
<!-- end page title -->

<div class="row">
      <div class="col-lg-12">
            <div class="card">
                  <form action="#">
                        <div class="card-header">
                              <h5 class="card-title mb-0">Create Job</h5>
                        </div>
                        <div class="card-body">
                              <div class="row g-4">
                                    <div class="col-lg-6">
                                          <div>
                                                <label for="job-title-Input" class="form-label">Job Title <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="job-title-Input"
                                                       placeholder="Enter job title" required />
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <div>
                                                <label for="job-position-Input" class="form-label">Job Position <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="job-position-Input"
                                                       placeholder="Enter job position" required />
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <div>
                                                <label for="job-category-Input" class="form-label">Job Category <span
                                                            class="text-danger">*</span></label>
                                                <select class="form-control" data-choices name="job-category-Input" required>
                                                      <option value="">Select Category</option>
                                                      <option value="Accounting & Finance">Accounting & Finance</option>
                                                      <option value="Purchasing Manager">Purchasing Manager</option>
                                                      <option value="Education & training">Education & training</option>
                                                      <option value="Marketing & Advertising">Marketing & Advertising</option>
                                                      <option value="It / Software Jobs">It / Software Jobs</option>
                                                      <option value="Digital Marketing">Digital Marketing</option>
                                                      <option value="Administrative Officer">Administrative Officer</option>
                                                      <option value="Government Jobs">Government Jobs</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <div>
                                                <label for="job-type-Input" class="form-label">Job Type <span
                                                            class="text-danger">*</span></label>
                                                <select class="form-control" data-choices name="job-type-Input" required>
                                                      <option value="">Select job type</option>
                                                      <option value="Full Time">Full Time</option>
                                                      <option value="Part Time">Part Time</option>
                                                      <option value="Freelance">Freelance</option>
                                                      <option value="Internship">Internship</option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-lg-12">
                                          <div>
                                                <label for="description-field" class="form-label">Description <span
                                                            class="text-danger">*</span></label>
                                                <textarea class="form-control" id="description-field" rows="3" placeholder="Enter description" required></textarea>
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div>
                                                <label for="vancancy-Input" class="form-label">No. of Vacancy <span
                                                            class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="vancancy-Input"
                                                       placeholder="No. of vacancy" required />
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div>
                                                <label for="experience-Input" class="form-label">Experience <span
                                                            class="text-danger">*</span></label>
                                                <select class="form-control" data-choices name="experience-Input">
                                                      <option value="">Select Experience</option>
                                                      <option value="0 Year">0 Year</option>
                                                      <option value="2 Years">2 Years</option>
                                                      <option value="3 Years">3 Years</option>
                                                      <option value="4 Years">4 Years</option>
                                                      <option value="5 Years">5 Years</option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-lg-6">
                                          <div>
                                                <label for="last-apply-date-Input" class="form-label">Last Date of Apply <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="last-apply-date-Input"
                                                       data-provider="flatpickr" data-date-format="d M, Y" placeholder="Select date"
                                                       required />
                                          </div>
                                    </div>

                                    <div class="col-lg-6">
                                          <div>
                                                <label for="close-date-Input" class="form-label">Close Date <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="close-date-Input"
                                                       data-provider="flatpickr" data-date-format="d M, Y" placeholder="Select date"
                                                       required />
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div>
                                                <label for="start-salary-Input" class="form-label">Start Salary</label>
                                                <input type="number" class="form-control" id="start-salary-Input"
                                                       placeholder="Enter start salary" required />
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div>
                                                <label for="last-salary-Input" class="form-label">Last Salary</label>
                                                <input type="number" class="form-control" id="last-salary-Input"
                                                       placeholder="Enter end salary" required />
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div>
                                                <label for="country-Input" class="form-label">Country <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="country-Input"
                                                       placeholder="Enter country" required />
                                          </div>
                                    </div>

                                    <div class="col-md-6">
                                          <div>
                                                <label for="city-Input" class="form-label">State <span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="city-Input" placeholder="Enter city"
                                                       required />
                                          </div>
                                    </div>

                                    <div class="col-lg-12">
                                          <div>
                                                <label for="website-field" class="form-label">Tags</label>
                                                <input class="form-control" id="choices-text-unique-values" data-choices
                                                       data-choices-text-unique-true type="text" value="Design, Remote" required />
                                          </div>
                                    </div>

                                    <div class="col-lg-12">
                                          <div class="hstack justify-content-end gap-2">
                                                <button type="button" class="btn btn-ghost-danger"><i
                                                            class="ri-close-line align-bottom"></i> Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Job</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection
