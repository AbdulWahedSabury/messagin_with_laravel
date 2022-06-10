<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  {{-- toastr file --}}
  <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    @include('admin.layouts.partials.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      {{$slot}}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/moment.js')}}"></script>
<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>


<script>
    // add new User
    window.addEventListener('show-form',event => {
        $('#form').modal('show');
    })
    window.addEventListener('hide-form',event =>{
        $('#form').modal('hide');
    })
    // create tostr
    $(document).ready(function(){
        toastr.options = {
            "positionClass": "toast-bottom-right",
            "progressBar": true,
        }
        window.addEventListener('hide-form',event =>{
        $('#form').modal('hide');
        toastr.success(event.detail.message,'Success!');
    })
    })
    window.addEventListener('show-delete-form',event=>{
        $('#deleteConfirmatinForm').modal('show');
    })
    window.addEventListener('hide-delete-form',event=>{
        $('#deleteConfirmatinForm').modal('hide');
        toastr.success(event.detail.message,'Success!');
    })

    window.addEventListener('Appointment-saved',event=>{
        // $('#deleteConfirmatinForm').modal('hide');
        toastr.success(event.detail.message,'Success!');
        $("#AddAppointment").trigger("reset");


    })
</script>
@stack('js')
@livewireScripts
</body>
</html>
