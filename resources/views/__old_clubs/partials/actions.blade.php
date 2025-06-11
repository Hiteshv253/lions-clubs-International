<a href="{{ route('clubs.show', $club->id) }}" class="btn btn-info btn-sm">View</a>
<a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('clubs.destroy', $club->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
</form>
