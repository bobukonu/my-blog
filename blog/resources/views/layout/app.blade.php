<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="/blog/css/bootstrap.css">
    <link rel="stylesheet" href="/blog/css/custom.css">
    <link rel="stylesheet" href="/blog/font/css/all.css">

  </head>
  <body>

    @include('inc.navbar')
    <div class="container">
      <div class="row">

            @yield('content')


          

      </div>

  </div>
<br><br>

  @include('inc.footer')


    <script src="/blog/js/jquery.js" charset="utf-8"></script>
    <script src="/blog/js/bootstrap.js" charset="utf-8"></script>
    <script src="/blog/font/js/all.js" charset="utf-8"></script>
  </body>
</html>
