<script type="text/javascript">
  <?php if ($this->session->flashdata('pesan')) : ?>
    Swal.fire(<?php echo $this->session->flashdata('pesan'); ?>)
  <?php endif ?>
</script>