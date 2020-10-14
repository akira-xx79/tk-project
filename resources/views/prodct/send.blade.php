@extends('index')


@section('content')
<br>
<div class="container">
<h3 class="p-3 mb-2 bg-secondary text-white">依頼内容確認</h3>
<form action="{{ route('/production/send') }}" method="POST" enctype="multipart/form-data">
   @csrf

   <label>受注番号</label>
   　 <input type="hidden" class="form-control" name="contact_number" id="contact_number" placeholder="受注番号" value="{{ $product['contact_number'] }}" >
</form>
</div>
@endsection

