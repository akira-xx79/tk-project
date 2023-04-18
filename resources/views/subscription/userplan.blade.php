@extends('subscription.app')
@section('content')

<!-- フラッシュメッセージ -->
@if (session('success'))
<div class="flash_message">
    {{ session('success') }}
</div>
@endif

<main class="mt-4">
    @yield('content')
</main>

<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card shadow mb-5 bg-white rounded">
                <h5 class="card-header">お客様のプラン状況</h5>
                <div class="card-body">
                    <br>
                    <h6 class="card-title">ユーザー:<span class="font-weight-bold ml-2">{{ Auth::user()->name }}</span>　さん</h6>
                    <h6 class="card-title border-bottom pb-4">現在のプラン:<samp class="p-2 mb-2 ml-3 bg-success text-white">{{ $value ?? '' }} </samp> </h6>
                    <br>
                    <form action="{{route('stripe.afterpay')}}" method="post" id="payment-form">
                        @csrf
                        <label>プランの変更</label>
                        <select name="plan" id="plan" class="form-control col-sm-12 mb-2 shadow bg-white rounded">
                            <option value="{{ config('services.stripe.plans.start')}}">スタート</option>
                            <option value="{{ config('services.stripe.plans.business')}}">ベーシック</option>
                            <option value="{{ config('services.stripe.plans.premium')}}">プレミアム</option>
                        </select>
                        <div class="text-right">
                            <button class="btn btn-warning">プランを変更する</button>
                        </div>
                    </form>
                    <form method="POST" action="{{route('subscriptions.cancel',$user = Auth::user() ) }}">
                        @csrf
                        <br>
                        <br>
                        <div class="text-right">
                            <button class="btn btn-danger">プランを解約する</button>
                        </div>
                        <p class="text-danger">※プランのキャンセルをしても解約月末まで使用できます。</p>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>





@endsection
