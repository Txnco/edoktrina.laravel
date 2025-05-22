<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //Interaction with database


class SocialiteController extends Controller
{
    //

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication() {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
    
            // First, check if a user already exists with this email
            $user = User::where('email', $googleUser->user['email'])->first();
    
            // Extract user's first and last names safely
            $first_name = $googleUser->user['given_name'] ?? '';
            $last_name = $googleUser->user['family_name'] ?? '';
    
            if ($user) {
                // Update existing user with Google ID if not already set
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id;
                    $user->email_verified_at = now(); // Optional
                    $user->save();
                }
            } else {
                // Generate username (your existing logic)
                $username = $this->generateUsername($first_name, $last_name);
    
                // Create a new user clearly if none exists
                $user = User::create([
                    'username' => $username,
                    'first_name' => $first_name,
                    'last_name' =>  $last_name,
                    'email' => $googleUser->user['email'],
                    'email_verified_at' => now(),
                    'password' => null,
                    'google_id' => $googleUser->id,
                ]);
    
                // Assign default role explicitly
                if ($user->wasRecentlyCreated) {
                    $user->assignRole('user');
                }
            }
    
            // Finally, login user clearly
            Auth::login($user);
    
            return redirect()->route('landing.page');
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors([
                'unsuccessful' => 'Prijava preko Google računa nije uspela.'
            ]);
        }
    }
    

    private function generateUsername($firstName, $lastName)
    {
        $firstName = strtolower(preg_replace('/\s+/', '', $firstName));
        $lastName = strtolower(preg_replace('/\s+/', '', $lastName));
    
        $baseUsername = substr($firstName . $lastName, 0, 10);
    
        while (strlen($baseUsername) < 5) {
            $baseUsername .= rand(0,9);
        }
        $username = $baseUsername;
        $counter = 1;
    
        while (User::where('username', $username)->exists()) {
            $suffix = (string)$counter;
            $username = substr($baseUsername, 0, 10 - strlen($suffix)) . $suffix;
            $counter++;
        }
        return $username;
    }
    
    
}
