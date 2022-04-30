@extends('layout')
@section('content')
<br class="d-none d-md-block">
<br class="d-none d-md-block">
<div class="d-none d-md-block col col-md-10">
　@if (Session::has('message'))
   　　   <div class="alert alert-success">
   　　　   {{ session('message') }}
    　  　</div>
      @endif
          <h4>登録者リスト</h4>
        　<table class="table">
            <thead class="thead-dark">
                <tr style="background-color: #444444; color: white">
                    <th style="width:12%">ID</th>
                    <th style="width:9%">氏名</th>
                    <th style="width:9%">招待者</th>
                    <th style="width:9%">登録日</th>
                    <th style="width:12%">確認</th>
                </tr>
                @foreach($user_list as $data)
                <tr class="bg-white">
                    <td>{{ $data->id }}</ｔ>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data['user']->name }}</td>
                    <td>{{ $data->created_at }}</td>
                    <form action="{{ url('/folders/{id}/userlist) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                    <td><a href="#" data-id="{{ $data->id }}" class="btn btn-danger btn-sm " onclick="deletePost(this);">削除</a></td>
                  </form>
                </tr>
                @endforeach
            </thead>
        </table>
</div>

<div class="d-block d-md-none col-12  mt-3" id="mobile"><h4>製造登録者リスト</h4></div>

      <div class="col-12 d-block d-md-none card">

      @foreach($user_list as $data)
		<table class="table">
		<tbody>
            <tr>
                <th scope="row" class="w-25 bg-light text-dark text-center">ID</th>
                <!-- <td class="text-center">{{ $data->company_name }}</td> -->
				<td class="text-center">{{ $data->id }}</td>
			</tr>


			<tr>
				<th scope="row" class="w-25 bg-light text-dark text-center">氏名</th>
				<td class="text-center">{{ $data->name }}</td>
			</tr>

			<tr>
			    <th scope="row" class="bg-light text-dark text-center">パスワード</th>
                <!-- <td class="text-center">{{ $data->product_name }}</td> -->
                <td class="text-center">{{ Str::limit($data->password, 20) }}</td>
			</tr>

			<tr>
				<th scope="row" class="bg-light text-dark text-center">登録日</th>
				<td class="text-center">{{ $data->created_at }}</td>
			</tr>

            <tr>
            <form action="{{ action('Admin\admin\UserListController@userdalete', $data->id) }}" id="form_{{ $data->id }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                   <td></td> <td><a href="#" data-id="{{ $data->id }}" class="btn btn-danger btn-sm btn-block" onclick="deletePost(this);">削除</a></td>
                  </form>

            </tr>
        </tbody>
</table>
@endforeach
<br>
      </div>
<br>
        <script>
function deletePost(e) {
  'use strict';

  if (confirm('本当に削除していいですか?')) {
  document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>
@endsection
