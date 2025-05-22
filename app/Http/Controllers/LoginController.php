<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {    
        // Validate input
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
    

        if ($validator->fails()) {
            return back()->withErrors([
                'unsuccessful' => 'Navedeni podaci ne odgovaraju našim zapisima.'
            ])->withInput();
        }

        $credentials = $validator->validated();

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // Check if user is not active (not verified)
            if ($user->email_verified_at === null) {
                Auth::logout();
                $request->session()->put('user', $user);
                return redirect()->route('verification.notice')->withErrors(['email' => 'Vaš račun nije potvrđen. Molimo potvrdite svoju e-mail adresu.']);                
            }
    
            return redirect()->intended('/');
        }
    
        // If authentication fails
        return back()->withErrors([
            'unsuccessful' => 'Navedeni podaci ne odgovaraju našim zapisima.',
        ])->withInput();
    }
    

    public function logout(Request $request) {    
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
