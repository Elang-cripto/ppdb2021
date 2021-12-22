<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$this->load->view('walikelas/side');
?>
<!-- =============================================================================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cek Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Cek Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

      <?php 
        $role = $this->session->userdata('jabatan');
        $kelas = $this->session->userdata('kelas');
        $w_kelas = $this->session->userdata('nama');
        $lembaga = $this->session->userdata('par');
        // $lembaga = $this->uri->segment(2);

        if ($lembaga=="mts") {
            $ks = "Moh. Nasir. S.Pd, M.Pd.I";
            $skl = "MTs Al Amien";
          } elseif ($lembaga=="ma") {
            $ks =  "Zaenal Arifin, S.Pd.I";
            $skl = "MA Al Amien";
          } elseif ($lembaga=="smk") {
            $ks = "Muhammad Yazid Ma'sum, S.Pd";
            $skl = "SMKS Al Amien";
          } elseif ($lembaga=="smp"){
            $ks = "I'ah Maslikah, S.Pd.I";
            $skl = "SMPS Plus Al Amien";
          } else{
          }
      ?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  Verifikasi dan Validasi Data
                  <?php date_default_timezone_set('Asia/Jakarta'); ?>
                  <small class="float-right">Date: <?php echo date("d/m/Y H:i:s"); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Dari :
                <address>
                  <strong><?php echo $w_kelas; ?></strong><br>
                  Wali Kelas : <?php echo $kelas; ?><br>
                  Lembaga : <?php echo $skl;?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Kepada
                <address>
                  <strong>Kepala <?php if($lembaga=="ma"||$lembaga=="mts"){echo "Madrasah";}else{echo "Sekolah";}?></strong><br>
                  <?php
                   echo $ks; 
                   echo "<br>";
                   echo $skl; 
                  ?>
                </address>
              </div>
            </div>
            <!-- /.row -->
            <hr>
            <?php
              $table1       = "db_".$this->session->userdata('par');
              $jmldata      = $this->db->get_where($table1,array("status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();

            //datapribadisiswa
              $nis          = $this->db->get_where($table1,array("nis" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nisn         = $this->db->get_where($table1,array("nisn" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nama         = $this->db->get_where($table1,array("nama" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $jk           = $this->db->get_where($table1,array("jk" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $tmp_lahir    = $this->db->get_where($table1,array("tmp_lahir" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $tgl_lahir    = $this->db->get_where($table1,array("tgl_lahir" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nik          = $this->db->get_where($table1,array("nik" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $agama        = $this->db->get_where($table1,array("agama" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $alamat       = $this->db->get_where($table1,array("alamat" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $rt           = $this->db->get_where($table1,array("rt" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $rw           = $this->db->get_where($table1,array("rw" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $dusun        = $this->db->get_where($table1,array("dusun" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kelurahan    = $this->db->get_where($table1,array("kelurahan" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kecamatan    = $this->db->get_where($table1,array("kecamatan" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kabupaten    = $this->db->get_where($table1,array("kabupaten" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $propinsi     = $this->db->get_where($table1,array("propinsi" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $jns_tinggal  = $this->db->get_where($table1,array("jns_tinggal" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $alat_trans   = $this->db->get_where($table1,array("alat_trans  " => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $telp         = $this->db->get_where($table1,array("telp" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $email        = $this->db->get_where($table1,array("email" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $anak_ke      = $this->db->get_where($table1,array("anak_ke" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $jml_sdr      = $this->db->get_where($table1,array("jml_sdr" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $datapribadisiswa = ($nis+$nisn+$nama+$jk+$tmp_lahir+$tgl_lahir+$nik+$agama+$alamat+$rt+$rw+$dusun+$kelurahan+$kecamatan+$kabupaten+$propinsi+$jns_tinggal+$alat_trans+$telp+$anak_ke+$jml_sdr)/(21*$jmldata);

            //dataayah
              $nm_ayh      = $this->db->get_where($table1,array("nm_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $lahir_ayh      = $this->db->get_where($table1,array("lahir_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $pend_ayh      = $this->db->get_where($table1,array("pend_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kerja_ayh      = $this->db->get_where($table1,array("kerja_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $hasil_ayh      = $this->db->get_where($table1,array("hasil_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nik_ayh      = $this->db->get_where($table1,array("nik_ayh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $dataayah = ($nm_ayh+$lahir_ayh+$pend_ayh+$kerja_ayh+$hasil_ayh+$nik_ayh)/(6*$jmldata);

            //dataibu
              $nm_ibu      = $this->db->get_where($table1,array("nm_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $lahir_ibu      = $this->db->get_where($table1,array("lahir_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $pend_ibu      = $this->db->get_where($table1,array("pend_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kerja_ibu      = $this->db->get_where($table1,array("kerja_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $hasil_ibu      = $this->db->get_where($table1,array("hasil_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nik_ibu      = $this->db->get_where($table1,array("nik_ibu" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $dataibu = ($nm_ibu+$lahir_ibu+$pend_ibu+$kerja_ibu+$hasil_ibu+$nik_ibu)/(6*$jmldata);

            //datawali
              $nm_wl      = $this->db->get_where($table1,array("nm_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $lahir_wl      = $this->db->get_where($table1,array("lahir_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $pend_wl      = $this->db->get_where($table1,array("pend_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kerja_wl      = $this->db->get_where($table1,array("kerja_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $hasil_wl      = $this->db->get_where($table1,array("hasil_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $nik_wl      = $this->db->get_where($table1,array("nik_wl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $datawali = ($nm_wl+$lahir_wl+$pend_wl+$kerja_wl+$hasil_wl+$nik_wl)/(6*$jmldata);

            //kartu
              $no_kps      = $this->db->get_where($table1,array("no_kps" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $no_kip      = $this->db->get_where($table1,array("no_kip" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $no_kis      = $this->db->get_where($table1,array("no_kis" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $no_pkh      = $this->db->get_where($table1,array("no_pkh" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $beasiswa      = $this->db->get_where($table1,array("beasiswa" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kartu = ($no_kps+$no_kip+$no_kis+$no_pkh+$beasiswa)/(5*$jmldata);

            //Rombel
              $kelas_7      = $this->db->get_where($table1,array("kelas_7" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kelas_8      = $this->db->get_where($table1,array("kelas_8" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kelas_9      = $this->db->get_where($table1,array("kelas_9" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kelas_aktf   = $this->db->get_where($table1,array("kelas_aktf" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $kelas_dig    = $this->db->get_where($table1,array("kelas_dig" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $rombel = ($kelas_aktf+$kelas_dig)/(2*$jmldata);
              // $rombel = $kelas_aktf/$jmldata;

            //legalitas
              $no_un      = $this->db->get_where($table1,array("no_un" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $no_skhun      = $this->db->get_where($table1,array("no_skhun" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $no_ijazah      = $this->db->get_where($table1,array("no_ijazah" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $legalitas = ($no_un+$no_skhun+$no_ijazah)/(3*$jmldata);

            //registermasuk
              $skl_asal      = $this->db->get_where($table1,array("skl_asal" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $almt_skl      = $this->db->get_where($table1,array("almt_skl" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $jns_masuk      = $this->db->get_where($table1,array("jns_masuk" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $tgl_masuk      = $this->db->get_where($table1,array("no_un" => '',"status" => 'AKTIF',"kelas_aktf" =>$kelas))->num_rows();
              $registermasuk = ($skl_asal+$almt_skl+$jns_masuk+$tgl_masuk)/(3*$jmldata);
            ?>
            <!-- Table row -->
            <h5>Validasi Data Pokok</h5>
            <p>Jumlah Siswa : <?php echo $jmldata; ?></p>
            <div class="row">
              <div class="col-6 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th width="30px">No</th>
                    <th>Data</th>
                    <th width="150px">Prosentase (%)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Data Pribadi Siswa</td>
                    <td><?php echo (100-round($datapribadisiswa*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Data Ayah</td>
                    <td><?php echo (100-round($dataayah*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Data Ibu</td>
                    <td><?php echo (100-round($dataibu*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Data Wali</td>
                    <td><?php echo (100-round($datawali*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Kartu Kesejahteraan</td>
                    <td><?php echo (100-round($kartu*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Rombel</td>
                    <td><?php echo (150-round($rombel*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Legalitas</td>
                    <td><?php echo (100-round($legalitas*100,1))."%"; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Register Masuk</td>
                    <td><?php echo (100-round($registermasuk*100,1))."%"; ?></td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
              <div class="col-6 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th width="100px">Data</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <?php 
                    $no=0;
                    foreach($dbkls as $row):
                    $no++;
                  ?>
                  <tbody>
                    <tr>
                      <td>
                        <span class="badge badge-<?php if($row->validasi == 'Pengajuan'){echo 'info';}elseif($row->validasi == 'Revisi'){echo 'danger';}elseif($row->validasi == 'Proses'){echo 'warning';}else{echo 'success';} ?>">
                          <?php echo $row->validasi; ?><br><br>
                          <?php echo $row->lastupdate; ?>
                          <?php $valid = $row->validasi; ?>
                        </span>
                      </td>
                      <td>
                        <?php echo $row->keterangan; ?>
                      </td>
                    </tr>
                      <?php endforeach; ?>
                    <tr>
                      <td></td>
                      <td>
                        <form method="post" action="<?php echo base_url(); ?>walikelas/editkls" enctype="multipart/form-data">
                          <div class="form-group row">
                            <input type="hidden" id="id" name="id" value="<?php echo $row->id;?>">
                            <input type="hidden" class="form-control" name="validasi" id="validasi" value="Pengajuan" required>
                            <input type="hidden" class="form-control" name="keterangan" id="keterangan" value="pengajuan revisi" required>
                          </div>
                          <button <?php if($valid !==""&&$valid !=="Revisi"){echo 'hidden';} ?> type="submit" class="btn btn-warning">Ajukan Validasi</button>
                        </form>
                          <p <?php if($valid !=="Pengajuan"&&$valid !=="Proses"){echo 'hidden';} ?> class="text-danger" >Sedang dalam proses.. mohon tunggu..</p>
                          <a <?php if($valid!=="Finis"){echo 'hidden';} ?> href="<?php echo base_url($role) ?>/frame/cekdata-print/<?php echo $lembaga.'/'.$kelas ?>" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Bukti</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Pernyataan:</p>

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Data telah dilakukan cek dengan benar dan telah sesuai dengan berkas legalitas yang berlaku.
                </p>
              </div>
              <!-- /.col -->
              <div class="col-3">
                <div class="table-responsive">
                   Wali Kelas <br><br><br><br> <?php echo $w_kelas; ?>
                </div>
              </div>
              <div class="col-3">
                <div class="table-responsive">
                   Kepala <?php if($lembaga=="ma"||$lembaga=="mts"){echo "Madrasah";}else{echo "Sekolah";}?>
                      <br><br><br><br> 
                   <?php echo $ks; ?>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                  
                  
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_table');
$this->load->view('theme/flink_modal');
?>
</body>
</html>