<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/summernote/summernote-bs4.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('/') }}st.css"/>

        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <!-- Toolkip -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
            @include('admin.partials.navbar')
        </nav>
        <!-- end navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.partials.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('container')
        </div>
        <!-- /.content-wrapper -->
    </div>

    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}plugins/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/') }}plugins/sparklines/sparkline.js"></script>
    <script src="{{ asset('/') }}plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('/') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="{{ asset('/') }}plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('/') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('/') }}plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('/') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('/') }}plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('/') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
    <script src="{{ asset('/') }}dist/js/pages/dashboard.js"></script>
    <script src="{{ asset('/') }}dist/js/demo.js"></script>

    <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    {{-- <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script> --}}
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>

    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

  <!-- jQuery -->
  {{-- <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script> --}}
  <!-- Bootstrap 4 -->
  {{-- <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
  <!-- DataTables -->
  <!-- AdminLTE App -->
  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ asset('/') }}dist/js/demo.js"></script> --}}
  <!-- page script -->

  @include('admin.layouts.password');
</body>
</html>
