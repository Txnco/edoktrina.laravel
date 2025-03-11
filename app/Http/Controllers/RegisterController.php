<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

use App\Models\User; //Interaction with database
use App\Models\Verification; //Interaction with database

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $username = $this->generateUsername($request->first_name, $request->last_name);

        $user = User::create([
            'username' => $username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice');
    }


    // protected $emailService;

    // public function __construct(EmailService $emailService)
    // {
    //     $this->emailService = $emailService;
    // }

    // public function showVerificationForm($public_id) {
    //     $user = User::where('public_id', $public_id)->first();
    //     if($user->active == 1){
    //         return redirect()->route('login');
    //     }
    //     return view('auth.verification', ['public_id' => $public_id]);
    // }


    // public function registerWithCodeVerification(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $timestamp = time();
    //     $public_id = hash('sha256', $request->email . $timestamp);

    //     $user = User::create([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'active' => 0,
    //         'public_id' => $public_id,
    //     ]);

    //     $info = $this->sendVerificationCode($user);

    //     if($info != "success"){
    //         $user->delete();

    //         return back()->withErrors([
    //             'status' => 'error',
    //             'message' => 'Registracija neuspješna! Neuspješno slanje verifikacije na Vašu email adresu.',
    //             'info' => $info
    //         ])->withInput();
    //     }

    //     return redirect()->route('verification', ['public_id' => $public_id]);
    // }

    // private function sendVerificationCode($user) {
    //     try {
    //         $user->verification_code = rand(100000, 999999); 

    //         Verification::create([
    //             'verification_code' => $user->verification_code,
    //             'expiry_time' => date('Y-m-d H:i:s', strtotime('+1 day')),
    //             'user_id' => $user->id
    //         ]);

    //         $to = $user->email;
    //         $subject = 'Welcome to Salabahter - Verification Code';

    //         $subtitle='Hvala na registraciji!';
    //         $title = 'Vaš kod za verifikaciju';
    //         $body_text = $user->first_name . ' ' . $user->last_name . ' ,dobrodošli na Šalabahter, ovdje se nalazi Vaš verifikacijski kod. Molimo Vas unesite kod na registraciji.' ;
            
    //         $email_template = base_path(config('mail.email_template_with_button'));
    //         $data = [   'BODY_TEXT' => $body_text,
    //                     'CODE' => $user->verification_code,
    //                     'TITLE' => $title,
    //                     'SUBTITLE' => $subtitle,
    //                 ];

    //         $info = $this->emailService->send($to, $subject, $data, $email_template);
    //         return "success";
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    // public function verifyUser(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'code' => 'required|string',
    //         'public_id' => 'required|string|exists:users,public_id',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $user = User::where('public_id', $request->public_id)->first();

    //     $verification = Verification::where('user_id', $user->id)->first();

        
    //     if ((int)$verification->verification_code === (int)$request->code && $verification->expiry_time > date('Y-m-d H:i:s')) {
    //         $user->update(['active' => 1]);

    //         Auth::login($user);
    //         return response()->json([
    //             'status' => 'success',
    //         ]);
    //     } elseif ((int)$verification->verification_code === (int)$request->code && $verification->expiry_time < date('Y-m-d H:i:s')) {
    //         return response()->json([
    //             'status' => 'code_expired'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'wrond_code'
    //         ]);
    //     }
    // }

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