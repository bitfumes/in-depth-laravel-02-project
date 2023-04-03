<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function profile()
    {
        $invoices = auth()->user()->invoices();
        return Inertia::render('Profile', [
            'invoices' => $invoices,
        ]);
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
