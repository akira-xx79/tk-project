@extends('layout')

@section('content')
<br>
<br>

<div class="col-12 col-md-10 d-none d-md-block">
    <h4 class="font-weight-bold">受注一覧</h4>

    @if (Session::has('message'))
    　　 <div class="alert alert-success">
        　　　 {{ session('message') }}
        　 　</div>
    　　　　@endif

    　<table class="table text-center">
        <thead class="thead-dark">
            <tr style="background-color: #444444; color: white">
                <th style="width:12%">顧客名</th>
                <th style="width:9%">受注番号</th>
                <th style="width:12%">製品名</th>
                <th style="width:9%">材質</th>
                <th style="width:9%">数量</th>
                <th style="width:12%">納期</th>
                <th style="width:10%">制作状況</th>
                <th style="width:12%">確認</th>
            </tr>
            @foreach($product as $data)
            <tr class="bg-white">
                <td>{{ Str::limit($data->company_name,10) }}</ｔ>
                <td>{{ $data->contact_number }}</td>
                <td>{{ Str::limit($data->product_name,10) }}</td>
                <td>{{ optional($data->materiaries)->mat_name }}</td>
                <td>{{ $data->numcer }}</td>
                <td>{{ $data->date }}</td>
                <td>@if($data->completed == '未着手')
                    <p><strong>未着手</strong></p>
                    @else
                    <p class="pl-2"><strong class="text-primary">完了</strong></p>
                    @endif
                </td>
                <td><a href="/folder/{{ $data->id }}/productio" class="btn btn-info btn-sm text-white">詳細</a>
                    @if($data->completed == '未着手' && $data->updated_at != $data->created_at)
                    <span class="badge bg-warning text-dark p-2">変更在り</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </thead>
    </table>

    <div class="d-flex justify-content-center">
        {{ $product->links() }}
    </div>
</div>

<div class="col-12 d-block d-md-none mt-3" id="mobile">
    <h4 class="font-weight-bold">受注一覧</h4>
</div>

<div class="col-12 d-block d-md-none card">

    @foreach($product as $data)
    <table class="table">
        <tbody>
            @if($data->updated_at != $data->created_at)
            <span class="badge bg-warning text-dark p-2">変更が在ります</span>
            @endif
            <tr>
                <th scope="row" class="w-25 bg-light text-dark text-center">顧客名</th>
                <!-- <td class="text-center">{{ $data->company_name }}</td> -->
                <td class="text-center">
                    {{ Str::limit($data->company_name,20) }}
                </td>
            </tr>


            <tr>
                <th scope="row" class="w-25 bg-light text-dark text-center">受注番号</th>
                <td class="text-center">TK{{ $data->contact_number }}</td>
            </tr>

            <tr>
                <th scope="row" class="bg-light text-dark text-center">製品名</th>
                <!-- <td class="text-center">{{ $data->product_name }}</td> -->
                <td class="text-center">{{Str::limit($data->product_name,20)}}</td>
            </tr>

            <tr>
                <th scope="row" class="bg-light text-dark text-center">材質</th>
                <td class="text-center">{{ optional($data->materiaries)->mat_name }}</td>
            </tr>

            <tr>
                <th scope="row" class="bg-light text-dark text-center">数量</th>
                <td class="text-center">{{ $data->numcer }}</td>
            </tr>

            <tr>
                <th scope="row" class="bg-light text-dark text-center">納期</th>
                <td class="text-center">{{ $data->date }}</td>
            </tr>

            <tr>
                <th scope="row" class="bg-light text-dark text-center">制作状況</th>
                <td class="text-center">
                @if($data->completed == '未着手')
                    <p class="m-0"><strong>未着手</strong></p>
                    @else
                    <p class="m-0"><strong class="text-primary">完了</strong></p>
                    @endif
                </td>
            </tr>

            <tr>
                <th>
                <td><a href="/folder/{{ $data->id }}/productio" class="btn btn-success btn-sm btn-block">詳細</a></th>
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $product->links() }}
    </div>

</div>



<br>
@endsection
