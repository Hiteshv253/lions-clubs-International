<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class OccupationController extends Controller {

      public function index(Request $request) {
//            $occupations = Occupation::all();
//            return view('occupations.index', compact('occupations'));

            if ($request->ajax()) {
                  $data = Occupation::select('id', 'name');
                  return DataTables::of($data)
                              ->addColumn('actions', function ($row) {
                                    return view('occupations.partials.actions', compact('row'))->render();
                              })
                              ->editColumn('is_active', function ($row) {
                                    return $row->is_active ? 'Yes' : 'No';
                              })
                              ->rawColumns(['actions']) // To render HTML
                              ->make(true);
            }

            return view('occupations.index');
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

      public function bulkDelete(Request $request) {
            $ids = $request->input('ids', []);
            if (!empty($ids)) {
                  Occupation::whereIn('id', $ids)->delete();
                  return response()->json(['message' => 'Selected occupations deleted successfully.']);
            }

            return response()->json(['message' => 'No IDs provided.'], 400);
      }
}
