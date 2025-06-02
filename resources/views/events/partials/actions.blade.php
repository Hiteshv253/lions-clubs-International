<a href="{{ route('events.show', $row->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('events.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('events.destroy', $row->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Delete this event?')" class="btn btn-sm btn-danger">
        Delete
    </button>
</form>
