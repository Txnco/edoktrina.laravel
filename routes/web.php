<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Subject\SubjectController;

use App\Http\Requests\CustomEmailVerification;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    // Route::get('verification/{public_id}', [RegisterController::class, 'showVerificationForm'])->name('verification');
    // Route::post('verification', [RegisterController::class, 'verifyUser'])->name('verifyUser');
    
    Route::get('/email/verify', function (Request $request) {
        $user = $request->session()->get('user');
        if ($user) {
            return view('auth.verify-email');
        }
        return redirect('/login');
     })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (CustomEmailVerification $request) {
        $request->fulfill();
        return redirect('/login')->with(['message' => 'Vaš račun je uspješno potvrđen!']); 
    })->middleware(['signed'])->name('verification.verify');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('admin/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
        Route::get('admin/users', [AdminDashboardController::class, 'showUsers'])->name('admin.users');
        Route::get('admin/roles-permissions', [AdminDashboardController::class, 'showRolesPermissions'])->name('admin.roles-permissions');
        
        Route::get('admin/subjects', [SubjectController::class, 'showSubjects'])->name('admin.subjects');
        Route::get('admin/subjects/create', [SubjectController::class, 'create'])->name('admin.subjects.create');
        Route::post('admin/subjects', [SubjectController::class, 'store'])->name('admin.subjects.store');
        Route::put('admin/subjects/{id}', [SubjectController::class, 'update'])->name('admin.subjects.update');
        Route::delete('admin/subjects/{id}', [SubjectController::class, 'delete'])->name('admin.subjects.delete');
        
    });

    Route::get('postani-instruktor', [TutorController::class, 'showBecomeTutor'])->name('become.tutor');
    
    Route::get('u/{username}', [ProfileController::class, 'showProfile'])->where('username', '[A-Za-z0-9-_]+')->name('user.profile');

});


Route::get('/email/verification-notification', fn() => redirect('/login')->with('error', 'Cannot access directly.'));
Route::post('/email/verification-notification', function (Request $request) {
    $user = $request->session()->get('user');
    if ($user->email_verified_at === null) {
        $user->sendEmailVerificationNotification();

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success', 'message' => 'Verification email sent.']);
        }

        return view('auth.verify-email');
    }
    return view('login');
})->middleware(['throttle:6,1'])->name('verification.send');

Route::controller(SocialiteController::class)->group(function(){
    Route::get('auth/google','googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');

});



Route::get('/test-role', function () {
    return "Role middleware works!";
})->middleware(['auth', 'role:admin']);
