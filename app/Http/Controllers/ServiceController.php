<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller {

      public function exportPDF() {
            $services = Service::all();
            $pdf = Pdf::loadView('services.pdf', compact('services'));
            return $pdf->download('services_list.pdf');
      }

      public function index(Request $request) {
            if ($request->ajax()) {
                  $query = Service::query();

                  if ($request->search['value']) {
                        $search = $request->search['value'];
                        $query->where(function ($q) use ($search) {
                              $q->where('title', 'like', "%{$search}%")
                                    ->orWhere('sponsor', 'like', "%{$search}%");
                        });
                  }

                  if ($request->start_date && $request->end_date) {
                        $query->whereBetween('start_date', [$request->start_date, $request->end_date]);
                  }

                  return datatables()->of($query)->make(true);
            }

            return view('services.index');
      }

      public function create() {
            return view('services.create');
      }

      public function store(Request $request) {
            $validated = $request->validate([
                      'report_type' => 'required|string|max:255',
                      'title' => 'required|string|max:255',
                      'sponsor' => 'required|string|max:255',
                      'start_date' => 'nullable|date',
                      'end_date' => 'nullable|date|after_or_equal:start_date',
                      'total_funds_donated_inr' => 'nullable|numeric',
                      'total_funds_donated_usd' => 'nullable|numeric',
                      'people_served' => 'nullable|integer',
                      'total_volunteer_hours' => 'nullable|numeric',
                      'total_funds_raised_inr' => 'nullable|numeric',
                      'total_funds_raised_usd' => 'nullable|numeric',
                      'non_lion_participants' => 'nullable|integer',
                      'non_lion_family_participants' => 'nullable|integer',
                      'trees_planted' => 'nullable|integer',
            ]);
            Service::create($validated + $request->except('_token'));

            return redirect()->route('services.index')->with('success', 'Service created successfully.');
      }

      public function edit(Service $service) {
            return view('services.edit', compact('service'));
      }

      public function show(Service $service) {
            return view('services.show', compact('service'));
      }

      public function update(Request $request, Service $service) {
            $data = $request->all();
            $service->update($data);
            return redirect()->route('services.index')->with('success', 'Service updated.');
      }

      public function destroy($id) {
            $service = Service::findOrFail($id);
            $service->delete();

            return response()->json(['success' => true]);
      }

      public function bulkDelete(Request $request) {
            $ids = $request->input('ids');
            Service::whereIn('id', $ids)->delete();

            return response()->json(['success' => true]);
      }
}
