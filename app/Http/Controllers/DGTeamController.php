<?php

namespace App\Http\Controllers;

use App\Models\DgTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DGTeamController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = DgTeam::query();

                  // Apply designation filter if provided
                  if ($request->has('designation') && $request->designation != '') {
                        $query->where('designation', $request->designation);
                  }

                  return DataTables::of($query)
                              ->addColumn('actions', function ($row) {
                                    return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
                                    // Or use a view partial like:
                                    // return view('dg-teams.partials.actions', compact('row'))->render();
                              })
                              ->editColumn('is_active', function ($row) {
                                    return $row->is_active ? 'Yes' : 'No';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            // Get distinct designations to populate the dropdown
            $designations = DgTeam::select('designation')
                  ->distinct()
                  ->orderBy('designation')
                  ->pluck('designation');

            return view('dg-teams.index', compact('designations'));
      }

//      public function index() {
//            $teams = DgTeam::latest()->paginate(10);
//            return view('dg-teams.index', compact('teams'));
//      }

      public function create() {
            return view('dg-teams.create');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:100',
                      'email' => 'required|email|unique:d_g_teams,email',
                      'designation' => 'required|string|max:100',
                      'phone' => 'required|string|max:20',
                      'address' => 'required|string|max:255',
            ]);

            DgTeam::create($request->all());

            return redirect()->route('dg-teams.index')
                        ->with('success', 'DG Team member created successfully.');
      }

      public function show(DGTeam $dgTeam) {
            return view('dg-teams.show', compact('dgTeam'));
      }

      public function edit(DGTeam $dgTeam) {
            return view('dg-teams.edit', compact('dgTeam'));
      }

      public function update(Request $request, DGTeam $dgTeam) {
            $request->validate([
                      'name' => 'required|string|max:100',
                      'email' => 'required|email|unique:d_g_teams,email,' . $dgTeam->id,
                      'designation' => 'required|string|max:100',
                      'phone' => 'required|string|max:20',
                      'address' => 'required|string|max:255',
            ]);

            $dgTeam->update($request->all());

            return redirect()->route('dg-teams.index')
                        ->with('success', 'DG Team member updated successfully.');
      }

      public function destroy(DGTeam $dgTeam) {
            $dgTeam->delete();

            return redirect()->route('dg-teams.index')
                        ->with('success', 'DG Team member deleted successfully.');
      }
}
