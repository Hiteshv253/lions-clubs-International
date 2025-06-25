@extends('layouts.app')

@section('content')
<h2>Roles</h2>
<a href="{{ route('roles.create') }}">Create Role</a>
<table>
      <thead>
            <tr><th>Name</th><th>Permissions</th><th>Actions</th></tr>
      </thead>
      <tbody>
            @foreach($roles as $role)
            <tr>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                  <td>
                        <a href="{{ route('roles.edit', $role) }}">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST">
                              @csrf @method('DELETE')
                              <button>Delete</button>
                        </form>
                  </td>
            </tr>
            @endforeach
      </tbody>
</table>
@endsection
