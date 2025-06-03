<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller {

      public function index() {
            return view('districts.index');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required',
                      'state_id' => 'required|exists:states,id',
            ]);

            $district = District::create($request->only(['name', 'state_id']));

            return response()->json(['message' => 'District added successfully', 'district' => $district]);
      }

      public function list() {
            $data = District::with('state')->select('districts.*');

            return datatables()->of($data)
                        ->addColumn('state_name', fn($row) => $row->state->name)
                        ->make(true);
      }

      public function getStates() {
            return response()->json(State::all());
      }

      public function list() {
            $data = District::with('state')->select('districts.*');

            return datatables()->of($data)
                        ->addColumn('state_name', fn($row) => $row->state->name)
                        ->make(true);
      }
}
