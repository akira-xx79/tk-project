@section('sidebar')
<div class="row">
<div class="col-md-3">
      <div class="card">
          <div class="card-header"><i class="fas fa-th-list"></i></i> MENU</div>
          <div class="card-body">
              <div class="panel panel-default">
                  <ul class="nav nav-pills nav-stacked" style="display:block;">
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('product_all') }}">受注一覧</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('calendar') }}">受注カレンダー</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="#">検索</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <p>Myホルダー</p>
                      <a href="{{ route('folders.create') }}" class="btn btn-outline-primary mb-1 btn-sm">フォルダ追加</a></li><br>
                      <div class="list-group">
            @foreach($folders as $folder)
              <a href="{{ route('product.folder', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
                </ul>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
