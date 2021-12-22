<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$role = $this->session->userdata('jabatan');
$this->load->view($role.'/side');
?>
<!-- =============================================================================================== -->

       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Formulir Tambah PD Baru</h3>
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
      ?>
        <!-- form start -->
        <form method="post" action="<?php echo base_url($role); ?>/savemts" enctype="multipart/form-data">
            <!-- Horizontal Form -->

              <!-- DATA SISWA -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">DATA SISWA</h3>
            </div>
            <div class="row">
              <div class="col-md-6">                
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Nis" class="col-sm-4 col-form-label">NIS</label>
                    <div class="col-sm-8">
                      <input type="text" name="nis" class="form-control" id="Nis" placeholder="NIS">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nisn" class="col-sm-4 col-form-label">NISN</label>
                    <div class="col-sm-8">
                      <input type="text" name="nisn" class="form-control" id="Nisn" placeholder="NISN" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama" class="form-control" id="Nama Lengkap" placeholder="Nama Lengkap" required>
                    </div>
                  </div>
                  <!-- OPTION -->
                  <div class="form-group row">
                    <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                    <select type="text" name="jk" id="Jenis Kelamin"  class="form-control select2" required>
                      <option value="" disabled selected hidden> Pilih salah satu</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Tempat Lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                    <div class="col-sm-8">
                      <input type="text" name="tmp_lahir" class="form-control" id="Tempat Lahir" placeholder="Nama Lengkap" required>
                    </div>
                  </div>
                  <!-- TANGGAL -->
                  <div class="form-group row">
                    <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date"name="tgl_lahir"  class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="NIK" class="col-sm-4 col-form-label">NIK</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik" class="form-control" id="NIK" placeholder="NIK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Agama" class="col-sm-4 col-form-label">AGAMA</label>
                    <div class="col-sm-8">
                    <select type="text" name="agama" id="Agama"  class="form-control select2" required>
                      <option value="" disabled selected hidden> Pilih salah satu</option>
                      <option>Islam</option>
                      <option>kristen</option>
                      <option>Katholik</option>
                      <option>Hindu</option>
                      <option>Budha</option>
                      <option>Khonghucu</option>
                      <option>Kepercayaan Kepada Tuhan YME</option>
                      <option>Lainnya</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                    <div class="col-sm-8">
                      <input type="text" name="alamat" class="form-control" id="Alamat" placeholder="Alamat" required>
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
                </div>
              </div>                        
              <div class="col-md-6">                
                <div class="card-body">                        
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
                    <select type="text" name="jns_tinggal" id="Jenis Tinggal"  class="form-control select2">
                      <option value="" hidden> Pilih salah satu</option>
                      <option>Dusun</option>
                      <option>Salaf Putri</option>
                      <option>Salaf Putra</option>
                      <option>Rusunnawa</option>
                      <option>Ashri</option>
                      <option>AGA PUTRA</option>
                      <option>AGA PUTRI</option>
                      <option>Tahfid</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                    <div class="col-sm-8">
                      <input type="text" name="alat_trans" class="form-control" id="Transportasi" placeholder="Transportasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Rt" class="col-sm-4 col-form-label">No Telp/ HP</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" name="telp" placeholder="082 000 000 000" data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control" id="Email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                    <div class="col-sm-2">
                      <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="Anak ke">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="Jumlah Saudara">
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">  
              <!-- DATA AYAH -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">DATA AYAH</h3>
                </div>
                <div class="card-body">              
                  <div class="form-group row">
                    <label for="Nama Ayah" class="col-sm-4 col-form-label">NAMA AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Sesuai KK" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nik Ayah" class="col-sm-4 col-form-label">NIK AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="Sesuai KK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Lahir Ayah" class="col-sm-4 col-form-label">TAHUN LAHIR AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_ayh" class="form-control" id="Lahir Ayah" placeholder="Sesuai KK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_ayh" id="pend_ayh" class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak Sekolah</option>
                        <option>Putus SD</option>
                        <option>SD Sederajad</option>
                        <option>SMP Sederajad</option>
                        <option>SMA Sederajad</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4/S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kerja Ayah" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_ayh" id="kerja_ayh"  class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak bekerja</option>
                        <option>Nelayan</option>
                        <option>Petani</option>
                        <option>Peternak</option>
                        <option>PNS/TNI/POLRI</option>
                        <option>Karyawan Swasta</option>
                        <option>Pedagang Kecil</option>
                        <option>Pedagang Besar</option>
                        <option>Wiraswasta</option>
                        <option>Wirausaha</option>
                        <option>Buruh</option>
                        <option>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Hasil Ayah" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_ayh" class="form-control" id="Hasil Ayah" placeholder="Rp. 000.000">
                    </div>
                  </div>
                </div>
              </div>   
            </div>
            <div class="col-md-6">  
              <!-- DATA IBU -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">DATA IBU</h3>
                </div>
                <div class="card-body">                  
                  <div class="form-group row">
                    <label for="Nama Ibu" class="col-sm-4 col-form-label">NAMA IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_ibu" class="form-control" id="Nama Ibu" placeholder="Sesuai KK" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nik Ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_ibu" class="form-control" id="Nik Ibu" placeholder="Sesuai KK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Lahir Ibu" class="col-sm-4 col-form-label">TAHUN LAHIR IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_ibu" class="form-control" id="Lahir Ibu" placeholder="Sesuai KK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_ibu" id="Pend_Ibu"  class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak Sekolah</option>
                        <option>Putus SD</option>
                        <option>SD Sederajad</option>
                        <option>SMP Sederajad</option>
                        <option>SMA Sederajad</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4/S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kerja Ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_ibu" id="Kerja Ibu"  class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak bekerja</option>
                        <option>Nelayan</option>
                        <option>Petani</option>
                        <option>Peternak</option>
                        <option>PNS/TNI/POLRI</option>
                        <option>Karyawan Swasta</option>
                        <option>Pedagang Kecil</option>
                        <option>Pedagang Besar</option>
                        <option>Wiraswasta</option>
                        <option>Wirausaha</option>
                        <option>Buruh</option>
                        <option>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Hasil Ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_ibu" class="form-control" id="Hasil Ibu" placeholder="Rp. 000.000">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    

          <div class="row">
            <div class="col-md-6">  
              <!-- DATA WALI -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">DATA WALI</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Nama Wl" class="col-sm-4 col-form-label">NAMA WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="nm_wl" class="form-control" id="Nama Wl" placeholder="Sesuai KTP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Nik Wl" class="col-sm-4 col-form-label">NIK WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="nik_wl" class="form-control" id="Nik Wl" placeholder="Sesuai KTP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Lahir Wl" class="col-sm-4 col-form-label">TAHUN LAHIR WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="lahir_wl" class="form-control" id="Lahir Wl" placeholder="Sesuai KTP">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Pend_Wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                    <div class="col-sm-8">
                      <select type="text" name="pend_wl" id="Pend_Wl"  class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak Sekolah</option>
                        <option>Putus SD</option>
                        <option>SD Sederajad</option>
                        <option>SMP Sederajad</option>
                        <option>SMA Sederajad</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4/S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kerja Wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                    <div class="col-sm-8">
                      <select type="text" name="kerja_wl" id="Kerja Wl"  class="form-control select2">
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Tidak bekerja</option>
                        <option>Nelayan</option>
                        <option>Petani</option>
                        <option>Peternak</option>
                        <option>PNS/TNI/POLRI</option>
                        <option>Karyawan Swasta</option>
                        <option>Pedagang Kecil</option>
                        <option>Pedagang Besar</option>
                        <option>Wiraswasta</option>
                        <option>Wirausaha</option>
                        <option>Buruh</option>
                        <option>Pensiunan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Hasil Wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                    <div class="col-sm-8">
                      <input type="text" name="hasil_wl" class="form-control" id="Hasil Wl" placeholder="Rp. 000.000">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-md-6"> 
              <!-- KARTU KESEJAHTERAAN -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">KARTU KESEJAHTERAAN</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="No KPS" class="col-sm-4 col-form-label">NO KPS</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kps" class="form-control" id="No KPS" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="No KIP" class="col-sm-4 col-form-label">NO KIP</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kip" class="form-control" id="No KIP" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="No KIS" class="col-sm-4 col-form-label">NO KIS</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_kis" class="form-control" id="No KIS" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="No PKH" class="col-sm-4 col-form-label">NO PKH</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_pkh" class="form-control" id="No PKH" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                    <div class="col-sm-8">
                      <input type="text" name="beasiswa" class="form-control" id="Beasiswa" placeholder="Sesuai Kartu">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <!-- ROMBEL -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">ROMBEL</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="kelas_7" class="col-sm-4 col-form-label">KELAS 7</label>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_7" class="form-control" id="kelas_7" placeholder=" - ">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_8" class="form-control" id="kelas_8" placeholder=" - ">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" name="kelas_9" class="form-control" id="kelas_9" placeholder=" - ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas_aktf" class="col-sm-4 col-form-label">KELAS AKTIF</label>
                    <div class="col-sm-8">
                      <select type="text" name="kelas_aktf" id="kelas_aktf"  class="form-control select2">
                         <?php foreach($cats as $cat) : ?>
                          <option value="<?php echo $cat->kelas;?>"> <?php echo $cat->kelas; ?></option>
                         <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas_dig" class="col-sm-4 col-form-label">KELAS DIGITAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="kelas_dig" class="form-control" id="kelas_dig" placeholder=" - ">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">STATUS</label>
                    <div class="col-sm-8">
                      <select type="text" name="status" id="status" onChange="opsi(this)" class="form-control select2" required>
                        <option value="" disabled selected hidden> Pilih salah satu..</option>
                        <option>AKTIF</option>
                        <option>NON AKTIF</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div> 
            </div> 
            <div class="col-md-6">               
              <!-- LEGALITAS -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">LEGALITAS</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="No UN sebelumnya" class="col-sm-4 col-form-label">NO UN SD/MI</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_un" class="form-control" placeholder="x-xx-xx-xx-xxx-xxxx-x" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="SKHUN" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_skhun" class="form-control" id="SKHUN" placeholder="DN-XX DI XXXXXXX">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="IJAZAH" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_ijazah" class="form-control" id="IJAZAH" placeholder="DN-XX DI XXXXXXX">
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <!-- REGISTER MASUK -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">REGISTER MASUK</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="skl_asal" class="form-control" id="skl_asal" placeholder="Sesuai Ijazah" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="almt_skl" class="col-sm-4 col-form-label">ALAMAT SEKOLAH ASAL</label>
                    <div class="col-sm-8">
                      <input type="text" name="almt_skl" class="form-control" id="almt_skl" placeholder="Sesuai Ijazah" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jns_masuk" class="col-sm-4 col-form-label">JENIS PENDAFTARAN</label>
                    <div class="col-sm-8">
                      <select type="text" name="jns_masuk" id="jns_masuk"  class="form-control select2" required>
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Siswa Baru</option>
                        <option>Pindahan</option>
                        <option>Kembali Bersekolah</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_masuk" class="col-sm-4 col-form-label">TANGGAL MASUK</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="tgl_masuk" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div> 
            <div class="col-md-6"> 
              <!-- REGISTER KELUAR -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">REGISTER KELUAR</h3>
                </div>
                <div class="card-body" >
                  <div class="form-group row">
                    <label for="ket_out" class="col-sm-4 col-form-label">KETERANGAN KELUAR</label>
                    <div class="col-sm-8">
                      <select type="text" name="ket_out" id="ket_out"  class="form-control select2" disabled>
                        <option value="" hidden> Pilih salah satu..</option>
                        <option>Lulus</option>
                        <option>Dikeluarkan</option>
                        <option>Mengundurkan Diri</option>
                        <option>Putus Sekolah</option>
                        <option>Wafat</option>
                        <option>Hilang</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_out" class="col-sm-4 col-form-label">TANGGAL KELUAR</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" name="tgl_out" id="tgl_out" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alasan_out" class="col-sm-4 col-form-label">ALASAN KELUAR</label>
                    <div class="col-sm-8">
                      <input type="text" name="alasan_out" class="form-control" id="alasan_out" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nosrt_out" class="col-sm-4 col-form-label">NO SURAT</label>
                    <div class="col-sm-8">
                      <input type="text" name="nosrt_out" class="form-control" id="nosrt_out" disabled>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">  
              <!-- UPLOAD FOTO -->
              <div class="card card-info">
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
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>             
              </div>
            </div> 
            <div class="col-md-6"> 
              <!-- PROSES -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">PROSES</h3>
                </div>
                <div class="card-body">
                  <div class="form-check">
                    <input type="checkbox" name="terms" class="form-check-input" id="exampleCheck2" required>
                    <label class="form-check-label" for="exampleCheck2">Dengan ini saya telah entry data sesuai dengan ketentuan berkas yang berlaku, dan telah kami validasi kebenaran data tersebut. dan saya bertanggung jawab atas kebenaran data tersebut</label>
                  </div>
                 </div>             
                <!-- /.card-body -->
                <div class="card-footer"><br>
                  <button type="submit" class="btn btn-primary">Daftar</button>
                  
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