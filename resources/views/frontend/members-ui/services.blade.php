@extends('frontend.layouts.master')

@section('content')

<!-- Members List -->
<div class="container mt-4" id="membersContainer">
    @include('frontend.members-ui.partials.members', ['members' => $members])
</div>


@endsection