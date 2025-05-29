<?php

// app/Http/Controllers/Frontend/UserRegistrationController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserRegistrationController extends Controller {

      public function showForm() {
            return view('frontend.user_registration.form');
      }

      private function generateUniqueMemberId() {
            do {
                  $id = 'LCM-' . strtoupper(Str::random(10)); // Example: LCM-X9A2B1
            } while (User::where('membership_id', $id)->exists());

            return $id;
      }

      public function registration(Request $request) {



            //   hiteshv2531@yahoo.in
            // ✅ Step 1: Validate input
            $validator = Validator::make($request->all(), [
                            'first_name' => 'required|string|max:100',
                            'last_name' => 'required|string|max:100',
                            'email' => 'required|email|unique:users,email',
            ]);

            if ($validator->fails()) {
                  return redirect()->back()
                              ->withErrors($validator)
                              ->withInput();
            }
            // ✅ Step 2: Generate unique membership ID
            $lastUser = User::whereNotNull('membership_id')->latest('id')->first();
            $nextNumber = $lastUser && preg_match('/LC2025(\d{4})/', $lastUser->membership_id, $matches) ? (int) $matches[1] + 1 : 1;

            $membershipId = 'LC2025' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            // ✅ Step 3: Generate password
            $passwordPlain = Str::random(10);
            $passwordHashed = Hash::make($passwordPlain);

            // ✅ Step 4: Create user
            $user = User::create([
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'email' => $request->email,
                            'membership_id' => $membershipId,
                            'password' => $passwordHashed,
            ]);

            // ✅ Step 5: Generate unique member_id
            $user->membership_id = $this->generateUniqueMemberId(); // Implement this function
            // ✅ Step 6: Log the user in
//            Auth::login($user);
            // ✅ Step 7: Send credentials via email
            $login = route('login');
            Mail::raw("Dear {$user->first_name}"
                  . ",\n\nYour Email ID: {$request->email}\n"
                  . "\nYour Membership ID: {$membershipId}\nPassword: {$passwordPlain}"
                  . "\nPlease login with this URL {$login}",
                  function ($message) use ($user) {
                        $message->to($user->email)->subject('Lions Club Membership Details');
                  });

            // ✅ Step 8: Return response

            return view('pages.auth.register-success')->with([
                            'message' => 'Registration successful credentials sent via email . Redirecting to homepage...'
            ]);

//            return redirect()->route('home')->with('success', 'User registered and credentials sent via email!');
//            return redirect()->back()->with('success', 'User registered and credentials sent via email.');
      }
}
