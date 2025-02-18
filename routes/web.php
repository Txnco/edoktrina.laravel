<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});


Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('verification/{public_id}', [RegisterController::class, 'showVerificationForm'])->name('verification');
    Route::post('verification', [RegisterController::class, 'verifyUser'])->name('verifyUser');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'showProfile'])->name('user.profile');
  
});



