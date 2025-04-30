<?php

use App\Http\Controllers\Api\ChatController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/chat/{session}/message', [ChatController::class, 'sendMessage']);
    Route::patch('/chat/message/{message}', [ChatController::class, 'editMessage']);
    Route::post('/chat/{session}/retry', [ChatController::class, 'retryProcessing']);
    Route::post('/chat/{session}/restart', [ChatController::class, 'restartProcessing']);
});