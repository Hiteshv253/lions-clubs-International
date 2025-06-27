<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Region;
use App\Models\District;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller {

      public function getByZone($zone_id) {
            return response()->json(Club::where('zone_id', $zone_id)->get());
      }

      public function index(Request $request) {
            if ($request->ajax()) {
//                  $clubs = Club::with('zone.region.district');
                  $clubs = Club::with('zone.region.district')
                        ->withCount('members'); // 👈 adds total_members


                  if ($request->region) {
                        $clubs->whereHas('zone.region', function ($q) use ($request) {
                              $q->where('name', $request->region);
                        });
                  }

                  if ($request->district) {
                        $clubs->whereHas('zone.region.district', function ($q) use ($request) {
                              $q->where('name', $request->district);
                        });
                  }

                  return DataTables::of($clubs)
                              ->addColumn('zone_name', fn($club) => $club->zone->name ?? '—')
                              ->addColumn('region_name', fn($club) => $club->zone->region->name ?? '—')
                              ->addColumn('district_name', fn($club) => $club->zone->region->district->name ?? '—')
                              ->addColumn('total_members', fn($club) => $club->members_count) // 👈 new column
                              ->addColumn('actions', function ($club) {
                                    return view('clubs.partials.actions', compact('club'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }
            $regions = Region::select('name')->distinct()->get();
            $districts = District::select('name')->distinct()->get();
            return view('clubs.index', compact('regions', 'districts'));
      }

      public function create() {
            $districts = District::with('regions.zones')->get();
            return view('clubs.create', compact('districts'));
      }

      public function store(Request $request) {
            $validated = $request->validate([
                      'name' => 'required|string|max:255',
                      'zone_id' => 'required|exists:zones,id',
                      'club_number' => 'required|string|max:50|unique:clubs,club_number',
                      'district' => 'required|string|max:255',
                      'region' => 'required|string|max:255',
                      'charter_date' => 'nullable|date',
                      'about_club' => 'nullable|string',
                      'is_active' => 'required|in:0,1',
                      'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                  $validated['image'] = $request->file('image')->store('clubs', 'public');
            }
            $validated['is_active'] = $request->is_active;
            $validated['inauguration_date_club'] = $request->inauguration_date_club;
            Club::create($validated);

            return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
      }

      public function edit(Club $club) {
            $districts = District::with('regions.zones')->get();
            return view('clubs.edit', compact('club', 'districts'));
      }

      public function show(Club $club) {
            $club->load('zone.region.district', 'members');
            $districts = District::with('regions.zones')->get();

            return view('clubs.show', compact('club', 'districts'));
      }

      function update(Request $request, Club $club) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'zone_id' => 'required|exists:zones,id',
                      'district' => 'required|string|max:255',
                      'region' => 'required|string|max:255',
                      'club_number' => 'required|string|max:50|unique:clubs,club_number,' . $club->id,
                      'charter_date' => 'nullable|date',
                      'inauguration_date_club' => 'nullable|date',
                      'about_club' => 'nullable|string',
                      'is_active' => 'required|in:0,1',
//                      'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            // Handle image if uploaded
            if ($request->hasFile('image')) {
                  $path = $request->file('image')->store('clubs', 'public');
                  $club->image = $path;
            }

            // Update other fields
            $club->name = $request->name;
            $club->zone_id = $request->zone_id;
            $club->club_number = $request->club_number;
            $club->charter_date = $request->charter_date;
            $club->inauguration_date_club = $request->inauguration_date_club;
            $club->about_club = $request->about_club;
            $club->is_active = $request->is_active;
            $club->save();

            return redirect()->route('clubs.index')->with('success', 'Club updated successfully.');
      }

      public function destroy(Club $club) {
            $club->delete();
            return redirect()->route('clubs.index');
      }
}
