<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ComponentsController;

Route::get('/', function () {
    return view('home');
});


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('components', [ComponentsController::class, 'showComponents'])->name('components');

Route::get('verification/{public_id}', [RegisterController::class, 'showVerificationForm'])->name('verification');
Route::post('verification', [RegisterController::class, 'verifyUser'])->name('verifyUser');


Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

