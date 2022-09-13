<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Price;
use App\Providers;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $plan = config('services.stripe.plans');
        // $pran = config('services.stripe.dasic_plan_id');
        return view('subscription.index',[
            'intent'  => $user->createSetupIntent()
        ]);
    }

//     public function afterpay(Request $request)
//     {
//         $user = Auth::user();
//           // またStripe顧客でなければ、新規顧客にする
//           $stripeCustomer = $user->createOrGetStripeCustomer();

//           // フォーム送信の情報から$paymentMethodを作成する
//           $paymentMethod=$request->input('stripePaymentMethod');

//           // プランはconfigに設定したbasic_plan_idとする
//           $plan= $request->plen;

//           // 上記のプランと支払方法で、サブスクを新規作成する
//           $user->newSubscription('default', $plan)
//           ->create($paymentMethod);

//           // 処理後に'ルート設定'にページ移行
//           return back();
//     }
}

