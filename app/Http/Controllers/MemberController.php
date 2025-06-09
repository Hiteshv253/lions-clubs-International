<?php

namespace App\Http\Controllers;

use App\Models\MemberMaster;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Region;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller {

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

      // Show list of members

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = MemberMaster::query();

                  $query->when($request->filled('parent_region'), fn($q) =>
                        $q->where('parent_region', $request->parent_region)
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
                              ->addColumn('actions', function ($member) {
                                    return view('members.partials.actions', compact('member'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            $regions = Region::select('name')->distinct()->get();
            $occupations = Occupation::select('name')->distinct()->get();
            return view('members.index', compact('regions', 'occupations'));
      }

      // Show form to create a member
      public function create() {
            return view('members.create');
      }

      // Store new member
      public function store(Request $request) {
            $validated = $request->validate([
                      'account_name' => 'required|string|max:255',
                      'parent_region' => 'nullable|string|max:255',
                      'parent_zone' => 'nullable|string|max:255',
                      'member_id' => 'nullable|string|max:100|unique:members,member_id',
                      'first_name' => 'required|string|max:100',
                      'last_name' => 'required|string|max:100',
                      'address_line1' => 'nullable|string|max:255',
                      'address_line2' => 'nullable|string|max:255',
                      'address_line3' => 'nullable|string|max:255',
                      'city' => 'nullable|string|max:100',
                      'state' => 'nullable|string|max:100',
                      'zip' => 'nullable|string|max:20',
                      'birthdate' => 'nullable|date|before:today',
                      'email' => 'nullable|email|max:255|unique:members,email',
                      'mobile' => 'nullable|string|max:20',
                      'home_phone' => 'nullable|string|max:20',
                      'gender' => 'nullable|in:Male,Female,Other',
                      'occupation' => 'nullable|string|max:100',
                      'join_date' => 'nullable|date|before_or_equal:today',
            ]);

            // Save the validated data
            Member::create($validated);

            return redirect()->route('members.index')->with('success', 'Member added successfully.');
      }

      // Show single member
      public function show(MemberMaster $member) {
            return view('members.show', compact('member'));
      }

      // Show form to edit member
      public function edit(MemberMaster $member) {
            return view('members.edit', compact('member'));
      }

      // Update member
      public function update(Request $request, MemberMaster $member) {

            $request->validate([
                      'account_name' => 'nullable|string|max:255',
                      'parent_region' => 'nullable|string|max:255',
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
            $member = Member::findOrFail($id);
            $member->delete();

            return response()->json(['message' => 'Member deleted successfully.']);
      }

      public function bulkDelete(Request $request) {
            $ids = $request->input('ids', []);

            if (empty($ids)) {
                  return response()->json(['message' => 'No member IDs provided.'], 422);
            }

            Member::whereIn('id', $ids)->delete();

            return response()->json(['message' => count($ids) . ' member(s) deleted successfully.']);
      }
}
