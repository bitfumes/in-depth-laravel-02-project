<?php

use App\Http\Controllers\AuthController;
use App\Models\Monitor;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    $monitors = Monitor::paginate();
    return Inertia::render('Home', [
        'monitors' => $monitors,
    ]);
});
Route::get('about', function () {
    return Inertia::render('About');
});
Route::get('login', function () {
    return Inertia::render('Login');
})->name('login');
Route::get('site/create', function () {
    return Inertia::render('Site/Create');
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, "logout"]);
