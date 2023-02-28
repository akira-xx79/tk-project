<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Price;

class StripeHomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('subscription.userplan', [
            'intent'         => $user->createSetupIntent(),
            'userProductes'  => $user->productes(),
            'products'       => Price::getAll(),
        ]);
    }
}
