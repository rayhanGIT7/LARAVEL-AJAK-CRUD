<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('Admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('Admin/css/adminlte.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('Admin/plugins/toastr/toastr.css') }}">
    <!-- summernote -->
 <link rel="stylesheet" href="{{ url('Admin/plugins/summernote/summernote-bs4.min.css')}}">
<!--   push -->
  @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">



  <!-- Navbar -->
  @auth
 @include('layouts.Admin.header')
  <!-- /.navbar -->

  @include('layouts.Admin.sidebar')
 <!-- Content Wrapper. Contains page content -->


 @endauth



   @yield('content')
  <!-- /.content-wrapper -->
<div class="wrapper">
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
</div>


<script src="{{ url('Admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('Admin/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ url('Admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ url('Admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url('Admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ url('Admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('Admin/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ url('Admin/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('Admin/js/pages/dashboard2.js') }}"></script>



<!-- data-table -->

<!-- jQuery -->
<script src="{{ url('Admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('Admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('Admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('Admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('Admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('Admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('Admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ url('Admin/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ url('Admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('Admin/dist/js/demo.js') }}"></script>

<!-- Summernote -->
<script src="{{ url('Admin/plugins/summernote/summernote-bs4.min.js') }}"></script>


<!--
  delete -->

<script>
$(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure to delete?",
        text: "Once deleted, this will be permanently deleted",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then(willDelete => {
        if(willDelete){
            window.location.href = link;
        } else {
            swal("Safe Data!");
        }
    });
});

</script>

<!-- crate -->

<script>
  
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    default:
        toastr.info("{{ Session::get('message') }}"); // Default to 'info' if 'alert-type' is not set
}
@endif


</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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


<!-- Summernote -->

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
