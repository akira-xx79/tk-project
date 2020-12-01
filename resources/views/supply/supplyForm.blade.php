@extends('layout')

@section('content')
<br>

<div class="col-md-10 clearfix">
<div class="card">
  <div class="card-header">
   支給材フォーム
  </div>
<div class="card-body">
<form action="{{ route('supply.create') }}" method="POST" enctype="multipart/form-data">
　@csrf
  <!-- creator_id -->
  <div class="form-group" style="display:none;">
    <label for="user_id">user_id</label>
    <input type="text" class="form-control" value="{{ Auth::id() }}" name="user_id" id="user_id" >
  </div>
  <div class="form-group">
    <label for="payee">支給先</label>
    <select class="form-control" name="payee" id="payee"　value="{{ old('payee') }}">
      <option>ティアンドエス</option>
      <option>ユースワーク</option>
      <option>下田製作所</option>
      <option>笹沼製作所</option>
      <option>スリーズリアン</option>
      <option>興和鋼管</option>
      <option>関東発条</option>
      <option>幸電気製作所</option>
      <option>シンワ電熱</option>
      <option>ゴールドスミス</option>
      <option>DEVIOS</option>
      <option>エステーリンク</option>
      <option>その他</option>
    </select>
  </div>
  <div class="form-group">
    <label for="date">支給予定日</label>
    <input type="date" class="form-control"  name="date" id="date" value="{{ old('date') }}" >
  </div>
  <div class="form-group">
    <label for="image">手配書</label>
    <input type="file" class="form-control-file @if($errors->has('image')) is-invalid @endif pb-2" name="image" id="image" multiple>

    <div class="invalid-feedback">
        @if($errors->has('image')) <span class="text-danger">{{ $errors->first('image') }}</span>
        @else
        <div class="invalid-feedback">必須項目です</div>
        @endif
      </div>
  </div>
  <div class="form-group">
    <label for="comment">コメント&nbsp;&nbsp;<samp>※支給先・手配書の該当が無い場合こちらに記入してください。</samp></label>
    <textarea class="form-control" name="comment" value="{{ old('comment') }}" id="comment" rows="3"></textarea>
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-danger float-right">確定</button>
</form>
</div>
</div>
</div>
@endsection
