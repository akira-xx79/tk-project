@extends('layout')

@section('folder')
<br class="card d-none d-md-block">
<div class="card d-none d-md-block">
    <div class="card-header"><i class="fas fa-th-list"></i></i> MyFolder</div>
    <div class="card-body">
        <div class="panel panel-default">
            <a href="{{ route('create.list') }}" type="button" class="btn btn-success btn-sm">依頼者登録</a>
            <a href="{{ route('folders.create') }}" class="btn btn-outline-primary mb-1 btn-sm">フォルダー追加</a></li><br>
            <div class="list-group">
                @foreach($folders as $folder)
                <a href="{{ route('product.folder', ['id' => $folder->id]) }}" class="list-group-item">
                    {{ $folder->title }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<!-- モバイル -->

<div class="col-12">
    <button class="d-block d-md-none btn btn-secondary btn-sm btn-block mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Myファルダー
    </button>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="panel panel-default">
                <a href="{{ route('create.list') }}" type="button" class="btn btn-success btn-sm">依頼者登録</a>
                <a href="{{ route('folders.create') }}" class="btn btn-outline-primary mb-1 btn-sm">フォルダー追加</a></li><br>
                <div class="list-group">
                    @foreach($folders as $folder)
                    <a href="{{ route('product.folder', ['id' => $folder->id]) }}">
                        {{ $folder->title }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


</div>



<br>


@endsection
