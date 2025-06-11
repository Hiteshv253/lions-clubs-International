<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\District;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RegionController extends Controller {

      public function getByDistrict($district_id) {
            return response()->json(Region::where('district_id', $district_id)->get());
      }

      public function index(Request $request) {
            if ($request->ajax()) {
                  $regions = Region::with('district')
                        ->when($request->district_id, function ($query, $districtId) {
                              $query->where('district_id', $districtId);
                        })
                        ->select('regions.*');

                  return DataTables::of($regions)
                              ->addIndexColumn()
                              ->addColumn('district_name', fn($row) => $row->district->name ?? '—')
                              ->addColumn('actions', fn($row) => View::make('regions.partials.actions', ['region' => $row])->render())
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            $districts = District::all();
            return view('regions.index', compact('districts'));
      }

      public function create() {
            $districts = District::all();
            return view('regions.create', compact('districts'));
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string',
            ]);

            Region::create($request->only('name', 'district_id'));
            return redirect()->route('regions.index');
      }

      public function edit(Region $region) {
            $districts = District::all();
            return view('regions.edit', compact('region', 'districts'));
      }

      public function show(Region $region) {
            $parents = Region::where('id', '!=', $region->id)->get(); // avoid circular ref
            return view('regions.show', compact('region', 'parents'));
      }

      public function update(Request $request, Region $region) {
            $request->validate([
                      'name' => 'required|string',
//                      'parent_id' => 'nullable|exists:regions,id|not_in:' . $region->id
            ]);

            $region->update($request->only('name', 'district_id'));
            return redirect()->route('regions.index');
      }

      public function destroy(Region $region) {
            $region->delete();
            return redirect()->route('regions.index');
      }
}
