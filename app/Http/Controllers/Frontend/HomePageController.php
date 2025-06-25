<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EventMaster;
use App\Models\EventRegistration;
use App\Models\FooterMessage;
use App\Models\MemberMaster;
use App\Models\Region;
use App\Models\Zone;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller {

      public function home() {
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

      public function event(Request $request) {
            if ($request->ajax()) {
                  $offset = $request->get('offset', 0);
                  $events = EventMaster::orderBy('date_time', 'desc')
                        ->where('is_active', 0)
                        ->skip($offset)
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

            $fetchEvents = EventMaster::where('is_active', 0)
                  ->orderBy('date_time', 'desc')
                  ->take(8)
                  ->get();

            return view('frontend.event.index', compact('fetchEvents'));
      }

      public function show_event($id) {
            $event = EventMaster::findOrFail($id);
            return view('frontend.event.event-details', compact('event'));
      }

      public function event_register(Request $request) {
//            $validated = $request->validate([
//                      'name' => 'required|string|max:255',
//                      'email' => 'required|email|max:255',
//                      'contact_number' => 'required|string|max:20',
//                      'event_id' => 'required|exists:event_masters,id',
//                      'number_of_persons' => 'required|integer|min:1',
//            ]);

            $event = EventMaster::findOrFail($request->event_id);
            $totalAmount = $event->total_amount * $request->number_of_persons;

            EventRegistration::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'contact_number' => $request->contact_number,
                      'event_id' => $request->event_id,
                      'user_id' => Auth::id(),
                      'number_of_persons' => $request->number_of_persons,
                      'calculated_total' => $totalAmount,
                      'is_active' => '0',
            ]);

            Mail::raw(
                  "Dear {$request->name},\n\nYou have successfully registered for the event: {$event->event_name}\nDate & Time: {$event->date_time}",
                  function ($message) use ($request) {
                        $message->to($request->email)
                              ->subject('Event Registration Confirmation');
                  }
            );

            return view('pages.auth.event-success')->with([
                            'message' => 'You have successfully registered for the event. Redirecting to event page...'
            ]);
      }

      public function footer_store(Request $request) {
            FooterMessage::create([
                      'name' => $request->name,
                      'email' => $request->email,
                      'message' => $request->message,
                      'inquery_from' => 1,
                      'contact_no' => $request->contact_no,
            ]);

            return response()->json(['success' => true, 'message' => 'Thank you! Message sent.']);
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
                      'contact_no' => $request->phone,
            ]);

            Mail::raw("Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nMessage: {$data['message']}", function ($message) use ($data) {
                  $message->to('your@example.com')->subject('New Inquiry');
            });

            return response()->json(['message' => 'Inquiry submitted successfully!']);
      }

      public function members_ui() {
            return view('frontend.members-ui.index', [
                      'members' => MemberMaster::with(['region', 'zone', 'club', 'city', 'state', 'occupation'])->paginate(5),
                      'regions' => Region::all(),
                      'zones' => Zone::all(),
                      'clubs' => Club::all(),
            ]);
      }

      public function ajax(Request $request) {
            $query = MemberMaster::with(['region', 'zone', 'club', 'state', 'city', 'occupation']);

            if ($request->filled('search')) {
                  $query->where(function ($q) use ($request) {
                        $q->where('first_name', 'like', "%{$request->search}%")
                              ->orWhere('last_name', 'like', "%{$request->search}%")
                              ->orWhere('mobile', 'like', "%{$request->search}%");
                  });
            }

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
                            'hasMore' => $members->hasMorePages(),
            ]);
      }

      public function event_card($id) {
            $event = EventMaster::findOrFail($id);
            return view('events.card', compact('event'));
      }
}
