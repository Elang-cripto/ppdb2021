<!-- jQuery -->
<script src="<?php echo base_url('') ?>asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('') ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('') ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('') ?>asset/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('') ?>asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script src="<?php echo base_url('') ?>asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
  $(document).ready(function () {
      bsCustomFileInput.init();
    });
</script>