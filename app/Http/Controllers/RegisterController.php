<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailService;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('auth.register');
    }

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => $request->all(),
                'message' => $validator->errors()
            ], 422);
        }

        $timestamp = time();
        $public_id = hash('sha256', $request->email . $timestamp);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => 0,
            'public_id' => $public_id,
        ]);

        $info = $this->sendVerificationCode($user);

        if($info != "success"){
            return response()->json([
                'status' => 'error',
                'message' => 'Registration failed! Failed to send the code to your email.',
                'error' => $info 
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful! A code has been sent to your email.',
            'public_id' => $public_id,
            'info' => $info
        ]);
    }

    public function verification($public_id) {
        $user = User::where('public_id', $public_id)->first();

        if (!$user) {
            return redirect()->route('id_error');
        }

        return view('auth.verify', ['public_id' => $public_id]);
    }

    public function verifyUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'public_id' => 'required|string|exists:users,public_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        $user = User::where('public_id', $request->public_id)->first();

        if ($user->verification_code === $request->code) {
            $user->active = 1;
            $user->save();

            return response()->json([
                'status' => 'success'
            ]);
        } elseif ($user->verification_code !== $request->code) {
            return response()->json([
                'status' => 'wrong_code'
            ]);
        } else {
            return response()->json([
                'status' => 'code_expired'
            ]);
        }
    }

    private function sendVerificationCode($user) {
       
        $user->verification_code = rand(100000, 999999); 

        $to = $user->email;
        $subject = 'Welcome to Salabahter';
        $body = '<p>Dear' . $user->first_name . ',</p><p>Thank you for registering!</p>';
        $altBody = 'Dear ' . $user->first_name . ', Thank you for registering!';
        $data = ['first_name' =>  $user->first_name];

        $this->emailService->send($to, $subject, $body, $altBody, $data);


        return "success";
    }
}