<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonitorStoreRequest;
use App\Models\Monitor;
use Inertia\Inertia;

class MonitorController extends Controller
{
    public function create()
    {
        return Inertia::render('Site/Create');
    }

    public function store(MonitorStoreRequest $request)
    {
        // relationship
        // add here in array
        // add to validation class
        Monitor::create($request->validated());
        return to_route('home');
    }
}
