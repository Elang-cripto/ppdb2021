<?php

$this->load->view('theme/head');
$this->load->view('theme/hlink_ind12');
$this->load->view('theme/hd_alert');
$this->load->view('theme/nav');
$this->load->view('user/side');
?>
<!-- =============================================================================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-sm-6">
          <h1>Dasboard</h1>
        </div>
        <div class="col-sm-6 ">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dasboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

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
            $par = $this->session->userdata('par');
            $jabatan = $this->session->userdata('jabatan');
            $kelas = $this->session->userdata('kelas');
            $file_poto = base_url('') . 'asset/dist/img/' . $foto;
            $file_zonk = base_url('') . 'asset/dist/img/none.png';

            $db_pil = "db_" . $par;

            $clkls = "%L" . $kelas . "AKTIF%";
            $data_L = $this->db->query("SELECT * FROM $db_pil where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();

            $cpkls = "%P" . $kelas . "AKTIF%";
            $data_P = $this->db->query("SELECT * FROM $db_pil where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();

            $cmkls1 = "%" . $kelas . "PENGAJUAN MUTASI%";
            $cmkls2 = "%" . $kelas . "PROSES MUTASI%";
            $data_m = $this->db->query("SELECT * FROM $db_pil where CONCAT(kelas_aktf,status) LIKE '$cmkls1'")->num_rows();

            $pkls = "%" . $kelas . "NON AKTIF%";
            $data_J = $this->db->query("SELECT * FROM $db_pil where CONCAT(kelas_aktf,status) LIKE '$pkls'")->num_rows();

            if (empty($foto)) {
              $gambar = $file_zonk;
            } else {
              $gambar = $file_poto;
            }
            ?>
            <?php
            if ($par == "MTS") {
              $warna = "primary";
            } elseif ($par == "MA") {
              $warna = "success";
            } elseif ($par == "SMP") {
              $warna = "warning";
            } else {
              $warna = "danger";
            }
            ?>
            <!-- <div class="widget-user-header text-white" style="background: url('<?php echo base_url('') ?>/asset/dist/img/photo1.png') center center;"> -->
            <div class="widget-user-header bg-<?php echo $warna; ?>">
              <h4 class="widget-user-username"><b><?php echo strtoupper($nama); ?></b></h4>
              <h6 class="widget-user-desc"><b> === <?php echo strtoupper($jabatan . ' ' . $kelas . ' ' . $par); ?> === </b></h6>
            </div>
            <div class="widget-user-image">

              <img class="img-circle elevation-2" src="<?php echo $gambar; ?>" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="card-body text-center">
                  <h6>
                    Selamat Datang <b><?php echo strtoupper($nama); ?></b>, anda adalah <b><?php echo strtoupper($jabatan . ' ' . $kelas . ' ' . $par); ?></b>.<br>
                    selamat menggunakan Website PPDB Online AL AMIEN 2022, Isilah Formulir Pendaftaran Dengan Teliti. <br><br>
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
            <div class="col-md-12">
              <!-- small box -->
              <div class="small-box">
                <div class="inner">
                  <div class="row">
                    <!-- The time line -->
                    <div class="timeline">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">2022</span>
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
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="\ppdb2021\asset\frontend\smk.jpg" alt="User Image">
                  <span class="username"><a href="https://m.facebook.com/SMK-Al-Amien-Ambulu-110230078154774/">SMK AL AMIEN</a></span>
                  <span class="description">Beberapa saat yang lalu</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>Tata busana SMK Al Amien Ambulu <br>
                  . <br>
                  Yuk belajar bersama disini <br>
                  . <br>
                  Sekolahnya pecinta fashion</p>

                <p>Gallery Class Meeting <br>
                  Fashion Show karya siswi Smks AL Amien, <br>
                  Dengan model adek-adek siswi SmpPlus Al Amien Ambulu & MTs AL Amien Ambulu. <br>
                  Kerennn ! <br>
                  #smkalamien #fashionshow #ambulu #tatabusana #tabassam</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\smk2.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\smk3.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\smk6.jpg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="">
                    <h4 class="attachment-heading"><a href="https://www.instagram.com/smkalamienambulu/">Instagram SMK Al AMIEN</a></h4>

                    <div class="attachment-text">
                      Gallery Class Meeting <br>
                      Fashion Show karya siswi Smks AL Amien,.... <a href="https://www.instagram.com/p/CXxkWm-PTvP/?utm_source=ig_web_copy_link">Selengkapnya</a>
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="\ppdb2021\asset\frontend\ma.jpg" alt="User Image">
                  <span class="username"><a href="https://m.facebook.com/SMK-Al-Amien-Ambulu-110230078154774/">MA AL AMIEN</a></span>
                  <span class="description">Beberapa saat yang lalu</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p> MA Al Amien
                  Yuk gabung ma qta-qta, <br>. <br> belajar bersama menggali prestasi dan kreativitas qta. <br>
                  Kalian minta apa.. ? <br> . <br> Di MA Al Amien ada berbagai life skill, <br>
                  ekstra kurikuler yg selalu dapat menyalurkan bakat untuk kalian yg ingin berprestasi. <br>
                  MA Al Amien selalu dihati <br>
                  #maalamien #porseni #ambulu</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <div id="carouselExampleControlss" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\ma1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 h-20" src="\ppdb2021\asset\frontend\ma2.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\ma3.jpg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControlss" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControlss" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="">
                    <h4 class="attachment-heading"><a href="https://www.instagram.com/smkalamienambulu/">Instagram SMK Al AMIEN</a></h4>

                    <div class="attachment-text">
                      Gallery Class Meeting <br>
                      Fashion Show karya siswi Smks AL Amien,.... <a href="https://www.instagram.com/p/CXxkWm-PTvP/?utm_source=ig_web_copy_link">Selengkapnya</a>
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="\ppdb2021\asset\frontend\mts2.jpg" alt="User Image">
                  <span class="username"><a href="https://m.facebook.com/SMK-Al-Amien-Ambulu-110230078154774/">MTs AL AMIEN</a></span>
                  <span class="description">Beberapa saat yang lalu</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p> MA Al Amien
                  Yuk gabung ma qta-qta, belajar bersama menggali prestasi dan kreativitas qta. <br>
                  Kalian minta apa, di MA Al Amien ada berbagai life skill, <br>
                  ekstra kurikuler yg ta mati gaya tu kalian yg ingin berprestasi. <br>
                  MA Al Amien sll dihati
                  #maalamien #porseni #ambulu</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <div id="carouselExampleControlsss" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\mts3.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 h-20" src="\ppdb2021\asset\frontend\mts4.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\mts1.png" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControlsss" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControlsss" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="">
                    <h4 class="attachment-heading"><a href="https://www.instagram.com/smkalamienambulu/">Instagram SMK Al AMIEN</a></h4>

                    <div class="attachment-text">
                      Gallery Class Meeting <br>
                      Fashion Show karya siswi Smks AL Amien,.... <a href="https://www.instagram.com/p/CXxkWm-PTvP/?utm_source=ig_web_copy_link">Selengkapnya</a>
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="\ppdb2021\asset\frontend\smp.jpg" alt="User Image">
                  <span class="username"><a href="https://m.facebook.com/SMK-Al-Amien-Ambulu-110230078154774/">MTs AL AMIEN</a></span>
                  <span class="description">Beberapa saat yang lalu</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p> MA Al Amien
                  Yuk gabung ma qta-qta, belajar bersama menggali prestasi dan kreativitas qta. <br>
                  Kalian minta apa, di MA Al Amien ada berbagai life skill, <br>
                  ekstra kurikuler yg ta mati gaya tu kalian yg ingin berprestasi. <br>
                  MA Al Amien sll dihati
                  #maalamien #porseni #ambulu</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <div id="carouselExampleControlssss" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\smp1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100 h-20" src="\ppdb2021\asset\frontend\smp2.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="\ppdb2021\asset\frontend\smp3.jpg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControlssss" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControlssss" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="">
                    <h4 class="attachment-heading"><a href="https://www.instagram.com/smkalamienambulu/">Instagram SMK Al AMIEN</a></h4>

                    <div class="attachment-text">
                      Gallery Class Meeting <br>
                      Fashion Show karya siswi Smks AL Amien,.... <a href="https://www.instagram.com/p/CXxkWm-PTvP/?utm_source=ig_web_copy_link">Selengkapnya</a>
                    </div>
                    <!-- /.attachment-text -->
                  </div>
                  <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div>
      <!-- /.timeline -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php $this->load->view('user/modal_info'); ?>
<!-- =============================================================================================== -->
<?php

$this->load->view('theme/foot');
$this->load->view('theme/flink_ind12');
$this->load->view('theme/ft_alert');
?>
<script>
  $('#modalinfo').modal('show');
</script>
</body>

</html>