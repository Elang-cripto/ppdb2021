<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$this->load->view('admin/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Form Perbaikan Data Siswa MA</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formulir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
          if(validation_errors() != false)
          {
            ?>
            <div class="alert alert-danger" role="alert">
              <?php echo validation_errors(); ?>
            </div>
            <?php
          }
          if(isset($error))
          {
              echo "ERROR UPLOAD : <br/>";
              print_r($error);
              echo "<hr/>";
          }
        ?>
        <?php echo $this->session->flashdata('pesan'); ?>
        <!-- form start -->
        <form method="post" action="<?php echo base_url(); ?>admin/updatema" enctype="multipart/form-data">
            <!-- Horizontal Form -->
        <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card card-success card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         <?php 
                            if(empty($dbma->foto)){
                              $gambar = "none.png";
                            }else{
                              $gambar = $dbma->foto;
                            }
                          ?>
                         src="<?php echo base_url('asset/upload/'.$gambar)?>"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $dbma->nama; ?></h3>

                  <h3 class="text-center">
                    <?php if($dbma->status == "AKTIF"){ ?>
                    <span class="badge bg-success"><?php echo $dbma->status; ?></span>
                    <?php }else{ ?>
                    <span class="badge bg-danger"><?php echo $dbma->status; ?></span>
                    <?php } ?>
                  </h3>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>NIS</b> <a class="float-right"><?php echo $dbma->nis; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>NISN</b> <a class="float-right"><?php echo $dbma->nisn; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>ROMBEL</b> <a class="float-right"><h6><span class="badge bg-success">Kelas <?php echo $dbma->kelas_aktf; ?></span></h6></a>
                    </li>
                    <li class="list-group-item">
                      <b>UMUR</b> 
                      <a class="float-right">
                        <?php 
                          // $this->load->helper(array('umur','date'));
                          echo hitung_umur($dbma->tgl_lahir);
                        ?>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- About Me Box -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Resume</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                  <p class="text-muted">
                    SD/MI : <?php echo $dbma->skl_asal; ?><br>
                    SMP/MTS : MTsS AL AMIEN AMBULU
                  </p>
                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                  <p class="text-muted"><?php echo $dbma->alamat; ?>,
                    Dsn. <?php echo $dbma->dusun; ?>,
                    Ds. <?php echo $dbma->kelurahan; ?>,
                    Kec. <?php echo $dbma->kecamatan; ?>,
                    Kab. <?php echo $dbma->kabupaten; ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Jenis Tinggal</strong>
                  <p class="text-muted"><?php echo $dbma->jns_tinggal; ?></p>
                  <hr>                
                  <strong><i class="fas fa-user-alt mr-1"></i> Keluarga</strong>

                  <p class="text-muted">
                    Ayah  : <?php echo $dbma->nm_ayh; ?><br>
                    Ibu   : <?php echo $dbma->nm_ibu; ?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-phone-alt mr-1"></i> No Telp</strong>

                  <p class="text-muted"><?php echo $dbma->telp; ?></p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-9">
                <!-- DATA SISWA -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">DATA SISWA</h3>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="Nis" class="col-sm-4 col-form-label">NIS</label>
                        <div class="col-sm-8">
                          <input type="hidden" name="id" id="id" value="<?php echo $dbma->id; ?>"/>
                          <input type="text" name="nis" class="form-control" id="Nis" value="<?php echo $dbma->nis; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Nisn" class="col-sm-4 col-form-label">NISN</label>
                        <div class="col-sm-8">
                          <input type="text" name="nisn" class="form-control" id="Nisn" placeholder="0000000000" value="<?php echo $dbma->nisn; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                        <div class="col-sm-8">
                          <input type="text" name="nama" class="form-control" id="nama" placeholder="Sesuai Ijazah" value="<?php echo $dbma->nama; ?>" required>
                        </div>
                      </div>
                      <!-- OPTION -->
                      <div class="form-group row">
                        <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                        <div class="col-sm-8">
                        <select type="text" name="jk" id="Jenis Kelamin"  class="form-control select2" required>
                          <option value="L" <?php if($dbma->jk=="L"){echo "selected";} ?>>Laki-laki</option>
                          <option value="P" <?php if($dbma->jk=="P"){echo "selected";} ?>>Perempuan</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                        <div class="col-sm-8">
                          <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" value="<?php echo $dbma->tmp_lahir; ?>">
                        </div>
                      </div>
                      <!-- TANGGAL -->
                      <div class="form-group row">
                        <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                        <div class="col-sm-8">
                          <div class="input-group"> 
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dbma->tgl_lahir; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                        <div class="col-sm-8">
                          <input type="text" name="nik" class="form-control" id="nik" placeholder="35xxxxxxxxxxxxxx" value="<?php echo $dbma->nik; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agama" class="col-sm-4 col-form-label">AGAMA</label>
                        <div class="col-sm-8">
                        <select type="text" name="agama" id="agama"  class="form-control select2">
                          <option value="Islam" <?php if($dbma->agama=="Islam"){echo "selected";} ?>>Islam</option>
                          <option value="Kristen" <?php if($dbma->agama=="Kristen"){echo "selected";} ?>>Kristen</option>
                          <option value="Katholik" <?php if($dbma->agama=="Katholik"){echo "selected";} ?>>Katholik</option>
                          <option value="Hindu" <?php if($dbma->agama=="Hindu"){echo "selected";} ?>>Hindu</option>
                          <option value="Budha" <?php if($dbma->agama=="Budha"){echo "selected";} ?>>Budha</option>
                          <option value="Khonghucu" <?php if($dbma->agama=="Khonghucu"){echo "selected";} ?>>Khonghucu</option>
                          <option value="Kepercayaan Kepada Tuhan YME" <?php if($dbma->agama=="Kepercayaan Kepada Tuhan YME"){echo "selected";} ?>>Kepercayaan Kepada Tuhan YME</option>
                          <option value="Lainnya" <?php if($dbma->agama=="Lainnya"){echo "selected";} ?>>Lainnya</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                        <div class="col-sm-8">
                          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Jl. kebaikan" value="<?php echo $dbma->alamat; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Rt" class="col-sm-4 col-form-label">RT / RW</label>
                        <div class="col-sm-4">
                          <input type="text" name="rt" class="form-control" id="Rt" placeholder="000" value="<?php echo $dbma->rt; ?>">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" name="rw" class="form-control" id="Rw" placeholder="000" value="<?php echo $dbma->rw; ?>">
                        </div>
                      </div>
                    </div>
                  </div>                        
                  <div class="col-md-6">
                    <div class="card-body">                   
                      <div class="form-group row">
                        <label for="Dusun" class="col-sm-4 col-form-label">DUSUN</label>
                        <div class="col-sm-8">
                          <input type="text" name="dusun" class="form-control" id="Dusun" placeholder="Dusun" value="<?php echo $dbma->dusun; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN</label>
                        <div class="col-sm-8">
                          <input type="text" name="kelurahan" class="form-control" id="Kelurahan" placeholder="Kelurahan" value="<?php echo $dbma->kelurahan; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN</label>
                        <div class="col-sm-8">
                          <input type="text" name="kecamatan" class="form-control" id="Kecamatan" placeholder="Kecamatan" value="<?php echo $dbma->kecamatan; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN</label>
                        <div class="col-sm-8">
                          <input type="text" name="kabupaten" class="form-control" id="Kabupaten" placeholder="Kabupaten" value="<?php echo $dbma->kabupaten; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Propinsi" class="col-sm-4 col-form-label">PROPINSI</label>
                        <div class="col-sm-8">
                          <input type="text" name="propinsi" class="form-control" id="Propinsi" placeholder="Propinsi" value="<?php echo $dbma->propinsi; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Jenis Tinggal" class="col-sm-4 col-form-label">JENIS TINGGAL</label>
                        <div class="col-sm-8">
                        <select type="text" name="jns_tinggal" id="Jenis Tinggal"  class="form-control select2" >
                          <option value="" <?php if($dbma->jns_tinggal==""){echo "selected";} ?>>Tidak Diketahui</option>
                          <option value="Dusun" <?php if($dbma->jns_tinggal=="Dusun"){echo "selected";} ?>>Dusun</option>
                          <option value="Salaf Putri" <?php if($dbma->jns_tinggal=="Salaf Putri"){echo "selected";} ?>>Salaf Putri</option>
                          <option value="Salaf Putra" <?php if($dbma->jns_tinggal=="Salaf Putra"){echo "selected";} ?>>Salaf Putra</option>
                          <option value="Rusunnawa" <?php if($dbma->jns_tinggal=="Rusunnawa"){echo "selected";} ?>>Rusunnawa</option>
                          <option value="Ashri" <?php if($dbma->jns_tinggal=="Ashri"){echo "selected";} ?>>Ashri</option>
                          <option value="AGA PUTRA" <?php if($dbma->jns_tinggal=="AGA PUTRA"){echo "selected";} ?>>AGA PUTRA</option>
                          <option value="AGA PUTRI" <?php if($dbma->jns_tinggal=="AGA PUTRI"){echo "selected";} ?>>AGA PUTRI</option>
                          <option value="Tahfid" <?php if($dbma->jns_tinggal=="Tahfid"){echo "selected";} ?>>Tahfid</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Status Tinggal" class="col-sm-4 col-form-label">STATUS TEMPAT TINGGAL</label>
                        <div class="col-sm-8">
                        <select type="text" name="sts_tinggal" id="Status Tinggal"  class="form-control select2" >
                          <option value="" <?php if($dbma->sts_tinggal==""){echo "selected";} ?>>Tidak Diketahui</option>
                          <option value="Milik Sendiri" <?php if($dbma->sts_tinggal=="Milik Sendiri"){echo "selected";} ?>>Milik Sendiri</option>
                          <option value="Rumah Orang Tua" <?php if($dbma->sts_tinggal=="Rumah Orang Tua"){echo "selected";} ?>>Rumah Orang Tua</option>
                          <option value="Rumah Saudara/Kerabat" <?php if($dbma->sts_tinggal=="Rumah Saudara/Kerabat"){echo "selected";} ?>>Rumah Saudara/Kerabat</option>
                          <option value="Rumah Dinas" <?php if($dbma->sts_tinggal=="Rumah Dinas"){echo "selected";} ?>>Rumah Dinas</option>
                          <option value="Sewa/kontrak" <?php if($dbma->sts_tinggal=="Sewa/kontrak"){echo "selected";} ?>>Sewa/kontrak</option>
                          <option value="Lainnya" <?php if($dbma->sts_tinggal=="Lainnya"){echo "selected";} ?>>Lainnya</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                        <div class="col-sm-8">
                          <input type="text" name="alat_trans" class="form-control" id="Transportasi" placeholder="Transportasi" value="<?php echo $dbma->alat_trans; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Rt" class="col-sm-4 col-form-label">NO TELP/HP</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="telp" value="<?php echo $dbma->telp; ?>"
                                 data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                        <div class="col-sm-8">
                          <input type="email" name="email" class="form-control" id="Email" placeholder="elang@gmail.com" value="<?php echo $dbma->email; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                        <div class="col-sm-4">
                          <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="00" value="<?php echo $dbma->anak_ke; ?>">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="00" value="<?php echo $dbma->jml_sdr; ?>">
                        </div>                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- DATA AYAH -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">DATA AYAH</h3>
                    </div>
                    <div class="card-body">              
                      <div class="form-group row">
                        <label for="nm_ayh" class="col-sm-4 col-form-label">NAMA AYAH</label>
                        <div class="col-sm-8">
                          <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Nama Ayah" value="<?php echo $dbma->nm_ayh; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nik_ayh" class="col-sm-4 col-form-label">NIK AYAH</label>
                        <div class="col-sm-8">
                          <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="NIK Ayah" value="<?php echo $dbma->nik_ayh; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tlahir_ayh" class="col-sm-4 col-form-label">TEMPAT LAHIR AYAH</label>
                        <div class="col-sm-8">
                          <input type="text" name="tlahir_ayh" class="form-control" id="tlahir_ayh" placeholder="Kota Lahir" value="<?php echo $dbma->tlahir_ayh; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lahir_ayh" class="col-sm-4 col-form-label">TANGGAL LAHIR AYAH</label>
                        <div class="col-sm-8"> 
                            <input type="date" name="lahir_ayh" class="form-control" value="<?php echo $dbma->lahir_ayh; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                        <div class="col-sm-8">
                          <select type="text" name="pend_ayh" id="pend_ayh"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_ayh==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak Sekolah" <?php if($dbma->pend_ayh=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                            <option value="Putus SD" <?php if($dbma->pend_ayh=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                            <option value="SD Sederajad" <?php if($dbma->pend_ayh=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                            <option value="SMP Sederajad" <?php if($dbma->pend_ayh=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                            <option value="SMA Sederajad" <?php if($dbma->pend_ayh=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                            <option value="D1" <?php if($dbma->pend_ayh=="D1"){echo "selected";} ?>>D1</option>
                            <option value="D2" <?php if($dbma->pend_ayh=="D2"){echo "selected";} ?>>D2</option>
                            <option value="D3" <?php if($dbma->pend_ayh=="D3"){echo "selected";} ?>>D3</option>
                            <option value="D4/S1" <?php if($dbma->pend_ayh=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                            <option value="S2" <?php if($dbma->pend_ayh=="S2"){echo "selected";} ?>>S2</option>
                            <option value="S3" <?php if($dbma->pend_ayh=="S3"){echo "selected";} ?>>S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                        <div class="col-sm-8">
                          <select type="text" name="kerja_ayh" id="kerja_ayh"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_ayh==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak bekerja" <?php if($dbma->pend_ayh=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                            <option value="Nelayan" <?php if($dbma->pend_ayh=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                            <option value="Petani" <?php if($dbma->pend_ayh=="Petani"){echo "selected";} ?>>Petani</option>
                            <option value="Peternak" <?php if($dbma->pend_ayh=="Peternak"){echo "selected";} ?>>Peternak</option>
                            <option value="PNS/TNI/POLRI" <?php if($dbma->pend_ayh=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta" <?php if($dbma->pend_ayh=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                            <option value="Pedagang Kecil" <?php if($dbma->pend_ayh=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                            <option value="Pedagang Besar" <?php if($dbma->pend_ayh=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                            <option value="Wiraswasta" <?php if($dbma->pend_ayh=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                            <option value="Wirausaha" <?php if($dbma->pend_ayh=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                            <option value="Buruh" <?php if($dbma->pend_ayh=="Buruh"){echo "selected";} ?>>Buruh</option>
                            <option value="Pensiunan" <?php if($dbma->pend_ayh=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                        <div class="col-sm-8">
                          <input type="text" name="hasil_ayh" class="form-control" id="hasil_ayh" placeholder="Rp. 000.000" value="<?php echo $dbma->hasil_ayh; ?>">
                        </div>
                      </div>
                    </div>
                  </div>   
                </div>
                <div class="col-md-6">
                  <!-- DATA IBU -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">DATA IBU</h3>
                    </div>
                    <div class="card-body">              
                      <div class="form-group row">
                        <label for="nm_ibu" class="col-sm-4 col-form-label">NAMA IBU</label>
                        <div class="col-sm-8">
                          <input type="text" name="nm_ibu" class="form-control" id="nm_ibu" placeholder="Nama Ibu" value="<?php echo $dbma->nm_ibu; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nik_ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                        <div class="col-sm-8">
                          <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="NIK Ibu" value="<?php echo $dbma->nik_ibu; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tlahir_ibu" class="col-sm-4 col-form-label">TEMPAT LAHIR IBU</label>
                        <div class="col-sm-8">
                          <input type="text" name="tlahir_ibu" class="form-control" id="tlahir_ibu" placeholder="Kota Lahir" value="<?php echo $dbma->tlahir_ibu; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lahir_ibu" class="col-sm-4 col-form-label">TANGGAL LAHIR IBU</label>
                        <div class="col-sm-8"> 
                            <input type="date" name="lahir_ibu" class="form-control" value="<?php echo $dbma->lahir_ibu; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                        <div class="col-sm-8">
                          <select type="text" name="pend_ibu" id="pend_ibu"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_ibu==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak Sekolah" <?php if($dbma->pend_ibu=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                            <option value="Putus SD" <?php if($dbma->pend_ibu=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                            <option value="SD Sederajad" <?php if($dbma->pend_ibu=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                            <option value="SMP Sederajad" <?php if($dbma->pend_ibu=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                            <option value="SMA Sederajad" <?php if($dbma->pend_ibu=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                            <option value="D1" <?php if($dbma->pend_ibu=="D1"){echo "selected";} ?>>D1</option>
                            <option value="D2" <?php if($dbma->pend_ibu=="D2"){echo "selected";} ?>>D2</option>
                            <option value="D3" <?php if($dbma->pend_ibu=="D3"){echo "selected";} ?>>D3</option>
                            <option value="D4/S1" <?php if($dbma->pend_ibu=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                            <option value="S2" <?php if($dbma->pend_ibu=="S2"){echo "selected";} ?>>S2</option>
                            <option value="S3" <?php if($dbma->pend_ibu=="S3"){echo "selected";} ?>>S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                        <div class="col-sm-8">
                          <select type="text" name="kerja_ibu" id="kerja_ibu"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_ibu==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak bekerja" <?php if($dbma->pend_ibu=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                            <option value="Nelayan" <?php if($dbma->pend_ibu=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                            <option value="Petani" <?php if($dbma->pend_ibu=="Petani"){echo "selected";} ?>>Petani</option>
                            <option value="Peternak" <?php if($dbma->pend_ibu=="Peternak"){echo "selected";} ?>>Peternak</option>
                            <option value="PNS/TNI/POLRI" <?php if($dbma->pend_ibu=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta" <?php if($dbma->pend_ibu=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                            <option value="Pedagang Kecil" <?php if($dbma->pend_ibu=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                            <option value="Pedagang Besar" <?php if($dbma->pend_ibu=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                            <option value="Wiraswasta" <?php if($dbma->pend_ibu=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                            <option value="Wirausaha" <?php if($dbma->pend_ibu=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                            <option value="Buruh" <?php if($dbma->pend_ibu=="Buruh"){echo "selected";} ?>>Buruh</option>
                            <option value="Pensiunan" <?php if($dbma->pend_ibu=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                        <div class="col-sm-8">
                          <input type="text" name="hasil_ibu" class="form-control" id="hasil_ibu" placeholder="Rp. 000.000" value="<?php echo $dbma->hasil_ibu; ?>">
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>   
              </div>    
              <div class="row">
                <div class="col-md-6">
                  <!-- DATA WALI -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">DATA WALI</h3>
                    </div>
                    <div class="card-body">              
                      <div class="form-group row">
                        <label for="nm_wl" class="col-sm-4 col-form-label">NAMA WALI</label>
                        <div class="col-sm-8">
                          <input type="text" name="nm_wl" class="form-control" id="nm_wl" placeholder="Nama Wali" value="<?php echo $dbma->nm_wl; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nik_wl" class="col-sm-4 col-form-label">NIK WALI</label>
                        <div class="col-sm-8">
                          <input type="text" name="nik_wl" class="form-control" id="nik_wl" placeholder="NIK Wali" value="<?php echo $dbma->nik_wl; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tlahir_wl" class="col-sm-4 col-form-label">TEMPAT LAHIR WALI</label>
                        <div class="col-sm-8">
                          <input type="text" name="tlahir_wl" class="form-control" id="tlahir_wl" placeholder="Kota Lahir" value="<?php echo $dbma->tlahir_wl; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lahir_wl" class="col-sm-4 col-form-label">TANGGAL LAHIR WALI</label>
                        <div class="col-sm-8"> 
                            <input type="date" name="lahir_wl" class="form-control" value="<?php echo $dbma->lahir_wl; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="pend_wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                        <div class="col-sm-8">
                          <select type="text" name="pend_wl" id="pend_wl"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_wl==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak Sekolah" <?php if($dbma->pend_wl=="Tidak Sekolah"){echo "selected";} ?>>Tidak Sekolah</option>
                            <option value="Putus SD" <?php if($dbma->pend_wl=="Putus SD"){echo "selected";} ?>>Putus SD</option>
                            <option value="SD Sederajad" <?php if($dbma->pend_wl=="SD Sederajad"){echo "selected";} ?>>SD Sederajad</option>
                            <option value="SMP Sederajad" <?php if($dbma->pend_wl=="SMP Sederajad"){echo "selected";} ?>>SMP Sederajad</option>
                            <option value="SMA Sederajad" <?php if($dbma->pend_wl=="SMA Sederajad"){echo "selected";} ?>>SMA Sederajad</option>
                            <option value="D1" <?php if($dbma->pend_wl=="D1"){echo "selected";} ?>>D1</option>
                            <option value="D2" <?php if($dbma->pend_wl=="D2"){echo "selected";} ?>>D2</option>
                            <option value="D3" <?php if($dbma->pend_wl=="D3"){echo "selected";} ?>>D3</option>
                            <option value="D4/S1" <?php if($dbma->pend_wl=="D4/S1"){echo "selected";} ?>>D4/S1</option>
                            <option value="S2" <?php if($dbma->pend_wl=="S2"){echo "selected";} ?>>S2</option>
                            <option value="S3" <?php if($dbma->pend_wl=="S3"){echo "selected";} ?>>S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kerja_wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                        <div class="col-sm-8">
                          <select type="text" name="kerja_wl" id="kerja_wl"  class="form-control select2">
                            <option value="" <?php if($dbma->pend_wl==""){echo "selected";} ?>>Tidak Diketahui</option>
                            <option value="Tidak bekerja" <?php if($dbma->pend_wl=="Tidak bekerja"){echo "selected";} ?>>Tidak bekerja</option>
                            <option value="Nelayan" <?php if($dbma->pend_wl=="Nelayan"){echo "selected";} ?>>Nelayan</option>
                            <option value="Petani" <?php if($dbma->pend_wl=="Petani"){echo "selected";} ?>>Petani</option>
                            <option value="Peternak" <?php if($dbma->pend_wl=="Peternak"){echo "selected";} ?>>Peternak</option>
                            <option value="PNS/TNI/POLRI" <?php if($dbma->pend_wl=="PNS/TNI/POLRI"){echo "selected";} ?>>PNS/TNI/POLRI</option>
                            <option value="Karyawan Swasta" <?php if($dbma->pend_wl=="Karyawan Swasta"){echo "selected";} ?>>Karyawan Swasta</option>
                            <option value="Pedagang Kecil" <?php if($dbma->pend_wl=="Pedagang Kecil"){echo "selected";} ?>>Pedagang Kecil</option>
                            <option value="Pedagang Besar" <?php if($dbma->pend_wl=="Pedagang Besar"){echo "selected";} ?>>Pedagang Besar</option>
                            <option value="Wiraswasta" <?php if($dbma->pend_wl=="Wiraswasta"){echo "selected";} ?>>Wiraswasta</option>
                            <option value="Wirausaha" <?php if($dbma->pend_wl=="Wirausaha"){echo "selected";} ?>>Wirausaha</option>
                            <option value="Buruh" <?php if($dbma->pend_wl=="Buruh"){echo "selected";} ?>>Buruh</option>
                            <option value="Pensiunan" <?php if($dbma->pend_wl=="Pensiunan"){echo "selected";} ?>>Pensiunan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hasil_wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                        <div class="col-sm-8">
                          <input type="text" name="hasil_wl" class="form-control" id="hasil_wl" placeholder="Rp. 000.000" value="<?php echo $dbma->hasil_ibu; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="col-md-6">   
                  <!-- KARTU KESEJAHTERAAN -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">KARTU KESEJAHTERAAN</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="no_kk" class="col-sm-4 col-form-label">NO KK</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_kk" class="form-control" id="no_kk" value="<?php echo $dbma->no_kk; ?>" placeholder="Sesuai Kartu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_kps" class="col-sm-4 col-form-label">NO KPS</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_kps" class="form-control" id="no_kps" value="<?php echo $dbma->no_kps; ?>" placeholder="Sesuai Kartu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_kip" class="col-sm-4 col-form-label">NO KIP</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_kip" class="form-control" id="no_kip" value="<?php echo $dbma->no_kip; ?>" placeholder="Sesuai Kartu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_kis" class="col-sm-4 col-form-label">NO KIS</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_kis" class="form-control" id="no_kis" value="<?php echo $dbma->no_kis; ?>" placeholder="Sesuai Kartu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_pkh" class="col-sm-4 col-form-label">NO PKH</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_pkh" class="form-control" id="no_pkh" value="<?php echo $dbma->no_pkh; ?>" placeholder="Sesuai Kartu">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                        <div class="col-sm-8">
                          <input type="text" name="beasiswa" class="form-control" id="beasiswa" value="<?php echo $dbma->beasiswa; ?>" placeholder="Kartanu">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- ROMBEL -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">ROMBEL</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="kelas_7" class="col-sm-4 col-form-label">History</label>
                        <div class="col-sm-2">
                          <input type="text" name="kelas_7" class="form-control" id="kelas_7" placeholder="7-X" value="<?php echo $dbma->kelas_7; ?>">
                        </div>
                        <div class="col-sm-2">
                          <input type="text" name="kelas_8" class="form-control" id="kelas_8" placeholder="8-X"  value="<?php echo $dbma->kelas_8; ?>">
                        </div>
                        <div class="col-sm-2">
                          <input type="text" name="kelas_9" class="form-control" id="kelas_9" placeholder="9-X"  value="<?php echo $dbma->kelas_9; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kelas_aktf" class="col-sm-4 col-form-label">KELAS AKTIF</label>
                        <div class="col-sm-8">
                          <select type="text" name="kelas_aktf" id="kelas_aktf"  class="form-control select2">
                             <?php foreach($cats as $cat) : ?>
                              <option value="<?php echo $cat->kelas;?>" <?php if($dbma->kelas_aktf==$cat->kelas){echo "selected";} ?>> <?php echo $cat->kelas; ?></option>
                             <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kelas_dig" class="col-sm-4 col-form-label">KELAS DIGITAL</label>
                        <div class="col-sm-8">
                          <input type="text" name="kelas_dig" class="form-control" id="kelas_dig" value="<?php echo $dbma->kelas_dig; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">STATUS</label>
                        <div class="col-sm-8">
                          <select type="text" name="status" id="status" onChange="opsi(this)" class="form-control select2">
                            <option value="AKTIF" <?php if($dbma->status=="AKTIF"){echo "selected";} ?>>AKTIF</option>
                            <option value="PENGAJUAN MUTASI" <?php if($dbma->status=="PENGAJUAN MUTASI"){echo "selected";} ?>>PENGAJUAN MUTASI</option>
                            <option value="PROSES MUTASI" <?php if($dbma->status=="PROSES MUTASI"){echo "selected";} ?>>PROSES MUTASI</option>
                            <option value="NON AKTIF" <?php if($dbma->status=="NON AKTIF"){echo "selected";} ?>>NON AKTIF</option>
                          </select>
                        </div>
                      </div>

                      <input type="text" hidden class="form-control" name="editor" id="editor" value="<?php echo $this->session->userdata('nama'); ?>"><?php date_default_timezone_set('Asia/Jakarta'); ?>
                      <input type="text" hidden class="form-control" name="progres" id="progres" value="<?php echo date("d/m/Y h:i:s") ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                      
                    </div>
                  </div> 
                </div> 
                <div class="col-md-6">
                  <!-- LEGALITAS -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">LEGALITAS</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="no_un" class="col-sm-4 col-form-label">NO UN SD/MI</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_un" class="form-control" value="<?php echo $dbma->no_un; ?>" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_skhun" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_skhun" class="form-control" id="no_skhun" value="<?php echo $dbma->no_skhun; ?>" placeholder="DN-XX DI XXXXXXX">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_ijazah" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                        <div class="col-sm-8">
                          <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo $dbma->no_ijazah; ?>" placeholder="DN-XX DI XXXXXXX">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- REGISTER MASUK -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">REGISTER MASUK</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL</label>
                        <div class="col-sm-8">
                          <input type="text" name="skl_asal" class="form-control" id="skl_asal" value="<?php echo $dbma->skl_asal; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="almt_skl" class="col-sm-4 col-form-label">ALAMAT SEKOLAH ASAL</label>
                        <div class="col-sm-8">
                          <input type="text" name="almt_skl" class="form-control" id="almt_skl" value="<?php echo $dbma->almt_skl; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jns_masuk" class="col-sm-4 col-form-label">JENIS PENDAFTARAN</label>
                        <div class="col-sm-8">
                          <select type="text" name="jns_masuk" id="jns_masuk"  class="form-control select2" >
                            <option value="Siswa Baru" <?php if($dbma->jns_masuk=="Siswa Baru"){echo "selected";} ?>>Siswa Baru</option>
                            <option value="Pindahan" <?php if($dbma->jns_masuk=="Pindahan"){echo "selected";} ?>>Pindahan</option>
                            <option value="Kembali Bersekolah" <?php if($dbma->jns_masuk=="Kembali Bersekolah"){echo "selected";} ?>>Kembali Bersekolah</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tgl_masuk" class="col-sm-4 col-form-label">TANGGAL MASUK</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <input type="date" name="tgl_masuk" class="form-control" value="<?php echo $dbma->tgl_masuk; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div> 
                <div class="col-md-6">
                  <!-- REGISTER KELUAR -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">REGISTER KELUAR</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="ket_out" class="col-sm-4 col-form-label">KETERANGAN KELUAR</label>
                        <div class="col-sm-8">
                          <select type="text" name="ket_out" id="ket_out" disabled class="form-control select2" <?php if($dbma->status="NON AKTIF"){echo "";}else{echo "disabled";} ?>>
                            <option value="" <?php if($dbma->ket_out==""){echo "selected";} ?>></option>
                            <option value="Mutasi" <?php if($dbma->ket_out=="Mutasi"){echo "selected";} ?>>Mutasi</option>
                            <option value="Lulus" <?php if($dbma->ket_out=="Lulus"){echo "selected";} ?>>Lulus</option>
                            <option value="Dikeluarkan" <?php if($dbma->ket_out=="Dikeluarkan"){echo "selected";} ?>>Dikeluarkan</option>
                            <option value="Mengundurkan Diri" <?php if($dbma->ket_out=="Mengundurkan Diri"){echo "selected";} ?>>Mengundurkan Diri</option>
                            <option value="Putus Sekolah" <?php if($dbma->ket_out=="Putus Sekolah"){echo "selected";} ?>>Putus Sekolah</option>
                            <option value="Wafat" <?php if($dbma->ket_out=="Wafat"){echo "selected";} ?>>Wafat</option>
                            <option value="Hilang" <?php if($dbma->ket_out=="Hilang"){echo "selected";} ?>>Hilang</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tgl_out" class="col-sm-4 col-form-label">TANGGAL KELUAR</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <input type="date" name="tgl_out" id="tgl_out" disabled class="form-control" value="<?php echo $dbma->tgl_out; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask <?php if($dbma->status="NON AKTIF"){echo "";}else{echo "disabled";} ?>>

                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alasan_out" class="col-sm-4 col-form-label">ALASAN KELUAR</label>
                        <div class="col-sm-8">
                          <input type="text" name="alasan_out" class="form-control" id="alasan_out" disabled value="<?php echo $dbma->alasan_out; ?>" <?php if($dbma->status="NON AKTIF"){echo "";}else{echo "disabled";} ?>>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nosrt_out" class="col-sm-4 col-form-label">NO SURAT</label>
                        <div class="col-sm-8">
                          <input type="text" name="nosrt_out" class="form-control" id="nosrt_out" disabled value="<?php echo $dbma->nosrt_out; ?>" <?php if($dbma->status="NON AKTIF"){echo "";}else{echo "disabled";} ?>>
                        </div>
                      </div>
                      
                    </div>
                  </div> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- UPLOAD FOTO -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">FOTO</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>             
                  </div>
                </div> 
                <div class="col-md-6">
                  <!-- PROSES -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">PROSES</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-check">
                        <input type="hidden" name="foto_old" value="<?php echo $dbma->foto; ?>">
                        <input type="checkbox" name="terms" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="exampleCheck2">Saya telah entry data sesuai dengan ketentuan berkas yang berlaku, dan telah kami validasi kebenaran data tersebut. dan saya bertanggung jawab atas kebenaran data tersebut</label>
                      </div>
                     </div>             
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">Update Data</button>
                     
                    </div>                    
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_form');
$this->load->view('theme/flink_modal');
?>
</body>
</html>