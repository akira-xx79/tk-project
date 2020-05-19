@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12">
       @foreach($production as $prodct)
        　<table class="table">
             <h4>{{ $prodct->company_name }}</h4>
            <thead class="thead-dark">
                <tr><th>受注番号</th> <th>製品名</th> <th>材質</th> <th>数量</th> <th>図面</th> <th>納期</th> <th>制作状況</th></tr>
                <tr class="table-dark"><td>{{ $prodct->contact_number }}</td><td>{{ $prodct->product_name }}titam</td><td>{{ $prodct->materiar_id }}eeeee</td><td>{{ $prodct->numcer }}222222</td><td>{{ $prodct->image }}</td><td>{{ $prodct->date }}</td><td>{{ $prodct->completed }}</td></tr>
            </thead>
        </table>
       @endforeach
        </div>
    </div>
</div>
@endsection

