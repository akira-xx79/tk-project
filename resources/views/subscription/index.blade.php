{{-- ヘッダー部分の設定 --}}
@extends('subscription.app')
@section('content')

<div class="container py-3">
    <h3 class="mb-3">プラン登録フォーム</h3>

    {{-- フォーム部分 --}}
    <form action="{{route('stripe.afterpay')}}" method="post" id="payment-form">
        @csrf
        <label>サブスクリプション</label>
        <select name="plan" id="plan" class="form-control col-sm-5">
            <option value="{{ config('services.stripe.plans.start')}}">スタート</option>
            <option value="{{ config('services.stripe.plans.business')}}">ベーシック</option>
            <option value="{{ config('services.stripe.plans.premium')}}">プレミアム</option>
        </select>

        <label for="exampleInputEmail1">カード所有者お名前</label>
        <input type="test" class="form-control col-sm-5" id="card-holder-name" required>

        <label for="exampleInputPassword1">カード番号</label>
        <div class="form-group MyCardElement col-sm-5" id="card-element"></div>


        <div id="card-errors" role="alert" style='color:red'></div>

        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">課金する</button>

    </form>

    <div v-else>
                            <div class="mb-3">現在、課金中です。</div>
                            <button class="btn btn-warning" type="button" @click="cancel">キャンセル</button>
                            <hr>
                            <div class="form-group">
                                課金中のプラン： <span v-text="details.plan"></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control" v-model="plan">
                                    <option v-for="(value,key) in planOptions" :value="key" v-text="value"></option>
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
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-secret="{{ $intent->client_secret }}"
                                    @click="updateCard">
                                    クレジットカードを変更する
                                </button>
                            </div>
                        </div>

    <form method="POST" action="{{route('stripe.cancel', $user = Auth::user() ) }}">
        @csrf
        <button class="btn btn-success mt-2">キャンセルする</button></button>
    </form>

    @if ($user->subscribed('default'))
    <form action="{{route('stripe.portalsubscription', $user = Auth::user() ) }}">
        <button class="btn btn-primary">Stripeポータルサイト</button>
    </form>
    @endif
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // HTMLの読み込み完了後に実行するようにする
    window.onload = my_init;

    function my_init() {

        // Configに設定したStripeのAPIキーを読み込む
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        const cardElement = elements.create('card', {
            style: style,
            hidePostalCode: true
        });
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            // formのsubmitボタンのデフォルト動作を無効にする
            e.preventDefault();
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                // エラー処理
                console.log('error');

            } else {
                // 問題なければ、stripePaymentHandlerへ
                stripePaymentHandler(setupIntent);
            }
        });
    }

    function stripePaymentHandler(setupIntent) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripePaymentMethod');
        hiddenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(hiddenInput);
        // フォームを送信
        form.submit();
    }
</script>

@endsection
