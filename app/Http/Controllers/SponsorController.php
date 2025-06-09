<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = Sponsor::query();

                  if ($request->has('type') && $request->type != '') {
                        $query->where('type', $request->type);
                  }

                  return DataTables::of($query)
                              ->addColumn('is_active', fn($row) => $row->is_active ? 'Yes' : 'No')
                              ->addColumn('actions', function ($row) {
                                    return view('sponsors.partials.actions', compact('row'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('sponsors.index');
      }

      public function create() {
            return view('sponsors.create');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required',
                      'logo' => 'nullable|image',
                      'website' => 'nullable|url',
            ]);

            $data = $request->all();

            // Handle file upload
            if ($request->hasFile('logo')) {
                  $data['logo'] = $request->file('logo')->store('sponsors', 'public');
            }

            Sponsor::create($data);

            return redirect()->route('sponsors.index')->with('success', 'Sponsor added.');
      }

      public function show(Sponsor $sponsor) {
            return view('sponsors.show', compact('sponsor'));
      }

      public function edit(Sponsor $sponsor) {
            return view('sponsors.edit', compact('sponsor'));
      }

      public function update(Request $request, Sponsor $sponsor) {
            $request->validate([
                      'name' => 'required',
                      'logo' => 'nullable|image',
                      'website' => 'nullable|url',
            ]);

            $data = $request->all();

            if ($request->hasFile('logo')) {
                  $data['logo'] = $request->file('logo')->store('sponsors', 'public');
            }

            $sponsor->update($data);

            return redirect()->route('sponsors.index')->with('success', 'Sponsor updated.');
      }

      public function destroy(Sponsor $sponsor) {
            $sponsor->delete();
            return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted.');
      }
}
