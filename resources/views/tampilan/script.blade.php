<!-- jQuery -->
<script src="{{ asset('Template')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Template')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('Template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="{{ asset('Template')}}/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('Template')}}/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->
<script src="{{ asset('Template')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('Template')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('Template')}}/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="{{ asset('Template')}}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('Template')}}/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('Template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="{{ asset('Template')}}/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('Template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('Template')}}/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Template')}}/dist/js/pages/dashboard.js"></script>

<!-- DataTables -->
<script src="{{ asset('Template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('Template') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('Template') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('Template') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('Template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- Toastr -->
<script src="{{ asset('Template')}}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('Template')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('Template')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('Template')}}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('Template')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('Template')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('Template')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('Template')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('Template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('Template')}}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('Template')}}/plugins/select2/js/select2.full.min.js"></script>
@yield('javascript')

{{-- <!-- jQuery -->

<!-- Bootstrap 4 -->
<script src="{{ asset('Template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<script src="{{ asset('Template') }}/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('Template') }}/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->
<script src="{{ asset('Template') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('Template') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('Template') }}/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="{{ asset('Template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('Template') }}/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('Template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('Template') }}/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Template') }}/dist/js/pages/dashboard.js"></script>

<!-- Toastr -->
<script src="{{ asset('Template') }}/plugins/toastr/toastr.min.js"></script>

<!-- Select2 -->
<script src="{{ asset('Template') }}/plugins/select2/js/select2.full.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('Template') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('Template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('Template') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('Template') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('Template') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('Template') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('Template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('Template') }}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('Template') }}/plugins/select2/js/select2.full.min.js"></script>
@yield('javascript') --}}