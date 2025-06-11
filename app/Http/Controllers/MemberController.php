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
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller {

      // Show list of members

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = MemberMaster::with(['state', 'city', 'region', 'occupation', 'account'])->select('club_member_masters.*');

                  $query->when($request->filled('region_id'), fn($q) =>
                        $q->where('region_id', $request->region_id)
                  )->when($request->filled('member_id'), fn($q) =>
                        $q->where('member_id', 'like', '%' . $request->member_id . '%')
                  )->when($request->filled('account_name'), fn($q) =>
                        $q->where('account_name', 'like', '%' . $request->account_name . '%')
                  )->when($request->filled('occupation'), fn($q) =>
                        $q->where('occupation', 'like', '%' . $request->occupation . '%')
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
                                    return view('members.partials.actions', compact('member'))->render();
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
            $member_id = 'MEM' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            $states = State::select('name', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            $clubs = Club::select('name', 'id')->distinct()->get();

            return view('members.create', compact('member_id', 'regions', 'accounts', 'citys', 'states', 'occupations', 'clubs'));
      }

// Show form to edit member

      public function edit(MemberMaster $member) {
            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            $states = State::select('name', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            return view('members.edit', compact('member', 'regions', 'accounts', 'citys', 'states', 'occupations'));
      }

      // Store new member
      public function store(Request $request) {
            // Auto-generate Member ID
            $lastMember = \App\Models\MemberMaster::orderBy('id', 'desc')->first();
            $nextId = $lastMember ? $lastMember->id + 1 : 1;
            $member_id = 'MEM' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            // Validation
//            $request->validate([
//                      'account_name' => 'nullable|string|max:255',
//                      'first_name' => 'required|string|max:255',
//                      'last_name' => 'required|string|max:255',
//                      'gender' => 'nullable|in:Male,Female,Other',
//                      'birthdate' => 'nullable|date',
//                      'address_line1' => 'nullable|string|max:255',
//                      'address_line2' => 'nullable|string|max:255',
//                      'address_line3' => 'nullable|string|max:255',
//                      'email' => 'nullable|email|unique:club_member_masters,email',
//                      'mobile' => 'nullable|string|max:20',
//                      'home_phone' => 'nullable|string|max:20',
//                      'state' => 'nullable|integer|exists:states,id',
//                      'city' => 'nullable|string|max:255',
//                      'zipcode' => 'nullable|string|max:20',
//                      'occupation' => 'nullable|integer|exists:occupations,id',
//                      'join_date' => 'nullable|date',
//                      'is_active' => 'required|boolean',
//                      // Add region/zone/club if required:
//                      'region_id' => 'nullable|exists:regions,id',
//                      'zone_id' => 'nullable|exists:zones,id',
//                      'club_id' => 'nullable|exists:clubs,id',
//            ]);
            // Merge generated member_id
//            $validated['member_id'] = $member_id;
            // Create new member
//            $validator = $request->validate([
//                      'account_name' => 'nullable|string|max:255',
//                      'first_name' => 'required|string|max:255',
//                      'email' => 'nullable|email|unique:club_member_masters,email',
//                      'mobile' => 'nullable|string|max:20',
//            ]);
//            if ($validator->fails()) {
//                  return redirect()->back()->withErrors($validator)->withInput();
//            }
            $memberData = [
                      'member_id' => $member_id,
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
                      'state_id' => $request->state_id,
                      'city_id' => $request->city,
                      'zipcode' => $request->zipcode,
                      'occupation_id' => $request->occupation_id,
                      'join_date' => $request->join_date,
                      'is_active' => $request->is_active,
                      'region_id' => $request->region_id,
                      'zone_id' => $request->zone_id,
                      'club_id' => $request->club_id,
            ];
            MemberMaster::create($memberData);

            // ✅ Step 3: Generate password
            $passwordPlain = Str::random(10);
            $passwordHashed = Hash::make($passwordPlain);

            // ✅ Step 4: Create user
            $user = User::create([
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'email' => $request->email,
                            'membership_id' => $member_id,
                            'password' => $passwordHashed,
            ]);
            $login = route('login');
            Mail::raw("Dear {$user->first_name}"
                  . ",\n\nYour Email ID: {$request->email}\n"
                  . "\nYour Membership ID: {$member_id}\nPassword: {$passwordPlain}"
                  . "\nPlease login with this URL {$login}",
                  function ($message) use ($user) {
                        $message->to($user->email)->subject('Lions Club Membership Details###');
                  });

            return redirect()->route('members.index')->with('success', 'Member created successfully.');
      }

      public function validateField(Request $request) {
            $validator = Validator::make($request->all(), [
                            'email' => 'nullable|email|unique:club_member_masters,email'
            ]);

            if ($validator->fails()) {
                  return response()->json([
                                  'valid' => false,
                                  'message' => $validator->errors()->first('email')
                  ]);
            }

            return response()->json(['valid' => true]);
      }

      // Show single member
      public function show(MemberMaster $member) {
            return view('members.show', compact('member'));
      }

      // Update member
      public function update(Request $request, MemberMaster $member) {

            $request->validate([
                      'account_name' => 'nullable|string|max:255',
                      'region_id' => 'nullable|string|max:255',
                      'parent_zone' => 'nullable|string|max:255',
                      'member_id' => 'nullable|string|max:255',
                      'first_name' => 'nullable|string|max:255',
                      'last_name' => 'nullable|string|max:255',
                      'address_line1' => 'nullable|string|max:255',
                      'address_line2' => 'nullable|string|max:255',
                      'address_line3' => 'nullable|string|max:255',
                      'city' => 'nullable|string|max:255',
                      'state' => 'nullable|string|max:255',
                      'zip' => 'nullable|string|max:255',
                      'birthdate' => 'nullable|date',
                      'email' => 'nullable|email|max:255',
                      'mobile' => 'nullable|string|max:20',
                      'home_phone' => 'nullable|string|max:20',
                      'gender' => 'nullable|string|max:10',
                      'occupation' => 'nullable|string|max:255',
                      'join_date' => 'nullable|date',
                      'is_active' => 'boolean',
                      'is_create_by' => 'nullable|string|max:255',
            ]);

            $member->update($request->all());

            return redirect()->route('members.index')
                        ->with('success', 'Member updated successfully');
      }

// Delete member
      public function destroy($id) {
            $member = MemberMaster::findOrFail($id);
            $member->delete();
            return redirect()->route('members.index')
                        ->with('success', 'Member deleted successfully');
//            return response()->json(['message' => 'Member deleted successfully.']);
      }

      public function bulkDelete(Request $request) {
            $ids = $request->input('ids', []);

            if (empty($ids)) {
                  return response()->json(['message' => 'No member IDs provided.'], 422);
            }

            MemberMaster::whereIn('id', $ids)->delete();
            return redirect()->route('members.index')
                        ->with('success', 'member(s) deleted successfully');
//            return response()->json(['message' => count($ids) . ' member(s) deleted successfully.']);
      }

      public function showBulkUploadForm() {

            return view('members.bulk-upload');
      }

      public function importMembers(Request $request) {

            $request->validate([
                      'file' => 'required|file|mimes:xlsx,xls,csv',
            ]);

            try {
                  Excel::import(new MembersImport, $request->file('file'));
                  return redirect()->route('members.index')->with('success', 'Members imported successfully.');
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                  $failures = $e->failures();

                  $errorMessages = [];
                  foreach ($failures as $failure) {
                        $errorMessages[] = 'Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
                  }

                  return redirect()->back()->withErrors($errorMessages);
            }
      }
}
