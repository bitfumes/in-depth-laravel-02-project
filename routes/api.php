<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login');

// Subscriber
Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::get('/subscriber/{subscriber:email}', [SubscriberController::class, 'confirm'])->name('subscriber.confirm');
Route::get('/subscriber/{subscriber:email}/unsubscribe', [SubscriberController::class, 'unsubscribe'])->name('subscriber.unsubscribe');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email-list', [EmailListController::class, 'store'])->name('email-lists.store');
    Route::get('/email-list', [EmailListController::class, 'index'])->name('email-lists.index');
    Route::put('/email-list/{list}', [EmailListController::class, 'update'])->name('email-lists.update');
    Route::delete('/email-list/{list}', [EmailListController::class, 'destroy'])->name('email-lists.destroy');

    // subscribers
    // Route::apiResource('subscriber', SubscriberController::class);
});
