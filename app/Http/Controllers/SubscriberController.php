<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use App\Models\Subscriber;
use App\Notifications\ConfirmSubscriptionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'name'    => 'sometimes',
            'list_id' => 'required|exists:email_lists,id',
        ]);

        Subscriber::create($request->only('email', 'name', 'list_id'));

        $list = EmailList::find($request->list_id);
        Notification::route('mail', $request->email)
            ->notify(new ConfirmSubscriptionNotification($list));
    }

    public function confirm(Subscriber $subscriber)
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }

        $subscriber->update(['confirmed_at' => now()]);
        return response('Subscription confirmed');
    }
}
