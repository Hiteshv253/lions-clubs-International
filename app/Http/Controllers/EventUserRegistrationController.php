<?php

namespace App\Http\Controllers;

use App\Models\EventMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Models\User;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Validator;

class EventUserRegistrationController extends Controller {

      /**
       * Display a listing of events.
       */
      public function index(Request $request) {
            $query = EventMaster::withCount('registrations');

            if ($request->has('search') && $request->search) {
                  $query->where('event_name', 'LIKE', '%' . $request->search . '%');
            }

            $event_registrations = $query->get();
            $totalActiveEvents = EventMaster::where('is_active', 0)->count();
            $totalRegisteredUsers = \App\Models\EventRegistration::count();
            return view('events.EventUserRegistration.index', compact('event_registrations', 'totalActiveEvents', 'totalRegisteredUsers'));
      }

//            $event_registrations = EventMaster::withCount('registrations')->get();
//
//            return view('events.EventUserRegistration.index', compact('event_registrations'));
//      }

      public function showRegistrations($id) {
            $event = EventMaster::with('registrations')->findOrFail($id);
            return view('events.EventUserRegistration.event-details', compact('event'));
      }

      public function getRegistrations($eventId) {
            $data = EventRegistration::where('event_id', $eventId)->select(['id', 'name', 'email', 'created_at']);
            return DataTables::of($data)
                        ->editColumn('created_at', function ($row) {
                              return $row->created_at->format('M d, Y h:i A');
                        })
                        ->make(true);
      }
}
