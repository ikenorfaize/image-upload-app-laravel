<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Name - @yield('title')</title>
  
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

  @section('topbar')
    @include('navbar')
  @show

  <div class="container mt-5">
    @yield('content')
  </div>

</body>
</html>