@extends('layouts.master')

@section('content')
<div class="mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Regions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Region</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Region</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('regions.update', $region->id) }}">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Region Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $region->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Parent Region --}}
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Region</label>
                    <select name="parent_id" id="parent_id"
                        class="form-select @error('parent_id') is-invalid @enderror">
                        <option value="">No Parent</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}"
                                {{ old('parent_id', $region->parent_id) == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('regions.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
