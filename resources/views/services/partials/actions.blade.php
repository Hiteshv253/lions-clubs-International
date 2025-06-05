<a href="{{ route('states.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('states.destroy', $row->id) }}" method="POST" style="display:inline;">
      @csrf @method('DELETE')
      <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
</form>
