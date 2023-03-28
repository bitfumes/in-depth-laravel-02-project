<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return Inertia::render('Test');
});
Route::get('about', function () {
    return Inertia::render('About');
});
