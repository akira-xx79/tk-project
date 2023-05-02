{{-- ヘッダー部分の設定 --}}
@extends('layouts.admin.top')
@section('content')

<div class="container">
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="card col-sm-6 p-0">
            <div class="card-header text-white bg-dark">
                <strong>プラン登録フォーム</strong>
            </div>
            <div class="card-body">
                <form action="{{route('stripe.afterpay')}}" method="post" id="payment-form">
                    @csrf
                    <label class="pt-2">プラン</label>
                    <select name="plan" id="plan" class="form-control col-sm-12">
                        <option value="{{ config('services.stripe.plans.start')}}" {{ $plan == config('services.stripe.plans.start') ? 'selected' : '' }} >スタート（30日間無料始める）</option>>
                        <option value="{{ config('services.stripe.plans.business')}}" {{ $plan == config('services.stripe.plans.business') ? 'selected' : '' }}>ベーシック（30日間無料始める）</option>
                        <option value="{{ config('services.stripe.plans.premium')}}" {{ $plan == config('services.stripe.plans.premium') ? 'selected' : '' }}>プレミアム（30日間無料始める）</option>
                    </select>

                    <label class="mt-3" for="exampleInputEmail1">カード名義人</label>
                    <input type="test" class="form-control col-sm-10" id="card-holder-name" required>

                    <label class="mt-3" for="exampleInputPassword1">カード番号</label>
                    <div class="form-group MyCardElement col-sm-12" id="card-element"></div>


                    <div id="card-errors" role="alert" style='color:red'></div>

                    <div class="text-right my-4">
                         <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">課金する</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

    {{-- フォーム部分 --}}

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
