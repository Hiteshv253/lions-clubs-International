<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Models\State;
use App\Models\City;
use App\Models\MemberMaster;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Region;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use App\Models\Club;
use DB;
use App\Models\ZipCode;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToArray;

class MemberController extends Controller {

      public function members_search(Request $request) {
            $query = $request->search;
            $my_members = MemberMaster::where('first_name', 'like', "%$query%")
                  ->orWhere('last_name', 'like', "%$query%")
                  ->orWhere('membership_id', 'like', "%$query%")
                  ->get();

            return view('role-permission.user.profile.partials.cards', compact('my_members'))->render();
      }

      public function convertToUser($id) {

            $member = MemberMaster::findOrFail($id);

// Check if user already exists
            if (User::where('email', $member->email)->exists()) {
                  return redirect()->back()->with('error', 'User already exists for this member.');
            }

// Generate password
            $passwordPlain = Str::random(10);
            $passwordHashed = Hash::make($passwordPlain);

// Create User
            $user = User::create([
                            'name' => $member->first_name . ' ' . $member->last_name,
                            'first_name' => $member->first_name,
                            'last_name' => $member->last_name,
                            'email' => $member->email,
                            'membership_id' => $member->membership_id,
                            'is_active' => $member->is_active,
                            'password' => $passwordHashed,
            ]);

            $user->assignRole('member');

// Update Member with user_id
            $member->update([
                      'user_id' => $user->id,
            ]);

// Send login details via email
            $loginUrl = route('login');

            Mail::raw(
                  "Dear {$user->first_name},\n\n" .
                  "Your Email ID: {$member->email}\n" .
                  "Your Membership ID: {$member->membership_id}\n" .
                  "Password: {$passwordPlain}\n" .
                  "Please login here: {$loginUrl}",
                  function ($message) use ($user) {
                        $message->to($user->email)->subject('Lions Club Membership Details');
                  }
            );

            return redirect()->back()->with('success', 'Member converted to user successfully.');
      }

      // Show list of members

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = MemberMaster::with(['state', 'city', 'region', 'occupation', 'account'])->select('club_member_masters.*');

                  $query->when($request->filled('region_id'), fn($q) =>
                        $q->where('region_id', $request->region_id)
                  )->when($request->filled('member_id'), fn($q) =>
                        $q->where('member_id', 'like', '%' . $request->member_id . '%')
                  )->when($request->filled('account_name'), fn($q) =>
                        $q->where('account_id', 'like', '%' . $request->account_name . '%')
                  )->when($request->filled('occupation'), fn($q) =>
                        $q->where('occupation_id', 'like', '%' . $request->occupation . '%')
                  )->when($request->filled('join_date'), fn($q) =>
                        $q->whereDate('join_date', $request->join_date)
                  )->when($request->filled('is_active'), fn($q) =>
                        $q->where('is_active', $request->is_active)
                  );

                  return DataTables::of($query)
                              ->addColumn('state', fn($query) => $query->state->name ?? '—')
                              ->addColumn('city', fn($query) => $query->city->name ?? '—')
                              ->addColumn('region', fn($query) => $query->region->name ?? '—')
                              ->addColumn('occupation', fn($query) => $query->occupation->name ?? '—')
                              ->addColumn('account_name', fn($query) => $query->account->name ?? '—')
                              ->addColumn('actions', function ($member) {
                                    $hasUser = \App\Models\User::where('email', $member->email)->exists();
                                    return view('members.partials.actions', compact('member', 'hasUser'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            return view('members.index', compact('regions', 'occupations', 'accounts', 'citys'));
      }

      // Show form to create a member
      public function create() {

            $lastMember = \App\Models\MemberMaster::orderBy('id', 'desc')->first();
            $nextId = $lastMember ? $lastMember->id + 1 : 1;

            $membership_id = 'MEM' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            $states = State::select('name', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            $clubs = Club::select('name', 'id')->distinct()->get();

            return view('members.create', compact('membership_id', 'regions', 'accounts', 'citys', 'states', 'occupations', 'clubs'));
      }

// Show form to edit member

      public function edit(MemberMaster $member) {
            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            $states = State::select('name', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            $ZipCodes = ZipCode::select('zip_code', 'id')->distinct()->get();
            $allmembers = MemberMaster::select('first_name', 'membership_id', 'last_name', 'id')->distinct()->get();
            return view('members.edit', compact('allmembers', 'member', 'regions', 'accounts', 'citys', 'states', 'occupations', 'ZipCodes'));
      }

      public function checkMembership(Request $request) {
            $query = MemberMaster::where('membership_id', $request->membership_id);
            if ($request->id) {
                  $query->where('id', '!=', $request->id);
            }

            return response()->json($query->doesntExist());
      }

      public function checkEmail(Request $request) {
            $query = MemberMaster::where('email', $request->email);
            if ($request->id) {
                  $query->where('id', '!=', $request->id);
            }

            return response()->json($query->doesntExist());
      }

      // Store new member
      public function store(Request $request) {
//            dd($request->all());
            // Step 1: Validate incoming data
//            // Step 2: Auto-generate a unique membership ID
//            $lastId = MemberMaster::max('id') + 1;
//            $member_id = strtolower(substr($request->first_name, 0, 3) . $lastId . substr($request->last_name, -2));
//
//            // Step 3: Ensure uniqueness manually (edge case check)
//            if (User::where('membership_id', $member_id)->exists()) {
//                  return back()->withErrors(['membership_id' => 'Membership ID already exists. Try again.'])->withInput();
//            }
            // Step 4: Create the MemberMaster record


            $request->validate([
                      'membership_id' => 'required|unique:club_member_masters,membership_id',
                      'first_name' => 'required|string|max:255',
                      'last_name' => 'required|string|max:255',
                      'email' => 'required|email|unique:club_member_masters,email',
                      'is_active' => 'required|boolean',
                  // Add more validations if needed
            ]);

            $member = MemberMaster::create([
                            'membership_id' => $request->membership_id,
                            'account_id' => $request->account_id,
                            'name' => $request->first_name . '' . $request->last_name,
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'gender' => $request->gender,
                            'birthdate' => $request->birthdate,
                            'address_line1' => $request->address_line1,
                            'address_line2' => $request->address_line2,
                            'address_line3' => $request->address_line3,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'home_phone' => $request->home_phone,
                            'state_id' => $request->state_id,
                            'city_id' => $request->city,
                            'zipcode' => $request->zipcode,
                            'occupation_id' => $request->occupation_id,
                            'join_date' => $request->join_date,
                            'region_id' => $request->region_id,
                            'zone_id' => $request->zone_id,
                            'club_id' => $request->club_id,
                            'is_active' => $request->is_active,
            ]);

            // Step 5: Generate password and create user
            $passwordPlain = Str::random(10);
            $user = User::create([
                            'name' => $request->first_name . '' . $request->last_name,
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'email' => $request->email,
                            'membership_id' => $request->membership_id,
                            'password' => Hash::make($passwordPlain),
            ]);

            // Step 6: Send Email
            $login = route('login');
            Mail::raw(
                  "Dear {$user->first_name},\n\nYour Email: {$user->email}\nMembership ID: {$request->membership_id}\nPassword: {$passwordPlain}\n\nLogin: {$login}",
                  fn($message) => $message->to($user->email)->subject('Lions Club Membership Details')
            );

            return redirect()->route('members.index')->with('success', 'Member created successfully.');
      }

      // Show single member
      public function show(MemberMaster $member) {
            return view('members.show', compact('member'));
      }

      // Update member
      public function update(Request $request, MemberMaster $member) {


            $request->validate([
                      'membership_id' => 'required|string|max:255',
                      'first_name' => 'required|string|max:255',
                      'last_name' => 'required|string|max:255',
                      'email' => 'required|string|max:255',
                      'is_active' => 'required|boolean',
                  // Add more validations if needed
            ]);

            $member->update([
                      'account_id' => $request->account_id,
                      'first_name' => $request->first_name,
                      'last_name' => $request->last_name,
                      'gender' => $request->gender,
                      'birthdate' => $request->birthdate,
                      'address_line1' => $request->address_line1,
                      'address_line2' => $request->address_line2,
                      'address_line3' => $request->address_line3,
                      'email' => $request->email,
                      'mobile' => $request->mobile,
                      'home_phone' => $request->home_phone,
                      'zipcode' => $request->zipcode,
                      'occupation_id' => $request->occupation_id,
                      'join_date' => $request->join_date,
                      'is_active' => $request->is_active,
                      'region_id' => $request->region_id,
                      'zone_id' => $request->zone_id,
                      'city_id' => $request->city,
                      'state_id' => $request->state_id,
                      'club_id' => $request->club_id,
                      'parent_id' => $request->parent_id,
            ]);
            $user = User::where('id', '=', $member->user_id);
            $user->update([
                      'is_active' => $request->is_active,
            ]);

            return redirect()->route('members.index')->with('success', 'Member updated successfully');
      }

// Delete member
      public function destroy($id) {
            $member = MemberMaster::findOrFail($id);
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Member deleted successfully');
//            return response()->json(['message' => 'Member deleted successfully.']);
      }

      public function bulkDelete(Request $request) {
            $ids = $request->input('ids', []);

            if (empty($ids)) {
                  return response()->json(['message' => 'No member IDs provided.'], 422);
            }

            MemberMaster::whereIn('id', $ids)->delete();
            return redirect()->route('members.index')->with('success', 'member(s) deleted successfully');
//            return response()->json(['message' => count($ids) . ' member(s) deleted successfully.']);
      }

      public function showBulkUploadForm() {


            return view('members.import.bulk-upload');
      }

      public function importMembers(Request $request) {
            $line_no = 0;
            $member_ids = [];
            $prepare_data = []; // default fallback to avoid "undefined variable" in catch

            try {
                  DB::beginTransaction();

                  // Validate file (optional but safe)
//                  $request->validate([
//                            'excel_file' => 'required|file|mimes:xlsx,xls,csv'
//                  ]);
                  // Parse Excel to array
                  $ExcelArray = Excel::toArray([], $request->file('excel_file'));
                  $prepare_data = $this->setData($ExcelArray[0]);

                  // If status is not success, return with error
                  if ($prepare_data['status'] !== 'success') {
                        DB::rollBack();
                        return redirect()->route('members.index')
                                    ->withErrors("Please correct Excel data.")
                                    ->with(['prepare_data' => $prepare_data]);
                  }

                  // Loop and insert member data
                  foreach ($prepare_data['response_data'] as $line_no => $row) {
                        $member = new Member();
                        $member->first_name = $row['first_name'] ?? null;
                        $member->last_name = $row['last_name'] ?? null;
                        $member->email = $row['email'] ?? null;
                        $member->save();
                        $member_ids[] = $member->id;
                  }

                  DB::commit();

                  return redirect()->route('members.index')->with('success', 'Member Excel data has been uploaded successfully');
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                  DB::rollBack();
                  return redirect()->route('members.index')
                              ->withErrors("Validation error in Excel file.")->with(['prepare_data' => $prepare_data]);
            } catch (\Exception $e) {
                  DB::rollBack();
                  return redirect()->route('members.index')
                              ->withErrors("Unexpected error: " . $e->getMessage())->with(['prepare_data' => $prepare_data]);
            }
      }

//      public function importMembers(Request $request) {
//
//            $request->validate([
//                      'file' => 'required|file|mimes:xlsx,xls,csv',
//            ]);
//
//            try {
//                  Excel::import(new MembersImport, $request->file('file'));
//                  return redirect()->route('members.index')->with('success', 'Members imported successfully.');
//            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
//                  $failures = $e->failures();
//
//                  $errorMessages = [];
//                  foreach ($failures as $failure) {
//                        $errorMessages[] = 'Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
//                  }
//
//                  return redirect()->back()->withErrors($errorMessages);
//            }
//      }
}
