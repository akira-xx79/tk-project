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
   <nav class="col-12 navbar navbar-expand-lg navbar-light bg-success">

   <a class="navbar-brand text-white " href="{{ url('/topLogin') }}">
   <span class="text-dark font-weight-bold">SEAM</span> 制作者</a>

  <div class="my-navbar-control ml-auto pr-3">
      @if(Auth::check())
       <span class="my-navbar-item text-white">{{ Auth::user()->name }}さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('creator.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('creator.login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('creator.register') }}">会員登録</a>
      @endif
    </div>

    <div class="d-none d-md-block">
    <form class="form-inline" method="GET" action="{{ route('search') }}">
            <div class="form-group">
                <input type="text" name="keyword"  class="form-control" placeholder="製番・会社名・製品名">
            </div>
            <button class="btn btn-primary ml-3" type="submit">Search</button>
     </form>
     </div>

<div class="d-block d-md-none">
     <form class="form-inline" method="GET" action="{{ route('search') }}">
     <div class="form-group mx-sm-3">
    <input class="form-control ml-2" type="text" name="keyword" size="25" placeholder="製番/会社名/製品名">
     </div>
     <button class="btn btn-primary mb-3 ml-3" type="submit">Search</button>
  </form>
</div>

</nav>
   </header>

   <main>
       <br><br>
       <div class="container">
       <div class="row">
         <br><br><br>
  <div class="col-md-2">
      <div class="card">
          <div class="card-header"><i class="fas fa-th-list"></i></i> MENU</div>
          <div class="card-body">
              <div class="panel panel-default">
                  <ul class="nav nav-pills nav-stacked" style="display:block;">
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('creator.prodcto.all') }}">受注一覧</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('creator.calendar') }}">受注カレンダー</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('creator.supply.All') }}">支給材リスト</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('creator.complete.all') }}">完成品リスト</a></li><br>
                </ul>
              </div>
          </div>
      </div>
      @yield('folder')
  </div>
             @yield('content')
       </div>
   </main>
   @if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif
    @yield('scripts')
</body>
</html>
