<?php
namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorDashboardController extends Controller
{
    public function showTutorDashboard() {  
        return view('tutor.dashboard');
    }

}
