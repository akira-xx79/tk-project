<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Plan;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Subscription;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Illuminate\Support\Facades\Config;

class StripeHomeController extends Controller
{
    public function show()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $user = Auth::user();
        $currentPlan = $user->subscription('default')->stripe_plan;
        $planName = Config::get('services.stripe.planName');
        $plans = Plan::all();

        if ($currentPlan === null) {
            return view('subscription.userplan', compact('user','currentPlan', 'plans', 'planName'))->with('success', 'プランは在りません');
        }

        foreach ($planName as $key => $value) {
            if (isset($currentPlan) && $currentPlan == $key) {
                return view('subscription.userplan', compact('user','currentPlan', 'plans', 'planName', 'value'));
            }
        }

        // foreach($planName as $key => $value){
        //     if(isset($currentPlan)== $key){

        //      return view('subscription.userplan', compact('user','currentPlan', 'plans', 'planName', 'value'));
        // }


        }



        // $planName = array(
        //     'price_1LHdYKHsLNpqsMWsn0s8P9Bj'=> 'スタートプラン',
        //     'price_1LHzkgHsLNpqsMWsauumfYss'=> 'ベーシックプラン',
        //     'price_1LHzlmHsLNpqsMWsD7epKTOb'=> 'プレミアムプラン');





    public function change(User $user,Request $request)
    {
        // $user = Auth::user();
        $plan = $request->plan;
        $user->subscription('default')->swap($plan);
        return redirect()->route('userstatus')->with('success', 'プランを変更しました。');
    }

    public function cancel(User $user, Request $request)
    {
        // $user = Auth::user();
        $user->subscription('default')->cancel();
        return redirect()->route('userstatus')->with('success', 'プランをキャンセルしました。');
    }

    public function resume()
    {
        $user = Auth::user();
        $user->subscription('default')->resume();
        return redirect()->route('userstatus')->with('success', 'プランを再開しました。');
    }
    // public function index()
    // {
    //     $user = auth()->user();
    //     if($user->subscribed('defarlt')) {
    //        $subscription = $user->subscription('defarlt');
    //        $current_plan = $subscription->stripe_plan;        }
    //     // $user = Auth::user();

    //     return view('subscription.userplan', [
    //         ' current_plan'
    //         // 'intent'         => $user->createSetupIntent(),
    //         // 'userProducts'   => $user->products(),
    //         // 'products'       => Price::getAll(),
    //     ]);
    // }

}
