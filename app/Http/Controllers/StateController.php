<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\ZipCode;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $data = State::select(['id', 'name', 'created_at']);
                  return DataTables::of($data)
                              ->addColumn('action', function ($row) {
                                    return view('states.partials.actions', compact('row'))->render();
                              })
                              ->rawColumns(['action'])
                              ->make(true);
            }

            return view('states.index');
      }

      public function create() {
            return view('states.create');
      }

      public function store(Request $request) {
            $request->validate(['name' => 'required']);
            State::create($request->all());
            return redirect()->route('states.index')->with('success', 'State created.');
      }

      public function edit(State $state) {
            return view('states.edit', compact('state'));
      }

      public function update(Request $request, State $state) {
            $request->validate(['name' => 'required']);
            $state->update($request->all());
            return redirect()->route('states.index')->with('success', 'State updated.');
      }

      public function destroy(State $state) {
            $state->delete();
            return redirect()->route('states.index')->with('success', 'State deleted.');
      }
}
