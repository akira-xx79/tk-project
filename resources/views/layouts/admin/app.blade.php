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

    <style>
        .navbar .navbar-toggler {
           color: rgba(0, 0, 0, 0.5);
           border: none;
           padding: 0px;
           width: 30px;
           height: 30px;
           box-sizing: border-box;
           position: relative;
        }
        .navbar .navbar-toggler-icon {
           background-image:none; /* この行で背景画像を無効化 */
           background-color: #fff;
           width: 30px;
           height: 2px;
           display: block;
           position: absolute;
           transition: ease .5s;
        }

        /* 3本のバーそれぞれの座標を設定 */
        .navbar-toggler-icon:nth-of-type(1) {top:7px;}
        .navbar-toggler-icon:nth-of-type(2) {top:14px;}
        .navbar-toggler-icon:nth-of-type(3) {top:21px;}

        /* メニューが開いている時の　3本のバーそれぞれの座標および角度を設定 */
        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:nth-of-type(1) {
            top:13px;
            transform: rotate(45deg);
        }
        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:nth-of-type(2) {
            opacity: 0;
        }
        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:nth-of-type(3) {
            top:13px;
            transform: rotate(-45deg);
        }
         .navbar-nav a {
             color: white;
             border-bottom: white 1px;
        }

        .bottom-sticky-nav {
            display: none;
        }

     @media (max-width: 720px) {
        .bottom-sticky-nav {
            width: 380px;
            height: 50px;
            position: fixed;
            display: block;
            background: #ffffff;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }
        .bottom-sticky-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-evenly;
        }
       .bottom-sticky-nav ul li {
            flex: 1;
        }
       .bottom-sticky-nav ul li a {
            color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            height: 50px;
            color: #00587a;
        }
        .bottom-sticky-nav ul li a:hover,
        .bottom-sticky-nav ul li a:focus {
            text-decoration: none;
        }
        .bottom-sticky-nav ul li a i {
            font-size: 10px;
        }
        .bottom-sticky-nav ul li a span {
            color: black;
            font-size: 8px;
            line-height: 1.2;
        }
        footer {
            margin-bottom: 30px;
        }

        ul li.current{
            background-color: #a9a9a9;
        }
        ul li.current a{
            color: #555;
        }
        ul li:hover{
            background-color: #a9a9a9;
        }
    }

        .bottom-sticky-nav a {
            width: 70%;
            margin: 0;
        }

        .bottom-sticky-nav ul li {
            width: 70px;
            margin: 0;
        }

        img {
            width: 30%;
       }
    </style>
</head>

<body>
   <header>
   <nav class="navbar navbar-expand-lg navbar-light bg-info">
   <a class="navbar-brand text-white " href="#"><span class="text-dark font-weight-bold">SEAM</span> 管理者</a>

  <div class="d-none d-md-block my-navbar-control ml-auto pr-3">
      @if(Auth::check())
        <span class="my-navbar-item text-white">ようこそ, {{ Auth::user()->name }}さん</span>
        ｜
        <a href="/topLogin" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
      <a href="/topLogin" id="logout" class="my-navbar-item">ログアウト</a>
        <!-- <a class="my-navbar-item" href="{{ route('admin.login') }}">ログイン</a> -->
        <!-- ｜
        <a class="my-navbar-item" href="{{ route('admin.register') }}">会員登録</a> -->
      @endif
    </div>

    <div class="d-block d-md-none my-navbar-control">
      @if(Auth::check())
        <span class="my-navbar-item text-white">{{ Auth::user()->name }}さん</span>
        ｜
        <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      @else
      　<a href="/topLogin" id="logout" class="my-navbar-item">ログアウト</a>
        <!-- <a class="my-navbar-item" href="{{ route('admin.login') }}">ログイン</a> -->

        <!-- <a class="my-navbar-item" href="{{ route('admin.register') }}">会員登録</a> -->
      @endif
    </div>



</nav>
   </header>
   <main>
       <br class="d-none d-md-block"><br class="d-none d-md-block">
       <div class="container">
       <div class="row">
         <br><br>
  <div class="col-md-2 d-none d-md-block">
      <div class="card">
          <div class="card-header"><i class="fas fa-th-list"></i></i> MENU</div>
          <div class="card-body">
              <div class="panel panel-default">
                  <ul class="nav nav-pills nav-stacked" style="display:block;">
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('admin.sales.list') }}">営業登録リスト</a></li><br>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('admin.creator.list') }}">製造登録リスト</a></li><br>
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

<nav class="bottom-sticky-nav fixed-bottom">
    <ul>
        <li>
            <a class="px-0 pt-2 m-auto" href="{{ route('admin.sales.list') }}"><i class="fa fa-home"></i><img src="/storage/images/サラリーマン.png" alt=""><span class="p-1">営業</span></a></li>
        <li>
            <a class="px-0 pt-2 m-auto" href="{{ route('admin.creator.list') }}"><i class="fa fa-user"></i><img src="/storage/images/配達員アイコン2.png" alt=""><span class="p-1">製造</span></a></li>
        <!-- <li>
            <a class="px-0 pt-2 m-auto" href="{{ route('calendar') }}"><i class="fa fa-briefcase"></i><img src="/storage/images/分析アイコン.png" alt=""><span class="p-1">月間受注率</span></a></li> -->
    </ul>
</nav>
</html>
