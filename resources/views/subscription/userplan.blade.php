@extends('subscription.app')
@section('content')

<div v-else>
    <div class="mb-3">現在、課金中です。</div>
    <button class="btn btn-warning" type="button" @click="cancel">キャンセル</button>
    <hr>
    <div class="form-group">
        課金中のプラン： <span v-text="details.plan"></span>
    </div>
    <div class="form-group">
        <select class="form-control" v-model="plan">
            <option value="{{ config('services.stripe.plans.start')}}">スタート</option>
            <option value="{{ config('services.stripe.plans.business')}}">ベーシック</option>
            <option value="{{ config('services.stripe.plans.premium')}}">プレミアム</option>
        </select><br>
        <button class="btn btn-success" type="button" @click="changePlan">プランを変更する</button>
    </div>
    <hr>
    <div class="form-group">
        カード情報（下４桁）： <span v-text="details.card_last_four"></span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" v-model="cardHolderName" placeholder="名義人（半角ローマ字）">
    </div>
    <div class="form-group">
        <div id="update-card" class="bg-white"></div><br>
        <button type="button" class="btn btn-secondary" >
            クレジットカードを変更する
        </button>
    </div>
</div>

@endsection
