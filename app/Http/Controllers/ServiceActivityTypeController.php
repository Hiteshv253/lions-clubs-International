<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\ServiceActivityType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceActivityTypeController extends Controller {

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = ServiceActivityType::query();

                  if ($request->has('type') && $request->type != '') {
                        $query->where('type', $request->type);
                  }

                  return DataTables::of($query)
                              ->addColumn('is_active', fn($row) => $row->is_active ? 'Yes' : 'No')
                              ->addColumn('actions', function ($row) {
                                    return view('service_activity_types.partials.actions', compact('row'))->render();
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('service_activity_types.index');
      }

      public function create() {
            return view('service_activity_types.create');
      }

      public function store(Request $request) {
            $request->validate([
                      'name' => 'required|unique:service_activity_types,name',
                      'description' => 'nullable',
            ]);

            ServiceActivityType::create($request->all());

            return redirect()->route('service-activity-types.index')->with('success', 'Activity type added.');
      }

      public function edit(ServiceActivityType $service_activity_type) {
            return view('service_activity_types.edit', compact('service_activity_type'));
      }

      public function update(Request $request, ServiceActivityType $service_activity_type) {
            $request->validate([
                      'name' => 'required|unique:service_activity_types,name,' . $service_activity_type->id,
                      'description' => 'nullable',
            ]);

            $service_activity_type->update($request->all());

            return redirect()->route('service-activity-types.index')->with('success', 'Activity type updated.');
      }

      public function destroy(ServiceActivityType $service_activity_type) {
            $service_activity_type->delete();

            return redirect()->route('service-activity-types.index')->with('success', 'Activity type deleted.');
      }
}
