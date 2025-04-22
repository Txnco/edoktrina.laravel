<?php
namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function showBecomeTutor() {  
        return view('tutor.become-tutor');
    }

}
