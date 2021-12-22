<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link" >
    <img src="<?php echo base_url('') ?>asset/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Database Online</span>
  </a>

<?php 
  $role = $this->session->userdata('jabatan'); 
  $poto = $this->session->userdata('foto');
  $kelas = $this->session->userdata('kelas');
  $par = $this->session->userdata('par');
  $file_poto = base_url('').'asset/dist/img/'.$poto;
  $file_zonk = base_url('').'asset/dist/img/none.png';

  if(empty($poto)){
    $gambar = $file_zonk;
    }else{
      $gambar= $file_poto;
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
          <a href="<?php echo base_url($role) ?>" class="nav-link <?php if($this->uri->segment(2)==""){echo "active";}?>">
            <i class="nav-icon fas fa-home"></i><p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/jumlah" class="nav-link <?php if($this->uri->segment(2)=="jumlah"){echo "active";}?>">
            <i class="nav-icon fas fa-briefcase"></i><p>Database</p>
          </a>
        </li> 
        <li class="nav-item has-treeview 
          <?php if($this->uri->segment(2)=="klsmts"||
                  $this->uri->segment(2)=="klssmp"||
                  $this->uri->segment(2)=="klsma"||
                  $this->uri->segment(2)=="klssmk"||
                  $this->uri->segment(2)=="dataklsmts"||
                  $this->uri->segment(2)=="dataklsma"||
                  $this->uri->segment(2)=="dataklssmp"||
                  $this->uri->segment(2)=="dataklssmk")
                  {echo "nav-item has-treeview menu-open";}?>">
          <a href="#" class="nav-link 
            <?php if($this->uri->segment(2)=="klsmts"||
                    $this->uri->segment(2)=="klssmp"||
                    $this->uri->segment(2)=="klsma"||
                    $this->uri->segment(2)=="klssmk"||
                    $this->uri->segment(2)=="dataklsmts"||
                    $this->uri->segment(2)=="dataklsma"||
                    $this->uri->segment(2)=="dataklssmp"||
                    $this->uri->segment(2)=="dataklssmk"){echo "active";}?>">
            <i class="nav-icon fas fa-sitemap"></i>
            <p>Data Rombel<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/klsmts" class="nav-link <?php if($this->uri->segment(2)=="klsmts"||$this->uri->segment(2)=="dataklsmts"){echo "active";}?>">
                <i class="fas fa-sitemap nav-icon"></i><p>Rombel MTS</p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/klsma" class="nav-link <?php if($this->uri->segment(2)=="klsma"||$this->uri->segment(2)=="dataklsma"){echo "active";}?>">
                <i class="fas fa-sitemap nav-icon"></i><p>Rombel MA</p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/klssmp" class="nav-link <?php if($this->uri->segment(2)=="klssmp"||$this->uri->segment(2)=="dataklssmp"){echo "active";}?>">
                <i class="fas fa-sitemap nav-icon"></i><p>Rombel SMP</p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/klssmk" class="nav-link <?php if($this->uri->segment(2)=="klssmk"||$this->uri->segment(2)=="dataklssmk"){echo "active";}?>">
                <i class="fas fa-sitemap nav-icon"></i><p>Rombel SMK</p></a>
            </li>
          </ul>
        </li>
       <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/master" class="nav-link <?php if($this->uri->segment(2)=="master"||$this->uri->segment(2)=="uploadmts"){echo "active";}?>">
            <i class="nav-icon fas fa-archive"></i>
            <p>Master Database<span class="right badge badge-info">Admin</span></p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <?php 
            $id = $this->session->userdata('id');
          ?>
          <a href="<?php echo base_url($role) ?>/edituser/<?php echo base64_encode($id) ?>" class="nav-link <?php if($this->uri->segment(2)=="user"||$this->uri->segment(2)=="adduser"){echo "active";}?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Profil<span class="right badge badge-info">Admin</span></p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="<?php echo base_url('') ?>page/logout" class="nav-link"><i class="nav-icon fas fa-reply"></i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>