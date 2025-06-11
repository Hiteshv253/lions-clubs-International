<a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('clubs.destroy', $club->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this club?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-sm btn-danger">Delete</button>
</form>
<a href="{{ route('clubs.show', $club->id) }}" class="btn btn-sm btn-info">View</a>
