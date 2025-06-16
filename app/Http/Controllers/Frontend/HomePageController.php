<?php

// app/Http/Controllers/Frontend/HomePageController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\EventMaster;
use App\Models\EventRegistration;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\FooterMessage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\MemberMaster;
use App\Models\Region;
use App\Models\Zone;
use App\Models\Club;

class HomePageController extends Controller {

      public function members_ui() {
            $members = \App\Models\MemberMaster::orderBy('id', 'desc')->get();

            return view('frontend.members-ui.index', [
                      'members' => MemberMaster::with(['region', 'zone', 'club', 'city', 'state', 'occupation'])->paginate(5),
                      'regions' => Region::all(),
                      'zones' => Zone::all(),
                      'clubs' => Club::all(),
            ]);
      }

      public function ajax(Request $request) {
            $query = MemberMaster::with(['region', 'zone', 'club', 'state', 'city', 'occupation']);

            // Search filter
            if ($request->filled('search')) {
                  $search = $request->search;
                  $query->where(function ($q) use ($search) {
                        $q->where('first_name', 'like', "%$search%")
                              ->orWhere('last_name', 'like', "%$search%")
                              ->orWhere('mobile', 'like', "%$search%");
                  });
            }

            // Dropdown filters
            if ($request->filled('region_id')) {
                  $query->where('region_id', $request->region_id);
            }
            if ($request->filled('zone_id')) {
                  $query->where('zone_id', $request->zone_id);
            }
            if ($request->filled('club_id')) {
                  $query->where('club_id', $request->club_id);
            }

            $members = $query->paginate(10);

            return response()->json([
                            'html' => view('frontend.members-ui.partials.members', ['members' => $members])->render(),
                            'hasMore' => $members->hasMorePages()
            ]);
      }

      public function home() {

//            return view('frontend.home_page.index', ['events' => $this->fetchEvents()]);
            return view('frontend.home_page.index');
      }

      public function about() {
            return view('frontend.about_page.index');
      }

      public function service() {
            return view('frontend.service_page.index');
      }

      public function contact() {
            return view('frontend.contact_page.index');
      }

      public function loadMore(Request $request) {

            $offset = $request->get('offset', 0);
            $limit = 8;

            $events = EventMaster::latest()->skip($offset)->take($limit)->get();

            $html = '';
            foreach ($events as $event) {
                  $html .= view('frontend.event.partials.event_card', ['event' => $event])->render();
            }

            return response()->json([
                            'html' => $html,
                            'count' => $events->count()
            ]);
      }

      public function event(Request $request) {

            if ($request->ajax()) {
                  $offset = $request->get('offset', 0);
                  $events = EventMaster::orderBy('date_time', 'desc')
                        ->skip($offset)
                        ->where('is_active', 0)
                        ->take(8)
                        ->get();

                  $html = '';
                  foreach ($events as $event) {
                        $html .= view('frontend.event.partials.event_card', compact('event'))->render();
                  }

                  return response()->json([
                                  'html' => $html,
                                  'count' => $events->count()
                  ]);
            }

// Initial 10
            $fetchEvents = EventMaster::orderBy('date_time', 'desc')->take(8)->get();

            return view('frontend.event.index', ['fetchEvents' => $fetchEvents]);
      }

      public function show_event($id) {
            $event = EventMaster::findOrFail($id);
            return view('frontend.event.event-details', compact('event'));
      }

      public function inquiry_store(Request $request) {

            $data = $request->validate([
                      'name' => 'required|string|max:255',
                      'email' => 'required|email',
                      'phone' => 'nullable|string',
                      'message' => 'required|string|max:2000',
            ]);

            FooterMessage::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'message' => $request->message,
                      'inquery_from' => 2,
                      'contact_no' => $request->phone, // <-- this must be present
            ]);

// Send email
            Mail::raw("Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nMessage: {$data['message']}", function ($message) use ($data) {
                  $message->to('your@example.com')
                        ->subject($data['subject'] ?? 'New Inquiry');
            });

            return response()->json(['message' => 'Inquiry submitted successfully!']);
      }

      public function footer_store(Request $request) {
//            dd($request->all());
//            $request->validate([
//                      'name' => 'required|string|max:255',
//                      'email' => 'required|email',
//                      'message' => 'required|string|max:1000',
//            ]);
//            'name', 'email', 'message', 'contact_no', 'inquery_from', 'is_active'
// Example: save to DB (you can adjust this)


            FooterMessage::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'message' => $request->message,
                      'inquery_from' => 1,
                      'contact_no' => $request->contact_no, // <-- this must be present
            ]);

            return response()->json(['success' => true, 'message' => 'Thank you! Message sent.']);
      }

      public function event_card($id) {
            $event = Event::findOrFail($id);
            return view('events.card', compact('event'));
      }

      public function register(Request $request) {
//            dd($request->all());
//            $data = $request->validate([
//                      'name' => 'required|string',
//                      'email' => 'required|email',
//                      'event_id' => 'required|exists:events,id'
//            ]);
            $data = [
                      'name' => $request->name,
                      'email' => $request->email,
                      'event_id' => $request->event_id,
                      'contact_number' => $request->contact_number,
            ];

            EventRegistration::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'event_id' => $request->event_id,
                      'contact_number' => $request->contact_number,
            ]);

            $event = EventMaster::find($request->event_id);
            $eventName = $event->event_name;
            $eventDateTime = $event->date_time;

            $messageBody = "Dear {$request->name},\n\n" .
                  "You have successfully registered for the event:\n" .
                  "{$eventName}\nDate & Time: {$eventDateTime}";

            Mail::raw($messageBody, function ($message) use ($request) {
                  $message->to($request->email)
                        ->subject('You have successfully registered for the event');
            });

//            //QR CODE
//            // Generate QR code content (e.g., event ID URL)
//            $qrData = route('events.show', $event->id);
//
//            // Define filename and store QR image
//            $filename = 'qr/event-' . $event->id . '.png';
//            $qrImage = QrCode::format('png')->size(300)->generate($qrData);
//            Storage::disk('public')->put($filename, $qrImage);
//
//            $registration = new EventRegistration();
//            $registration->name = $request->name;
//            $registration->email = $request->email;
//            $registration->contact_number = $request->contact_number;
//            $registration->event_id = $request->event_id;
//            $registration->event_qr_code = Str::uuid(); // or generate QR and store string
//            $registration->save();
// ✅ Step 8: Return response

            return view('pages.auth.event-success')->with([
                            'message' => 'You have successfully registered for the event . Redirecting to event page...'
            ]);

// Send mail
//            Mail::to($request->email)->send(new \App\Mail\EventRegistrationConfirmation($data));
//            return back()->with('success', 'Registered successfully! Check your email.');
      }
}
