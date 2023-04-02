<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function profile()
    {
        return Inertia::render('Profile');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        auth()->user()->update($data);
        return to_route('user.profile');
    }
}
