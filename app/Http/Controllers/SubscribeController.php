<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscribeController extends Controller
{
    public function store()
    {
        $user = auth()->user();
        $data = $user->newSubscription('default', 'price_1MsJA9CZJF6ofZHwJrA5zng7')->checkout();
        return Inertia::location($data->url);
    }

    public function update(Request $request)
    {
        $request->validate([
            'plan.value' => 'required',
        ]);
        $plan = $request->input('plan.value');
        $user = auth()->user();
        if ($user->isSubscribed) {
            $user->subscription('default')->cancel();
        }

        // subscribe to the new plan

        return to_route('user.profile');
    }

    public function resume()
    {
        $user = auth()->user();
        $user->subscription('default')->resume();

        return to_route('user.profile');
    }
}
