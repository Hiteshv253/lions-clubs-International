@extends('frontend.layouts.master')


@section('content')
<div class="container text-center py-5">
      <h1 class="text-success">Thank You!</h1>
      <p>Your inquiry has been submitted successfully.</p>
</div>


<script>
      setTimeout(function () {
            window.location.href = '{{ url('http://127.0.0.1:9090/') }}';
      }, 3000); // 2000 milliseconds = 2 seconds
</script>
@endsection
