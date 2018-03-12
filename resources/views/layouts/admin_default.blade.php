<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link href="{{ URL::asset('public/admin/css/vendor.css') }}" rel="stylesheet">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('public/bower_components/font-awesome/css/font-awesome.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('public/bower_components/Ionicons/css/ionicons.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('public/admin/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ URL::asset('public/admin/css/skins/_all-skins.min.css') }} ">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  @yield('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ Url::to('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ getSetting('site_shortname') }}</span>
      <!-- logo for regular state and mobile devices -->

      @if(getSetting('logo_type') == "name")
      <span class="logo-lg">{{ getSetting('site_name') }}</span>
      @else
      <span class="logo-lg"><img src="{{asset('public/uploads/'.getSetting('site_logo'))}}" height="50" width="50" ></span>
      @endif
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL::asset('public/admin/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ ucwords(Auth::user()->name) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL::asset('public/admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ ucwords(Auth::user()->name) }} - {{ ucwords(Auth::user()->username) }}
                </p>
              </li>

     
              <!-- Menu Footer-->
              <li class="user-footer">
             
                  <a href="{{ URL::to('admin/logout') }}" class="btn btn-default btn-flat"><i class="fa fa-fw fa-power-off"></i>Sign out</a>
               
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
       @include('layouts.inc.admin_sidebar')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('subtitle')
      @yield('breadcrumbs')  
    </section>

    <!-- Main content -->
    <section class="content">

         @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    {!! getSetting('site_copyright') !!}
    
  </footer>

 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ URL::asset('public/bower_components/jquery/dist/jquery.min.js') }} "></script>

<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('public/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('public/admin/js/adminlte.min.js') }}"></script>


<script src="{{ URL::asset('public/admin/js/vendor.js') }} "></script>




@yield('script')

</body>
</html>
