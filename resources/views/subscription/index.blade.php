{{-- ヘッダー部分の設定 --}}
@extends('subscription.app')
@section('content')

<!-- <div class="container py-3">
    <h3 class="mb-3">プラン登録フォーム</h3>

    {{-- フォーム部分 --}}
    <form action="{{route('stripe.afterpay')}}" method="post" id="payment-form">
        @csrf
        <label>サブスクリプション</label>
        <select name="plen" id="plen" class="form-control col-sm-5">
            <option value="{{ config('services.stripe.plans.sutrt')}}">スタート</option>
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

		const cardElement = elements.create('card', {style: style, hidePostalCode: true});
		cardElement.mount('#card-element');

		const cardHolderName = document.getElementById('card-holder-name');
		const cardButton = document.getElementById('card-button');
		const clientSecret = cardButton.dataset.secret;

		cardButton.addEventListener('click', async (e) => {
			// formのsubmitボタンのデフォルト動作を無効にする
			e.preventDefault();
			const { setupIntent, error } = await stripe.confirmCardSetup(
				clientSecret, {
					payment_method: {
					card: cardElement,
					billing_details: { name: cardHolderName.value }
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
</script> -->
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {

            padding: 15px;

        }

        #new-card, #update-card {

            border: 1px solid #ccc;
            padding: 8px;

        }

    </style>
</head>
<body>

<div id="app" class="container">
    <h1 class="mb-4">Stripeを使った月額課金・サンプル</h1>
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card mb-4">
                <div class="card-body bg-light">
                    <div v-if="!isSubscribed">
                        <div class="form-group">
                            <select class="form-control" v-model="plan">
                                <option v-for="(value,key) in planOptions" :value="key" v-text="value"></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="cardHolderName" placeholder="名義人（半角ローマ字）">
                        </div>

                        <div class="form-group">
                            <div id="new-card" class="bg-white"></div>
                        </div>
                        <div class="form-group text-right">
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-secret="{{ $intent->client_secret }}"
                                @click="subscribe">
                                課金する
                            </button>
                        </div>
                    </div>
                    <div v-else-if="isSubscribed">
                        <div v-if="isCancelled">
                            キャンセル済みです。（終了：<span v-text="details.end_date"></span>）
                            <button class="btn btn-info" type="button" @click="resume">元に戻す</button>
                        </div>
                        <!-- 課金中 -->
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
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>テスト入力について</h5>
                    <hr>
                    <strong>名義人：</strong> 半角ローマ字ならなんでもOK<br>
                    <strong>カード番号：</strong> <a href="https://stripe.com/docs/testing#cards" target="_blank">テスト用のカード番号</a>に用意されています。なお、年／月は未来の日付ならいつでもOKで、CVCも数字ならなんでもOKです。
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ mix('js/app.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

<script>

    new Vue({
        el: '#app',
        data: {
            stripe: null,
            stripeCard: null,
            publicKey: '{{ config('services.stripe.key') }}',
            status: '',
            cardHolderName: '',
            details: {},
            plan: '',
            planOptions: {!! json_encode(config('services.stripe.plans')) !!}
        },
        methods: {
            async subscribe(e) {

                const paymentMethod = await this.getPaymentMethod(e.target);
                const url = '/user/ajax/subscription/subscribe';
                const params = {
                    payment_method: paymentMethod,
                    plan: this.plan
                };
                axios.post(url, params)
                    .then(response => {

                        location.reload();

                    });

            },
            cancel() {

                const url = '/user/ajax/subscription/cancel';
                axios.post(url)
                    .then(this.setStatus);

            },
            resume() {

                const url = '/user/ajax/subscription/resume';
                axios.post(url)
                    .then(this.setStatus);

            },
            changePlan() {

                const url = '/user/ajax/subscription/change_plan';
                const params = { plan: this.plan };
                axios.post(url, params)
                    .then(this.setStatus);

            },
            async updateCard(e) {

                const paymentMethod = await this.getPaymentMethod(e.target);
                const url = '/user/ajax/subscription/update_card';
                const params = { payment_method: paymentMethod };
                axios.post(url, params)
                    .then(response => {

                        location.reload();

                    });

            },
            setStatus(response) {

                this.status = response.data.status;
                this.details = response.data.details;

            },
            async getPaymentMethod(target) {

                const clientSecret = target.dataset.secret;
                const { setupIntent, error } = await this.stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: this.stripeCard,
                            billing_details: { name: this.cardHolderName }
                        }
                    }
                );

                if (error) {

                    console.log(error);

                } else {

                    return setupIntent.payment_method;

                }

            }
        },
        computed: {
            isSubscribed() {

                return (this.status === 'subscribed' || this.status === 'cancelled');

            },
            isCancelled() {

                return (this.status === 'cancelled');

            }
        },
        watch: {
            status(value) {

                Vue.nextTick(() => {

                    if(!this.isCancelled) {

                        const selector = (value === 'unsubscribed') ? '#new-card' : '#update-card';
                        this.stripeCard = this.stripe.elements().create('card', {
                            hidePostalCode: true
                        });
                        this.stripeCard.mount(selector);

                    }

                });

            }
        },
        mounted() {

            this.stripe = Stripe(this.publicKey);
            const url = '/user/ajax/subscription/status';
            axios.get(url)
                .then(this.setStatus);

        }
    });

</script>
</body>
</html>
@endsection
