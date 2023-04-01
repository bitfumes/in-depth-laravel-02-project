<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonitorStoreRequest;
use App\Models\Monitor;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class MonitorController extends Controller
{
    public function create()
    {
        return Inertia::render('Site/Create');
    }

    public function edit(Monitor $monitor)
    {
        return Inertia::render('Site/Edit', [
            'monitor' => $monitor,
        ]);
    }

    public function update(MonitorStoreRequest $request, Monitor $monitor)
    {
        $monitor->update($request->validated());
        return to_route('home');
    }

    public function store(MonitorStoreRequest $request)
    {
        if (Gate::denies('create-monitor')) {
            abort(403, 'You are not allowed to create a monitor.');
        }

        Monitor::create($request->validated());
        return to_route('home');
    }

    public function destroy(Monitor $monitor)
    {
        $monitor->delete();
        return to_route('home');
    }
}
