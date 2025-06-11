<a href="{{ route('zones.edit', $zone->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('zones.destroy', $zone->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this zone?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger">Delete</button>
</form>
