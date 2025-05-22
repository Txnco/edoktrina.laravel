<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showProfile($username) {       
        $user = User::where('username', $username)->firstOrFail();

        if (!$user) {
            return redirect()->route('landing.page');
        }

        // Check if the logged-in user is viewing their own profile
        $isOwner = Auth::check() && Auth::id() === $user->id;

        // Pass data to the view
        return view('user.profile', [
            'user' => $user,
            'isOwner' => $isOwner,
        ]);

    }

}
