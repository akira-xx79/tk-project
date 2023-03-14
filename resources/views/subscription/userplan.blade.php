@extends('subscription.app')
@section('content')

<div class="container">
    <h1>Subscription</h1>
        <p>現在のプラン: {{ $value }}</p>
        <form method="POST" action="{{ route('subscriptions.cancel') }}">
            @csrf
            <button type="submit">Cancel</button>
        </form>

</div>





@endsection
