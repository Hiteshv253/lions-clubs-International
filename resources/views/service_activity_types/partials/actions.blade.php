<a href="{{ route('service_activity_types.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('service_activity_types.destroy', $row->id) }}" method="POST" class="d-inline">
    @csrf @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
