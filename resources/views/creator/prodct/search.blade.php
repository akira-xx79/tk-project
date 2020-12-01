@extends('layouts.creator.app')

@section('content')
<br class="d-none d-md-block">
<br class="d-none d-md-block">
<div class="d-none d-md-block col col-md-10">
@if($datas->count())
          <h5>検索:{{$keyword}}</h5>
        　<table class="table">
            <thead class="thead-dark">
                <tr style="background-color: #444444; color: white">
                    <th style="width:12%">顧客名</th>
                    <th style="width:9%">受注番号</th>
                    <th style="width:12%">製品名</th>
                    <th style="width:9%">材質</th>
                    <th style="width:9%">数量</th>
                    <th style="width:12%">納期</th>
                    <th style="width:12%">制作状況</th>
                    <th style="width:12%">確認</th>
                </tr>
                @foreach($datas as $data)
                <tr class="bg-white">
                    <td>{{ Str::limit($data->company_name,10) }}</ｔ>
                    <td>{{ $data->contact_number }}</td>
                    <td>{{ Str::limit($data->product_name,10) }}</td>
                    <td>{{ optional($data->materiaries)->mat_name }}</td>
                    <td>{{ $data->numcer }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->completed }}</td>
                    <td>
                    <a href="/creator/all/{{ $data->id }}/productio" class="btn btn-primary btn-sm">詳細</a>
                    <a href="/creator/production/{{ $data->id }}/complete" class="btn btn-success btn-sm">完了</a>
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>
        @else
        <p class="text-center m-2">※検索内容に該当は在りません。</p>
        @endif

        <div class="d-flex justify-content-center">
         {{ $datas->links() }}
       </div>
      </div>


      <div class="col-12 d-block d-md-none mt-3" id="mobile"><h4>検索 : {{$keyword}}</h4></div>

      <div class="col-12 d-block d-md-none card">

     @if($datas->count())

      @foreach($datas as $data)
		<table class="table">
		<tbody>
            <tr>
                <th scope="row" class="w-25 bg-light text-dark text-center">顧客名</th>
                <!-- <td class="text-center">{{ $data->company_name }}</td> -->
				<td class="text-center">{{ Str::limit($data->company_name,20) }}</td>
			</tr>


			<tr>
				<th scope="row" class="w-25 bg-light text-dark text-center">受注番号</th>
				<td class="text-center">TK{{ $data->contact_number }}</td>
			</tr>

			<tr>
			    <th scope="row" class="bg-light text-dark text-center">製品名</th>
                <!-- <td class="text-center">{{ $data->product_name }}</td> -->
                <td class="text-center">{{ Str::limit($data->product_name,20) }}</td>
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
				<td class="text-center"><span class="label {{ $data->completed_class }}">{{ $data->completed }}</span></td>
            </tr>

            <tr>
                <td></td><td><a href="/folder/{{ $data->id }}/productio" class="btn btn-success btn-sm btn-block">詳細</a>
                @if($data->completed === '未着手')
                            <a href="/creator/production/{{ $data->id }}/complete" class="btn btn-danger btn-sm btn-block">完了</a>
                @endif
            </td>
 @endforeach
            </tr>
        </tbody>
</table>
@else
<!-- <div class="alert alert-danger" role="alert">※検索結果は在りません。</div> -->
<p class="text-center m-2">※検索内容に該当は在りません。</p>
@endif

<div class="d-flex justify-content-center">
         {{ $datas->links() }}
</div>

</div>
<br>
    @endsection
