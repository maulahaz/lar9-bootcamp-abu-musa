<?php $loggedinInfo = auth()->user(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $webTitle }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ url('t_adminlte3') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('t_adminlte3/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('t_adminlte3/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('/')}}" class="brand-link">
        <img src="{{url('images/icon.png')}}" alt="Apps Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kurses</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('uploads/user') }}/{{ Auth::user()->picture }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            @if(auth()->user())
            <a href="#" class="d-block">{{ Auth::user()->username }}</a>
            @else
            Guess
            @endif
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-header">ADMIN</li>
            <li class="nav-item has-treeview {{request()->is('admin/materi') ? 'menu-open' : 'menu-close'}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Materi<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/materi') }}" class="nav-link {{request()->is('admin/materi') ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/materi/report') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{request()->is('admin/tugas') ? 'menu-open' : 'menu-close'}}">
              <a href="#" class="nav-link {{request()->is('tugas') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Tugas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/tugas') }}" class="nav-link {{request()->is('admin/tugas') ? 'active' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/tugas/report') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{url('tugas-exec')}}" class="nav-link {{request()->is('tugas-exec') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Tugas Ku</p>
              </a>
            </li>
            @if($loggedinInfo->role_id != 1)
            <li class="nav-item">
              <a href="{{url('admin/user')}}" class="nav-link {{request()->is('admin/user') ? 'active' : ''}}">
                <i class="nav-icon fas fa-image"></i>
                <p>User</p>
              </a>
            </li>
            @endif

            <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
              <a href="{{url('account/profile')}}" class="nav-link {{request()->is('account/profile') ? 'active' : ''}}">
                <i class="nav-icon fas fa-file"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('account/dashboard')}}" class="nav-link {{request()->is('account/dashboard') ? 'active' : ''}}">
                <i class="nav-icon fas fa-file"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @if(auth()->user())
            <li class="nav-item">
              <a href="{{url('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Logout</p>
              </a>
            </li>
            @endif

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      @yield('content')

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{url('t_adminlte3/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{url('t_adminlte3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{url('t_adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ url('t_adminlte3') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- ChartJS -->
  <script src="{{url('t_adminlte3/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{url('t_adminlte3/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{url('t_adminlte3/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{url('t_adminlte3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{url('t_adminlte3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{url('t_adminlte3/plugins/moment/moment.min.js')}}"></script>
  <script src="{{url('t_adminlte3/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{url('t_adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{url('t_adminlte3/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{url('t_adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{url('t_adminlte3/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="{{url('t_adminlte3/dist/js/pages/dashboard.js')}}"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="{{url('t_adminlte3/dist/js/demo.js')}}"></script> -->
  <!-- Nama Upload File -->
  <script src="{{ url('t_adminlte3') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });

    $('.confirmation').on('click', function (e) {
      $flag = $(this).attr('data-flag');
      $action = $(this).attr("data-action");
      $controller = $(this).attr("data-controller");
      $record_id = $(this).attr("data-id");
      if($flag == 0){
        e.preventDefault();

        Swal.fire({
          title: "Konfirmasi", //"Confirmation",
          text: "Anda akan melakukan "+$action+" data. Eksekusi?",
          icon: "warning",
          showCancelButton: true,
          cancelButtonText: "Batal",
          confirmButtonText: 'Ya, Eksekusi!'
        }).then((result) => {
            
            if(result.value){
              if($controller !== null){
                // console.log($controller+$record_id);
                window.location.href = $controller+$record_id;
              }else{
                $('.confirmation').attr('data-flag', '1');
                $('.myform').submit();
              }
              
            }
        });
      }
      
    });
  </script>

  <!-- Custom Javascript File -->
  @yield('jsFile')

  <!-- Custom Script File -->
  @stack('scripts')

</body>

</html>