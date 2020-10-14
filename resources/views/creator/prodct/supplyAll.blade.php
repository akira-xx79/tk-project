@extends('layouts.creator.app')

@section('content')
<br class="d-none d-md-block">
<br class="d-none d-md-block">

<div class="d-none d-md-block col col-md-9">

          <h4>支給材リスト</h4>
        　<table class="table">
            <thead class="thead-dark">
                <tr style="background-color: #444444; color: white">
                    <th style="width:12%">担当者</th>
                    <th style="width:9%">支給先</th>
                    <th style="width:12%">支給予定日</th>
                    <th style="width:9%">支給材</th>
                    <th style="width:9%">備考</th>
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

                    <td>{{ $data->comment }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
 <div class="d-flex justify-content-center">
         {{ $supply->links() }}
       </div>

      </div>

<div class="col-12 d-block d-md-none mt-3" id="mobile"><h4>支給材リスト</h4></div>

<div class="col-12 d-block d-md-none card">

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
          <th scope="row" class="bg-light text-dark text-center">支給材</th>
              @if($data->image)
                 <td class="text-center"><a href="{{ url('/storage/') }}/{{ $data->image }}">ファイルを見る</a></td>
              @else
                 <td class="text-center">ファイルは在りません</td>
              @endif
      </tr>

      <tr>
          <th scope="row" class="bg-light text-dark text-center">備考</th>
          <td class="text-center">{{ $data->comment }}</td>
      </tr>

  </tbody>
</table>
@endforeach
<div class="d-flex justify-content-center">
   {{ $supply->links() }}
</div>

</div>

    </div>
@endsection
