<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonitorController;
use App\Models\Monitor;
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
        $monitors = Monitor::latest()->paginate();
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
});

Route::get('test', function () {
    $monitors = Monitor::all();
    $monitors->each(function ($monitor) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $monitor->site_url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        $response = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $monitor->update([
            'status'        => $httpCode >= 200 && $httpCode < 400,
            'response'      => $response,
            'response_code' => $httpCode,
        ]);
    });

    return 'done';
});
