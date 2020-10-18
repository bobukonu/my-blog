
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/blog/font/css/all.css">
   <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/backend/dist/css/customs.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/backend/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/backend/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/backend/plugins/datetimepicker/css/bootstrap-datetimepicker.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="/backend/plugins/datatable/dataTables.bootstrap4.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/blog/dist/simplemde.min.css">
  <link rel="stylesheet" href="/backend/plugins/Jasny/css/jasny-bootstrap.css">
  <link rel="stylesheet" href="/backend/plugins/inscrybmde/inscrybmde.min.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.backend.inc.navbar')
  @yield('content')

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/blog/js/jquery.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/backend/bower_components/raphael/raphael.min.js"></script>
<script src="/backend/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/blog/font/js/all.js"></script>
<!-- jvectormap -->
<script src="/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/backend/bower_components/moment/min/moment.min.js"></script>
<script src="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/backend/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- Data Table -->
<script src="/backend/plugins/datatable/jquery.dataTables.js" charset="utf-8"></script>
<script src="/backend/plugins/datatable/dataTables.bootstrap4.js" charset="utf-8"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/backend/plugins/Jasny/js/jasny-bootstrap.js"></script>
<script src="/backend/plugins/markdown/js/to-markdown.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
@yield('script')
<script src="/backend/plugins/inscrybmde/inscrybmde.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable({
    buttons: [
       'copy', 'excel', 'pdf'
   ],
     "paging": false
  });

} );
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

  <script type="text/javascript">
    $('ul.pagination').addClass('no-marign pagination-sm')
  </script>
<script type="text/javascript">
           $(function () {
               $('#datetimepicker1').datetimepicker({
                 format: 'YYYY-MM-DD HH:mm:ss',
                 showClear: true
               });
           });
       </script>
      

</body>
</html>
