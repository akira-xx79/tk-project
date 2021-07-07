@extends('layouts.creator.app')

@section('content')
<br>
<br>
@foreach($number as $data)

	<div class="col-sm-10 card">
		<table class="table">
			<thead>
		　　　　	<h5 class="p-3" style="background-color: #444444; color: white">詳細内容</style="border-left:></h5>
		　　</thead>
	<br>
		<tbody>
			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">依頼日</th>
				<td class="text-center">{{ $data->created_at }}</td>
            </tr>

            @if($data->completed == '未着手' && $data->updated_at != $data->created_at)
            <tr>
				<th scope="row" class="p-3 mb-2 bg-warning text-dark text-center">編集日</th>
				<td class="text-center">{{ $data->updated_at }}</td>
            </tr>
　　　　　　　@endif

            <tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">顧客名</th>
				<td class="text-center">{{ $data->company_name }}</td>
			</tr>


			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">受注番号</th>
				<td class="text-center">TK{{ $data->contact_number }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">カテゴリー</th>
					<td class="text-center">{{ optional($data->categries)->cat_name }}</td>
			</tr>

			<tr>
			    <th scope="row" class="p-3 mb-2 bg-light text-dark text-center">製品名/工事名</th>
				<td class="text-center">{{ $data->product_name }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">材質</th>
				<td class="text-center">{{ optional($data->materiaries)->mat_name }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">数量</th>
				<td class="text-center">{{ $data->numcer }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">図面</th>
				<td class="text-center"><a href="{{ url('/storage/') }}/{{ $data->image }}">図面を見る</a></td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">納期</th>
				<td class="text-center">{{ $data->date }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">発送場所</th>
				<td class="text-center">{{ optional($data->shipmentlocations)->sl_name }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">配送業者</th>
				<td class="text-center">{{ optional($data->createdelivery)->car_name }}</td>
			</tr>

			<tr>
				<th scope="row" class="p-3 mb-2 bg-light text-dark text-center">制作状況</th>
				<td class="text-center"><span class="label {{ $data->completed_class }}">{{ $data->completed }}</span></td>
			</form>
			</tr>
		</tbody>
</table>
<div class="col-12 text-center">
      @if($data->completed === '未着手')
        <a href="/creator/production/{{ $data->id }}/complete" class="btn btn-success px-5">完了</a>
     @endif
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">コメント</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $data->comment }}</textarea>
  </div>


  <br>
  <button class="btn btn-primary btn-lg btn-block mb-3" onclick="window.history.back()">戻る</button>
</div>
</div>
<br><br>

<script>
function deletePost(e) {
  'use strict';

  if (confirm('本当に削除していいですか?')) {
  document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endforeach
@endsection
