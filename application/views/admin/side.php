<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PPDB Online</span>
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
        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/jumlah" class="nav-link <?php if ($cek_uri2 == "jumlah") {
                                                                            echo "active";
                                                                          } ?>">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Jumlah Data</p>
          </a>
        </li>
        <li class="nav-item has-treeview 
          <?php
          $cekin = ['data','form', 'view','edit','bukti',];
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
                <i class="fas fa-id-card nav-icon"></i>
                <p>Database MTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/ma" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "ma") {
                  echo "active";
                } ?>">
                <i class="fas fa-id-card nav-icon"></i>
                <p>Database MA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/smp" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "smp") {
                  echo "active";
                } ?>">
                <i class="fas fa-id-card nav-icon"></i>
                <p>Database SMP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/data/smk" class="nav-link 
                <?php if (in_array($cek_uri2, $cekin) && $cek_uri3 == "smk") {
                  echo "active";
                } ?>">
                <i class="fas fa-id-card nav-icon"></i>
                <p>Database SMK</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview 
          <?php
          if (in_array($cek_uri2, $cekres)) {
            echo "nav-item has-treeview menu-open";
          } ?>">
          <a href="#" class="nav-link 
            <?php if (in_array($cek_uri2, $cekres)) {
              echo "active";
            } ?>">
            <i class="nav-icon fas fa-exclamation-triangle"></i>
            <p>Residu<i class="right fas fa-angle-left"></i></p>
          </a>
          <?php
          $status_array = array('RESIDU');
          $verval_mts = $this->db->where_in('status', $status_array)->get('db_mts')->num_rows();
          $verval_ma = $this->db->where_in('status', $status_array)->get('db_ma')->num_rows();
          $verval_smp = $this->db->where_in('status', $status_array)->get('db_smp')->num_rows();
          $verval_smk = $this->db->where_in('status', $status_array)->get('db_smk')->num_rows();
          ?>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/residu/mts" class="nav-link 
              <?php if ($cek_uri2 == "residu" && $cek_uri3 == "mts") {
                echo "active";
              } ?>">
                <i class="fas fa-recycle nav-icon"></i>
                <p>Residu MTS<span class="right badge badge-warning"><?php echo $verval_mts ?></span></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/residu/ma" class="nav-link 
              <?php if ($cek_uri2 == "residu" && $cek_uri3 == "ma") {
                echo "active";
              } ?>">
                <i class="fas fa-recycle nav-icon"></i>
                <p>Residu MA<span class="right badge badge-warning"><?php echo $verval_ma ?></span></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/residu/smp" class="nav-link 
              <?php if ($cek_uri2 == "residu" && $cek_uri3 == "smp") {
                echo "active";
              } ?>">
                <i class="fas fa-recycle nav-icon"></i>
                <p>Residu SMP<span class="right badge badge-warning"><?php echo $verval_smp ?></span></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/residu/smk" class="nav-link 
              <?php if ($cek_uri2 == "residu" && $cek_uri3 == "smk") {
                echo "active";
              } ?>">
                <i class="fas fa-recycle nav-icon"></i>
                <p>Residu SMK<span class="right badge badge-warning"><?php echo $verval_smk ?></span></p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview 
          <?php
          if (in_array($cek_uri2, $ceknon)) {
            echo "nav-item has-treeview menu-open";
          } ?>">
          <a href="#" class="nav-link 
            <?php if (in_array($cek_uri2, $ceknon)) {
              echo "active";
            } ?>">
            <i class="nav-icon fas fa-user-times"></i>
            <p>NON AKTIF<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/nonaktif/mts" class="nav-link 
              <?php if ($cek_uri2 == "nonaktif" && $cek_uri3 == "mts") {
                echo "active";
              } ?>">
                <i class="fas fa-share-square nav-icon"></i>
                <p>NON AKTIF MTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/nonaktif/ma" class="nav-link 
              <?php if ($cek_uri2 == "nonaktif" && $cek_uri3 == "ma") {
                echo "active";
              } ?>">
                <i class="fas fa-share-square nav-icon"></i>
                <p>NON AKTIF MA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/nonaktif/smp" class="nav-link 
              <?php if ($cek_uri2 == "nonaktif" && $cek_uri3 == "smp") {
                echo "active";
              } ?>">
                <i class="fas fa-share-square nav-icon"></i>
                <p>NON AKTIF SMP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/nonaktif/smk" class="nav-link 
              <?php if ($cek_uri2 == "nonaktif" && $cek_uri3 == "smk") {
                echo "active";
              } ?>">
                <i class="fas fa-share-square nav-icon"></i>
                <p>NON AKTIF SMK</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/download" class="nav-link <?php if ($cek_uri2 == "download") {
                                                                            echo "active";
                                                                          } ?>">
            <i class="nav-icon fas fa-cloud-download-alt"></i>
            <p>Download</p>
          </a>
        </li>

        <li class="nav-item has-treeview
          <?php
          $cekuser = ['sdmi', 'smpmts'];
          if (in_array($cek_uri2, $cekuser)) {
            echo "nav-item has-treeview menu-open";
          } ?>">
          <a href="#" class="nav-link 
            <?php if (in_array($cek_uri2, $cekuser)) {
              echo "active";
            } ?>">
            <i class="nav-icon fas fa-people-arrows"></i>
            <p>Sekolah Asal<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/sdmi" class="nav-link 
                <?php if ($cek_uri2 == "sdmi") {
                  echo "active";
                } ?>">
                <i class="fas fa-people-arrows nav-icon"></i>
                <p>sd-mi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/smpmts" class="nav-link 
                <?php if ($cek_uri2 == "smpmts") {
                  echo "active";
                } ?>">
                <i class="fas fa-people-arrows nav-icon"></i>
                <p>smp-mts</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview
          <?php
          $cekuser = ['user_peserta', 'user_admin'];
          if (in_array($cek_uri2, $cekuser)) {
            echo "nav-item has-treeview menu-open";
          } ?>">
          <a href="#" class="nav-link 
            <?php if (in_array($cek_uri2, $cekuser)) {
              echo "active";
            } ?>">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Managemen User<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/user_peserta" class="nav-link 
                <?php if ($cek_uri2 == "user_peserta") {
                  echo "active";
                } ?>">
                <i class="fas fa-user nav-icon"></i>
                <p>User Pendaftar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/user_admin" class="nav-link 
                <?php if ($cek_uri2 == "user_admin") {
                  echo "active";
                } ?>">
                <i class="fas fa-user-shield nav-icon"></i>
                <p>User admin</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/setting" class="nav-link <?php if ($cek_uri2 == "setting") {
                                                                              echo "active";
                                                                            } ?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Setting</p>
          </a>
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