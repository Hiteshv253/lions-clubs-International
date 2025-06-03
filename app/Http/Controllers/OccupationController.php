<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller {

      public function index() {
            $occupations = Occupation::all();
            return view('occupations.index', compact('occupations'));
      }

      public function create() {
            return view('occupations.create');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|string|max:255',
            ]);

            Occupation::create($request->all());
            return redirect()->route('occupations.index')->with('success', 'Occupation created successfully.');
      }

      public function show(Occupation $occupation) {
            return view('occupations.show', compact('occupation'));
      }

      public function edit(Occupation $occupation) {
            return view('occupations.edit', compact('occupation'));
      }

      public function update(Request $request, Occupation $occupation) {
            $request->validate([
                      'name' => 'required|string|max:255',
            ]);

            $occupation->update($request->all());
            return redirect()->route('occupations.index')->with('success', 'Occupation updated successfully.');
      }

      public function destroy(Occupation $occupation) {
            $occupation->delete();
            return redirect()->route('occupations.index')->with('success', 'Occupation deleted successfully.');
      }
}
