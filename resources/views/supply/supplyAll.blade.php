@extends('layout')

@section('content')
<!-- <br>
<br> -->

<div class="d-none d-md-block col col-md-9">

          <h4 class="font-weight-bold">支給材リスト</h4>
          <a href="{{ route('supply.form') }}" class="col-md-12 btn btn-outline-primary mb-1">支給材リストを追加する</a>
        　<table class="table text-center">
            <thead class="thead-dark">
                <tr style="background-color: #444444; color: white">
                    <th>担当者</th>
                    <th>支給先</th>
                    <th>支給予定日</th>
                    <th>支給材</th>
                    <th>備考</th>
                    <th>確認</th>
                </tr>
                @foreach($supply as $data)
                <tr class="bg-white">
                    <td>{{ optional($data->user)->name }}</ｔ>
                    <td>{{ $data->payee }}</td>
                    <td>{{ $data->date }}</td>

                    @if($data->image)
                    <td><a href="{{ url('/storage/') }}/{{ $data->image }}">ファイルを見る</a></td>
                    @else
                    <td>ファイルは在りません</td>
                    @endif

                    <td>{{ Str::limit($data->comment,10) }}</td>
                    <td><a href="/supply_material/{{ $data->id}}/preview" class="btn btn-info btn-sm">詳細</a></td>
                </tr>
                @endforeach
            </thead>
        </table>
 <div class="d-flex justify-content-center">
         {{ $supply->links() }}
       </div>
      </div>

<div class="col-12 d-block d-md-none mt-3" id="mobile"><h4>支給材リスト</h4></div>
<a href="{{ route('supply.form') }}" class="col-11 d-block d-md-none btn btn-sm btn-primary m-auto">支給材リストを追加する</a>
<div class="col-12 mt-2 d-block d-md-none card">

@foreach($supply as $data)
  <table class="table">
  <tbody>
      <tr>
          <th scope="row" class="w-25 bg-light text-dark text-center">担当者</th>
          <td class="text-center">{{ optional($data->user)->name }}</td>
      </tr>


      <tr>
          <th scope="row" class="w-25 bg-light text-dark text-center">支給先</th>
          <td class="text-center">{{ $data->payee }}</td>
      </tr>

      <tr>
          <th scope="row" class="bg-light text-dark text-center">支給予定</th>
          <td class="text-center">{{ $data->date }}</td>
      </tr>

      <tr>
          <th scope="row" class="bg-light text-dark text-center">支給内容</th>
              @if($data->image)
                 <td class="text-center"><a href="{{ url('/storage/') }}/{{ $data->image }}">ファイルを見る</a></td>
              @else
                 <td class="text-center">ファイルは在りません</td>
              @endif
      </tr>

      <tr>
          <th scope="row" class="bg-light text-dark text-center">備考</th>
          <td class="text-center">{{ Str::limit($data->comment,10) }}</td>
      </tr>

      <tr>
          <th scope="row" class="bg-light text-dark text-center">確認</th>
          <td class="text-center"><a href="/supply_material/{{ $data->id}}/preview" class="btn btn-info btn-sm btn-block">詳細</a></td></td>
      </tr>

  </tbody>
</table>
@endforeach
<div class="d-flex justify-content-center">
   {{ $supply->links() }}
</div>

</div>



<br>
@endsection
