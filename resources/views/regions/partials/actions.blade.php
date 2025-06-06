<a href="{{ route('regions.show', $region->id) }}" class="btn btn-info btn-sm">View</a>
<a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
