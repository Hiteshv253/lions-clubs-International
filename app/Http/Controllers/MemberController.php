<?php

namespace App\Http\Controllers;

use App\Models\MemberMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class MemberController extends Controller {

      // Show list of members
      public function index(Request $request) {
            if ($request->ajax()) {
                  $data = MemberMaster::select(
                              'id', 'first_name', 'last_name', 'mobile', 'work_email', 'is_active', 'gender'
                  );
                  return DataTables::of($data)
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
                      'first_name' => 'required|string|max:255',
                      'last_name' => 'required|string|max:255',
                      'birthday' => 'nullable|date',
                      'gender' => 'nullable|string|max:10',
                      'occupation' => 'nullable|string|max:255',
                      'mobile' => 'nullable|string|max:20',
                      'work_email' => 'nullable|email|max:255',
                      'membership_club_id' => 'nullable|integer',
                      'zone_id' => 'nullable|integer',
                      'district_id' => 'nullable|integer',
                      'region_id' => 'nullable|integer',
                      'is_active' => 'boolean',
                      'is_create_by' => 'boolean',
            ]);

            MemberMaster::create($request->all());

            return redirect()->route('members.index')->with('success', 'Member created successfully.');
      }

      // Show single member
      public function show(Member $member) {
            return view('members.show', compact('member'));
      }

      // Show form to edit member
      public function edit(Member $member) {
            return view('members.edit', compact('member'));
      }

      // Update member
      public function update(Request $request, Member $member) {
            $request->validate([
                      'first_name' => 'required|string|max:255',
                      'last_name' => 'required|string|max:255',
                      'birthday' => 'nullable|date',
                      'gender' => 'nullable|string|max:10',
                      'occupation' => 'nullable|string|max:255',
                      'mobile' => 'nullable|string|max:20',
                      'work_email' => 'nullable|email|max:255',
                      'membership_club_id' => 'nullable|integer',
                      'zone_id' => 'nullable|integer',
                      'district_id' => 'nullable|integer',
                      'region_id' => 'nullable|integer',
                      'is_active' => 'boolean',
                      'is_create_by' => 'boolean',
            ]);

            $member->update($request->all());

            return redirect()->route('members.index')->with('success', 'Member updated successfully.');
      }

      // Delete member
      public function destroy(Member $member) {
            $member->delete();
            return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
      }
}
