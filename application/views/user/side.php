<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <H5>PPDB 2022</H5>
  </a>

  <?php
  $role = $this->session->userdata('jabatan');
  $poto = $this->session->userdata('foto');
  $kelas = $this->session->userdata('kelas');
  $par = $this->session->userdata('par');
  $nik = $this->session->userdata('nik');
  $file_poto = base_url('') . 'asset/dist/img/' . $poto;
  $file_zonk = base_url('') . 'asset/dist/img/none.png';

  if (empty($poto)) {
    $gambar = $file_zonk;
  } else {
    $gambar = $file_poto;
  }
  ?>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo $gambar; ?>" class="img-circle elevation-2" alt="User Image"><br>
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
        <span class="right badge badge-success">Online</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>" class="nav-link <?php if ($this->uri->segment(2) == "") {
                                                                    echo "active";
                                                                  }
                                                                  ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url($role); ?>/form/<?php echo $par; ?>/<?php echo md5($nik); ?>" class="nav-link <?php if ($this->uri->segment(2) == "form") {
                                                                                                                        echo "active";
                                                                                                                      } ?>">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Formulir</p>
          </a>
        </li>

        <?php
        $cek   = $this->db->get_where('db_user_pendaftar', ["id" => $this->session->userdata('id')])->row();
        $prin   = $cek->echo;
        if ($prin == 0) {
          $ket = "hidden";
        } else {
          $ket = "";
        }; ?>

        <li class="nav-item" <?php echo $ket ?>>
          <a href="<?php echo base_url($role) ?>/cetak/bukti/<?php echo $par; ?>/<?php echo md5($nik); ?>" class="nav-link <?php if ($this->uri->segment(2) == "cetak") {
                                                                                                                              echo "active";
                                                                                                                            } ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Cetak Bukti Pendaftaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('') ?>user/logout" class="nav-link"><i class="nav-icon fas fa-reply"></i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>