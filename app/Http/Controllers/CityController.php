<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\ZipCode;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $cities = City::with('state')->select('cities.*');

                  return DataTables::of($cities)
                              ->addIndexColumn() // This adds DT_RowIndex for serial numbers
                              ->addColumn('state_name', function ($city) {
                                    return $city->state->name ?? '';
                              })
                              ->addColumn('actions', function ($city) {
                                    $editUrl = route('cities.edit', $city->id);
                                    $deleteUrl = route('cities.destroy', $city->id);

                                    $csrf = csrf_field();
                                    $method = method_field('DELETE');

                                    return '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . $deleteUrl . '" method="POST" class="d-inline" onsubmit="return confirm(\'Are you sure?\');">
                        ' . $csrf . $method . '
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                ';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('cities.index');
      }

      public function create() {
            $states = State::all();
            return view('cities.create', compact('states'));
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'state_id' => 'required|exists:states,id',
            ]);

            City::create($request->only('name', 'state_id'));

            return redirect()->route('cities.index')->with('success', 'City created successfully.');
      }

      public function edit(City $city) {
            $states = State::all();
            return view('cities.edit', compact('city', 'states'));
      }

      public function update(Request $request, City $city) {
            $request->validate([
                      'name' => 'required|string|max:255',
                      'state_id' => 'required|exists:states,id',
            ]);

            $city->update($request->only('name', 'state_id'));

            return redirect()->route('cities.index')->with('success', 'City updated successfully.');
      }

      public function destroy(City $city) {
            $city->delete();
            return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
      }
}
