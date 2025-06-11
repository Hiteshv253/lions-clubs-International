<form action="{{ isset($state) ? route('states.update', $state->id) : route('states.store') }}" method="POST">
    @csrf
    @if(isset($state)) @method('PUT') @endif
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $state->name ?? '') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($state) ? 'Update' : 'Save' }}</button>
    <a href="{{ route('states.index') }}" class="btn btn-secondary">Cancel</a>
</form>
