<footer class="main-footer">
    <strong>Copyright &copy; Computer & Control</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
<!-- jQuery -->
<script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Data Tables -->

<script src="{{url("admin/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{url("admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/dataTables.buttons.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.bootstrap4.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.html5.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.print.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.flash.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.colVis.js")}}"></script>
<script src="{{url("admin/plugins/datatables-buttons/js/buttons.server-side.js")}}"></script>

<!-- Bootstrap 4 -->
<script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="{{url('admin/plugins/chart.js/Chart.min.js')}}"></script> -->
<!-- Sparkline -->
<!-- <script src="{{url('admin/plugins/sparklines/sparkline.js')}}"></script> -->
<!-- JQVMap -->
<!-- <script src="{{url('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
<!-- jQuery Knob Chart
<script src="{{url('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script> -->
<!-- daterangepicker -->
<script src="{{url('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> -->
<!-- <script src="{{url('admin/plugins/codemirror/codemirror.js')}}"></script> -->
<script src="{{url('admin/plugins/sweetalert2/sweetalert2.js')}}"></script>

<!-- Summernote -->
<!-- <script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<!-- overlayScrollbars -->
<script src="{{url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin/js/adminlte.js')}}"></script>


<script src="{{url('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- fullCalendar 2.2.5 -->
<script src="{{url('admin/plugins/fullcalendar/main.js')}}"></script>



@stack('scripts')
@stack('js')

</body>
</html>
