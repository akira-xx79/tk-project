<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vue -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>SEAM</title>
    @yield('styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">

    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style>
        body {
            width: 100%;
            height: 100%;
            background-image: url("{{asset('storage/images/topSEAM_n2_page-0001.jpg')}}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .row {
            margin-top: 680px;
        }

        /* .jumbotron {
            background-image: url("{{asset('storage/images/newTopLog.pdf')}}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: 500px;
            object-fit: contain;
        } */

        .sample1 {
            display: inline-block;
            font-size: 160%;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 10px #777,
                -2px 2px 10px #777,
                2px -2px 10px #777,
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
        <div class="row d-flex justify-content-center">
            <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#exampleModalCenter">
                ログイン
            </button>
            <a href="{{ route('admin.register')}}" type="button" class="btn btn-danger">新規にはじめる</a>
        </div>
        <!-- <div class="row d-flex justify-content-center m-0">
            <a href="{{ route('admin.register')}}" type="button" class="btn btn-outline-danger">新規にはじめる</a>
        </div> -->
    </div>



    <div id="app">
        <example-component></example-component>
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
                        <div class="col-sm-12 mb-2"> <a href="{{ route('product_all') }}" type="button" class="btn btn-secondary btn-lg btn-block">手配者</a></div>
                        <div class="col-sm-12 mb-2"> <a href="{{ route('creator.login') }}" type="button" class="btn btn-secondary btn-lg btn-block">制作者</a></div>
                        <div class="col-sm-12 mb-1"> <a href="{{ route('admin.login') }}" type="button" class="btn btn-outline-danger btn-lg btn-block">管理者</a></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{ mix('js/app.js')}}"></script>

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
