<a href="{{ route('dg-teams.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('dg-teams.destroy', $row->id) }}" method="POST" style="display:inline">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Delete this dg-teams?')" class="btn btn-sm btn-danger">
            Delete
      </button>
</form>