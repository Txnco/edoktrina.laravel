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
        try{
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();

            $first_name = (isset($googleUser->user['given_name']) && !empty($googleUser->user['given_name'])) ? $googleUser->user['given_name'] : '';
            $last_name = (isset($googleUser->user['family_name']) && !empty($googleUser->user['family_name'])) ? $googleUser->user['family_name'] : '';

            $username = $this->generateUsername($first_name, $last_name);

            if($user){
                Auth::login($user);
                return redirect()->route('home');
            } else {
                $userData = User::create([
                    'username' => $username,
                    'first_name' => $first_name,
                    'last_name' =>  $last_name,
                    'email' => $googleUser->user['email'],
                    'email_verified_at' => now(),
                    'password' => null,
                    'google_id' => $googleUser->id,
                ]);
                if($userData){
                    Auth::login($userData);
                    return redirect()->route('home');
                }
            }
        }
        catch(Exception $e){
            return redirect()->route('login')->withErrors(['unsuccessful' => 'Prijava preko Google računa nije uspela.']);
        }
        
    }

    private function generateUsername($firstName, $lastName){
        $firstNamePart = substr($firstName, 0, min(4, strlen($firstName)));
        $lastNamePart = substr($lastName, 0, min(5, strlen($lastName)));

        $baseUsername = strtolower($firstNamePart . $lastNamePart);
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }
    
}
