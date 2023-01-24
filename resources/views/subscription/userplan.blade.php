@extends('subscription.app')
@section('content')

<div class="form-group">
    <label>サブスクリプション商品：</label>
    <select class="form-control" name="plan" id="plan">
        @foreach ($products as $product)
           <option value="{{ $product->id }}">{{ $product->productNeme }}</option>
           @endforeach
    </select>
</div>

@endsection
