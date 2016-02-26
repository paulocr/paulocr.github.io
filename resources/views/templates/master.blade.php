<!DOCTYPE html>
<html lang="en">
<head>
      @include('templates.header')
</head>
<body>
   <div class="container">
      @include('templates.navbar')
   </div>
   <div class="container">
      @yield('content')
   </div>
   <div class="container">
      @include('templates.footer')
   </div>
</body>
</html>