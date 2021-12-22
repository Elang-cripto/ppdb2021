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
          <?php if($this->uri->segment(2)=="datamts"||
                  $this->uri->segment(2)=="datama"||
                  $this->uri->segment(2)=="datasmp"||
                  // $this->uri->segment(2)=="viewmts"||
                  // $this->uri->segment(2)=="viewma"||
                  // $this->uri->segment(2)=="viewsmp"||
                  // $this->uri->segment(2)=="viewsmk"||
                  $this->uri->segment(2)=="formmts"||
                  $this->uri->segment(2)=="formma"||
                  $this->uri->segment(2)=="formsmp"||
                  $this->uri->segment(2)=="formsmk"||
                  $this->uri->segment(2)=="datasmk")
                  {echo "nav-item has-treeview menu-open";}?>">
          <a href="#" class="nav-link 
            <?php if($this->uri->segment(2)=="datamts"||
                    $this->uri->segment(2)=="datama"||
                    $this->uri->segment(2)=="datasmp"||
                    // $this->uri->segment(2)=="viewmts"||
                    // $this->uri->segment(2)=="viewma"||
                    // $this->uri->segment(2)=="viewsmp"||
                    // $this->uri->segment(2)=="viewsmk"||
                    $this->uri->segment(2)=="formmts"||
                    $this->uri->segment(2)=="formma"||
                    $this->uri->segment(2)=="formsmp"||
                    $this->uri->segment(2)=="formsmk"||
                    $this->uri->segment(2)=="datasmk")
                    {echo "active";}?>">
            <i class="nav-icon fas fa-database"></i><p>Peserta Didik<i class="right fas fa-angle-left"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/datamts" class="nav-link 
                <?php if($this->uri->segment(2)=="datamts"||
                        $this->uri->segment(2)=="viewmts"||
                        $this->uri->segment(2)=="formmts")
                        {echo "active";}?>">
                <i class="fas fa-server nav-icon"></i><p>Database MTS</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="<?php echo base_url($role) ?>/datama" class="nav-link 
                <?php if($this->uri->segment(2)=="datama"||
                        $this->uri->segment(2)=="viewma"||
                        $this->uri->segment(2)=="formma")
                        {echo "active";}?>">
                <i class="fas fa-server nav-icon"></i><p>Database MA</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="<?php echo base_url($role) ?>/datasmp" class="nav-link 
                <?php if($this->uri->segment(2)=="datasmp"||
                        $this->uri->segment(2)=="viewsmp"||
                        $this->uri->segment(2)=="formsmp")
                        {echo "active";}?>">
                <i class="fas fa-server nav-icon"></i><p>Database SMP</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="<?php echo base_url($role) ?>/datasmk" class="nav-link 
                <?php if($this->uri->segment(2)=="datasmk"||
                        $this->uri->segment(2)=="viewsmk"||
                        $this->uri->segment(2)=="formsmk")
                        {echo "active";}?>">
                <i class="fas fa-server nav-icon"></i><p>Database SMK</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview 
          <?php if($this->uri->segment(2)=="vervalmts"||
                  $this->uri->segment(2)=="vervalma"||
                  $this->uri->segment(2)=="vervalsmp"||
                  $this->uri->segment(2)=="vervalsmk")
                  {echo "nav-item has-treeview menu-open";}?>">
          <a href="#" class="nav-link 
            <?php if($this->uri->segment(2)=="vervalmts"||
                    $this->uri->segment(2)=="vervalma"||
                    $this->uri->segment(2)=="vervalsmp"||
                    $this->uri->segment(2)=="vervalsmk")
                    {echo "active";}?>">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Validasi<i class="right fas fa-angle-left"></i></p>
          </a>
          <?php 
            $status_array = array('PENGAJUAN MUTASI','PROSES MUTASI');
            $verval_mts = $this->db->where_in('status', $status_array)->get('db_mts')->num_rows();
            $verval_ma = $this->db->where_in('status', $status_array)->get('db_ma')->num_rows();
            $verval_smp = $this->db->where_in('status', $status_array)->get('db_smp')->num_rows();
            $verval_smk = $this->db->where_in('status', $status_array)->get('db_smk')->num_rows();
          ?>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/vervalmts" class="nav-link <?php if($this->uri->segment(2)=="vervalmts"){echo "active";}?>">
                <i class="fas fa-check-circle nav-icon"></i><p>Verval MTS<span class="right badge badge-warning"><?php echo $verval_mts ?></span></p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/vervalma" class="nav-link <?php if($this->uri->segment(2)=="vervalma"){echo "active";}?>">
                <i class="fas fa-check-circle nav-icon"></i><p>Verval MA<span class="right badge badge-warning"><?php echo $verval_ma ?></span></p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/vervalsmp" class="nav-link <?php if($this->uri->segment(2)=="vervalsmp"){echo "active";}?>">
                <i class="fas fa-check-circle nav-icon"></i><p>Verval SMP<span class="right badge badge-warning"><?php echo $verval_smp ?></span></p></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/vervalsmk" class="nav-link <?php if($this->uri->segment(2)=="vervalsmk"){echo "active";}?>">
                <i class="fas fa-check-circle nav-icon"></i><p>Verval SMK<span class="right badge badge-warning"><?php echo $verval_smk ?></span></p></a>
            </li>
          </ul>
        </li>        
        <li class="nav-item has-treeview
          <?php if($this->uri->segment(2)=="dataoutmts"||
                  $this->uri->segment(2)=="dataoutma"||
                  $this->uri->segment(2)=="dataoutsmp"||
                  $this->uri->segment(2)=="dataoutsmk")
                  {echo "nav-item has-treeview menu-open";}?>">
          <a href="#" class="nav-link 
            <?php if($this->uri->segment(2)=="dataoutmts"||
                    $this->uri->segment(2)=="dataoutma"||
                    $this->uri->segment(2)=="dataoutsmp"||
                    $this->uri->segment(2)=="dataoutsmk")
                    {echo "active";}?>">
            <i class="nav-icon fas fa-share-square"></i><p>PD Keluar<i class="right fas fa-angle-left"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/dataoutmts" class="nav-link 
                <?php if($this->uri->segment(2)=="dataoutmts")
                        {echo "active";}?>">
                        <i class="fas fa-share-square nav-icon"></i><p>PD Keluar MTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/dataoutma" class="nav-link 
                <?php if($this->uri->segment(2)=="dataoutma")
                        {echo "active";}?>">
                        <i class="fas fa-share-square nav-icon"></i><p>PD Keluar MA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/dataoutsmp" class="nav-link 
                <?php if($this->uri->segment(2)=="dataoutsmp")
                        {echo "active";}?>">
                        <i class="fas fa-share-square nav-icon"></i><p>PD Keluar SMP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url($role) ?>/dataoutsmk" class="nav-link 
                <?php if($this->uri->segment(2)=="dataoutsmk")
                        {echo "active";}?>">
                        <i class="fas fa-share-square nav-icon"></i><p>PD Keluar SMK</p>
              </a>
            </li>
          </ul>
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
        <li class="nav-item">
          <?php 
            $id = $this->session->userdata('id');
          ?>
          <a href="<?php echo base_url($role) ?>/edituser/<?php echo base64_encode($id) ?>" class="nav-link <?php if($this->uri->segment(2)=="user"||$this->uri->segment(2)=="adduser"){echo "active";}?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Profil<span class="right badge badge-info">Admin</span></p>
          </a>
        </li>
<!--         <li class="nav-item">
          <a href="<?php echo base_url($role) ?>/setting" class="nav-link <?php if($this->uri->segment(2)=="setting"){echo "active";}?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Setting<span class="right badge badge-info">Admin</span></p>
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