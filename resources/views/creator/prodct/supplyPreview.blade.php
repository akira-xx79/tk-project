@extends('layouts.creator.app')

@section('content')
<br><br><br>
<div class="col-md-10 clearfix">
<div class="card">
  <div class="card-header">
   支給材内容
  </div>
<div class="card-body">
@foreach($number as $data)
<table class="col-sm-12">
    <tbody>
       <tr class="border-bottom">
           <th class="font-weight-bold px-5">支給先</th>
           <td>{{ $data->payee }}</td>
       </tr>
       <tr class="border-bottom">
           <th class="font-weight-bold px-5 pt-3">担当者</th>
           <td>{{ optional($data->user)->name }}</td>
       </tr>
       <tr class="border-bottom">
           <th class="font-weight-bold px-5 pt-3">支給予定日</th>
           <td>{{ $data->date }}</td>
       </tr>
       <tr class="border-bottom">
           <th class="font-weight-bold px-5 pt-3">手配書</th>
           <td><a href="{{ url('/storage/') }}/{{ $data->image }}">添付画像を見る</a></td>
       </tr>
       <tr class="border-bottom">
           <th class="font-weight-bold px-5 pt-3">備考</th>
           <td>{{ $data->comment }}</td>
       </tr>
       <tr>
           <th>
               <td><button class="btn btn-success  mt-3" onclick="window.history.back()">戻る</button></td>
            </th>
       </tr>

    </tbody>
</table>

</div>
</div>
</div>
@endforeach
@endsection
