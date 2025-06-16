<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

      public function __construct() {
            $this->middleware('permission:view user', ['only' => ['index']]);
            $this->middleware('permission:create user', ['only' => ['create', 'store']]);
            $this->middleware('permission:update user', ['only' => ['update', 'edit']]);
            $this->middleware('permission:delete user', ['only' => ['destroy']]);
      }

      public function profile_update() {
            
      }

      public function profile_edit() {
            $user = Auth::user(); // get the currently logged-in user
            return view('role-permission.user.profile.edit', compact('user'));
      }

      public function profile() {
            $user = Auth::user(); // get the currently logged-in user
            return view('role-permission.user.profile.index', compact('user'));
      }

      public function ajaxUsers(Request $request) {
            $query = User::with('roles');

            if ($request->has('role') && $request->role != '') {
                  $role = $request->role;
                  $query->whereHas('roles', function ($q) use ($role) {
                        $q->where('name', $role);
                  });
            }

            return DataTables::of($query)
                        ->addColumn('roles', function ($user) {
                              return $user->roles->map(fn($role) => '<span class="badge bg-primary mx-1">' . ucfirst($role->name) . '</span>')->implode(' ');
                        })
                        ->addColumn('action', function ($user) {
                              $editBtn = auth()->user()->can('update user') ?
                                    '<a href="' . url("lions/users/{$user->id}/edit") . '" class="btn btn-success btn-sm">Edit</a>' : '';

                              $deleteBtn = auth()->user()->can('delete user') ?
                                    '<form method="POST" action="' . url("lions/users/{$user->id}") . '" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\');">' .
                                    csrf_field() .
                                    method_field('DELETE') .
                                    '<button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button></form>' : '';

                              return $editBtn . $deleteBtn;
                        })
                        ->rawColumns(['roles', 'action'])
                        ->make(true);
      }

      public function index() {
            $users = User::get();
            $roles = Role::all();  // fetch all roles

            return view('role-permission.user.index', ['users' => $users, 'roles' => $roles]);
      }

      public function create() {
            $roles = Role::pluck('name', 'name')->all();
            return view('role-permission.user.create', ['roles' => $roles]);
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'email' => 'required|email|max:255|unique:users,email',
                      'password' => 'required|string|min:8|max:20',
                      'roles' => 'required'
            ]);

            $user = User::create([
                            'name' => ($request->f_name . ' ' . $request->l_name),
                            'f_name' => $request->f_name,
                            'l_name' => $request->l_name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
            ]);

            $user->syncRoles($request->roles);
            return redirect('lions/users')->with('success', 'User created successfully with roles');
      }

      public function show(User $user) {
            $roles = Role::pluck('name', 'name')->all();
            $userRoles = $user->roles->pluck('name', 'name')->all();
            return view('role-permission.user.show', [
                      'user' => $user,
                      'roles' => $roles,
                      'userRoles' => $userRoles
            ]);
      }

      public function edit(User $user) {
            $roles = Role::pluck('name', 'name')->all();
            $userRoles = $user->roles->pluck('name', 'name')->all();
            return view('role-permission.user.edit', [
                      'user' => $user,
                      'roles' => $roles,
                      'userRoles' => $userRoles
            ]);
      }

      public function update(Request $request, User $user) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'password' => 'nullable|string|min:8|max:20',
                      'roles' => 'required'
            ]);

            $data = [
                      'name' => ($request->f_name . ' ' . $request->l_name),
                      'f_name' => $request->f_name,
                      'l_name' => $request->l_name,
                      'email' => $request->email,
            ];

            if (!empty($request->password)) {
                  $data += [
                            'password' => Hash::make($request->password),
                  ];
            }

            $user->update($data);
            $user->syncRoles($request->roles);

            return redirect('lions/users')->with('success', 'User Updated Successfully with roles');
      }

      public function destroy($userId) {
            $user = User::findOrFail($userId);
            $user->delete();

            return redirect('lions/users')->with('success', 'User Delete Successfully');
      }
}
