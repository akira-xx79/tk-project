@extends('layout')

@section('folder')
<br class="card d-none d-md-block">
      <div class="card d-none d-md-block">
          <div class="card-header"><i class="fas fa-th-list"></i></i> MyFolder</div>
          <div class="card-body">
              <div class="panel panel-default">
                      <a href="{{ route('folders.create') }}" class="btn btn-outline-primary mb-1 btn-sm">フォルダ追加</a></li><br>
                      <div class="list-group">
            @foreach($folders as $folder)
              <a href="{{ route('product.folder', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
              </div>
          </div>
      </div>
@endsection
@section('content')

<div class="d-none d-md-block col-12 col-md-10">

　    　@if (Session::has('message'))
   　　   <div class="alert alert-success">
   　　　   {{ session('message') }}
    　  　</div>
      @endif

          <h4>{{ $current_folder->title }}</h4>
          <a href="{{ route('production.create', ['id' => $current_folder_id]) }}" class="col btn btn-outline-primary ">このフォルダに依頼追加</a>
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
                @foreach($product as $data)
                <tr class="bg-white">
                    <td>{{ Str::limit($data->company_name,10) }}</ｔ>
                    <td>{{ $data->contact_number }}</td>
                    <td>{{ Str::limit($data->product_name,10) }}</td>
                    <td>{{ optional($data->materiaries)->mat_name }}</td>
                    <td>{{ $data->numcer }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->completed }}</td>
                    <td><a href="/folder/{{ $data->id }}/productio" class="btn btn-info btn-sm">詳細</a></td>
                </tr>
                @endforeach
            </thead>
        </table>

        <div class="d-flex justify-content-center">
         {{ $product->links() }}
       </div>
      </div>

      <!-- モバイル -->

 <div class="col-12">
 <button class="d-block d-md-none btn btn-secondary btn-sm btn-block mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Myファルダー
  </button>

<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <div class="panel panel-default">
                      <a href="{{ route('folders.create') }}" class="btn btn-outline-primary mb-1 btn-sm">フォルダ追加</a></li><br>
                      <div class="list-group">
            @foreach($folders as $folder)
              <a href="{{ route('product.folder', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
              </div>
  </div>
</div>
 </div>

<div class="col-12 d-block d-md-none" id="mobile"><h4>{{ $current_folder->title }}</h4></div>
<a href="{{ route('production.create', ['id' => $current_folder_id]) }}" class="col-6 d-block d-md-none btn btn-primary btn-sm m-auto">このフォルダに依頼追加</a>
<div class="col-12 mt-2 d-block d-md-none card">
@foreach($product as $data)
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
          <th><td><a href="/folder/{{ $data->id }}/productio" class="btn btn-success btn-sm btn-block">詳細</a></th></td>
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
