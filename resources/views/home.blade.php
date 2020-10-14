<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TK-Project</title>
    @yield('styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <!--fullcalendar-->
     <link href="{{ asset('assets/fullcalendar/packages/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/daygrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/timegrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/list/main.css') }}" rel='stylesheet' />

    <link href="{{ asset('assets/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" />
</head>

<body>
   <header>
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
   <a class="navbar-brand text-white " href="#">TK-project</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
  <div class="collapse navber-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li><a href="{{ url('/production/create') }}">制作依頼</a></li>
          <li></li>
          <li></li>
          <li></li>
      </ul>
  </div>
  <div class="my-navbar-control ml-auto pr-3">
      @if(Auth::check())
        <span class="my-navbar-item text-white">ようこそ, {{ Auth::user()->name }}さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
    <form class="form-inline" method="GET" action="/production/searchlist">
            <div class="form-group">
                <input type="text" name="keyword"  class="form-control" placeholder="製番・会社名・製品名">
            </div>
            <input type="submit" value="検索" class="btn btn-info ml-2">
     </form>
  </div>
</nav>
   </header>

  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">
            まずはフォルダを作成しましょう
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href="{{ route('folders.create') }}" class="btn btn-primary">
                フォルダ作成ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</body>
</html>

