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
  $aktif_mts = $this->db->get_where('db_mts', array("status" => 'AKTIF', "mgm" => $this->session->userdata('nama')))->num_rows();
  $aktif_ma  = $this->db->get_where('db_ma', array("status" => 'AKTIF', "mgm" => $this->session->userdata('nama')))->num_rows();
  $aktif_smp  = $this->db->get_where('db_smp', array("status" => 'AKTIF', "mgm" => $this->session->userdata('nama')))->num_rows();
  $aktif_smk  = $this->db->get_where('db_smk', array("status" => 'AKTIF', "mgm" => $this->session->userdata('nama')))->num_rows();
  $jml_aktif = $aktif_mts + $aktif_ma + $aktif_smp + $aktif_smk;
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php
            $jabatan = $this->session->userdata('jabatan');
            $nama = $this->session->userdata('nama');
            $foto = $this->session->userdata('foto');
            $file_poto = base_url('') . 'asset/dist/img/' . $foto;
            $file_zonk = base_url('') . 'asset/dist/img/none.png';

            if (empty($foto)) {
              $gambar = $file_zonk;
            } else {
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
                    selamat menggunakan Aplikasi PPDB Online ini. Aplikasi ini membantu anda dalam managemen Data Sekolah. <br>
                    Kami menyadari masih ada beberapa kekurangan dalam aplikasi ini. namun kami akan terus berbenah untuk kedepannya agar
                    aplikasi ini agar menjadi lebih sempurna. <br><br>
                    <b>Salam Satu Data Al Amien</b>
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
                  <p>PENDAFTAR AKTIF MTS</p>
                  <h3><?php echo $aktif_mts; ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klsmts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-success">
                <div class="inner">
                  <p>PENDAFTAR AKTIF MA</p>
                  <h3><?php echo $aktif_ma; ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klsma" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <p>PENDAFTAR AKTIF SMP</p>
                  <h3><?php echo $aktif_smp; ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klssmp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>PENDAFTAR AKTIF SMK</p>
                  <h3><?php echo $aktif_smk; ?></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url($jabatan) ?>/klssmk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =========================================================================== -->
    <hr>

    <!-- =========================================================================== -->
    <hr>
    <div class="row">
      <div class="col-md-6">
        <!-- The time line -->
        <div class="timeline">
          <!-- timeline time label -->
          <div class="time-label">
            <span class="bg-green">2022</span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <?php foreach ($dbinfo as $row) : ?>
            <div>
              <i class="fas fa-bullhorn bg-yellow"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?php echo $row->tanggal; ?> ( <?php echo $row->waktu; ?> )</span>
                <h3 class="timeline-header"><a href="#"><?php echo strtoupper($row->jabatan); ?> </a><small class="badge badge-info"> <?php echo $row->user; ?></small></h3>
                <div class="timeline-body">
                  <?php echo $row->status; ?>
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>admin/del_info/<?php echo $row->id; ?>">Delete</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- END timeline item -->
          <div>
            <i class="fas fa-clock bg-gray"></i>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <!-- /.timeline -->
  </section>
  <!-- /.content -->