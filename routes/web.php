<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return Inertia::render('Home');
});
Route::get('about', function () {
    return Inertia::render('About');
});
Route::get('login', function () {
    return Inertia::render('Login');
});
