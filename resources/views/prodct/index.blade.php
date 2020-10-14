@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12">
       @foreach($production as $prodct)
        　<table class="table">
             <h4>{{ $prodct->company_name }}</h4>
            <thead class="thead-dark">
                <tr style="background-color: #444444; color: white">
                    <th style="width:14%">受注番号</th>
                    <th style="width:14%">製品名</th>
                    <th style="width:14%">材質</th>
                    <th style="width:14%">数量</th>
                    <th style="width:14%">図面</th>
                    <th style="width:14%">納期</th>
                    <th style="width:14%">制作状況</th>
                </tr>
                <tr>
                    <td>{{ $prodct->contact_number }}</td>
                    <td>{{ $prodct->product_name }}</td>
                    <td>{{ $prodct->materiaries->mat_name }}</td>
                    <td>{{ $prodct->numcer }}</td>
                    <td><a href="{{ $prodct->image }}">図面</a></td>
                    <td>{{ $prodct->date }}</td>
                    <td>{{ $prodct->completed }}</td>
                </tr>
            </thead>
        </table>
       @endforeach
        </div>
    </div>
</div>
@endsection

