<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfPaid;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth', RedirectIfPaid::class]);
    }

    public function __invoke(Request $request)
    {
        if (!session()->has('payment_intent_id')) {
            $paymentIntent = app('stripe')->paymentIntents->create([
                'amount' => 2500,
                'currency' => 'usd',
                'setup_future_usage' => 'on_session',
                'metadata' => [
                    'user_id' => (string) $request->user()->id
                ]
            ]);

            session()->put('payment_intent_id', $paymentIntent->id);
        } else {
            $paymentIntent = app('stripe')->paymentIntents->retrieve(session()->get('payment_intent_id'));
        }

        return view('payments.index', [
            'paymentIntent' => $paymentIntent
        ]);
    }
}
