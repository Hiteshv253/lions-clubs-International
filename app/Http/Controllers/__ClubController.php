<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF; // Alias for Barryvdh\DomPDF\Facade
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller {

      public function exportPdf() {
            $clubs = Club::all();

            $pdf = PDF::loadView('clubs.pdf', compact('clubs'));
            return $pdf->download('clubs.pdf');
      }

      public function index(Request $request) {
            if ($request->ajax()) {
                  $clubs = Club::select([
                                  'id', 'account_name', 'type', 'district', 'region_zone',
                                  'lion_id', 'active_member_count', 'website'
                  ]);

                  // Apply filters if present
                  if ($request->filled('region_zone')) {
                        $clubs->where('region_zone', $request->region_zone);
                  }
                  if ($request->filled('district')) {
                        $clubs->where('district', $request->district);
                  }
                  if ($request->filled('type')) {
                        $clubs->where('type', $request->type);
                  }

                  return DataTables::of($clubs)
                              ->addColumn('actions', function ($club) {
                                    return view('clubs.partials.actions', compact('club'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('clubs.index');
      }

      public function create() {
            return view('clubs.create');
      }

      public function store(Request $request) {
            $validated = $this->validateData($request);
            Club::create($validated);
            return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
      }

      public function show(Club $club) {
            return view('clubs.show', compact('club'));
      }

      public function edit(Club $club) {
            return view('clubs.edit', compact('club'));
      }

      public function update(Request $request, Club $club) {
            $validated = $this->validateData($request);
            $club->update($validated);
            return redirect()->route('clubs.index')->with('success', 'Club updated successfully.');
      }

      public function destroy(Club $club) {
            $club->delete();
            return redirect()->route('clubs.index')->with('success', 'Club deleted.');
      }

      private function validateData(Request $request) {
            return $request->validate([
                            'account_name' => 'required|string|max:255',
                            'type' => 'nullable|string|max:100',
                            'parent_account' => 'nullable|string|max:100',
                            'district' => 'nullable|string|max:100',
                            'region_zone' => 'nullable|string|max:100',
                            'lion_id' => 'nullable|string|max:50',
                            'charter_established_date' => 'nullable|date',
                            'active_member_count' => 'nullable|integer',
                            'club_specialty' => 'nullable|string|max:255',
                            'club_sub_specialty' => 'nullable|string|max:255',
                            'specialty_description' => 'nullable|string',
                            'description' => 'nullable|string',
                            'website' => 'nullable|url|max:255',
                            'meeting_place' => 'nullable|string|max:255',
                            'meeting_week' => 'nullable|string|max:100',
                            'meeting_day' => 'nullable|string|max:50',
                            'meeting_time' => 'nullable|string|max:50',
                            'meeting_street' => 'nullable|string|max:255',
                            'meeting_city' => 'nullable|string|max:100',
                            'meeting_state' => 'nullable|string|max:100',
                            'meeting_zip' => 'nullable|string|max:20',
                            'meeting_country' => 'nullable|string|max:100',
                            'meeting_local_place' => 'nullable|string|max:255',
                            'meeting_local_street' => 'nullable|string|max:255',
                            'meeting_local_city' => 'nullable|string|max:100',
                            'meeting_local_zip' => 'nullable|string|max:20',
                            'meeting_local_state' => 'nullable|string|max:100',
                            'meeting_local_country' => 'nullable|string|max:100',
                            'online_meeting_1' => 'nullable|url|max:255',
                            'online_meeting_1_place' => 'nullable|string|max:255',
                            'online_meeting_1_address' => 'nullable|string|max:255',
                            'meeting2_place' => 'nullable|string|max:255',
                            'meeting2_week' => 'nullable|string|max:100',
                            'meeting2_day' => 'nullable|string|max:50',
                            'meeting2_time' => 'nullable|string|max:50',
                            'meeting2_street' => 'nullable|string|max:255',
                            'meeting2_city' => 'nullable|string|max:100',
                            'meeting2_state' => 'nullable|string|max:100',
                            'meeting2_zip' => 'nullable|string|max:20',
                            'meeting2_country' => 'nullable|string|max:100',
                            'meeting2_local_place' => 'nullable|string|max:255',
                            'meeting2_local_street' => 'nullable|string|max:255',
                            'meeting2_local_city' => 'nullable|string|max:100',
                            'meeting2_local_zip' => 'nullable|string|max:20',
                            'meeting2_local_state' => 'nullable|string|max:100',
                            'meeting2_local_country' => 'nullable|string|max:100',
                            'online_meeting_2' => 'nullable|url|max:255',
                            'online_meeting_2_place' => 'nullable|string|max:255',
            ]);
      }
}
