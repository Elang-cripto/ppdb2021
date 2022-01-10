<?php
$cekuri = $this->uri->segment(3);
if ($cekuri == "mts") {
  $warna = "info";
  $tbl_skl = "db_sdmi";
} elseif ($cekuri == "ma") {
  $warna = "success";
  $tbl_skl = "db_smpmts";
} elseif ($cekuri == "smp") {
  $warna = "warning";
  $tbl_skl = "db_sdmi";
} else {
  $warna = "danger";
  $tbl_skl = "db_smpmts";
}
?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Formulir Peserta Didik Baru</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url($this->session->userdata('jabatan')); ?>/data/<?php echo $cekuri; ?>">Data_<?php echo $cekuri; ?></a></li>
            <li class="breadcrumb-item active">Formulir</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- form start -->
      <form id="add_pes" method="post" action="<?php echo base_url($this->session->userdata('jabatan')); ?>/save_pan/<?php echo $cekuri;?>" enctype="multipart/form-data">
        <!-- Horizontal Form -->

        <!-- DATA SISWA -->
        <div class="card card-<?php echo $warna; ?>">
          <div class="card-header">
            <h3 class="card-title">DATA SISWA</h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card-body">
                <div class="form-group row">
                  <label for="Nisn" class="col-sm-4 col-form-label">NISN</label>
                  <div class="col-sm-8">
                    <input type="text" name="nisn" class="form-control" id="Nisn" placeholder="nisn.data.kemdikbud.go.id" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Sesuai Ijazah" required>
                  </div>
                </div>
                <!-- OPTION -->
                <div class="form-group row">
                  <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                  <div class="col-sm-8">
                    <select type="text" name="jk" id="Jenis Kelamin" class="form-control select2" required>
                    <option value="">-- Pilih --</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                  <div class="col-sm-8">
                    <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" placeholder="Sesuai Ijazah" required>
                  </div>
                </div>
                <!-- TANGGAL -->
                <div class="form-group row">
                  <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input type="date" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                  <div class="col-sm-8">
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="Kartu Keluarga" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama" class="col-sm-4 col-form-label">AGAMA</label>
                  <div class="col-sm-8">
                    <select type="text" name="agama" id="agama" class="form-control select2">
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katholik">Katholik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Kepercayaan Kepada Tuhan YME">Kepercayaan Kepada Tuhan YME</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Sesuai KK">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Rt" class="col-sm-4 col-form-label">RT / RW</label>
                  <div class="col-sm-4">
                    <input type="text" name="rt" class="form-control" id="Rt" placeholder="000">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="rw" class="form-control" id="Rw" placeholder="000">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Dusun" class="col-sm-4 col-form-label">DUSUN</label>
                  <div class="col-sm-8">
                    <input type="text" name="dusun" class="form-control" id="Dusun" placeholder="Dusun" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN</label>
                  <div class="col-sm-8">
                    <input type="text" name="kelurahan" class="form-control" id="Kelurahan" placeholder="Kelurahan" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <div class="form-group row">
                  <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN</label>
                  <div class="col-sm-8">
                    <input type="text" name="kecamatan" class="form-control" id="Kecamatan" placeholder="Kecamatan" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN</label>
                  <div class="col-sm-8">
                    <input type="text" name="kabupaten" class="form-control" id="Kabupaten" placeholder="Kabupaten" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Propinsi" class="col-sm-4 col-form-label">PROPINSI</label>
                  <div class="col-sm-8">
                    <input type="text" name="propinsi" class="form-control" id="Propinsi" placeholder="Propinsi" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Jenis Tinggal" class="col-sm-4 col-form-label">JENIS TINGGAL</label>
                  <div class="col-sm-8">
                    <select type="text" name="jns_tinggal" id="Jenis Tinggal" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Dusun">Dusun</option>
                      <option value="Salaf Putri">Salaf Putri</option>
                      <option value="Salaf Putra">Salaf Putra</option>
                      <option value="Rusunnawa">Rusunnawa</option>
                      <option value="Ashri">Ashri</option>
                      <option value="AGA PUTRA">AGA PUTRA</option>
                      <option value="AGA PUTRI">AGA PUTRI</option>
                      <option value="Tahfid">Tahfid</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Status Tinggal" class="col-sm-4 col-form-label">STATUS TEMPAT TINGGAL</label>
                  <div class="col-sm-8">
                    <select type="text" name="sts_tinggal" id="Status Tinggal" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Milik Sendiri">Milik Sendiri</option>
                      <option value="Rumah Orang Tua">Rumah Orang Tua</option>
                      <option value="Rumah Saudara/Kerabat">Rumah Saudara/Kerabat</option>
                      <option value="Rumah Dinas">Rumah Dinas</option>
                      <option value="Sewa/kontrak">Sewa/kontrak</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                  <div class="col-sm-8">
                    <select type="text" name="alat_trans" id="alat_trans" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Jalan kaki">Jalan kaki</option>
                      <option value="Angkutan umum/bus/pete-pete">Angkutan umum/bus/pete-pete</option>
                      <option value="Mobil/bus antar jemput">Mobil/bus antar jemput</option>
                      <option value="Kereta api">Kereta api</option>
                      <option value="Ojek">Ojek</option>
                      <option value="Andong/bendi/sado/dokar/delman/becak">Andong/bendi/sado/dokar/delman/becak</option>
                      <option value="Perahu penyeberangan/rakit/getek">Perahu penyeberangan/rakit/getek</option>
                      <option value="Kuda">Kuda</option>
                      <option value="Sepeda">Sepeda</option>
                      <option value="Sepeda motor">Sepeda motor</option>
                      <option value="Mobil pribadi">Mobil pribadi</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Rt" class="col-sm-4 col-form-label">NO TELP/HP</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" name="telp" data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask required>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="Email" placeholder="Kartu Keluarga" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                  <div class="col-sm-4">
                    <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="00">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="00">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_kk" class="col-sm-4 col-form-label">NO KK</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_kk" class="form-control" id="no_kk" placeholder="Sesuai Kartu keluarga" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- DATA AYAH -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">DATA AYAH</h3>
              </div>
              <div class="card-body">

                <div class="form-group row">
                  <label for="nm_ayh" class="col-sm-4 col-form-label">NAMA AYAH</label>
                  <div class="col-sm-8">
                    <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Nama Ayah" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_ayh" class="col-sm-4 col-form-label">NIK AYAH</label>
                  <div class="col-sm-8">
                    <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="NIK Ayah">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tlahir_ayh" class="col-sm-4 col-form-label">TEMPAT LAHIR AYAH</label>
                  <div class="col-sm-8">
                    <input type="text" name="tlahir_ayh" class="form-control" id="tlahir_ayh" placeholder="Kota Lahir">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lahir_ayh" class="col-sm-4 col-form-label">TANGGAL LAHIR AYAH</label>
                  <div class="col-sm-8">
                    <input type="date" name="lahir_ayh" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                  <div class="col-sm-8">
                    <select type="text" name="pend_ayh" id="pend_ayh" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="Putus SD">Putus SD</option>
                      <option value="SD Sederajad">SD Sederajad</option>
                      <option value="SMP Sederajad">SMP Sederajad</option>
                      <option value="SMA Sederajad">SMA Sederajad</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="D4/S1">D4/S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                  <div class="col-sm-8">
                    <select type="text" name="kerja_ayh" id="kerja_ayh" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak bekerja">Tidak bekerja</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Petani">Petani</option>
                      <option value="Peternak">Peternak</option>
                      <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                      <option value="Karyawan Swasta">Karyawan Swasta</option>
                      <option value="Pedagang Kecil">Pedagang Kecil</option>
                      <option value="Pedagang Besar">Pedagang Besar</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Buruh">Buruh</option>
                      <option value="Pensiunan">Pensiunan</option>
                      <option value="Guru">Guru</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                  <div class="col-sm-8">
                    <select type="text" name="hasil_ayh" id="hasil_ayh" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                      <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                      <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                      <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                      <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                      <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                      <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <!-- DATA IBU -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">DATA IBU</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="nm_ibu" class="col-sm-4 col-form-label">NAMA IBU</label>
                  <div class="col-sm-8">
                    <input type="text" name="nm_ibu" class="form-control" id="nm_ibu" placeholder="Nama Ibu" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                  <div class="col-sm-8">
                    <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="NIK Ibu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tlahir_ibu" class="col-sm-4 col-form-label">TEMPAT LAHIR IBU</label>
                  <div class="col-sm-8">
                    <input type="text" name="tlahir_ibu" class="form-control" id="tlahir_ibu" placeholder="Kota Lahir">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lahir_ibu" class="col-sm-4 col-form-label">TANGGAL LAHIR IBU</label>
                  <div class="col-sm-8">
                    <input type="date" name="lahir_ibu" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                  <div class="col-sm-8">
                    <select type="text" name="pend_ibu" id="pend_ibu" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="Putus SD">Putus SD</option>
                      <option value="SD Sederajad">SD Sederajad</option>
                      <option value="SMP Sederajad">SMP Sederajad</option>
                      <option value="SMA Sederajad">SMA Sederajad</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="D4/S1">D4/S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                  <div class="col-sm-8">
                    <select type="text" name="kerja_ibu" id="kerja_ibu" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak bekerja">Tidak bekerja</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Petani">Petani</option>
                      <option value="Peternak">Peternak</option>
                      <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                      <option value="Karyawan Swasta">Karyawan Swasta</option>
                      <option value="Pedagang Kecil">Pedagang Kecil</option>
                      <option value="Pedagang Besar">Pedagang Besar</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Buruh">Buruh</option>
                      <option value="Pensiunan">Pensiunan</option>
                      <option value="Guru">Guru</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                  <div class="col-sm-8">
                    <select type="text" name="hasil_ibu" id="hasil_ibu" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                      <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                      <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                      <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                      <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                      <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                      <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- DATA WALI -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">DATA WALI</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="nm_wl" class="col-sm-4 col-form-label">NAMA WALI</label>
                  <div class="col-sm-8">
                    <input type="text" name="nm_wl" class="form-control" id="nm_wl" placeholder="Nama Wali">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_wl" class="col-sm-4 col-form-label">NIK WALI</label>
                  <div class="col-sm-8">
                    <input type="text" name="nik_wl" class="form-control" id="nik_wl" placeholder="NIK Wali">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tlahir_wl" class="col-sm-4 col-form-label">TEMPAT LAHIR WALI</label>
                  <div class="col-sm-8">
                    <input type="text" name="tlahir_wl" class="form-control" id="tlahir_wl" placeholder="Kota Lahir">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lahir_wl" class="col-sm-4 col-form-label">TANGGAL LAHIR WALI</label>
                  <div class="col-sm-8">
                    <input type="date" name="lahir_wl" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pend_wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                  <div class="col-sm-8">
                    <select type="text" name="pend_wl" id="pend_wl" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="Putus SD">Putus SD</option>
                      <option value="SD Sederajad">SD Sederajad</option>
                      <option value="SMP Sederajad">SMP Sederajad</option>
                      <option value="SMA Sederajad">SMA Sederajad</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="D4/S1">D4/S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kerja_wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                  <div class="col-sm-8">
                    <select type="text" name="kerja_wl" id="kerja_wl" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Tidak bekerja">Tidak bekerja</option>
                      <option value="Nelayan">Nelayan</option>
                      <option value="Petani">Petani</option>
                      <option value="Peternak">Peternak</option>
                      <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                      <option value="Karyawan Swasta">Karyawan Swasta</option>
                      <option value="Pedagang Kecil">Pedagang Kecil</option>
                      <option value="Pedagang Besar">Pedagang Besar</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Buruh">Buruh</option>
                      <option value="Pensiunan">Pensiunan</option>
                      <option value="Guru">Guru</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="hasil_wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                  <div class="col-sm-8">
                    <select type="text" name="hasil_wl" id="hasil_wl" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                      <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                      <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                      <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                      <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000</option>
                      <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                      <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <!-- KARTU KESEJAHTERAAN -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">KARTU KESEJAHTERAAN</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="no_kps" class="col-sm-4 col-form-label">NO KPS</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_kps" class="form-control" id="no_kps" placeholder="Sesuai Kartu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_kip" class="col-sm-4 col-form-label">NO KIP</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_kip" class="form-control" id="no_kip" placeholder="Sesuai Kartu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_kis" class="col-sm-4 col-form-label">NO KIS</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_kis" class="form-control" id="no_kis" placeholder="Sesuai Kartu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_pkh" class="col-sm-4 col-form-label">NO PKH</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_pkh" class="form-control" id="no_pkh" placeholder="Sesuai Kartu">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                  <div class="col-sm-8">
                    <input type="text" name="beasiswa" class="form-control" id="beasiswa" placeholder="Contoh : Atlit Nasional">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- LEGALITAS -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">LEGALITAS</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="no_un" class="col-sm-4 col-form-label">NO UN SD/MI</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_un" class="form-control" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_skhun" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_skhun" class="form-control" id="no_skhun" placeholder="DN-XX DI XXXXXXX">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_ijazah" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                  <div class="col-sm-8">
                    <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" placeholder="DN-XX DI XXXXXXX">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <!-- REGISTER MASUK -->
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">REGISTER MASUK</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL</label>
                  <div class="col-sm-8">
                    <select name="skl_asal" id="skl_asal" class="form-control" onchange="tampilkan()">
                      <option value="">-- Pilih --</option>
                      <?php
                        $sklh = $this->m_ppdb->pil_skl($tbl_skl);
                        foreach($sklh->result() as $pilih):
                      ?>
                      <option value="<?php echo $pilih->lembaga;?>"><?php echo $pilih->lembaga;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="almt_skl" class="col-sm-4 col-form-label">ALAMAT SEKOLAH ASAL</label>
                  <div class="col-sm-8">
                    <input type="text" name="almt_skl" class="form-control" id="almt_skl" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jalur" class="col-sm-4 col-form-label">JALUR PENDAFTARAN</label>
                  <div class="col-sm-8">
                    <select type="text" name="agama" id="agama" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="INDEN">INDEN</option>
                      <option value="PRESTASI">PRESTASI</option>
                      <option value="REGULER">REGULER</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ket" class="col-sm-4 col-form-label">KETERANGAN</label>
                  <div class="col-sm-8">
                    <select type="text" name="ket" id="ket" class="form-control select2">
                      <option value="">-- Pilih --</option>
                      <option value="Sains">Sains</option>
                      <option value="Tahfidz">Tahfidz</option>
                      <option value="Agama">Agama</option>
                      <option value="Bahasa">Bahasa</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- UPLOAD FOTO -->
            <div class="card card-<?php echo $warna; ?>">
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
            <div class="card card-<?php echo $warna; ?>">
              <div class="card-header">
                <h3 class="card-title">PROSES</h3>
              </div>
              <div class="card-body">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="terms" required>
                  <label class="form-check-label" for="exampleCheck2">
                    Saya telah entry data sesuai dengan ketentuan berkas yang berlaku, telah kami validasi kebenaran dan saya bertanggung jawab atas kebenaran data tersebut
                    <br>
                    <b>Data setelah dikirim tidak dapat di edit kembali tanpa seijin admin.
                  </label>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Kirim Formulir</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<script>
  function tampilkan(){
  
    var skl_asal=document.getElementById("add_pes").skl_asal.value;
    var almat_skl=document.getElementById("almt_skl");
  
    if (skl_asal=="SDN Sumberejo 01")
      {
        almat_skl.innerHTML="Jakarta Ibu kota Republik Indonesia";
      }
    else if (nama_kota=="bandung")
      {
          p_kontainer.innerHTML="Bandung kota kembang";
      }
    else if (nama_kota=="bogor")
      {
          p_kontainer.innerHTML="Bogor kota hujan";
      }
  }
</script>