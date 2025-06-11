<a href="{{ route('regions.edit', $region->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('regions.destroy', $region->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this region?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-sm btn-danger">Delete</button>
</form>
