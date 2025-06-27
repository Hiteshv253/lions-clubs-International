<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Region;
use Illuminate\Http\Request;

class ZoneController extends Controller {

      public function getZonesByRegion($regionId) {
            $zones = \App\Models\Zone::where('region_id', $regionId)->pluck('name', 'id');
            return response()->json($zones);
      }

      public function getByRegion($regionId) {
            $zones = Zone::where('region_id', $regionId)
                  ->select('id', 'name')
                  ->orderBy('name')
                  ->get();

            return response()->json($zones);
      }

      public function index(Request $request) {
            if ($request->ajax()) {
                  $zones = Zone::with('region')->select('zones.*');
                  return datatables()->of($zones)
                              ->addIndexColumn()
                              ->addColumn('region_name', fn($zone) => $zone->region->name ?? '—')
                              ->addColumn('actions', function ($zone) {
                                    return view('zones.partials.actions', compact('zone'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('zones.index');
      }

      public function create() {
            $regions = Region::all();
            return view('zones.create', compact('regions'));
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'is_active' => 'required',
                      'region_id' => 'required|exists:regions,id',
            ]);

            Zone::create($request->only('name', 'region_id', 'is_active'));

            return redirect()->route('zones.index')->with('success', 'Zone created successfully.');
      }

      public function edit(Zone $zone) {
            $regions = Region::all();
            return view('zones.edit', compact('zone', 'regions'));
      }

      public function update(Request $request, Zone $zone) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'is_active' => 'required',
                      'region_id' => 'required|exists:regions,id',
            ]);

            $zone->update($request->only('name', 'region_id', 'is_active'));

            return redirect()->route('zones.index')->with('success', 'Zone updated successfully.');
      }

      public function destroy(Zone $zone) {
            $zone->delete();
            return redirect()->route('zones.index')->with('success', 'Zone deleted successfully.');
      }
}
