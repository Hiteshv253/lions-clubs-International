@extends('frontend.layouts.master')

@section('content')
<div class="container text-center py-5">
    <div class="card shadow-lg p-4 border-success border-2 rounded-4 position-relative">
        <h1 class="text-success mb-3"><i class="fas fa-check-circle me-2"></i>Thank You!</h1>
        <p class="fs-5">Your inquiry has been submitted successfully. We'll get back to you shortly.</p>
        <p class="text-muted small">Redirecting you to the homepage...</p>

        <!-- Loader -->
        <div class="d-flex justify-content-center mt-4">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function () {
        window.location.href = '{{ url('/') }}';
    }, 3000);
</script>
@endsection
