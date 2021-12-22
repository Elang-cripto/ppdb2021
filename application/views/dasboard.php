<?php 
$data['head'] = 'theme/hlink_all';
$this->load->view('theme/head',$data);
$this->load->view('theme/nav');
$this->load->view('admin/side');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Database Online</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
          <!-- <div class="info-box mb-6"> -->
            <div class="alert alert-info alert-dismissible">
              <div class="info-box-content">
                <h3 class="info-box-text">Selamat Datang</h3>
                <h5><b>Anda Login Sebagai <?php echo $this->session->userdata('nama'); ?> ( <?php echo $this->session->userdata('jabatan'); ?> )</b></h5>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Data MTS</span>
                <span class="info-box-text">
                  laki-laki : <b>
                  <?php 
                    $mtsl = $this->db->query("SELECT * FROM db_mts where concat(jk,status)='LAKTIF'")->num_rows();
                    echo $mtsl;
                  ?> </b>
                  Siswa<br>
                  Perempuan :<b>
                  <?php 
                    $mtsp = $this->db->query("SELECT * FROM db_mts where concat(jk,status)='PAKTIF'")->num_rows();
                    echo $mtsp;
                  ?></b>
                  Siswa<br>
                  Jumlah : <b><?php echo $mtsl + $mtsp; ?></b> Siswa
                </span>
              </div>
              <!-- /.info-box-content -->
            </div> 
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Data MA</span>
                <span class="info-box-text">
                  laki-laki :<b>
                  <?php 
                    $mal = $this->db->query("SELECT * FROM db_ma where concat(jk,status)='LAKTIF'")->num_rows();
                    echo $mal;
                  ?></b>
                  Siswa<br>
                  Perempuan :<b>
                  <?php 
                    $map = $this->db->query("SELECT * FROM db_ma where concat(jk,status)='PAKTIF'")->num_rows();
                    echo $map;
                  ?></b>
                  Siswa <br>
                  Jumlah : <b><?php echo $mal + $map; ?></b> Siswa
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data SMP</span>
                <span class="info-box-number"><small> Siswa</small>
                  <?php 
                    $smpl = $this->db->query("SELECT * FROM db_smp where concat(jk,status)='LAKTIF'")->num_rows();
                    echo $smpl;
                  ?>
                  <small> Siswa</small> <br>
                  <small>Perempuan : </small>
                  <?php 
                    $smpp = $this->db->query("SELECT * FROM db_smp where concat(jk,status)='PAKTIF'")->num_rows();
                    echo $smpp;
                  ?>
                  <small> Siswa</small> <br>
                  <small>Jumlah : </small><?php echo $smpl + $smpp; ?><small> Siswa</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data SMK</span>
                <span class="info-box-number"><small> Siswa</small>
                  <?php 
                    $smkl = $this->db->query("SELECT * FROM db_smk where concat(jk,status)='LAKTIF'")->num_rows();
                    echo $smkl;
                  ?>
                  <small> Siswa</small> <br>
                  <small>Perempuan : </small>
                  <?php 
                    $smkp = $this->db->query("SELECT * FROM db_smk where concat(jk,status)='PAKTIF'")->num_rows();
                    echo $smkp;
                  ?>
                  <small> Siswa</small> <br>
                  <small>Jumlah : </small><?php echo $smkl + $smkp; ?><small> Siswa</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD MTS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kelas</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=0;//variabel no
                      foreach($dbklsmts as $A): 
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas <?php echo $A->kelas; ?></td>
                      <td align="center">
                        <?php
                          $clkls = "%L".$A->kelas."AKTIF%";
                          $mtsl = $this->db->query("SELECT * FROM db_mts where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();
                          echo $mtsl;
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          $cpkls = "%P".$A->kelas."AKTIF%";
                          $mtsp = $this->db->query("SELECT * FROM db_mts where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();
                          echo $mtsp;
                        ?>
                      </td>
                      <td align="center"><?php echo $mtsp+$mtsl; ?></td>
                    </tr>
                    <?php  endforeach; ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD MA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kelas</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=0;//variabel no
                      foreach($dbklsma as $B): 
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas <?php echo $B->kelas; ?></td>
                      <td align="center">
                        <?php
                          $clkls = "%L".$B->kelas."AKTIF%";
                          $mal = $this->db->query("SELECT * FROM db_ma where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();
                          echo $mal;
                        ?>
                        </td>
                      <td align="center">
                        <?php 
                          $cpkls = "%P".$B->kelas."AKTIF%";
                          $map = $this->db->query("SELECT * FROM db_ma where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();
                          echo $map;
                        ?>
                        </td>
                      <td align="center"><?php echo $map+$mal; ?></td>
                    </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD SMP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kelas</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=0;//variabel no
                      foreach($dbklssmp as $C): 
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas <?php echo $C->kelas; ?></td>
                      <td align="center">
                        <?php
                          $clkls = "%L".$C->kelas."AKTIF%";
                          $smpl = $this->db->query("SELECT * FROM db_smp where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();
                          echo $smpl;
                        ?>
                        </td>
                      <td align="center">
                        <?php 
                          $cpkls = "%P".$C->kelas."AKTIF%";
                          $smpp = $this->db->query("SELECT * FROM db_smp where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();
                          echo $smpp;
                        ?>
                        </td>
                      
                      <td align="center"><?php echo $smpp+$smpl; ?></td>
                    </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD SMK</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kelas</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=0;//variabel no
                      foreach($dbklssmk as $D): 
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas <?php echo $D->kelas; ?></td>
                      <td align="center">
                        <?php
                          $clkls = "%L".$D->kelas."AKTIF%";
                          $mal = $this->db->query("SELECT * FROM db_smk where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();
                          echo $mal;
                        ?>
                        </td>
                      <td align="center">
                        <?php 
                          $cpkls = "%P".$D->kelas."AKTIF%";
                          $map = $this->db->query("SELECT * FROM db_smk where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();
                          echo $map;
                        ?>
                        </td>
                      
                      <td align="center"><?php echo $map+$mal; ?></td>
                    </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
$data['foot'] = 'theme/flink_all';
$this->load->view('theme/foot',$data); ?>