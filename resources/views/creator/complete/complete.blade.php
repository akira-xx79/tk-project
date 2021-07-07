@extends('layouts.creator.app')

@section('content')
<br>

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
                    <label class="font-weight-bold" for="lead_time">制作時間</label>
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
                <br>

                <div class="form-group">
                    <label class="font-weight-bold" for="photo">展開図・制作写真</label><br>
                    <div class="col-sm-6 alert alert-success text-nowrap" role="alert">
                        <input class="form-check-input ml-1" name="noimage" type="checkbox" value="noimage" id="noimage">
                        <label class="form-check-label ml-3" for="defaultCheck1">
                            ＊画像無ければチェックして下さい。
                        </label>
                    </div>
                    <input id="image" type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
                    <input id="image" type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
                    <input id="image" type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
                    <input id="image" type="file" class="form-control-file pb-2" name="image[][photo]" multiple>
                    <input id="image" type="file" class="form-control-file" name="image[][photo]" multiple>

                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li><span class="text-danger">{{ $error }}</li></span>
                            @endforeach
                        </ul>
                        @endif

                </div>
                <br>
                <div class="form-group">
                    <label class="font-weight-bold" for="comment">製作コメント</label>
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(function() {
        'use strict';

        window.addEventListener('load', function() {
            // カスタムブートストラップ検証スタイルを適用するすべてのフォームを取得
            var forms = document.getElementsByClassName('needs-validation');
            // ループして帰順を防ぐ
            var validation = Array.prototype.filter.call(forms, function(form) {
                // submitボタンを押したら以下を実行
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

@endsection
