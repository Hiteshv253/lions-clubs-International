<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventMaster;
use App\Models\EventRegistration;
use DB;
use Yajra\DataTables\Facades\DataTables;

class EventUserRegistrationController extends Controller {

      /**
       * Display a list of events that have registrations.
       */
      public function index(Request $request) {
            $query = EventMaster::withCount('registrations')
                  ->where('is_active', 0)
                  ->has('registrations');

            if ($request->filled('search')) {
                  $query->where('event_name', 'LIKE', '%' . $request->search . '%');
            }

            $event_registrations = $query->orderBy('id', 'desc')->get();

            // Summary stats
            $totalActiveEvents = EventMaster::where('is_active', 1)->count(); // active
            $totalInActiveEvents = EventMaster::where('is_active', 0)->count(); // inactive
            $totalEvents = EventMaster::count();
            $totalRegisteredUsers = EventRegistration::where('is_active', 0)->count();

            // 💰 Total collected from active events
            $totalCollectedFromActive = DB::table('event_registrations')
                  ->join('club_event_masters', 'event_registrations.event_id', '=', 'club_event_masters.id')
                  ->where('club_event_masters.is_active', 0)
                  ->sum('event_registrations.calculated_total');

            
            return view('events.EventUserRegistration.index', compact(
                        'totalEvents',
                        'totalInActiveEvents',
                        'totalActiveEvents',
                        'totalRegisteredUsers',
                        'event_registrations',
                        'totalCollectedFromActive'
            ));
      }

      /**
       * Show details of a specific event and its registrations.
       */
      public function showRegistrations($id) {
            $event = EventMaster::with('registrations')->findOrFail($id);
            return view('events.EventUserRegistration.event-details', compact('event'));
      }

      /**
       * Return event registrations as DataTable response.
       */
      public function getRegistrations($eventId) {
            $data = EventRegistration::where('event_id', $eventId)->select('*');

            return DataTables::of($data)
                        ->editColumn('created_at', function ($row) {
                              return $row->created_at->format('M d, Y h:i A');
                        })
                        ->make(true);
      }
}
