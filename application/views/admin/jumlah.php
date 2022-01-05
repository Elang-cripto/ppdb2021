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
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Jumlah Rombel MTS</p>
                <h3>
                  <!-- <?php echo "L: ".$this->db->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); ?> -->
                  <?php echo $this->db->get_where('db_kls',array("par" => 'mts'))->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <p>Jumlah Rombel MA</p>
                <h3>
                  <?php echo $this->db->get_where('db_kls',array("par" => 'ma'))->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Jumlah Rombel SMP</p>
                <h3>
                  <?php echo $this->db->get_where('db_kls',array("par" => 'smp'))->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Jumlah Rombel SMK</p>
                <h3>
                  <?php echo $this->db->get_where('db_kls',array("par" => 'smk'))->num_rows(); ?>
                </h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD MTS Total</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas MTS</td>
                      <td align="center">
                        <?php echo $mtsp=$this->db->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $mtsl=$this->db->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $mtsp+$mtsl; ?></td>
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
                <h3 class="card-title">Jumlah PD MA Total</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas MA</td>
                      <td align="center">
                        <?php echo $map=$this->db->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $mal=$this->db->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $map+$mal; ?></td>
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
                <h3 class="card-title">Jumlah PD SMP Total</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas SMP</td>
                      <td align="center">
                        <?php echo $smpp=$this->db->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $smpl=$this->db->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $smpp+$smpl; ?></td>
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
                <h3 class="card-title">Jumlah PD SMK Total</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td>Kelas SMK</td>
                      <td align="center">
                        <?php echo $smkp=$this->db->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); ?>
                      </td>
                      <td align="center">
                        <?php echo $smkl=$this->db->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); ?>
                      </td>
                      <td align="center"><?php echo $smkp+$smkl; ?></td>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Jumlah PD MTS Perjenjang</h3>
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
                    <?php 
                      $no=0;
                      $no++;
                    ?>                    
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Kelas 7</td>
                      <td align="center">
                        <?php 
                          echo $mts7l=$this->db->like('kelas_aktf', '7')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts7p=$this->db->like('kelas_aktf', '7')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts7p+$mts7l; ?></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kelas 8</td>
                      <td align="center">
                        <?php 
                          echo $mts8l=$this->db->like('kelas_aktf', '8')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts8p=$this->db->like('kelas_aktf', '8')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts8p+$mts8l; ?></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Kelas 9</td>
                      <td align="center">
                        <?php 
                          echo $mts9l=$this->db->like('kelas_aktf', '9')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $mts9p=$this->db->like('kelas_aktf', '9')->get_where('db_mts',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $mts9p+$mts9l; ?></td>
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
                <h3 class="card-title">Jumlah PD MA Perjenjang</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td>1.</td>
                      <td>Kelas 10</td>
                      <td align="center">
                        <?php 
                          echo $ma10l=$this->db->like('kelas_aktf', '10')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma10p=$this->db->like('kelas_aktf', '10')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma10l + $ma10p; ?></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kelas 11</td>
                      <td align="center">
                        <?php 
                          echo $ma11l=$this->db->like('kelas_aktf', '11')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma11p=$this->db->like('kelas_aktf', '11')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma11l + $ma11p; ?></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Kelas 12</td>
                      <td align="center">
                        <?php 
                          echo $ma12l=$this->db->like('kelas_aktf', '12')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $ma12p=$this->db->like('kelas_aktf', '12')->get_where('db_ma',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $ma12l + $ma12p; ?></td>
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
                <h3 class="card-title">Jumlah PD SMP Perjenjang</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td>1.</td>
                      <td>Kelas 7</td>
                      <td align="center">
                        <?php 
                          echo $smp7l=$this->db->like('kelas_aktf', '7')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp7p=$this->db->like('kelas_aktf', '7')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp7p + $smp7l; ?></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kelas 8</td>
                      <td align="center">
                        <?php 
                          echo $smp8l=$this->db->like('kelas_aktf', '8')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp8p=$this->db->like('kelas_aktf', '8')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp8p + $smp8l; ?></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Kelas 9</td>
                      <td align="center">
                        <?php 
                          echo $smp9l=$this->db->like('kelas_aktf', '9')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smp9p=$this->db->like('kelas_aktf', '9')->get_where('db_smp',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smp9p + $smp9l; ?></td>
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
                <h3 class="card-title">Jumlah PD SMK Perjenjang</h3>
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
                      $no=0;
                      $no++;
                    ?>                    
                    <tr>
                      <td>1.</td>
                      <td>Kelas 10</td>
                      <td align="center">
                        <?php 
                          echo $smk10l=$this->db->like('kelas_aktf', '10')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk10p=$this->db->like('kelas_aktf', '10')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk10p+$smk10l; ?></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Kelas 11</td>
                      <td align="center">
                        <?php 
                          echo $smk11l=$this->db->like('kelas_aktf', '11')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk11p=$this->db->like('kelas_aktf', '11')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk11p+$smk11l; ?></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Kelas 12</td>
                      <td align="center">
                        <?php 
                          echo $smk12l=$this->db->like('kelas_aktf', '12')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'L'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center">
                        <?php 
                          echo $smk12p=$this->db->like('kelas_aktf', '12')->get_where('db_smk',array("status" => 'AKTIF',"jk" => 'P'))->num_rows(); 
                        ?>
                      </td>
                      <td align="center"><?php echo $smk12p+$smk12l; ?></td>
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
            <!-- PRODUCT LIST -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Jumlah Peserta Didik Aktif MTS</h3>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Jumlah Peserta Didik Aktif MA</h3>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Jumlah Peserta Didik Aktif SMP</h3>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jumlah Peserta Didik Aktif SMK</h3>
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
