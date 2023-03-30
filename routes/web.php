<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonitorController;
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
})->name('home');

Route::get('about', function () {
    sleep(2);
    return Inertia::render('About');
});
Route::get('login', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/site/create', [MonitorController::class, 'create'])->name('site.create');
Route::post('/site/store', [MonitorController::class, 'store'])->name('site.store');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, "logout"]);
