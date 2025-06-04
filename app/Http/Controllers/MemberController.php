<?php

namespace App\Http\Controllers;

use App\Models\MemberMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;

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
                  return redirect()->route('members.bulk-upload-form')->with('success', 'Members imported successfully.');
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
                  $members = MemberMaster::select('*'); // Or specify columns

                  return DataTables::of($members)
                              ->addColumn('actions', function ($row) {
                                    return view('members.partials.actions', compact('row'))->render();
                              })
                              ->editColumn('is_active', function ($row) {
                                    return $row->is_active ? 'Yes' : 'No';
                              })
                              ->rawColumns(['actions']) // To render HTML
                              ->make(true);
            }


            return view('members.index');
      }

      // Show form to create a member
      public function create() {
            return view('members.create');
      }

      // Store new member
      public function store(Request $request) {
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
            Member::create($request->all());

            return redirect()->route('members.index')
                        ->with('success', 'Member created successfully.');
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
      public function destroy(Member $member) {
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
      }
}
