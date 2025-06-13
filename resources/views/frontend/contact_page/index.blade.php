@extends('frontend.layouts.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
            <!--            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                              <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">Pages</a></li>
                              <li class="breadcrumb-item active text-primary">Contact</li>
                        </ol>-->
      </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
      <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                  <h4 class="text-primary">Contact Us</h4>
                  <h1 class="display-4 mb-4">Send Your Message</h1>
            </div>
            <div class="row g-5">
                  <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="contact-img d-flex justify-content-center" >
                              <div class="contact-img-inner">
                                    <img src="{{ asset('frontend-assets') }}/img/contact-img.png" class="img-fluid w-100"  alt="Image">
                              </div>
                        </div>
                  </div>
                  <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div>
                              <!--<h4 class="text-primary">Send Your Message</h4>-->
                              <!--<p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a class="text-primary fw-bold" href="https://htmlcodex.com/contact-form">Download Now</a>.</p>-->
                              <form id="inquiryForm">
                                    @csrf
                                    <div class="row g-3">
                                          <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                      <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                                      <label for="name">Name</label>
                                                </div>
                                          </div>
                                          <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                      <input type="email" class="form-control border-0" id="email" name="email" placeholder="Your Email">
                                                      <label for="email">Email ID</label>
                                                </div>
                                          </div>
                                          <div class="col-lg-12 col-xl-12">
                                                <div class="form-floating">
                                                      <input type="phone" class="form-control border-0" id="phone" name="phone" placeholder="Phone">
                                                      <label for="phone">Contact Number</label>
                                                </div>
                                          </div>
                                          <div class="col-12">
                                                <div class="form-floating">
                                                      <textarea class="form-control border-0" placeholder="Leave a message here" name="message" id="message" style="height: 120px"></textarea>
                                                      <label for="message">Message</label>
                                                </div>

                                          </div>
                                          <div class="col-12">
                                                <button  type="submit" class="btn btn-primary w-100 py-3">Send Message</button>
                                          </div>
                                    </div>
                              </form>
                        </div>
                  </div>
                  <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="rounded">
                              <iframe class="rounded w-100"
                                      style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                                      loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                  </div>
                  <div class="col-12">
                        <div>
                              <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fas fa-map-marker-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Lions Office Address</h4>
                                                      <p class="mb-0">123 Street New York.USA</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fas fa-envelope fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Mail Us</h4>
                                                      <p class="mb-0">info@example.com</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fa fa-phone-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Telephone</h4>
                                                      <p class="mb-0">(+012) 3456 7890</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fab fa-firefox-browser fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Yoursite@ex.com</h4>
                                                      <p class="mb-0">(+012) 3456 7890</p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-12">
                        <div>
                              <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fas fa-map-marker-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>International Headquarters</h4>
                                                      <p class="mb-0">123 Street New York.USA</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fas fa-envelope fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Mail Us</h4>
                                                      <p class="mb-0">info@example.com</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fa fa-phone-alt fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Telephone</h4>
                                                      <p class="mb-0">(+012) 3456 7890</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                                          <div class="contact-add-item">
                                                <div class="contact-icon text-primary mb-4">
                                                      <i class="fab fa-firefox-browser fa-2x"></i>
                                                </div>
                                                <div>
                                                      <h4>Yoursite@ex.com</h4>
                                                      <p class="mb-0">(+012) 3456 7890</p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

            </div>
      </div>
</div>
<!-- Contact End -->

<script>
      $(document).ready(function () {
            $('#inquiryForm').on('submit', function (e) {
                  e.preventDefault();

                  const $form = $(this);
                  const $button = $form.find('button[type="submit"]');
                  const originalText = $button.text();

                  $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> Sending...');

                  const formData = {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        message: $('#message').val(),
                        _token: '{{ csrf_token() }}'
                  };

                  if (!formData.name || !formData.email || !formData.message) {
                        alert("Name, Email, and Message are required.");
                        $button.prop('disabled', false).text(originalText);
                        return;
                  }

                  $.ajax({
                        url: '{{ route("inquiry.contact") }}',
                        type: 'POST',
                        data: formData,
                        success: function () {
                              window.location.href = '{{ route("thank.you") }}';
                        },
                        error: function (xhr) {
                              $button.prop('disabled', false).text(originalText);

                              if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    let msg = Object.values(errors).map(v => v[0]).join('\n');
                                    alert(msg);
                              } else {
                                    alert('Something went wrong. Please try again.');
                              }
                        }
                  });
            });
      });

</script>



@endsection
