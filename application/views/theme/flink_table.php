 <!-- jQuery -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('') ?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('') ?>asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('') ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('') ?>asset/dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo base_url('') ?>asset/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url('') ?>asset/dist/js/elangts.js"></script>

<script src="<?php echo base_url('') ?>asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  });
</script>