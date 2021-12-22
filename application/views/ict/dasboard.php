<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_ind12');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$this->load->view('ict/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dasboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dasboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php
  $rmbl_mts = $this->db->get_where('db_mts', ["status" => 'AKTIF'])->num_rows();
  $rmbl_ma  = $this->db->get_where('db_ma', ["status" => 'AKTIF'])->num_rows();
  $rmbl_smp  = $this->db->get_where('db_smp', ["status" => 'AKTIF'])->num_rows();
  $rmbl_smk  = $this->db->get_where('db_smk', ["status" => 'AKTIF'])->num_rows();
  $jml_rbl = $rmbl_mts + $rmbl_ma + $rmbl_smp + $rmbl_smk;

    $status_array = array('PENGAJUAN MUTASI','PROSES MUTASI');
    $verval_mts = $this->db->where_in('status', $status_array)->get('db_mts')->num_rows();
    $verval_ma = $this->db->where_in('status', $status_array)->get('db_ma')->num_rows();
    $verval_smp = $this->db->where_in('status', $status_array)->get('db_smp')->num_rows();
    $verval_smk = $this->db->where_in('status', $status_array)->get('db_smk')->num_rows();

    $verval = $verval_mts + $verval_ma + $verval_smp + $verval_smk;
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <?php 
                $jabatan = $this->session->userdata('jabatan');
                $nama = $this->session->userdata('nama');
                $foto = $this->session->userdata('foto');
                $file_poto = base_url('').'asset/dist/img/'.$foto;
                $file_zonk = base_url('').'asset/dist/img/none.png';

                  if(empty($foto)){
                      $gambar = $file_zonk;
                    }else{
                      $gambar = $file_poto;
                    }
              ?>
              <!-- <div class="widget-user-header text-white" style="background: url('<?php echo base_url('') ?>/asset/dist/img/photo1.png') center center;"> -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username"><b><?php echo strtoupper($nama); ?></b></h3>
                <h5 class="widget-user-desc"><b> === <?php echo strtoupper($jabatan); ?> === </b></h5>
              </div>
              <div class="widget-user-image">
                
                <img class="img-circle elevation-2" src="<?php echo $gambar; ?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="card-body text-center">
                    <h6>
                    Selamat Datang <b><?php echo strtoupper($nama); ?></b>, anda adalah <b><?php echo strtoupper($jabatan); ?></b>.<br>
                    selamat menggunakan Aplikasi Database Online ini. Aplikasi ini membantu anda dalam managemen Data Sekolah. <br>
                    Kami menyadari masih ada beberapa kekurangan dalam aplikasi ini. namun kami akan terus berbenah untuk kedepannya agar
                    aplikasi ini menjadi lebih sempurna. <br><br>
                    Salam Satu Data Al Amien
                    </h6>
                  </div>
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                  <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <p>JUMLAH SISWA MTS</p>
                    <h3><?php echo $rmbl_mts; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url($jabatan) ?>/klsmts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                
                <div class="small-box bg-success">
                  <div class="inner">
                    <p>JUMLAH SISWA MA</p>
                    <h3><?php echo $rmbl_ma; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url($jabatan) ?>/klsma" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>

                <div class="info-box mb-3 bg-secondary">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                  <div class="info-box-content ">
                    <span class="info-box-text">Pengajuan Verval</span>
                    <span class="info-box-number"><?php echo $verval ?></span>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                      <p>JUMLAH SISWA SMP</p>
                      <h3><?php echo $rmbl_smp; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url($jabatan) ?>/klssmp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-danger">
                  <div class="inner">
                      <p>JUMLAH SISWA SMK</p>
                      <h3><?php echo $rmbl_smk; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url($jabatan) ?>/klssmk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>

                <div class="info-box mb-3 bg-secondary">
                  <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
                  <div class="info-box-content ">
                    <span class="info-box-text">Jumlah Siswa</span>
                    <span class="info-box-number"><?php echo $jml_rbl ?></span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">2021</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <?php foreach($dbinfo as $row): ?>
                <div>
                  <i class="fas fa-bullhorn bg-yellow"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> <?php echo $row->tanggal; ?> ( <?php echo $row->waktu; ?> )</span>
                    <h3 class="timeline-header"><a href="#"><?php echo strtoupper($row->jabatan); ?> </a><small class="badge badge-info"> <?php echo $row->user; ?></small></h3>
                    <div class="timeline-body">
                      <?php echo $row->status; ?>
                    </div>
                  </div>
                </div>
              <?php  endforeach; ?>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Members</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php foreach($dbuser as $rows): ?>
                  <li>
                    <?php if(empty($rows->foto)){$foto = "none.png";}else{$foto = $rows->foto;} ?>
                    <img src="<?php base_url('') ?>asset/dist/img/<?php echo $foto; ?>" alt="User Image">
                    <a class="users-list-name" href="#"><?php echo $rows->nama; ?></a>
                    <span class="users-list-date"><?php echo $rows->last; ?></span>
                  </li>
                  <?php  endforeach; ?>
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="javascript::">View All Users</a>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!-- /.timeline -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php $this->load->view('walikelas/modal_info'); ?>
<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_ind12');
$this->load->view('theme/flink_modal');
?>
<script>
  $('#modalinfo').modal('show');
</script>
</body>
</html>