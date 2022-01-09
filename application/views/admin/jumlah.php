    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pendaftar</h1>
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
          <!-- </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
      $jabatan = $this->session->userdata('jabatan');
     ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <!-- Jumlah Data  -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Total Pendaftar MTS</p>
                <h3>
                  <?php echo $this->db->get('db_mts')->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <p>Total Pendaftar MA</p>
                <h3>
                  <?php echo $this->db->get('db_ma')->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Total Pendaftar SMP</p>
                <h3>
                  <?php echo $this->db->get('db_smp')->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Total Pendaftar SMK</p>
                <h3>
                <?php echo $this->db->get('db_smk')->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Status MTS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $mts_a_l=$this->db->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts_a_p=$this->db->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts_a_p+$mts_a_l; ?></td>
                    </tr>
                    <tr>
                      <td>RESIDU</td>
                      <td align="center">
                        <?php 
                          echo $mts_r_l=$this->db->get_where('db_mts',array("status" => 'RESIDU',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts_r_p=$this->db->get_where('db_mts',array("status" => 'RESIDU',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts_r_p+$mts_r_l; ?></td>
                    </tr>
                    <tr>
                      <td>NON AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $mts_n_l=$this->db->get_where('db_mts',array("status" => 'NON AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts_n_p=$this->db->get_where('db_mts',array("status" => 'NON AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts_n_p+$mts_n_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Status MA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $ma_a_l=$this->db->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma_a_p=$this->db->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma_a_p+$ma_a_l; ?></td>
                    </tr>
                    <tr>
                      <td>RESIDU</td>
                      <td align="center">
                        <?php 
                          echo $ma_r_l=$this->db->get_where('db_ma',array("status" => 'RESIDU',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma_r_p=$this->db->get_where('db_ma',array("status" => 'RESIDU',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma_r_p+$ma_r_l; ?></td>
                    </tr>
                    <tr>
                      <td>NON AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $ma_n_l=$this->db->get_where('db_ma',array("status" => 'NON AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma_n_p=$this->db->get_where('db_ma',array("status" => 'NON AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma_n_p+$ma_n_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Status SMP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $smp_a_l=$this->db->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp_a_p=$this->db->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp_a_p+$smp_a_l; ?></td>
                    </tr>
                    <tr>
                      <td>RESIDU</td>
                      <td align="center">
                        <?php 
                          echo $smp_r_l=$this->db->get_where('db_smp',array("status" => 'RESIDU',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp_r_p=$this->db->get_where('db_smp',array("status" => 'RESIDU',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp_r_p+$smp_r_l; ?></td>
                    </tr>
                    <tr>
                      <td>NON AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $smp_n_l=$this->db->get_where('db_smp',array("status" => 'NON AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp_n_p=$this->db->get_where('db_smp',array("status" => 'NON AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp_n_p+$smp_n_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Status SMK</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $smk_a_l=$this->db->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk_a_p=$this->db->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk_a_p+$smk_a_l; ?></td>
                    </tr>
                    <tr>
                      <td>RESIDU</td>
                      <td align="center">
                        <?php 
                          echo $smk_r_l=$this->db->get_where('db_smk',array("status" => 'RESIDU',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk_r_p=$this->db->get_where('db_smk',array("status" => 'RESIDU',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk_r_p+$smk_r_l; ?></td>
                    </tr>
                    <tr>
                      <td>NON AKTIF</td>
                      <td align="center">
                        <?php 
                          echo $smk_n_l=$this->db->get_where('db_smk',array("status" => 'NON AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk_n_p=$this->db->get_where('db_smk',array("status" => 'NON AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk_n_p+$smk_n_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>               
        </div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Jalur (MTS)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Jalur</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>INDEN</td>
                      <td align="center">
                        <?php echo $in_mts_l=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'INDEN',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $in_mts_p=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'INDEN',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $in_mts_p+$in_mts_l; ?></td>
                    </tr>
                    <tr>
                      <td>PRESTASI</td>
                      <td align="center">
                        <?php echo $pre_mts_l=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'PRESTASI',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $pre_mts_p=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'PRESTASI',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $pre_mts_p+$pre_mts_l; ?></td>
                    </tr>
                    <tr>
                      <td>REGULER</td>
                      <td align="center">
                        <?php echo $reg_mts_l=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'REGULER',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $reg_mts_p=$this->db->like('status', 'AKTIF')->get_where('db_mts',array("jalur" => 'REGULER',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $reg_mts_p+$reg_mts_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Jalur (MA)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Jalur</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>INDEN</td>
                      <td align="center">
                        <?php echo $in_ma_l=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'INDEN',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $in_ma_p=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'INDEN',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $in_ma_p+$in_ma_l; ?></td>
                    </tr>
                    <tr>
                      <td>PRESTASI</td>
                      <td align="center">
                        <?php echo $pre_ma_l=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'PRESTASI',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $pre_ma_p=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'PRESTASI',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $pre_ma_p+$pre_ma_l; ?></td>
                    </tr>
                    <tr>
                      <td>REGULER</td>
                      <td align="center">
                        <?php echo $reg_ma_l=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'REGULER',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $reg_ma_p=$this->db->like('status', 'AKTIF')->get_where('db_ma',array("jalur" => 'REGULER',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $reg_ma_p+$reg_ma_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Jalur (SMP)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Jalur</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>INDEN</td>
                      <td align="center">
                        <?php echo $in_smp_l=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'INDEN',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $in_smp_p=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'INDEN',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $in_smp_p+$in_smp_l; ?></td>
                    </tr>
                    <tr>
                      <td>PRESTASI</td>
                      <td align="center">
                        <?php echo $pre_smp_l=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'PRESTASI',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $pre_smp_p=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'PRESTASI',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $pre_smp_p+$pre_smp_l; ?></td>
                    </tr>
                    <tr>
                      <td>REGULER</td>
                      <td align="center">
                        <?php echo $reg_smp_l=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'REGULER',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $reg_smp_p=$this->db->like('status', 'AKTIF')->get_where('db_smp',array("jalur" => 'REGULER',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $reg_smp_p+$reg_smp_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jumlah Berdasar Jalur (SMK)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Jalur</th>
                      <th>L</th>
                      <th>P</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>INDEN</td>
                      <td align="center">
                        <?php echo $in_smk_l=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'INDEN',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $in_smk_p=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'INDEN',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $in_smk_p+$in_smk_l; ?></td>
                    </tr>
                    <tr>
                      <td>PRESTASI</td>
                      <td align="center">
                        <?php echo $pre_smk_l=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'PRESTASI',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $pre_smk_p=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'PRESTASI',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $pre_smk_p+$pre_smk_l; ?></td>
                    </tr>
                    <tr>
                      <td>REGULER</td>
                      <td align="center">
                        <?php echo $reg_smk_l=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'REGULER',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $reg_smk_p=$this->db->like('status', 'AKTIF')->get_where('db_smk',array("jalur" => 'REGULER',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $reg_smk_p+$reg_smk_l; ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>               
        </div>
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
