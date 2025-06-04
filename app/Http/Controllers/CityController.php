<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\ZipCode;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller {

      public function index() {
            $cities = City::with('state')->paginate(10);
            return view('cities.index', compact('cities'));
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
