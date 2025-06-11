<a href="{{ route('districts.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('districts.destroy', $row->id) }}" method="POST" style="display:inline-block;">
      @csrf
      @method('DELETE')
      <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
