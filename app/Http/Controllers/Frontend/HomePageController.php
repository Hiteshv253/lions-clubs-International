<?php

// app/Http/Controllers/Frontend/HomePageController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

//use Illuminate\Support\Facades\Http;  // <--- THIS LINE IS REQUIRED
//use GuzzleHttp\Client;

class HomePageController extends Controller {

      public function submit(Request $request) {

            $data = $request->validate([
                      'name' => 'required|string|max:255',
                      'email' => 'required|email',
                      'phone' => 'nullable|string',
                      'project' => 'nullable|string',
                      'subject' => 'nullable|string',
                      'message' => 'required|string|max:2000',
            ]);

            // Send email
            Mail::raw("Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nProject: {$data['project']}\nMessage: {$data['message']}", function ($message) use ($data) {
                  $message->to('your@example.com')
                        ->subject($data['subject'] ?? 'New Inquiry');
            });

            return response()->json(['message' => 'Inquiry submitted successfully!']);
      }

//      public function fetchEvents() {
//            $client = new Client();
//            try {
//                  $res = $client->request('GET', 'http://127.0.0.1:9090/api/events');
//                  if ($res->getStatusCode() == 200) {
//                        $events = json_decode($res->getBody()->getContents(), true);
//                        return view('events.index', ['events' => $events]);
//                  } else {
//                        abort(500, 'Failed to fetch events.');
//                  }
//            } catch (\Exception $e) {
//                  abort(500, 'Error: ' . $e->getMessage());
//            }
//      }

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
}
