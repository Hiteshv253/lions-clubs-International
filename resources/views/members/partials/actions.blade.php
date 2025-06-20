<a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Delete this Member?')" class="btn btn-sm btn-danger">
            Delete
      </button>
</form>

@if(!$hasUser)
<form action="{{ route('members.convertToUser', $member->id) }}" method="POST" style="display:inline-block;">
      @csrf
      <button type="submit" class="btn btn-sm btn-primary"
              onclick="return confirm('Are you sure to convert this member to user?')">
            Convert to User
      </button>
</form>
@else
<button class="btn btn-sm btn-secondary" disabled>Already User</button>
@endif