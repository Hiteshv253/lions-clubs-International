<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\EventMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Models\User;
use App\Models\MemberMaster;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EventMasterController extends Controller {

      /**
       * Display a listing of events.
       */
//      public function index() {
//            // Paginate or get all
//            $events = EventMaster::select('id', 'event_name', 'date_time', 'is_active')
//                  ->orderByDesc('date_time')
//                  ->paginate(10); // or 25 for faster page loads
//
//            return view('events.index', compact('events'));
//      }

      public function registrationHistory() {
            $user = auth()->user();
            $events = $user->registeredEvents()->orderBy('pivot_registered_at', 'desc')->get();
            
            return view('events.history', compact('events'));
      }

      public function generatePdfCard($userId) {
            $user = User::findOrFail($userId);

            $qrData = route('event.registration.card', ['user' => $user->id]);
            $qrCode = QrCode::size(200)->format('png')->generate($qrData);
            $qrCodeBase64 = base64_encode($qrCode);

            $pdf = PDF::loadView('event.registration_card_pdf', compact('user', 'qrCodeBase64'));

            return $pdf->download('registration_card_' . $user->id . '.pdf');
      }

      public function index(Request $request) {
//            $memberRoleId = Role::where('name', 'member')->value('id');
//            $allmembers = MemberMaster::select('*')->distinct()->get();
//            $allmembers = MemberMaster::whereHas('user.roles', function ($query) use ($memberRoleId) {
//                        $query->where('id', $memberRoleId);
//                  })->distinct()->get();

            $allmembers = MemberMaster::whereHas('user', function ($query) {
                        $query->where('is_active', 0)->whereHas('roles', function ($q) {
                              $q->where('name', 'member');
                        });
                  })->get();

            if ($request->ajax()) {
                  $data = EventMaster::select('*');
                  return DataTables::of($data)
                              ->addColumn('actions', function ($row) use ($allmembers) {
                                    return view('events.partials.actions', compact('row', 'allmembers'))->render();
                              })
                              ->editColumn('is_active', function ($row) {
                                    return $row->is_active ? '1' : '0';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
            }

            return view('events.index');
      }

      /**
       * Show the form for creating a new event.
       */
      public function self_registraion_save(Request $request) {

            $event = EventMaster::findOrFail($request->event_id);

            $totalAmount = $event->total_amount * $request->number_of_persons;

            EventRegistration::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'contact_number' => $request->contact_number,
                      'event_id' => $request->event_id,
                      'user_id' => $request->membership_id,
                      'number_of_persons' => $request->number_of_persons,
                      'calculated_total' => $totalAmount,
                      'is_active' => '0',
                      'flag' => '1',
            ]);

            // Update event registration counts
            $event->update([
                      'total_registered_user' => $event->total_registered_user + $request->number_of_persons,
                      'total_pendding_users' => max(0, $event->total_event_users - ($event->total_registered_user + $request->number_of_persons)),
            ]);

            Mail::raw(
                  "Dear {$request->name},\n\nYou have successfully registered for the event: {$event->event_name}\nDate & Time: {$event->date_time}",
                  function ($message) use ($request) {
                        $message->to($request->email)
                              ->subject('Event Registration Confirmation');
                  }
            );
            return redirect()->route('events.index')->with('success', 'Event Registered successfully.');
      }

      public function self_registraion($id) {
            $event = EventMaster::findOrFail($id);
            $allmembers = MemberMaster::select('*')->distinct()->get();

            return view('events.EventSelf_Registration.create', compact('event', 'allmembers'));
      }

      public function create() {
            return view('events.create');
      }

      /**
       * Store a newly created event.
       */
      public function store(Request $request) {

            $data = $request->validate([
                      'event_name' => 'required|string|max:255',
                      'event_start_date' => 'required|date',
                      'event_end_date' => 'required|date|after_or_equal:event_start_date',
                      'total_amount' => 'required|numeric|min:0|max:100000',
                      'total_event_users' => 'required|numeric|min:0|max:1000',
            ]);

            // Handle file uploads, if any:
            if ($request->hasFile('image')) {
                  $path = $request->file('image')->store('events/images', 'public');
                  $data['image'] = $path;
            }


            $data['is_create_by'] = auth()->id();
            $data['is_active'] = $request->is_active;
            $data['flag_id'] = 1;
            $data['description'] = $request->description;
            $data['venue_name'] = $request->venue_name;
            $data['total_pendding_users'] = $request->total_event_users;
            // Create event record and get the created event model
            $event = EventMaster::create($data);

            // Generate unique QR code data for this event's registration card URL
//            $qrData = route('event.registration.card', ['event' => $event->id]);
//
//
//            // Generate QR code as PNG base64 string
//            $qrCode = QrCode::size(200)->format('png')->generate($qrData);
//            $qrCodeBase64 = base64_encode($qrCode);
            // Optionally: You can save $qrCodeBase64 in DB or pass it to a view here
            // For example: $event->qr_code = $qrCodeBase64; $event->save();
            // For now, just redirect back with success message
            return redirect()->route('events.index')->with('success', 'Event created successfully.');
      }

      /**
       * Display the specified event.
       */
      public function show(EventMaster $event) {
            return view('events.show', compact('event'));
      }

      /**
       * Show the form for editing the event.
       */
      public function edit(EventMaster $event) {
            return view('events.edit', compact('event'));
      }

      /**
       * Update the specified event in storage.
       */
      public function update(Request $request, EventMaster $event) {

            $data = $request->validate([
                      'event_name' => 'required|string|max:255',
                      'event_start_date' => 'required|date',
                      'event_end_date' => 'required|date|after_or_equal:event_start_date',
                      'total_amount' => 'required|numeric|min:0|max:100000',
                      'total_event_users' => 'required|numeric|min:0|max:1000',
            ]);

            if ($request->hasFile('image')) {
                  // Delete old file if exists
                  if ($event->image) {
                        Storage::disk('public')->delete($event->image);
                  }
                  $data['image'] = $request->file('image')->store('events/images', 'public');
            }

            $data['is_active'] = $request->is_active;
            $data['flag_id'] = 1;
            $data['description'] = $request->description;
            $data['venue_name'] = $request->venue_name;
            $data['total_event_users'] = $request->total_event_users;
            $data['total_registered_user'] = $request->total_registered_user;
            $data['total_pendding_users'] = $request->total_event_users;
            $data['limited_sheet'] = $request->limited_sheet;
            $event->update($data);

            return redirect()->route('events.index')->with('success', 'Event updated successfully.');
      }

      /**
       * Remove the specified event.
       */
      public function destroy(EventMaster $event) {
            // Optionally delete images from storage
            if ($event->image) {
                  Storage::disk('public')->delete($event->image);
            }


            EventRegistration::where($event->event_id)->delete();
            $event->delete();

            return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
      }
}
