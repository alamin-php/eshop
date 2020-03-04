<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css')}}">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
@include('menus.customer_header')
@include('menus.customer_sidebar')
      <div class="content-wrapper">
        @yield('content')
      </div>

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dist/js/app.min.js')}}"></script>
    @yield('script')
  </body>
</html>