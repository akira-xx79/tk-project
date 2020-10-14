@extends('layout')

@section('content')
<br>
<br>
<br>
    <div class="col col-md-9">
        <br>
        <div id="calendar" data-route-load-events="{{ route('routeLoadEvents') }}"></div>
         <link rel="stylesheet" href="https://js.cybozu.com/fullcalendar/v3.9.0/fullcalendar.min.css">
    </div>

    <!-- <div class="col-12 h-100">
        <div id="calendar" data-route-load-events="{{ route('routeLoadEvents') }}"></div>
        <link rel="stylesheet" href="https://js.cybozu.com/fullcalendar/v3.9.0/fullcalendar.min.css">
    </div> -->
</div>

    <script src="{{ asset('assets/fullcalendar/packages/core/main.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/packages/core/locales/ja.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/packages/interaction/main.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/packages/daygrid/main.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/packages/timegrid/main.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/packages/list/main.js') }}"></script>

    <script src="{{ asset('assets/fullcalendar/packages/core/locales-all.js') }}"></script>

    <script src="/js/ajax-setup.js"></script>
    <!-- <script src='/js/fullcalendar.js'></script> -->

    <script src="{{ asset('assets/fullcalendar/js/program.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar/js/script.js') }}"></script>
    <!-- <script src="{{ asset('/js/fullcalendar.js') }}"></script> -->
</body>
</html>
@endsection
