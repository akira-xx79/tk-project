<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Price;

class StripeHomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('subscription.userplan', [
            'intent'         => $user->createSetupIntent(),
            'userProducts'   => $user->products(),
            'products'       => Price::getAll(),
        ]);
    }
}
