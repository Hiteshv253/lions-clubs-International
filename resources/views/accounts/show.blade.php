@extends('layouts.master')

@section('content')

<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom" style="z-index: 1030;">
    <ol class="breadcrumb mb-0 p-3">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a></li>
        <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
</nav>

<div class="mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Account Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $account->name }}</dd>

                        <dt class="col-sm-4">Code</dt>
                        <dd class="col-sm-8">{{ $account->code }}</dd>

                        <dt class="col-sm-4">Type</dt>
                        <dd class="col-sm-8">{{ $account->type }}</dd>

                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            @if($account->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-4">Created At</dt>
                        <dd class="col-sm-8">{{ $account->created_at->format('d M Y, h:i A') }}</dd>

                        <dt class="col-sm-4">Updated At</dt>
                        <dd class="col-sm-8">{{ $account->updated_at->format('d M Y, h:i A') }}</dd>
                    </dl>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('accounts.edit', $account) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('accounts.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
