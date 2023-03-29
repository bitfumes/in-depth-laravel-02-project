<?php

use App\Models\Monitor;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    $monitors = Monitor::all();
    return Inertia::render('Home', [
        'monitors' => $monitors,
    ]);
});
Route::get('about', function () {
    return Inertia::render('About');
});
Route::get('login', function () {
    return Inertia::render('Login');
});
