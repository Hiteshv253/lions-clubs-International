@extends('layouts.master')
@section('content')

<nav aria-label="breadcrumb" class="sticky-top bg-white border-bottom shadow-sm z-1">
      <ol class="breadcrumb mb-0 p-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
</nav>

<div class="mt-4">
      <div class="card shadow-sm">
            <div class="card-header">
                  <h5 class="mb-0">Create Account</h5>
            </div>
            <div class="card-body">
                  <form action="{{ route('accounts.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                              {{-- Name --}}
                              <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $account->name ?? '') }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              {{-- Code --}}
                              <div class="col-md-6">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" name="code" id="code" value="{{ old('code', $account->code ?? '') }}"
                                           class="form-control @error('code') is-invalid @enderror">
                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              {{-- Account No --}}
                              <div class="col-md-6">
                                    <label for="account_no" class="form-label">Account No</label>
                                    <input type="text" name="account_no" id="account_no" value="{{ old('account_no', $account->account_no ?? '') }}"
                                           class="form-control @error('account_no') is-invalid @enderror">
                                    @error('account_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              {{-- Type --}}
                              <div class="col-md-6">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                                          <option value="">-- Select --</option>
                                          @foreach(['Asset','Liability','Equity','Income','Expense'] as $type)
                                          <option value="{{ $type }}" {{ old('type', $account->type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                          @endforeach
                                    </select>
                                    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>

                              {{-- Status --}}
                              <div class="col-md-6">
                                    <label for="is_active" class="form-label">Status</label>
                                    <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                          <option value="1" {{ old('is_active', $account->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                          <option value="0" {{ old('is_active', $account->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                              </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-between mt-4">
                              <a href="{{ route('accounts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                              <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                        </div>

                  </form>
            </div>
      </div>
</div>

@endsection
