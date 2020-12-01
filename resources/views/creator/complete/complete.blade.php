@extends('layouts.creator.app')

@section('content')
<br>
@if (count($errors) > 0)
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

@endif
<div class="col-md-10 clearfix">
<br class="d-block d-md-none">
<div class="card">

  <div class="card-header">
   完成フォーム
  </div>
<div class="card-body">
<form action="{{ route('complere.post') }}" method="POST" enctype="multipart/form-data">
　@csrf
<!-- prodct_id -->
  <div class="form-group" style="display:none;">
    <label for="production_id">production_id</label>
    <input type="text" class="form-control" value="{{ $prodct_id }}" name="production_id" id="production_id" placeholder="Example input">
  </div>
  <!-- creator_id -->
  <div class="form-group" style="display:none;">
    <label for="creator_id">creator_id</label>
    <input type="text" class="form-control" value="{{ Auth::id() }}" name="creator_id" id="creator_id" placeholder="Example input">
  </div>
  <!-- completed -->
  <!-- <div class="form-group" style="display:none;">
    <label for="completed">completed</label>
    <input type="text" class="form-control" value="{{ $complere }}" name="completed" id="completed" placeholder="Example input">
  </div> -->
  <div class="form-group">
    <label for="lead_time">制作時間</label>
    <select class="form-control" name="lead_time" id="lead_time">
      <option>1時間</option>
      <option>2時間</option>
      <option>3時間</option>
      <option>4時間</option>
      <option>5時間</option>
      <option>6時間</option>
      <option>7時間</option>
      <option>8時間</option>
      <option>1日半(8h+4h)</option>
      <option>2日(8h×2)</option>
      <option>3日(8h×3)</option>
      <option>4日(8h×4)</option>
      <option>1週間(8h×5)</option>
      <option>2週間(8h×10)</option>
      <option>3週間(8h×15)</option>
    </select>
  </div>
  <div class="form-group">
    <label for="photo">展開図・制作写真</label>
    <input type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
    <input type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
    <input type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
    <input type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
    <input type="file" class="form-control-file" name="image[][photo]" multiple>
    <!-- <div class="invalid-feedback">
        @if($errors->has('files')) <span class="text-danger">{{ $errors->first('files') }}</span>
        @else
        <div class="invalid-feedback">必須項目です</div>
        @endif
      </div> -->
  </div>
  <div class="form-group">
    <label for="comment">製作コメント</label>
    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
  </div>
  {{ csrf_field() }}
  <button type="submit" class="btn btn-danger float-right">確定</button>
  <!-- <button class="btn btn-success float-right mr-1" onclick="window.history.back()">戻る</button> -->
</form>
</div>
</div>
</div>
@endsection
