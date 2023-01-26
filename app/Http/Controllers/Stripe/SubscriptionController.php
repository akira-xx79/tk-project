<?php

namespace App\Http\Controllers\Stripe;

use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Price;
use App\Providers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        // $plan = config('services.stripe.plans');
        // $pran = config('services.stripe.dasic_plan_id');
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
          $paymentMethod=$request->input('stripePaymentMethod');

          // プランはconfigに設定したbasic_plan_idとする
          $plan= $request->plan;
        //   $plan=config('services.stripe.plans.start');

          // 上記のプランと支払方法で、サブスクを新規作成する
          $user->newSubscription('default', $plan)
          ->create($paymentMethod);

          // 処理後に'ルート設定'にページ移行
          return back();
    }


    public function cancelsubscription(User $user, Request $request)
    {
        $user -> subscription('default')->cancel();
        return back();
    }

    //プランを変更する
    public function change_plan(Request $request) {

        $plan = $request->plan;
        $request->user()
            ->subscription('main')
            ->swap($plan);
        return $this->status();
    }

    //課金状態を表示する
    public function status() {

        $status = 'unsubscribed';
        $user = auth()->user();
        $details = [];

        if($user->subscribed('main')) { // 課金履歴あり

            if($user->subscription('main')->cancelled()) {  // キャンセル済み

                $status = 'cancelled';

            } else {    // 課金中

                $status = 'subscribed';

            }

            $subscription = $user->subscriptions->first(function($value){

                return ($value->name === 'main');

            })->only('ends_at', 'stripe_plan');

            $details = [
                'end_date' => ($subscription['ends_at']) ? $subscription['ends_at']->format('Y-m-d') : null,
                'plan' => \Arr::get(config('services.stripe.plans'), $subscription['stripe_plan']),
                'card_last_four' => $user->card_last_four
            ];

        }

        return [
            'status' => $status,
            'details' => $details
        ];

    }

    public function portalsubsucription(User $user, Request $request)
    {
        return $request->user()->redirectToBillingPortal();
    }
}

