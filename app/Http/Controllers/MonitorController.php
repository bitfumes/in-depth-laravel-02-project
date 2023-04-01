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

    public function edit(Monitor $monitor)
    {
        return Inertia::render('Site/Edit', [
            'monitor' => $monitor,
        ]);
    }

    public function update(MonitorStoreRequest $request, Monitor $monitor)
    {
        $this->authorize('update', $monitor);
        $monitor->update($request->validated());
        return to_route('home');
    }

    public function store(MonitorStoreRequest $request)
    {
        $this->authorize('create', Monitor::class);

        Monitor::create($request->validated());
        return to_route('home');
    }

    public function destroy(Monitor $monitor)
    {
        $this->authorize('delete', $monitor);
        $monitor->delete();
        return to_route('home');
    }
}
