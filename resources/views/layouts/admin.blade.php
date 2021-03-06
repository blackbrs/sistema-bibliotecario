<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('fragments.main_script_tags')
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('header')
  @yield('head-special')
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SBM - ADMIN') }}</title>

</head>
<body class="hold-transition sidebar-mini">
  
  <!-- Wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.partials.navbar')
  <!-- Main Sidebar -->
  @include('admin.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('fail'))
        <div class="container">
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
        </div>     
        @endif
            @if (session('info'))
            <div class="container">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>     
            </div>     
            @endif
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
</body>
</html>
