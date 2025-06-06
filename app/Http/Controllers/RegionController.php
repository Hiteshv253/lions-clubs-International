<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;

class RegionController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = Region::with('parent');

                  if ($request->filled('name')) {
                        $query->where('name', $request->name); // exact match for dropdown
                  }

                  return DataTables::of($query)
                              ->addColumn('parent', fn($region) => $region->parent->name ?? '—')
                              ->addColumn('actions', fn($region) => view('regions.partials.actions', compact('region'))->render())
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            // For dropdown filter
            $allRegionNames = Region::pluck('name')->unique();

            return view('regions.index', compact('allRegionNames'));
      }

      public function create() {
            $parents = Region::all();
            return view('regions.create', compact('parents'));
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string',
                      'parent_id' => 'nullable|exists:regions,id'
            ]);

            Region::create($request->only('name', 'parent_id'));
            return redirect()->route('regions.index');
      }

      public function edit(Region $region) {
            $parents = Region::where('id', '!=', $region->id)->get(); // avoid circular ref
            return view('regions.edit', compact('region', 'parents'));
      }
      public function show(Region $region) {
            $parents = Region::where('id', '!=', $region->id)->get(); // avoid circular ref
            return view('regions.show', compact('region', 'parents'));
      }

      public function update(Request $request, Region $region) {
            $request->validate([
                      'name' => 'required|string',
                      'parent_id' => 'nullable|exists:regions,id|not_in:' . $region->id
            ]);

            $region->update($request->only('name', 'parent_id'));
            return redirect()->route('regions.index');
      }

      public function destroy(Region $region) {
            $region->delete();
            return redirect()->route('regions.index');
      }
}
