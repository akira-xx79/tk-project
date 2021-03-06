@extends('layouts.creator.app')

@section('content')
<div class="col-md-10 d-none d-md-block">

　@if (Session::has('message'))
   　　   <div class="alert alert-success">
   　　　   {{ session('message') }}
    　  　</div>
  @endif

<h4>完了一覧</h4>
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
                @foreach($complete as $data)
                <tr class="bg-white">
                    <td>{{ $data->company_name }}</ｔ>
                    <td>{{ $data->contact_number }}</td>
                    <td>{{ $data->product_name }}</td>
                    <td>{{ optional($data->materiaries)->mat_name }}</td>
                    <td>{{ $data->numcer }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->completed }}</td>
                    <td>
                        <a href="/creator/all/{{ $data->id }}/productio" class="btn btn-primary btn-sm">詳細</a>
                        <a href="/creator/production/completeAll/{{ $data->id }}" class="btn btn-success btn-sm">製作データ</a>
                        <!-- <a href="{{ route('complete.data', ['id' => $data->id]) }}" class="btn btn-success btn-sm">製作データ</a> -->
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>

        <div class="d-flex justify-content-center">
        {{ $complete->links() }}
       </div>
      </div>

      <div class="col-12 d-block d-md-none mt-3" id="mobile"><h4>完成品</h4></div>

      <div class="col-12 d-block d-md-none card">

      @foreach($complete as $data)
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
				<td class="text-center"><span class="label {{ $data->completed_class }}">{{ $data->completed }}</span></td>
            </tr>

            <tr>
                <td></td><td><a href="/creator/all/{{ $data->id }}/productio" class="btn btn-success btn-sm btn-block">詳細</a><a href="/creator/production/completeAll/{{ $data->id }}" class="btn btn-primary btn-sm btn-block">製作データ</a></td>
            </tr>

        </tbody>
</table>
 @endforeach
<div class="d-flex justify-content-center">
         {{ $complete->links() }}
</div>

</div>



<br>
    </div>
</div>

@endsection
