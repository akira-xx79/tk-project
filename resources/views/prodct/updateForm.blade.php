@extends('layout')

@section('content')
<br>
<div class="col col-md-10">
    <h3 class="p-3 mb-1 bg-secondary text-white">依頼編集フォーム</h3>
    <form action="/folders/check/{{ $data->id }}/update" method="POST" class="p-4" style="background-color: white;" enctype="multipart/form-data" novalidate>
        @csrf
        <h5 class="font-weight-bold">受注情報</h5>
        <br>
        <div class="form-row pb-4">
            <div class="form-group col-md-6">

                <input type="hidden" name="_method" value="PATCH">

                <label for="contact_number">受注番号</label>
                <input type="text" class="form-control @if($errors->has('contact_number')) is-invalid @endif" name="contact_number" id="contact_number" placeholder="受注番号" value="{{ $data->contact_number }}" required>
                <div class="invalid-feedback">
                    @if($errors->has('contact_number')) <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="company_name">顧客名</label>
                <input type="text" class="form-control @if($errors->has('company_name')) is-invalid @endif" name="company_name" id="company_name" placeholder="顧客名" value="{{ $data->company_name }}" required>
                <div class="invalid-feedback">
                    @if($errors->has('company_name')) <span class="text-danger">{{ $errors->first('company_name') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
        </div>

        <h5 class="font-weight-bold">製品情報</h5>
        <br>
        <div class="form-row pb-4">
            <div class="form-group col-md-2">
                <label for="category_id">カテゴリー</label>
                <select name="category_id" class="form-control" id="category_id" value="{{ $data->category_id }}">
                    <option value="1">新規制作</option>
                    <option value="2">追加工</option>
                    <option value="3">補修</option>
                    <option value="4">リピート品</option>
                    <option value="5">バリ取り/タップ・穴あけ</option>
                    <option value="6">現場作業</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="materiar_id">材質</label>
                <select name="materiar_id" class="form-control" id="materiar_id" value="{{ $data->materiar_id }}">
                    　<option value="1">Ti</option>
                    <option value="2">Ti/64</option>
                    <option value="3">Ti/SUS</option>
                    <option value="4">SUS304</option>
                    <option value="5">SUS316</option>
                    <option value="6">SUS316L</option>
                    <option value="7">樹脂</option>
                    <option value="8">その他</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="product_name">製品/作業内容</label>
                <input type="text" class="form-control @if($errors->has('product_name')) is-invalid @endif" name="product_name" id="product_name" value="{{ $data->product_name}}" required>
                <div class="invalid-feedback">
                    @if($errors->has('product_name')) <span class="text-danger">{{ $errors->first('product_name') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="numcer">数量</label>
                <input type="text" class="form-control @if($errors->has('numcer')) is-invalid @endif" name="numcer" id="numcer" value="{{ $data->numcer }}" required>
                <div class="invalid-feedback">
                    @if($errors->has('numcer')) <span class="text-danger">{{ $errors->first('numcer') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="date">納期</label>
                <input type="date" class="form-control @if($errors->has('date')) is-invalid @endif" name="date" id="date" value="{{ $data->date }}" required>
                <div class="invalid-feedback">
                    @if($errors->has('date')) <span class="text-danger">{{ $errors->first('date') }}</span> @endif
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="comment">コメント</label>
                <textarea name="comment" class="form-control" id="comment" rows="3">{{ $data->comment }}</textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="image">図面</label>
                <input type="file" name="image" class="form-control-file @if($errors->has('image')) is-invalid @endif" id="image" value="{{ $data->image }}" required>

                <input class="form-check-input ml-1" name="noimage" type="checkbox" value="noimage" id="noimage" required>
                <label class="form-check-label ml-3" for="defaultCheck1">
                    ＊図面が無ければチェックして下さい。
                </label>
                <div class="invalid-feedback">
                    @if($errors->has('image')) <span class="text-danger">{{ $errors->first('image') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                    <br>
                    @if($errors->has('noimage')) <span class="text-danger">{{ $errors->first('noimage') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
        </div>

        <h5 class="font-weight-bold">配送情報</h5>
        <br>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="shipment_location_id">発送場所</label>
                <select name="shipment_location_id" class="form-control" id="shipment_location_id" value="{{ $data->shipment_location_id }}">
                    　　<option value="1">事務所</option>
                    　 <option value="2">工場</option>
                    　 <option value="3">配達</option>
                    　 <option value="4">引き取り</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="carrier_id">配送業者</label>
                <select name="carrier_id" class="form-control" id="carrier_id" value="{{ $data->carrier_id }}">
                    　 <option value="1">ヤマト運輸</option>
                    　 <option value="2">佐川急便</option>
                    　<option value="3">トナミ運輸</option>
                    　<option value="4">西濃運輸</option>
                    <option value="5">DHL</option>
                    <option value="6">その他</option>
                    　
                </select>
                <div class="invalid-feedback">
                    @if($errors->has('image')) <span class="text-danger">{{ $errors->first('image') }}</span>
                    @else
                    <div class="invalid-feedback">必須項目です</div>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger btn-lg">確定</button>
    </form>
</div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    (function() {
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
