@extends('layouts.admin.top')
@section('content')

<div class="container">
    <br>
    <br>
    <br>
    <div class="card-deck">
        <div class="card">
            <div class="card-header text-white bg-info text-center">
                <h2 class="font-weight-bold mt-3">スタートプラン</h2>
                <p class="m-0">まずは試したい方</p>
            </div>
            <div class="card-body">
                <br>
                <h6 class="px-3">月額料金　<span class="font-weight-bold h4">￥１０．０００</span></h6>
                <br><br>
                <h6 class="p-2">利用者数　<span class="font-weight-bold pl-4">５人</span></h6>
                <h6 class="p-2">登録件数　<span class="font-weight-bold pl-4">無制限</span></h6>
                <h6 class="p-2">製品写真　<span class="font-weight-bold pl-4">３枚/１製品</span></h6>
                <h6 class="p-2">支給材機能　<span class="font-weight-bold pl-4">なし</span></h6>
            </div>
            <div class="card-footer">
                @csrf
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('subscription_form', ['plan' => config('services.stripe.plans.start')]) }}">無料で始める<small class="px-2">(30日間無料)</small></a>

            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-danger text-center">
                <h2 class="font-weight-bold mt-3">ベーシックプラン</h2>
                <p class="m-0">小規模事業者にオススメです</p>
            </div>
            <div class="card-body">
                <br>
                <h6 class="px-3">月額料金　<span class="font-weight-bold h4">￥３０．０００</span></h6>
                <br><br>
                <h6 class="p-2">登録者数　<span class="font-weight-bold pl-4">１５人</span></h6>
                <h6 class="p-2">登録件数　<span class="font-weight-bold pl-4">無制限</span></h6>
                <h6 class="p-2">製品写真　<span class="font-weight-bold pl-4">５枚/１製品</span></h6>
                <h6 class="p-2">支給材機能　<span class="font-weight-bold pl-4">あり</span></h6>
            </div>
            <div class="card-footer">
                @csrf
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('subscription_form', ['plan' => config('services.stripe.plans.business')]) }}">無料で始める<small class="px-2">(30日間無料)</small></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-success text-center">
                <h2 class="font-weight-bold mt-3">プレミアムプラン</h2>
                <p class="m-0">制限を気にしないで使える</p>
            </div>
            <div class="card-body">
                <br>
                <h6 class="px-3">月額料金　<span class="font-weight-bold h4">￥５０．０００</span></h6>
                <br><br>
                <h6 class="p-2">登録者数　<span class="font-weight-bold pl-4">３０人</span></h6>
                <h6 class="p-2">登録件数　<span class="font-weight-bold pl-4">無制限</span></h6>
                <h6 class="p-2">製品写真　<span class="font-weight-bold pl-4">５枚/１製品</span></h6>
                <h6 class="p-2">支給材機能　<span class="font-weight-bold pl-4">あり</span></h6>
            </div>
            <div class="card-footer">
                @csrf
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('subscription_form', ['plan' => config('services.stripe.plans.premium')]) }}">無料で始める<small class="px-2">(30日間無料)</small></a>
            </div>
        </div>
    </div>
</div>

@endsection
