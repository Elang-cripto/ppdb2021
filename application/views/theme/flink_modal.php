<!-- SweetAlert2 -->
<script src="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('') ?>asset/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    <?php if ($this->session->flashdata('pesan')): ?>
      Swal.fire(<?php echo $this->session->flashdata('pesan'); ?>)      
    <?php endif ?>
    <?php if ($this->session->flashdata('pesan_x')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Berhasil',
        text: '<?php echo $this->session->flashdata('pesan_x'); ?>',
      })      
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan_ok')): ?>
      toastr.success('<?php echo $this->session->flashdata('pesan_ok'); ?>')
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan_err')): ?>
      toastr.error('<?php echo $this->session->flashdata('pesan_err'); ?>')
    <?php endif ?>
  });
</script>
