<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DistrictController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $districts = District::with('state')->select('districts.*');

                  if ($request->has('state_id') && $request->state_id != '') {
                        $districts->where('state_id', $request->state_id);
                  }

                  return DataTables::of($districts)
                              ->addIndexColumn()
                              ->addColumn('state_name', fn($row) => $row->state->name ?? '—')
                              ->addColumn('actions', function ($row) {
                                    return view('districts.partials.actions', compact('row'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            $states = State::orderBy('name')->get(); // for dropdown
            return view('districts.index', compact('states'));
      }

      public function create() {
            $states = State::all();
            return view('districts.create', compact('states'));
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required',
                      'state_id' => 'required|exists:states,id',
            ]);

            District::create($request->only(['name', 'state_id']));
            return redirect()->route('districts.index')->with('success', 'District added successfully');
      }

      public function edit(District $district) {
            $states = State::all();
            return view('districts.edit', compact('district', 'states'));
      }

      public function update(Request $request, District $district) {
            $request->validate([
                      'name' => 'required',
                      'state_id' => 'required|exists:states,id',
            ]);

            $district->update($request->only(['name', 'state_id']));
            return redirect()->route('districts.index')->with('success', 'District updated successfully');
      }

      public function destroy(District $district) {
            $district->delete();
            return redirect()->route('districts.index')->with('success', 'District deleted');
      }

      public function getStates() {
            return response()->json(State::all());
      }
}
