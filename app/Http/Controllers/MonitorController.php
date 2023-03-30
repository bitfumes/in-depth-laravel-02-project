<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MonitorController extends Controller
{
    public function create()
    {
        return Inertia::render('Site/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'string', 'max:254'],
            'site_url'  => ['required', 'url', 'max:254'],
        ]);
    }
}
