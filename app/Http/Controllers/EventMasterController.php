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
use Illuminate\Support\Facades\Validator;

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
            if ($request->ajax()) {
                  $data = EventMaster::select('id', 'event_name', 'date_time', 'is_active');
                  return DataTables::of($data)
                              ->addColumn('actions', function ($row) {
                                    return view('events.partials.actions', compact('row'))->render();
                              })
                              ->editColumn('is_active', function ($row) {
                                    return $row->is_active ? 'Yes' : 'No';
                              })
                              ->rawColumns(['actions']) // To render HTML
                              ->make(true);
            }

            return view('events.index');
      }

      /**
       * Show the form for creating a new event.
       */
      public function create() {
            return view('events.create');
      }

      /**
       * Store a newly created event.
       */
      public function store(Request $request) {
            $data = $request->validate([
                      'event_name' => 'required|string|max:255',
                      'date_time' => 'required|date',
                      'description' => 'nullable|string',
                      'image' => 'nullable|image|max:2048',
                      'banner_image' => 'nullable|image|max:4096',
                      'is_active' => 'required|boolean',
            ]);

            // Handle file uploads, if any:
            if ($request->hasFile('image')) {
                  $path = $request->file('image')->store('events/images', 'public');
                  $data['image'] = $path;
            }

            if ($request->hasFile('banner_image')) {
                  $path = $request->file('banner_image')->store('events/banners', 'public');
                  $data['banner_image'] = $path;
            }

            // Assume currently authenticated user creates:
            $data['is_create_by'] = auth()->id();

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
            return redirect()->route('events.index')
                        ->with('success', 'Event created successfully.');
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
                      'date_time' => 'required|date',
                      'description' => 'nullable|string',
                      'image' => 'nullable|image|max:2048',
                      'banner_image' => 'nullable|image|max:4096',
                      'is_active' => 'required|boolean',
            ]);

            if ($request->hasFile('image')) {
                  // Delete old file if exists
                  if ($event->image) {
                        Storage::disk('public')->delete($event->image);
                  }
                  $data['image'] = $request->file('image')->store('events/images', 'public');
            }

            if ($request->hasFile('banner_image')) {
                  if ($event->banner_image) {
                        Storage::disk('public')->delete($event->banner_image);
                  }
                  $data['banner_image'] = $request->file('banner_image')->store('events/banners', 'public');
            }

            $event->update($data);

            return redirect()->route('events.index')
                        ->with('success', 'Event updated successfully.');
      }

      /**
       * Remove the specified event.
       */
      public function destroy(EventMaster $event) {
            // Optionally delete images from storage
            if ($event->image) {
                  Storage::disk('public')->delete($event->image);
            }
            if ($event->banner_image) {
                  Storage::disk('public')->delete($event->banner_image);
            }

            $event->delete();

            return redirect()->route('events.index')
                        ->with('success', 'Event deleted successfully.');
      }
}
