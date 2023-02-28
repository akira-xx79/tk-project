@extends('subscription.app')
@section('content')

<div class="form-gruup">
    <label>サブスクリプション商品:</label>
    <select name="plan" id="plan" class="form-control">
        @foreach($products as $product)
        <option value="{{ $produte->id }}">{{ $product->productName }}</option>
        @endforeach
    </select>
</div>
<!--
<div>
    <div class="mb-3">
        @if($status === 'cancelled')
        現在、課金中です。
        @else
        課金は在りません。
        @endif
    </div>
    <form method="post" action="{{ route('cancel', $user= Auth::user() ) }}">
        @csrf
        <button class="btn btn-warning">キャンセル</button>
    </form>
    <hr>
    <div class="form-group">
        課金中のプラン：
    </div>
    <div class="form-group">
        <select class="form-control">
            <option value="{{ config('services.stripe.plans.start')}}">スタート</option>
            <option value="{{ config('services.stripe.plans.business')}}">ベーシック</option>
            <option value="{{ config('services.stripe.plans.premium')}}">プレミアム</option>
        </select><br>
        <button class="btn btn-success" type="button">プランを変更する</button>
    </div>
    <hr>
    <div class="form-group">
        カード情報（下４桁）：
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="名義人（半角ローマ字）">
    </div>
    <div class="form-group">
        <div id="update-card" class="bg-white"></div><br>
        <button type="button" class="btn btn-secondary">
            クレジットカードを変更する
        </button>
    </div>
</div> -->

@endsection
