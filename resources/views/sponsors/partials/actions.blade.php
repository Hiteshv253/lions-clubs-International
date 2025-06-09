<a href="{{ route('sponsors.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('sponsors.destroy', $row->id) }}" method="POST" class="d-inline">
    @csrf @method('DELETE')
    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
