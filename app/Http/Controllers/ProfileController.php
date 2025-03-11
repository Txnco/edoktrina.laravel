<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Interaction with database


class ProfileController extends Controller
{
    public function showProfile() {
        return view('dashboard.profile');
    }

    public function showDashboard() {
        return view('dashboard.dashboard');
    }
}
