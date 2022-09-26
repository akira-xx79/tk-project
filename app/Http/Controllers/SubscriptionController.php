<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Price;
use App\Providers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('subscription.index', [
            'intent'  => $user->createSetupIntent()
        ]);
    }

    public function afterpay(Request $request)
    {
        $user = Auth::user();
        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');

        // プランはconfigに設定したbasic_plan_idとする
        $plan = $request->plan;

        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('default', $plan)
            ->create($paymentMethod);

        // 処理後に'ルート設定'にページ移行
        return back();
    }

    public function cancelsubscription(User $user, Request $request)
    {
        $user->subscription('default')->cancel();
        return back();
    }

    public function change_plan(Request $request)
    {

        $plan = $request->plan;
        $request->user()
            ->subscription('main')
            ->swap($plan);
        return $this->status();
    }

    public function portalsubsucription(User $user, Request $request)
    {
        return $request->user()->redirectToBillingPortal();
    }
}
