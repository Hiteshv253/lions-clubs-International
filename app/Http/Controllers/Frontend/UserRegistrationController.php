<?php

// app/Http/Controllers/Frontend/UserRegistrationController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserRegistrationController extends Controller {

      public function showForm() {
            return view('frontend.user_registration.form');
      }

      public function register(Request $request) {
            $request->validate([
                      'first_name' => 'required|string|max:100',
                      'last_name' => 'required|string|max:100',
                      'email' => 'required|email|unique:users,email',
            ]);

            // Generate unique membership ID
            $lastUser = User::latest()->first();
            $nextNumber = $lastUser ? (int) substr($lastUser->membership_id, 6) + 1 : 1;
            $membershipId = 'LC2025' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            // Generate password
            $passwordPlain = Str::random(8);
            $passwordHashed = Hash::make($passwordPlain);

            $user = User::create([
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'email' => $request->email,
                            'membership_id' => $membershipId,
                            'password' => $passwordHashed,
            ]);

            // Send email
            Mail::raw("Dear {$user->first_name},\n\nYour Membership ID: {$membershipId}\nPassword: {$passwordPlain}", function ($message) use ($user) {
                  $message->to($user->email)->subject('Lions Club Membership');
            });

            return redirect()->back()->with('success', 'User registered and credentials sent via email.');
      }
}
