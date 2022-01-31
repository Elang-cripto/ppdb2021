<script src="<?php echo base_url('') ?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('') ?>asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('') ?>asset/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('') ?>asset/dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('') ?>asset/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('') ?>asset/plugins/datatables/"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('') ?>asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url('') ?>asset/dist/js/pages/dashboard2.js"></script>
<!-- page script -->
<!-- jquery-validation -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('') ?>asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('') ?>asset/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('') ?>asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('') ?>asset/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
  $(function() {
    //Add text editor
    $('#compose-textarea').summernote()
  })
  $(document).ready(function() {
    bsCustomFileInput.init();
  });
</script>

<script>
  $(function() {
    $('.select2').select2()
  });
</script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  });
</script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Sparkline -->
<script src="<?php echo base_url('') ?>asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('') ?>asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('') ?>asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('') ?>asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('') ?>asset/dist/js/adminlte.min.js"></script>
<!-- page script -->
<script src="<?php echo base_url('') ?>asset/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url('') ?>asset/dist/js/elangts.js"></script>