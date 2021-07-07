@extends('layouts.creator.app')

@section('content')
<div class="col-md-10">
    <!-- <br class="d-none d-md-block"> -->
    @foreach($prodct as $data)
    <div class="card">
        <div class="card-header">
            制作データ
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush"><strong>製品情報</strong>
                        <li class="list-group-item">受注番号：<span class="text-center">{{ $data['contact_number'] }}</span></li>
                        <li class="list-group-item">担当者： {{ $data['user']->name }}</li>
                        <li class="list-group-item">受注日： {{ $data['created_at'] }}</li>
                        <li class="list-group-item">顧客名：{{ $data['company_name'] }}</li>
                        <li class="list-group-item">製品名：{{ $data['product_name'] }}</li>
                        <li class="list-group-item">材質：{{ $data['materiaries']->mat_name }}</li>
                        <li class="list-group-item">台数：{{ $data['numcer'] }}</li>
                        <li class="list-group-item">図面：<a href="{{ url('/storage/') }}/{{ $data['image'] }}">図面を見る</a></li>
                        <li class="list-group-item">コメント：<br><br>{{ $data['comment'] }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush"><strong>配送情報</strong>
                        <li class="list-group-item">配送場所：{{ optional($data->shipmentlocations)->sl_name }}</li>
                        <li class="list-group-item">配送業者：{{ optional($data->createdelivery)->car_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

        <div class="card-body">
            @foreach($complete as $item)
            <div class="p-2 bg-dark text-white">
                <h6 class="m-0">制作情報</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">制作者：{{ $item['creator']->name }}</li>
                <li class="list-group-item">完了日：{{ $item['created_at'] }}</li>
                <li class="list-group-item">制作時間：{{ $item['lead_time'] }}</li>
                @foreach($item['completeimag'] as $data)
                <li class="list-group-item">制作画像：<a href="{{ url('/storage/') }}/{{ $data->image }}">{{ $data->image }}</a></li>
                @endforeach
                <li class="list-group-item">制作コメント：<br><br>{{ $item['comment'] }}</li>
                <li class="list-group-item m-auto"><button class="btn btn-success" onclick="window.history.back()">戻る</button></li>

            </ul>
            @endforeach
        </div>

    </div>
</div>



@endsection
