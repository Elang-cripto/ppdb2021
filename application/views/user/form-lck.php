<?php
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hd_alert');
$this->load->view('theme/nav');
$role = $this->session->userdata('jabatan');
$this->load->view($role . '/side');
?>
<!-- =============================================================================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Formulir Peserta Didik Baru</h3>
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
      if (validation_errors() != false) {
      ?>
        <div class="alert alert-danger" role="alert">
          <?php echo validation_errors(); ?>
        </div>
      <?php
      }

      if ($this->uri->segment(3) == "MTS") {
        $warna = "info";
      } elseif ($this->uri->segment(3) == "MA") {
        $warna = "success";
      } elseif ($this->uri->segment(3) == "SMP") {
        $warna = "warning";
      } else {
        $warna = "danger";
      }
      ?>

      <!-- form start -->
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
                  <input type="text" name="nisn" class="form-control" id="Nisn" placeholder="0000000000" value="<?php echo $data->nisn; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Sesuai Ijazah" value="<?php echo $data->nama; ?>" disabled>
                </div>
              </div>
              <!-- OPTION -->
              <div class="form-group row">
                <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                <div class="col-sm-8">
                  <select type="text" name="jk" id="Jenis Kelamin" class="form-control select2" disabled>
                    <option value="L" <?php if ($data->jk == "L") {
                                        echo "selected";
                                      } ?>>Laki-laki</option>
                    <option value="P" <?php if ($data->jk == "P") {
                                        echo "selected";
                                      } ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                <div class="col-sm-8">
                  <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" value="<?php echo $data->tmp_lahir; ?>" disabled>
                </div>
              </div>
              <!-- TANGGAL -->
              <div class="form-group row">
                <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data->tgl_lahir; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                <div class="col-sm-8">
                  <input type="text" name="nik" class="form-control" id="nik" placeholder="35xxxxxxxxxxxxxx" value="<?php echo $data->nik; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama" class="col-sm-4 col-form-label">AGAMA</label>
                <div class="col-sm-8">
                  <input type="text" name="agama" class="form-control" id="agama" value="<?php echo $data->agama; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                <div class="col-sm-8">
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Jl. kebaikan" value="<?php echo $data->alamat; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Rt" class="col-sm-4 col-form-label">RT / RW</label>
                <div class="col-sm-4">
                  <input type="text" name="rt" class="form-control" id="Rt" placeholder="000" value="<?php echo $data->rt; ?>" disabled>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="rw" class="form-control" id="Rw" placeholder="000" value="<?php echo $data->rw; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Dusun" class="col-sm-4 col-form-label">DUSUN</label>
                <div class="col-sm-8">
                  <input type="text" name="dusun" class="form-control" id="Dusun" placeholder="Dusun" value="<?php echo $data->dusun; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN</label>
                <div class="col-sm-8">
                  <input type="text" name="kelurahan" class="form-control" id="Kelurahan" placeholder="Kelurahan" value="<?php echo $data->kelurahan; ?>" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <div class="form-group row">
                <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN</label>
                <div class="col-sm-8">
                  <input type="text" name="kecamatan" class="form-control" id="Kecamatan" placeholder="Kecamatan" value="<?php echo $data->kecamatan; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN</label>
                <div class="col-sm-8">
                  <input type="text" name="kabupaten" class="form-control" id="Kabupaten" placeholder="Kabupaten" value="<?php echo $data->kabupaten; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Propinsi" class="col-sm-4 col-form-label">PROPINSI</label>
                <div class="col-sm-8">
                  <input type="text" name="propinsi" class="form-control" id="Propinsi" placeholder="Propinsi" value="<?php echo $data->propinsi; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Jenis Tinggal" class="col-sm-4 col-form-label">JENIS TINGGAL</label>
                <div class="col-sm-8">
                  <input type="text" name="jns_tinggal" class="form-control" id="jns_tinggal" placeholder="Tempat Tinggal Saat Ini" value="<?php echo $data->jns_tinggal; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Status Tinggal" class="col-sm-4 col-form-label">STATUS TEMPAT TINGGAL</label>
                <div class="col-sm-8">
                  <input type="text" name="sts_tinggal" class="form-control" id="sts_tinggal" placeholder="Tempat Tinggal Saat Ini" value="<?php echo $data->sts_tinggal; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                <div class="col-sm-8">
                  <input type="text" name="alat_trans" class="form-control" id="Transportasi" placeholder="Transportasi" value="<?php echo $data->alat_trans; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Rt" class="col-sm-4 col-form-label">NO TELP/HP</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="telp" value="<?php echo $data->telp; ?>" data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask disabled>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                <div class="col-sm-8">
                  <input type="email" name="email" class="form-control" id="Email" placeholder="elang@gmail.com" value="<?php echo $data->email; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                <div class="col-sm-4">
                  <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="00" value="<?php echo $data->anak_ke; ?>" disabled>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="00" value="<?php echo $data->jml_sdr; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_kk" class="col-sm-4 col-form-label">NO KK</label>
                <div class="col-sm-8">
                  <input type="text" name="no_kk" class="form-control" id="no_kk" value="<?php echo $data->no_kk; ?>" placeholder="Sesuai Kartu" disabled>
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
                  <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Nama Ayah" value="<?php echo $data->nm_ayh; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_ayh" class="col-sm-4 col-form-label">NIK AYAH</label>
                <div class="col-sm-8">
                  <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="NIK Ayah" value="<?php echo $data->nik_ayh; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="tlahir_ayh" class="col-sm-4 col-form-label">TEMPAT LAHIR AYAH</label>
                <div class="col-sm-8">
                  <input type="text" name="tlahir_ayh" class="form-control" id="tlahir_ayh" placeholder="Kota Lahir" value="<?php echo $data->tlahir_ayh; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="lahir_ayh" class="col-sm-4 col-form-label">TANGGAL LAHIR AYAH</label>
                <div class="col-sm-8">
                  <input type="date" name="lahir_ayh" class="form-control" value="<?php echo $data->lahir_ayh; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                <div class="col-sm-8">
                  <input type="text" name="pend_ayh" class="form-control" id="pend_ayh" placeholder="Pendidikan Ayah" value="<?php echo $data->pend_ayh; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                <div class="col-sm-8">
                  <input type="text" name="kerja_ayh" class="form-control" id="kerja_ayh" placeholder="Kerja Ayah" value="<?php echo $data->kerja_ayh; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                <div class="col-sm-8">
                  <input type="text" name="hasil_ayh" class="form-control" id="hasil_ayh" placeholder="Rp. 000.000" value="<?php echo $data->hasil_ayh; ?>" disabled>
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
                  <input type="text" name="nm_ibu" class="form-control" id="nm_ibu" placeholder="Nama Ibu" value="<?php echo $data->nm_ibu; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                <div class="col-sm-8">
                  <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="NIK Ibu" value="<?php echo $data->nik_ibu; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="tlahir_ibu" class="col-sm-4 col-form-label">TEMPAT LAHIR IBU</label>
                <div class="col-sm-8">
                  <input type="text" name="tlahir_ibu" class="form-control" id="tlahir_ibu" placeholder="Kota Lahir" value="<?php echo $data->tlahir_ibu; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="lahir_ibu" class="col-sm-4 col-form-label">TANGGAL LAHIR IBU</label>
                <div class="col-sm-8">
                  <input type="date" name="lahir_ibu" class="form-control" value="<?php echo $data->lahir_ibu; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                <div class="col-sm-8">
                  <select type="text" name="pend_ibu" id="pend_ibu" class="form-control select2" disabled>
                    <option value="" <?php if ($data->pend_ibu == "") {
                                        echo "selected";
                                      } ?>>Tidak Diketahui</option>
                    <option value="Tidak Sekolah" <?php if ($data->pend_ibu == "Tidak Sekolah") {
                                                    echo "selected";
                                                  } ?>>Tidak Sekolah</option>
                    <option value="Putus SD" <?php if ($data->pend_ibu == "Putus SD") {
                                                echo "selected";
                                              } ?>>Putus SD</option>
                    <option value="SD Sederajad" <?php if ($data->pend_ibu == "SD Sederajad") {
                                                    echo "selected";
                                                  } ?>>SD Sederajad</option>
                    <option value="SMP Sederajad" <?php if ($data->pend_ibu == "SMP Sederajad") {
                                                    echo "selected";
                                                  } ?>>SMP Sederajad</option>
                    <option value="SMA Sederajad" <?php if ($data->pend_ibu == "SMA Sederajad") {
                                                    echo "selected";
                                                  } ?>>SMA Sederajad</option>
                    <option value="D1" <?php if ($data->pend_ibu == "D1") {
                                          echo "selected";
                                        } ?>>D1</option>
                    <option value="D2" <?php if ($data->pend_ibu == "D2") {
                                          echo "selected";
                                        } ?>>D2</option>
                    <option value="D3" <?php if ($data->pend_ibu == "D3") {
                                          echo "selected";
                                        } ?>>D3</option>
                    <option value="D4/S1" <?php if ($data->pend_ibu == "D4/S1") {
                                            echo "selected";
                                          } ?>>D4/S1</option>
                    <option value="S2" <?php if ($data->pend_ibu == "S2") {
                                          echo "selected";
                                        } ?>>S2</option>
                    <option value="S3" <?php if ($data->pend_ibu == "S3") {
                                          echo "selected";
                                        } ?>>S3</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                <div class="col-sm-8">
                  <select type="text" name="kerja_ibu" id="kerja_ibu" class="form-control select2" disabled>
                    <option value="" <?php if ($data->pend_ibu == "") {
                                        echo "selected";
                                      } ?>>Tidak Diketahui</option>
                    <option value="Tidak bekerja" <?php if ($data->pend_ibu == "Tidak bekerja") {
                                                    echo "selected";
                                                  } ?>>Tidak bekerja</option>
                    <option value="Nelayan" <?php if ($data->pend_ibu == "Nelayan") {
                                              echo "selected";
                                            } ?>>Nelayan</option>
                    <option value="Petani" <?php if ($data->pend_ibu == "Petani") {
                                              echo "selected";
                                            } ?>>Petani</option>
                    <option value="Peternak" <?php if ($data->pend_ibu == "Peternak") {
                                                echo "selected";
                                              } ?>>Peternak</option>
                    <option value="PNS/TNI/POLRI" <?php if ($data->pend_ibu == "PNS/TNI/POLRI") {
                                                    echo "selected";
                                                  } ?>>PNS/TNI/POLRI</option>
                    <option value="Karyawan Swasta" <?php if ($data->pend_ibu == "Karyawan Swasta") {
                                                      echo "selected";
                                                    } ?>>Karyawan Swasta</option>
                    <option value="Pedagang Kecil" <?php if ($data->pend_ibu == "Pedagang Kecil") {
                                                      echo "selected";
                                                    } ?>>Pedagang Kecil</option>
                    <option value="Pedagang Besar" <?php if ($data->pend_ibu == "Pedagang Besar") {
                                                      echo "selected";
                                                    } ?>>Pedagang Besar</option>
                    <option value="Wiraswasta" <?php if ($data->pend_ibu == "Wiraswasta") {
                                                  echo "selected";
                                                } ?>>Wiraswasta</option>
                    <option value="Wirausaha" <?php if ($data->pend_ibu == "Wirausaha") {
                                                echo "selected";
                                              } ?>>Wirausaha</option>
                    <option value="Buruh" <?php if ($data->pend_ibu == "Buruh") {
                                            echo "selected";
                                          } ?>>Buruh</option>
                    <option value="Pensiunan" <?php if ($data->pend_ibu == "Pensiunan") {
                                                echo "selected";
                                              } ?>>Pensiunan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                <div class="col-sm-8">
                  <input type="text" name="hasil_ibu" class="form-control" id="hasil_ibu" placeholder="Rp. 000.000" value="<?php echo $data->hasil_ibu; ?>" disabled>
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
                  <input type="text" name="nm_wl" class="form-control" id="nm_wl" placeholder="Nama Wali" value="<?php echo $data->nm_wl; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_wl" class="col-sm-4 col-form-label">NIK WALI</label>
                <div class="col-sm-8">
                  <input type="text" name="nik_wl" class="form-control" id="nik_wl" placeholder="NIK Wali" value="<?php echo $data->nik_wl; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="tlahir_wl" class="col-sm-4 col-form-label">TEMPAT LAHIR WALI</label>
                <div class="col-sm-8">
                  <input type="text" name="tlahir_wl" class="form-control" id="tlahir_wl" placeholder="Kota Lahir" value="<?php echo $data->tlahir_wl; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="lahir_wl" class="col-sm-4 col-form-label">TANGGAL LAHIR WALI</label>
                <div class="col-sm-8">
                  <input type="date" name="lahir_wl" class="form-control" value="<?php echo $data->lahir_wl; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="pend_wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                <div class="col-sm-8">
                  <select type="text" name="pend_wl" id="pend_wl" class="form-control select2" disabled>
                    <option value="" <?php if ($data->pend_wl == "") {
                                        echo "selected";
                                      } ?>>Tidak Diketahui</option>
                    <option value="Tidak Sekolah" <?php if ($data->pend_wl == "Tidak Sekolah") {
                                                    echo "selected";
                                                  } ?>>Tidak Sekolah</option>
                    <option value="Putus SD" <?php if ($data->pend_wl == "Putus SD") {
                                                echo "selected";
                                              } ?>>Putus SD</option>
                    <option value="SD Sederajad" <?php if ($data->pend_wl == "SD Sederajad") {
                                                    echo "selected";
                                                  } ?>>SD Sederajad</option>
                    <option value="SMP Sederajad" <?php if ($data->pend_wl == "SMP Sederajad") {
                                                    echo "selected";
                                                  } ?>>SMP Sederajad</option>
                    <option value="SMA Sederajad" <?php if ($data->pend_wl == "SMA Sederajad") {
                                                    echo "selected";
                                                  } ?>>SMA Sederajad</option>
                    <option value="D1" <?php if ($data->pend_wl == "D1") {
                                          echo "selected";
                                        } ?>>D1</option>
                    <option value="D2" <?php if ($data->pend_wl == "D2") {
                                          echo "selected";
                                        } ?>>D2</option>
                    <option value="D3" <?php if ($data->pend_wl == "D3") {
                                          echo "selected";
                                        } ?>>D3</option>
                    <option value="D4/S1" <?php if ($data->pend_wl == "D4/S1") {
                                            echo "selected";
                                          } ?>>D4/S1</option>
                    <option value="S2" <?php if ($data->pend_wl == "S2") {
                                          echo "selected";
                                        } ?>>S2</option>
                    <option value="S3" <?php if ($data->pend_wl == "S3") {
                                          echo "selected";
                                        } ?>>S3</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="kerja_wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                <div class="col-sm-8">
                  <select type="text" name="kerja_wl" id="kerja_wl" class="form-control select2" disabled>
                    <option value="" <?php if ($data->pend_wl == "") {
                                        echo "selected";
                                      } ?>>Tidak Diketahui</option>
                    <option value="Tidak bekerja" <?php if ($data->pend_wl == "Tidak bekerja") {
                                                    echo "selected";
                                                  } ?>>Tidak bekerja</option>
                    <option value="Nelayan" <?php if ($data->pend_wl == "Nelayan") {
                                              echo "selected";
                                            } ?>>Nelayan</option>
                    <option value="Petani" <?php if ($data->pend_wl == "Petani") {
                                              echo "selected";
                                            } ?>>Petani</option>
                    <option value="Peternak" <?php if ($data->pend_wl == "Peternak") {
                                                echo "selected";
                                              } ?>>Peternak</option>
                    <option value="PNS/TNI/POLRI" <?php if ($data->pend_wl == "PNS/TNI/POLRI") {
                                                    echo "selected";
                                                  } ?>>PNS/TNI/POLRI</option>
                    <option value="Karyawan Swasta" <?php if ($data->pend_wl == "Karyawan Swasta") {
                                                      echo "selected";
                                                    } ?>>Karyawan Swasta</option>
                    <option value="Pedagang Kecil" <?php if ($data->pend_wl == "Pedagang Kecil") {
                                                      echo "selected";
                                                    } ?>>Pedagang Kecil</option>
                    <option value="Pedagang Besar" <?php if ($data->pend_wl == "Pedagang Besar") {
                                                      echo "selected";
                                                    } ?>>Pedagang Besar</option>
                    <option value="Wiraswasta" <?php if ($data->pend_wl == "Wiraswasta") {
                                                  echo "selected";
                                                } ?>>Wiraswasta</option>
                    <option value="Wirausaha" <?php if ($data->pend_wl == "Wirausaha") {
                                                echo "selected";
                                              } ?>>Wirausaha</option>
                    <option value="Buruh" <?php if ($data->pend_wl == "Buruh") {
                                            echo "selected";
                                          } ?>>Buruh</option>
                    <option value="Pensiunan" <?php if ($data->pend_wl == "Pensiunan") {
                                                echo "selected";
                                              } ?>>Pensiunan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="hasil_wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                <div class="col-sm-8">
                  <input type="text" name="hasil_wl" class="form-control" id="hasil_wl" placeholder="Rp. 000.000" value="<?php echo $data->hasil_ibu; ?>" disabled>
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
                  <input type="text" name="no_kps" class="form-control" id="no_kps" value="<?php echo $data->no_kps; ?>" placeholder="Sesuai Kartu" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_kip" class="col-sm-4 col-form-label">NO KIP</label>
                <div class="col-sm-8">
                  <input type="text" name="no_kip" class="form-control" id="no_kip" value="<?php echo $data->no_kip; ?>" placeholder="Sesuai Kartu" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_kis" class="col-sm-4 col-form-label">NO KIS</label>
                <div class="col-sm-8">
                  <input type="text" name="no_kis" class="form-control" id="no_kis" value="<?php echo $data->no_kis; ?>" placeholder="Sesuai Kartu" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_pkh" class="col-sm-4 col-form-label">NO PKH</label>
                <div class="col-sm-8">
                  <input type="text" name="no_pkh" class="form-control" id="no_pkh" value="<?php echo $data->no_pkh; ?>" placeholder="Sesuai Kartu" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                <div class="col-sm-8">
                  <input type="text" name="beasiswa" class="form-control" id="beasiswa" value="<?php echo $data->beasiswa; ?>" placeholder="Kartanu" disabled>
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
                  <input type="text" name="no_un" class="form-control" value="<?php echo $data->no_un; ?>" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_skhun" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                <div class="col-sm-8">
                  <input type="text" name="no_skhun" class="form-control" id="no_skhun" value="<?php echo $data->no_skhun; ?>" placeholder="DN-XX DI XXXXXXX" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_ijazah" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                <div class="col-sm-8">
                  <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo $data->no_ijazah; ?>" placeholder="DN-XX DI XXXXXXX" disabled>
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
                  <input type="text" name="skl_asal" class="form-control" id="skl_asal" value="<?php echo $data->skl_asal; ?>" disabled>
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
                    <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" disabled>
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
                <input type="hidden" name="foto_old" value="<?php echo $data->foto; ?>">
                <p>
                <h5><b>Data anda telah terkirim</br> Perubahan data selanjutnya hanya dapat dilakukan oleh panitia</b></h5>
                </p>
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
$this->load->view('theme/ft_alert');
?>