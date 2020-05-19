<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TK-Project</title>
    @yield('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
   <header>
       <nav class="my-navbar">
           <a rel="my-navbar-brand" href="/">TK-Project</a>
           <div class="my-navbar-control">

           </div>
       </nav>
   </header>
   <main>
             @yield('content')
   </main>
    <div class="container">
       <div class="row">
          <div class="col col-md-6"></div>
    </div>
    </div>
</body>
</html>
