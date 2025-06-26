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
                  $clubs = Club::with('zone.region.district');

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
                      'charter_date' => 'nullable|date',
                      'inauguration_date_club' => 'nullable|date',
                      'about_club' => 'nullable|string',
//                      'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($request->hasFile('image')) {
                  $validated['image'] = $request->file('image')->store('clubs', 'public');
            }

            Club::create($validated);

            return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
      }

      public function edit(Club $club) {
            $districts = District::with('regions.zones')->get();
            return view('clubs.edit', compact('club', 'districts'));
      }

      public function show(Club $club) {
            $districts = District::with('regions.zones')->get();
            return view('clubs.show', compact('club', 'districts'));
      }

      public function update(Request $request, Club $club) {
            $request->validate([
                      'zone_id' => 'required|exists:zones,id',
                      'name' => 'required|string|max:255',
            ]);

            $club->update($request->all());
            return redirect()->route('clubs.index');
      }

      public function destroy(Club $club) {
            $club->delete();
            return redirect()->route('clubs.index');
      }
}
