<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
 

  @yield('style')


</head>
<body>


         @yield('content')

    



@yield('script')

</body>
</html>
