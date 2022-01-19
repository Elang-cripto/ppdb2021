<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <H5>PPDB 2022</H5>
  </a>

  <?php
  $cekres = ['residu'];
  $ceknon = ['nonaktif'];
  $cek_uri2 = $this->uri->segment(2);
  $cek_uri3 = $this->uri->segment(3);
  $role = $this->session->userdata('jabatan');
  $poto = $this->session->userdata('foto');
  $kelas = $this->session->userdata('kelas');
  $par = $this->session->userdata('par');
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
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>" class="nav-link <?php if ($cek_uri2 == "") {
                                                                    echo "active";
                                                                  } ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item has-treeview 
          <?php
          $cekin = ['data', 'form', 'view', 'edit', 'bukti',];
          if (in_array($cek_uri2, $cekin)) {
            echo "nav-item has-treeview menu-open";
          } ?>">
          <a href="#" class="nav-link 
            <?php
            if (in_array($cek_uri2, $cekin)) {
              echo "active";
            } ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Calon Siswa Baru<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/mts" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "mts") {
                  echo "active";
                } ?>">
                <i class="fas fa-database nav-icon"></i>
                <p>Pendaftar MTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/ma" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "ma") {
                  echo "active";
                } ?>">
                <i class="fas fa-database nav-icon"></i>
                <p>Pendaftar MA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/smp" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "smp") {
                  echo "active";
                } ?>">
                <i class="fas fa-database nav-icon"></i>
                <p>Pendaftar SMP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/smk" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "smk") {
                  echo "active";
                } ?>">
                <i class="fas fa-database nav-icon"></i>
                <p>Pendaftar SMK</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('') ?>admin/logout" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>