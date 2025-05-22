<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Api\ApiChatController;
use App\Http\Controllers\Script\ScriptController;

use App\Http\Requests\CustomEmailVerification;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () { return view('landing-page'); })->name('landing.page');


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

        Route::get('admin/tutors/applications', [TutorController::class, 'showApplications'])->name('admin.tutors.applications');
        Route::get('admin/application/{id}', [TutorController::class, 'showTutorApplication'])->name('admin.tutor.application');
        Route::post('admin/application/{id}/approve', [TutorController::class, 'approveApplication'])->name('admin.tutor.applications.approve');
        Route::post('admin/application/{id}/reject', [TutorController::class, 'rejectApplication'])->name('admin.tutor.applications.reject');

        
    });

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/session', [ChatController::class, 'createSession'])->name('chat.session.create');
    Route::delete('/chat/session/{session}', [ChatController::class, 'deleteSession'])->name('chat.session.delete');
    Route::patch('/chat/session/{session}', [ChatController::class, 'renameSession'])->name('chat.session.rename');
    Route::get('/chat/session/{session}', [ChatController::class, 'getSession'])->name('chat.session.get');
    
    Route::post   ('/chat/messages',                   [ApiChatController::class, 'sendMessage'])->name('chat.messages.send');
    Route::patch  ('/chat/messages/{message}',         [ApiChatController::class, 'editMessage'])->name('chat.messages.edit');
    Route::get    ('/chat/session/{session}/status',   [ApiChatController::class, 'getSessionStatus'])->name('chat.session.status');
    Route::post   ('/chat/session/{session}/retry',    [ApiChatController::class, 'retryProcessing'])->name('chat.session.retry');
    Route::post   ('/chat/session/{session}/restart',  [ApiChatController::class, 'restartProcessing'])->name('chat.session.restart');
    Route::get('/chat/session/{session}/messages',[ApiChatController::class, 'getMessages'])->name('chat.session.messages');



    Route::get('/become-tutor', [TutorController::class, 'showBecomeTutor'])->name('tutor.become');
    Route::post('/become-tutor', [TutorController::class, 'store'])->name('tutor.store');
    Route::get('/application/status', [TutorController::class, 'applicationStatus'])->name('tutor.application.status');
    Route::get('/find-tutor', [TutorController::class, 'showFindTutor'])->name('tutor.find');

    Route::get('/download/{application}/{documentType}', [TutorController::class, 'downloadDocument'])->name('tutor.download-document');

    Route::get('/scripts', [ScriptController::class, 'index'])->name('scripts.index');
    Route::get('/scripts/create', [ScriptController::class, 'create'])->name('scripts.create');
    Route::post('/scripts', [ScriptController::class, 'store'])->name('scripts.store');
    Route::get('/scripts/{script}', [ScriptController::class, 'show'])->name('scripts.show');
    Route::get('/scripts/{script}/edit', [ScriptController::class, 'edit'])->name('scripts.edit');
    Route::put('/scripts/{script}', [ScriptController::class, 'update'])->name('scripts.update');
    Route::delete('/scripts/{script}', [ScriptController::class, 'destroy'])->name('scripts.destroy');
    Route::get('/scripts/{script}/download', [ScriptController::class, 'download'])->name('scripts.download');
    
    
    Route::get('/u/{username}', [ProfileController::class, 'showProfile'])->where('username', '[A-Za-z0-9-_]+')->name('user.profile');

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
