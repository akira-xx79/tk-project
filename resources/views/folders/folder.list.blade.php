@extends('layout')

@section('content')
<div class="card">
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
