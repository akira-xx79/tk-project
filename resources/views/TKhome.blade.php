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
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">

    <style>
        .jumbotron {
           background-image: url("{{asset('storage/images/tk.jpg')}}") ;
           background-size: 100% 100%;
           background-repeat: no-repeat;
           height: 500px;
           object-fit: contain;
        }

        .sample1 {
           display     : inline-block;
           font-size   : 160%;
           font-weight : bold;
           color       : #ffffff;
           text-shadow:  2px  2px 10px #777 ,
                        -2px  2px 10px #777 ,
                         2px -2px 10px #777 ,
                        -2px -2px 10px #777;
        }

    </style>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!--fullcalendar-->
     <link href="{{ asset('assets/fullcalendar/packages/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/daygrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/timegrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/packages/list/main.css') }}" rel='stylesheet' />

    <link href="{{ asset('assets/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <span class="border-bottom">
        <div class="row my-5">
            <h1>TK FACTORY Co.Ltd</h1>
        </div>
        </span>
    <div class="jumbotron">
     <span class="sample1"><h1 class="display-4" style="color:white">Production order project</h1></span>
     <div class="col-12 col-md-12 text-center mt-5">
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
     <!-- <a class="btn btn-outline-light btn-lg" href="#" role="button">LOGIN</a> -->
     <button type="button" class="btn btn-outline-light btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
        ＰＵＳＨ
     </button>
     </div>
   </div>

   <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login Home</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="contaiber-fluid">
              <div class="col-sm-12 mb-2"> <a href="{{ route('product_all') }}" type="button" class="btn btn-secondary btn-lg btn-block">Sales</a></div>
              <div class="col-sm-12 mb-2"> <a href="{{ route('creator.login') }}" type="button" class="btn btn-secondary btn-lg btn-block">Craft</a></div>
              <div class="col-sm-12 mb-1"> <a href="{{ route('admin.login') }}" type="button" class="btn btn-outline-danger btn-lg btn-block">Admin</a></div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    </div>

    <script>
$(function() {
    $('.modal_show').on('click', function() {
        $('#my_modal').modal();
    });
    $('.modal_close').on('click', function() {
        $('#my_modal').modal('hide');
    });
})
</script>

</body>
</html>
