  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    <?php if ($this->session->flashdata('pesan')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Alhamdulillah',
        text: '<?php echo $this->session->flashdata('pesan'); ?>',
      })      
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan2')): ?>
      toastr.success('<?php echo $this->session->flashdata('pesan2'); ?>')
    <?php endif ?>
  });