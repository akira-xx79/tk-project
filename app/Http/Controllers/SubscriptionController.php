<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('subscription.index')->with(['intent' => $user->createSetupIntent()]);
    }
}
