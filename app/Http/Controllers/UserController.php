<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\MemberMaster;

class UserController extends Controller {

      public function __construct() {
            $this->middleware('permission:view user', ['only' => ['index']]);
            $this->middleware('permission:create user', ['only' => ['create', 'store']]);
            $this->middleware('permission:update user', ['only' => ['update', 'edit']]);
            $this->middleware('permission:delete user', ['only' => ['destroy']]);
      }

//* ========User Profile======================================================================================================

      /**
       * Display user profile.
       */
      public function profile() {
            $user = Auth::user();
            $member = MemberMaster::where('user_id', Auth::id())->first();
            $my_members = MemberMaster::get();
//            $my_members = MemberMaster::where('user_id', Auth::id())->get();
            return view('role-permission.user.profile.index', compact('user', 'member', 'my_members'));
      }

      /**
       * Show form to edit user profile.
       */
      public function profile_edit() {
            $user = Auth::user();
            return view('role-permission.user.profile.edit', compact('user'));
      }

//* ========User Profile======================================================================================================

      /**
       * Show user list (AJAX DataTable).
       */
      public function ajaxUsers(Request $request) {
            $query = User::with('roles');

            // Filter by role if provided
            if ($request->filled('role')) {
                  $role = $request->role;
                  $query->whereHas('roles', fn($q) => $q->where('name', $role));
            }

            return DataTables::of($query)
                        ->addColumn('roles', fn($user) =>
                              $user->roles
                              ->map(fn($role) => '<span class="badge bg-primary mx-1">' . ucfirst($role->name) . '</span>')
                              ->implode(' ')
                        )
                        ->addColumn('last_login_at', function ($user) {
                              return $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() : 'Never logged in';
                        })
                        ->addColumn('action', function ($user) {
                              $editBtn = auth()->user()->can('update user') ? '<a href="' . url("lions/users/{$user->id}/edit") . '" class="btn btn-success btn-sm">Edit</a>' : '';

                              $deleteBtn = auth()->user()->can('delete user') ? '<form method="POST" action="' . url("lions/users/{$user->id}") . '" style="display:inline-block;" onsubmit="return confirm(\'Are you sure?\');">'
                                    . csrf_field()
                                    . method_field('DELETE')
                                    . '<button type="submit" class="btn btn-danger btn-sm ms-1">Delete</button></form>' : '';

                              return $editBtn . $deleteBtn;
                        })
                        ->rawColumns(['roles', 'action'])
                        ->make(true);
      }

      /**
       * Display all users.
       */
      public function index() {
            $users = User::all();
            $roles = Role::all();
            return view('role-permission.user.index', compact('users', 'roles'));
      }

      /**
       * Show form to create user.
       */
      public function create() {
            $roles = Role::pluck('name', 'name')->all();
            return view('role-permission.user.create', compact('roles'));
      }

      /**
       * Store new user and assign roles.
       */
      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'email' => 'required|email|max:255|unique:users,email',
                      'password' => 'required|string|min:8|max:20',
                      'roles' => 'required'
            ]);

            $user = User::create([
                            'name' => $request->first_name . ' ' . $request->last_name,
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
            ]);

            $user->syncRoles($request->roles);

            return redirect('lions/users')->with('success', 'User created successfully with roles.');
      }

      /**
       * Show specific user.
       */
      public function show(User $user) {
            $roles = Role::pluck('name', 'name')->all();
            $userRoles = $user->roles->pluck('name', 'name')->all();

            return view('role-permission.user.show', compact('user', 'roles', 'userRoles'));
      }

      /**
       * Show form to edit user.
       */
      public function edit(User $user) {
            $roles = Role::pluck('name', 'name')->all();
            $userRoles = $user->roles->pluck('name', 'name')->all();

            return view('role-permission.user.edit', compact('user', 'roles', 'userRoles'));
      }

      /**
       * Update user and their roles.
       */
      public function update(Request $request, User $user) {
            $request->validate([
//                      'name' => 'required|string|max:255',
                      'first_name' => 'required|string|max:255',
                      'last_name' => 'required|string|max:255',
                      'password' => 'nullable|string|min:8|max:20',
                      'roles' => 'required'
            ]);

            $data = [
                      'name' => $request->first_name . ' ' . $request->last_name,
                      'first_name' => $request->first_name,
                      'last_name' => $request->last_name,
                      'email' => $request->email,
            ];

            if (!empty($request->password)) {
                  $data['password'] = Hash::make($request->password);
            }
         

            $user->update($data);
            $user->syncRoles($request->roles);

            $member = MemberMaster::where('user_id', '=', $user->id);
            $member->update([
//                      'name' => $request->first_name . ' ' . $request->last_name,
                      'first_name' => $request->first_name,
                      'last_name' => $request->last_name,
//                      'is_active' => $request->is_active,
            ]);
            return redirect('lions/users')->with('success', 'User updated successfully with roles.');
      }

      /**
       * Delete a user.
       */
      public function destroy($userId) {
            $user = User::findOrFail($userId);
            $user->delete();

            return redirect('lions/users')->with('success', 'User deleted successfully.');
      }
}
