<a href="{{ route('occupations.show', $row->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('occupations.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('occupations.destroy', $row->id) }}" method="POST" style="display:inline">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Delete this Occupations?')" class="btn btn-sm btn-danger">
            Delete
      </button>
</form>