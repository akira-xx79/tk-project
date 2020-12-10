<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEAM</title>
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
   <a class="navbar-brand text-white " href="#">Seam</a>

  <div class="collapse navber-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li><a href="{{ url('/production/create') }}">制作依頼</a></li>
          <li></li>
          <li></li>
          <li></li>
      </ul>
  </div>
  <div class="d-none d-md-block my-navbar-control ml-auto pr-3">
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

    <div class="d-block d-md-none my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item text-white">{{ Auth::user()->name }}さん</span>
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

    <div class="d-none d-md-block">
    <form class="form-inline" method="GET" action="/production/searchlist">
            <div class="form-group">
                <input type="text" name="keyword"  class="form-control" placeholder="製番・会社名・製品名">
            </div>
            <button class="btn btn-outline-success ml-3" type="submit">Search</button>
     </form>
     </div>

<div class="d-block d-md-none">
     <form class="form-inline" method="GET" action="/production/searchlist">
     <div class="form-group mx-sm-3">
    <input class="form-control ml-2" type="text" name="keyword" size="25" placeholder="製番/会社名/製品名">
     </div>
     <button class="btn btn-outline-success mb-3 ml-3" type="submit">Search</button>
  </form>
</div>

  </div>
</nav>
   </header>
<br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col col-md-7 m-auto">
          <div class="card">
 　　　　　 <h6 class="card-header">Myフォルダー管理機能</h6>
 　　　　　 <div class="card-body text-center">
  　　　　   <h6 class="card-title">まずはフォルダーを作成しましょう。</h6>
   　　　　  <p class="card-text">自分で好きなフォルダーを作りファイル事に管理できます。</p>
  　　　　   <a href="{{ route('folders.create') }}" class="btn btn-primary">フォルダ作成ページへ</a>
 　　　　   </div>
        　 </div>
      </div>
    </div>
  </div>

  @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif

</body>
</html>

