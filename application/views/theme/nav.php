</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <?php
      $role = $this->session->userdata('jabatan');
      $poto = $this->session->userdata('foto');
      // $file_poto = base_url('').'asset/dist/img/'.$poto;
      $file_poto = base_url('') . 'asset/dist/img/' . $poto;
      $file_zonk = base_url('') . 'asset/dist/img/none.png';

      if (empty($poto)) {
        $gambar = $file_zonk;
      } else {
        $gambar = $file_poto;
      }
      ?>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Anda Login Sebagai</span>

            <div class="dropdown-divider"></div>
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo $gambar; ?>" width="100" height="100" alt="User profile">
            </div>
            <div class="text-center">
              <a href="#" class="dropdown-item">
                <i class="fas fa-user"></i> <?php echo $this->session->userdata('nama'); ?><br>
                <span class="badge badge-info"> <?php echo $this->session->userdata('jabatan'); ?></span>
              </a>
            </div>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('') ?>auth/logout" class="dropdown-item dropdown-footer"><b>Log Out</b></a>
          </div>
        </li>
        <!--       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->