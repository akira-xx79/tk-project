@extends('layouts.admin.app')

@section('content')
   <main>
       <div class="container">
       <div class="row">

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
