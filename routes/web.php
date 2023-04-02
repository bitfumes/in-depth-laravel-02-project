<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return Inertia::render('About');
});

Route::get('login', function () {
    return Inertia::render('Login');
})->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        $monitors = auth()->user()->monitors()->latest()->paginate();
        return Inertia::render('Home', [
            'monitors' => $monitors,
        ]);
    })->name('home');

    Route::get('/site/create', [MonitorController::class, 'create'])->name('site.create');
    Route::post('/site/store', [MonitorController::class, 'store'])->name('site.store');
    Route::delete('/site/{monitor}', [MonitorController::class, 'destroy'])->name('site.delete');
    Route::get('/site/{monitor}/edit', [MonitorController::class, 'edit'])->name('site.edit');
    Route::patch('/site/{monitor}/update', [MonitorController::class, 'update'])->name('site.update');

    Route::post('/auth/logout', [AuthController::class, "logout"]);

    Route::post('/subscribe', function () {
        $user = auth()->user();
        $data = $user->newSubscription('default', 'price_1MsJA9CZJF6ofZHwJrA5zng7')->checkout();
        return Inertia::location($data->url);
    });
});

Route::get('test', function () {
    return 'done';
});
