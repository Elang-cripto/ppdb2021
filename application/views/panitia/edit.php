<?php
if ($this->uri->segment(3) == "mts") {
    $warna = "info";
    $tbl_skl = "db_sdmi";
} elseif ($this->uri->segment(3) == "ma") {
    $warna = "success";
    $tbl_skl = "db_smpmts";
} elseif ($this->uri->segment(3) == "smp") {
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
                <h3>Edit Data Peserta Didik Baru</h3>
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

    <!-- form start -->
    <form method="post" action="<?php echo base_url(); ?>panitia/editsave/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $cari->id_enc; ?>" enctype="multipart/form-data">
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
                            <label for="no_reg" class="col-sm-4 col-form-label">NO REGISTRASI</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_reg" class="form-control" id="no_reg" value="<?php echo $cari->no_reg; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nisn" class="col-sm-4 col-form-label">NISN</label>
                            <div class="col-sm-8">
                                <input type="text" name="nisn" class="form-control" id="Nisn" value="<?php echo $cari->nisn; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $cari->nama; ?>" required>
                            </div>
                        </div>
                        <!-- OPTION -->
                        <div class="form-group row">
                            <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                            <div class="col-sm-8">
                                <select type="text" name="jk" id="Jenis Kelamin" class="form-control">
                                    <option value="L" <?php if ($cari->jk == "L") {
                                                            echo "selected";
                                                        } ?>>Laki-laki</option>
                                    <option value="P" <?php if ($cari->jk == "P") {
                                                            echo "selected";
                                                        } ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                            <div class="col-sm-8">
                                <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" value="<?php echo $cari->tmp_lahir; ?>" required>
                            </div>
                        </div>
                        <!-- TANGGAL -->
                        <div class="form-group row">
                            <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="date" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $cari->tgl_lahir; ?>" data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" name="nik" class="form-control" id="nik" value="<?php echo $cari->nik; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-sm-4 col-form-label">AGAMA</label>
                            <div class="col-sm-8">
                                <select type="text" name="agama" id="agama" class="form-control">
                                    <option value="Islam" <?php if ($cari->agama == "Islam") {
                                                                echo "selected";
                                                            } ?>>Islam</option>
                                    <option value="Kristen" <?php if ($cari->agama == "Kristen") {
                                                                echo "selected";
                                                            } ?>>Kristen</option>
                                    <option value="Katholik" <?php if ($cari->agama == "Katholik") {
                                                                    echo "selected";
                                                                } ?>>Katholik</option>
                                    <option value="Hindu" <?php if ($cari->agama == "Hindu") {
                                                                echo "selected";
                                                            } ?>>Hindu</option>
                                    <option value="Budha" <?php if ($cari->agama == "Budha") {
                                                                echo "selected";
                                                            } ?>>Budha</option>
                                    <option value="Khonghucu" <?php if ($cari->agama == "Khonghucu") {
                                                                    echo "selected";
                                                                } ?>>Khonghucu</option>
                                    <option value="Kepercayaan Kepada Tuhan YME" <?php if ($cari->agama == "Kepercayaan Kepada Tuhan YME") {
                                                                                        echo "selected";
                                                                                    } ?>>Kepercayaan Kepada Tuhan YME</option>
                                    <option value="Lainnya" <?php if ($cari->agama == "Lainnya") {
                                                                echo "selected";
                                                            } ?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">ALAMAT</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $cari->alamat; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Rt" class="col-sm-4 col-form-label">RT / RW</label>
                            <div class="col-sm-4">
                                <input type="text" name="rt" class="form-control" id="Rt" value="<?php echo $cari->rt; ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="rw" class="form-control" id="Rw" value="<?php echo $cari->rw; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Dusun" class="col-sm-4 col-form-label">DUSUN</label>
                            <div class="col-sm-8">
                                <input type="text" name="dusun" class="form-control" id="Dusun" value="<?php echo $cari->dusun; ?>" required>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="kelurahan" class="form-control" id="Kelurahan" value="<?php echo $cari->kelurahan; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="kecamatan" class="form-control" id="Kecamatan" value="<?php echo $cari->kecamatan; ?>" required>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN</label>
                            <div class="col-sm-8">
                                <input type="text" name="kabupaten" class="form-control" id="Kabupaten" value="<?php echo $cari->kabupaten; ?>" required>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="Propinsi" class="col-sm-4 col-form-label">PROPINSI</label>
                            <div class="col-sm-8">
                                <input type="text" name="propinsi" class="form-control" id="Propinsi" value="<?php echo $cari->propinsi; ?>" required>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="Jenis Tinggal" class="col-sm-4 col-form-label">JENIS TINGGAL</label>
                            <div class="col-sm-8">
                                <select type="text" name="jns_tinggal" id="Jenis Tinggal" class="form-control">
                                    <option value="Dusun" <?php if ($cari->jns_tinggal == "Dusun") {
                                                                echo "selected";
                                                            } ?>>Dusun</option>
                                    <option value="Salaf Putri" <?php if ($cari->jns_tinggal == "Salaf Putri") {
                                                                    echo "selected";
                                                                } ?>>Salaf Putri</option>
                                    <option value="Salaf Putra" <?php if ($cari->jns_tinggal == "Salaf Putra") {
                                                                    echo "selected";
                                                                } ?>>Salaf Putra</option>
                                    <option value="Rusunnawa" <?php if ($cari->jns_tinggal == "Rusunnawa") {
                                                                    echo "selected";
                                                                } ?>>Rusunnawa</option>
                                    <option value="Ashri" <?php if ($cari->jns_tinggal == "Ashri") {
                                                                echo "selected";
                                                            } ?>>Ashri</option>
                                    <option value="AGA PUTRA" <?php if ($cari->jns_tinggal == "AGA PUTRA") {
                                                                    echo "selected";
                                                                } ?>>AGA PUTRA</option>
                                    <option value="AGA PUTRI" <?php if ($cari->jns_tinggal == "AGA PUTRI") {
                                                                    echo "selected";
                                                                } ?>>AGA PUTRI</option>
                                    <option value="Tahfid" <?php if ($cari->jns_tinggal == "Tahfid") {
                                                                echo "selected";
                                                            } ?>>Tahfid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Status Tinggal" class="col-sm-4 col-form-label">STATUS TEMPAT TINGGAL</label>
                            <div class="col-sm-8">
                                <select type="text" name="sts_tinggal" id="Status Tinggal" class="form-control">
                                    <option value="Milik Sendiri" <?php if ($cari->sts_tinggal == "Milik Sendiri") {
                                                                        echo "selected";
                                                                    } ?>>Milik Sendiri</option>
                                    <option value="Rumah Orang Tua" <?php if ($cari->sts_tinggal == "Rumah Orang Tua") {
                                                                        echo "selected";
                                                                    } ?>>Rumah Orang Tua</option>
                                    <option value="Rumah Saudara/Kerabat" <?php if ($cari->sts_tinggal == "Rumah Saudara/Kerabat") {
                                                                                echo "selected";
                                                                            } ?>>Rumah Saudara/Kerabat</option>
                                    <option value="Rumah Dinas" <?php if ($cari->sts_tinggal == "Rumah Dinas") {
                                                                    echo "selected";
                                                                } ?>>Rumah Dinas</option>
                                    <option value="Sewa/kontrak" <?php if ($cari->sts_tinggal == "Sewa/kontrak") {
                                                                        echo "selected";
                                                                    } ?>>Sewa/kontrak</option>
                                    <option value="Lainnya" <?php if ($cari->sts_tinggal == "Lainnya") {
                                                                echo "selected";
                                                            } ?>>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Transportasi" class="col-sm-4 col-form-label">TRANSPORTASI</label>
                            <div class="col-sm-8">
                                <select type="text" name="alat_trans" id="alat_trans" class="form-control">
                                    <option value="Jalan kaki" <?php if ($cari->alat_trans == "Jalan kaki") {
                                                                    echo "selected";
                                                                } ?>>Jalan kaki</option>
                                    <option value="Angkutan umum/bus/pete-pete" <?php if ($cari->alat_trans == "Angkutan umum/bus/pete-pete") {
                                                                                    echo "selected";
                                                                                } ?>>Angkutan umum/bus/pete-pete</option>
                                    <option value="Mobil/bus antar jemput" <?php if ($cari->alat_trans == "Mobil/bus antar jemput") {
                                                                                echo "selected";
                                                                            } ?>>Mobil/bus antar jemput</option>
                                    <option value="Kereta api" <?php if ($cari->alat_trans == "Kereta api") {
                                                                    echo "selected";
                                                                } ?>>Kereta api</option>
                                    <option value="Ojek" <?php if ($cari->alat_trans == "Ojek") {
                                                                echo "selected";
                                                            } ?>>Ojek</option>
                                    <option value="Andong/bendi/sado/dokar/delman/becak" <?php if ($cari->alat_trans == "Andong/bendi/sado/dokar/delman/becak") {
                                                                                                echo "selected";
                                                                                            } ?>>Andong/bendi/sado/dokar/delman/becak</option>
                                    <option value="Perahu penyeberangan/rakit/getek" <?php if ($cari->alat_trans == "Perahu penyeberangan/rakit/getek") {
                                                                                            echo "selected";
                                                                                        } ?>>Perahu penyeberangan/rakit/getek</option>
                                    <option value="Kuda" <?php if ($cari->alat_trans == "Kuda") {
                                                                echo "selected";
                                                            } ?>>Kuda</option>
                                    <option value="Sepeda" <?php if ($cari->alat_trans == "Sepeda") {
                                                                echo "selected";
                                                            } ?>>Sepeda</option>
                                    <option value="Sepeda motor" <?php if ($cari->alat_trans == "Sepeda motor") {
                                                                        echo "selected";
                                                                    } ?>>Sepeda motor</option>
                                    <option value="Mobil pribadi" <?php if ($cari->alat_trans == "Mobil pribadi") {
                                                                        echo "selected";
                                                                    } ?>>Mobil pribadi</option>
                                    <option value="Lainnya" <?php if ($cari->alat_trans == "Lainnya") {
                                                                echo "selected";
                                                            } ?>>Lainnya</option>
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
                                    <input type="text" class="form-control" name="telp" value="<?php echo $cari->telp; ?>" data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-4 col-form-label">E-MAIL</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" id="Email" value="<?php echo $cari->email; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Anak ke" class="col-sm-4 col-form-label">ANAK KE-</label>
                            <div class="col-sm-4">
                                <input type="text" name="anak_ke" class="form-control" id="Anak ke" placeholder="00" value="<?php echo $cari->anak_ke; ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="jml_sdr" class="form-control" id="Jumlah Saudara" placeholder="00" value="<?php echo $cari->jml_sdr; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_kk" class="col-sm-4 col-form-label">NO KK</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_kk" class="form-control" id="no_kk" placeholder="Sesuai Kartu keluarga" value="<?php echo $cari->no_kk; ?>" required>
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
                                <input type="text" name="nm_ayh" class="form-control" id="nm_ayh" placeholder="Nama Ayah" value="<?php echo $cari->nm_ayh; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik_ayh" class="col-sm-4 col-form-label">NIK AYAH</label>
                            <div class="col-sm-8">
                                <input type="text" name="nik_ayh" class="form-control" id="nik_ayh" placeholder="NIK Ayah" value="<?php echo $cari->nik_ayh; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tlahir_ayh" class="col-sm-4 col-form-label">TEMPAT LAHIR AYAH</label>
                            <div class="col-sm-8">
                                <input type="text" name="tlahir_ayh" class="form-control" id="tlahir_ayh" placeholder="Kota Lahir" value="<?php echo $cari->tlahir_ayh; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahir_ayh" class="col-sm-4 col-form-label">TANGGAL LAHIR AYAH</label>
                            <div class="col-sm-8">
                                <input type="date" name="lahir_ayh" class="form-control" value="<?php echo $cari->lahir_ayh; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pend_Ayah" class="col-sm-4 col-form-label">PENDIDIKAN AYAH</label>
                            <div class="col-sm-8">
                                <select type="text" name="pend_ayh" id="pend_ayh" class="form-control">
                                    <option value="" <?php if ($cari->pend_ayh == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak Sekolah" <?php if ($cari->pend_ayh == "Tidak Sekolah") {
                                                                        echo "selected";
                                                                    } ?>>Tidak Sekolah</option>
                                    <option value="Putus SD" <?php if ($cari->pend_ayh == "Putus SD") {
                                                                    echo "selected";
                                                                } ?>>Putus SD</option>
                                    <option value="SD Sederajad" <?php if ($cari->pend_ayh == "SD Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SD Sederajad</option>
                                    <option value="SMP Sederajad" <?php if ($cari->pend_ayh == "SMP Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMP Sederajad</option>
                                    <option value="SMA Sederajad" <?php if ($cari->pend_ayh == "SMA Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMA Sederajad</option>
                                    <option value="D1" <?php if ($cari->pend_ayh == "D1") {
                                                            echo "selected";
                                                        } ?>>D1</option>
                                    <option value="D2" <?php if ($cari->pend_ayh == "D2") {
                                                            echo "selected";
                                                        } ?>>D2</option>
                                    <option value="D3" <?php if ($cari->pend_ayh == "D3") {
                                                            echo "selected";
                                                        } ?>>D3</option>
                                    <option value="D4/S1" <?php if ($cari->pend_ayh == "D4/S1") {
                                                                echo "selected";
                                                            } ?>>D4/S1</option>
                                    <option value="S2" <?php if ($cari->pend_ayh == "S2") {
                                                            echo "selected";
                                                        } ?>>S2</option>
                                    <option value="S3" <?php if ($cari->pend_ayh == "S3") {
                                                            echo "selected";
                                                        } ?>>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH</label>
                            <div class="col-sm-8">
                                <select type="text" name="kerja_ayh" id="kerja_ayh" class="form-control">
                                    <option value="" <?php if ($cari->kerja_ayh == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak bekerja" <?php if ($cari->kerja_ayh == "Tidak bekerja") {
                                                                        echo "selected";
                                                                    } ?>>Tidak bekerja</option>
                                    <option value="Nelayan" <?php if ($cari->kerja_ayh == "Nelayan") {
                                                                echo "selected";
                                                            } ?>>Nelayan</option>
                                    <option value="Petani" <?php if ($cari->kerja_ayh == "Petani") {
                                                                echo "selected";
                                                            } ?>>Petani</option>
                                    <option value="Peternak" <?php if ($cari->kerja_ayh == "Peternak") {
                                                                    echo "selected";
                                                                } ?>>Peternak</option>
                                    <option value="PNS/TNI/POLRI" <?php if ($cari->kerja_ayh == "PNS/TNI/POLRI") {
                                                                        echo "selected";
                                                                    } ?>>PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta" <?php if ($cari->kerja_ayh == "Karyawan Swasta") {
                                                                        echo "selected";
                                                                    } ?>>Karyawan Swasta</option>
                                    <option value="Pedagang Kecil" <?php if ($cari->kerja_ayh == "Pedagang Kecil") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" <?php if ($cari->kerja_ayh == "Pedagang Besar") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Besar</option>
                                    <option value="Wiraswasta" <?php if ($cari->kerja_ayh == "Wiraswasta") {
                                                                    echo "selected";
                                                                } ?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php if ($cari->kerja_ayh == "Wirausaha") {
                                                                    echo "selected";
                                                                } ?>>Wirausaha</option>
                                    <option value="Buruh" <?php if ($cari->kerja_ayh == "Buruh") {
                                                                echo "selected";
                                                            } ?>>Buruh</option>
                                    <option value="Pensiunan" <?php if ($cari->kerja_ayh == "Pensiunan") {
                                                                    echo "selected";
                                                                } ?>>Pensiunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH</label>
                            <div class="col-sm-8">
                                <select type="text" name="hasil_ayh" id="hasil_ayh" class="form-control">
                                    <option value="Kurang dari Rp. 500,000" <?php if ($cari->hasil_ayh == "Kurang dari Rp. 500,000") {
                                                                                echo "selected";
                                                                            } ?>>Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" <?php if ($cari->hasil_ayh == "Rp. 500,000 - Rp. 999,999") {
                                                                                    echo "selected";
                                                                                } ?>>Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" <?php if ($cari->hasil_ayh == "Rp. 1,000,000 - Rp. 1,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" <?php if ($cari->hasil_ayh == "Rp. 2,000,000 - Rp. 4,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" <?php if ($cari->hasil_ayh == "Rp. 5,000,000 - Rp. 20,000,000") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" <?php if ($cari->hasil_ayh == "Lebih dari Rp. 20,000,000") {
                                                                                    echo "selected";
                                                                                } ?>>Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" <?php if ($cari->hasil_ayh == "Tidak Berpenghasilan") {
                                                                                echo "selected";
                                                                            } ?>>Tidak Berpenghasilan</option>
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
                                <input type="text" name="nm_ibu" class="form-control" id="nm_ibu" placeholder="Nama Ibu" value="<?php echo $cari->nm_ibu; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik_ibu" class="col-sm-4 col-form-label">NIK IBU</label>
                            <div class="col-sm-8">
                                <input type="text" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="NIK Ibu" value="<?php echo $cari->nik_ibu; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tlahir_ibu" class="col-sm-4 col-form-label">TEMPAT LAHIR IBU</label>
                            <div class="col-sm-8">
                                <input type="text" name="tlahir_ibu" class="form-control" id="tlahir_ibu" placeholder="Kota Lahir" value="<?php echo $cari->tlahir_ibu; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahir_ibu" class="col-sm-4 col-form-label">TANGGAL LAHIR IBU</label>
                            <div class="col-sm-8">
                                <input type="date" name="lahir_ibu" class="form-control" value="<?php echo $cari->lahir_ibu; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pend_Ibu" class="col-sm-4 col-form-label">PENDIDIKAN IBU</label>
                            <div class="col-sm-8">
                                <select type="text" name="pend_ibu" id="pend_ibu" class="form-control">
                                    <option value="" <?php if ($cari->pend_ibu == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak Sekolah" <?php if ($cari->pend_ibu == "Tidak Sekolah") {
                                                                        echo "selected";
                                                                    } ?>>Tidak Sekolah</option>
                                    <option value="Putus SD" <?php if ($cari->pend_ibu == "Putus SD") {
                                                                    echo "selected";
                                                                } ?>>Putus SD</option>
                                    <option value="SD Sederajad" <?php if ($cari->pend_ibu == "SD Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SD Sederajad</option>
                                    <option value="SMP Sederajad" <?php if ($cari->pend_ibu == "SMP Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMP Sederajad</option>
                                    <option value="SMA Sederajad" <?php if ($cari->pend_ibu == "SMA Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMA Sederajad</option>
                                    <option value="D1" <?php if ($cari->pend_ibu == "D1") {
                                                            echo "selected";
                                                        } ?>>D1</option>
                                    <option value="D2" <?php if ($cari->pend_ibu == "D2") {
                                                            echo "selected";
                                                        } ?>>D2</option>
                                    <option value="D3" <?php if ($cari->pend_ibu == "D3") {
                                                            echo "selected";
                                                        } ?>>D3</option>
                                    <option value="D4/S1" <?php if ($cari->pend_ibu == "D4/S1") {
                                                                echo "selected";
                                                            } ?>>D4/S1</option>
                                    <option value="S2" <?php if ($cari->pend_ibu == "S2") {
                                                            echo "selected";
                                                        } ?>>S2</option>
                                    <option value="S3" <?php if ($cari->pend_ibu == "S3") {
                                                            echo "selected";
                                                        } ?>>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU</label>
                            <div class="col-sm-8">
                                <select type="text" name="kerja_ibu" id="kerja_ibu" class="form-control">
                                    <option value="" <?php if ($cari->kerja_ibu == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak bekerja" <?php if ($cari->kerja_ibu == "Tidak bekerja") {
                                                                        echo "selected";
                                                                    } ?>>Tidak bekerja</option>
                                    <option value="Nelayan" <?php if ($cari->kerja_ibu == "Nelayan") {
                                                                echo "selected";
                                                            } ?>>Nelayan</option>
                                    <option value="Petani" <?php if ($cari->kerja_ibu == "Petani") {
                                                                echo "selected";
                                                            } ?>>Petani</option>
                                    <option value="Peternak" <?php if ($cari->kerja_ibu == "Peternak") {
                                                                    echo "selected";
                                                                } ?>>Peternak</option>
                                    <option value="PNS/TNI/POLRI" <?php if ($cari->kerja_ibu == "PNS/TNI/POLRI") {
                                                                        echo "selected";
                                                                    } ?>>PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta" <?php if ($cari->kerja_ibu == "Karyawan Swasta") {
                                                                        echo "selected";
                                                                    } ?>>Karyawan Swasta</option>
                                    <option value="Pedagang Kecil" <?php if ($cari->kerja_ibu == "Pedagang Kecil") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" <?php if ($cari->kerja_ibu == "Pedagang Besar") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Besar</option>
                                    <option value="Wiraswasta" <?php if ($cari->kerja_ibu == "Wiraswasta") {
                                                                    echo "selected";
                                                                } ?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php if ($cari->kerja_ibu == "Wirausaha") {
                                                                    echo "selected";
                                                                } ?>>Wirausaha</option>
                                    <option value="Buruh" <?php if ($cari->kerja_ibu == "Buruh") {
                                                                echo "selected";
                                                            } ?>>Buruh</option>
                                    <option value="Pensiunan" <?php if ($cari->kerja_ibu == "Pensiunan") {
                                                                    echo "selected";
                                                                } ?>>Pensiunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU</label>
                            <div class="col-sm-8">
                                <select type="text" name="hasil_ibu" id="hasil_ibu" class="form-control">
                                    <option value="Kurang dari Rp. 500,000" <?php if ($cari->hasil_ibu == "Kurang dari Rp. 500,000") {
                                                                                echo "selected";
                                                                            } ?>>Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" <?php if ($cari->hasil_ibu == "Rp. 500,000 - Rp. 999,999") {
                                                                                    echo "selected";
                                                                                } ?>>Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" <?php if ($cari->hasil_ibu == "Rp. 1,000,000 - Rp. 1,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" <?php if ($cari->hasil_ibu == "Rp. 2,000,000 - Rp. 4,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" <?php if ($cari->hasil_ibu == "Rp. 5,000,000 - Rp. 20,000,000") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" <?php if ($cari->hasil_ibu == "Lebih dari Rp. 20,000,000") {
                                                                                    echo "selected";
                                                                                } ?>>Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" <?php if ($cari->hasil_ibu == "Tidak Berpenghasilan") {
                                                                                echo "selected";
                                                                            } ?>>Tidak Berpenghasilan</option>
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
                                <input type="text" name="nm_wl" class="form-control" id="nm_wl" placeholder="Nama Wali" value="<?php echo $cari->nm_wl; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik_wl" class="col-sm-4 col-form-label">NIK WALI</label>
                            <div class="col-sm-8">
                                <input type="text" name="nik_wl" class="form-control" id="nik_wl" placeholder="NIK Wali" value="<?php echo $cari->nik_wl; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tlahir_wl" class="col-sm-4 col-form-label">TEMPAT LAHIR WALI</label>
                            <div class="col-sm-8">
                                <input type="text" name="tlahir_wl" class="form-control" id="tlahir_wl" placeholder="Kota Lahir" value="<?php echo $cari->tlahir_wl; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahir_wl" class="col-sm-4 col-form-label">TANGGAL LAHIR WALI</label>
                            <div class="col-sm-8">
                                <input type="date" name="lahir_wl" class="form-control" value="<?php echo $cari->lahir_wl; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pend_wl" class="col-sm-4 col-form-label">PENDIDIKAN WALI</label>
                            <div class="col-sm-8">
                                <select type="text" name="pend_wl" id="pend_wl" class="form-control">
                                    <option value="" <?php if ($cari->pend_wl == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak Sekolah" <?php if ($cari->pend_wl == "Tidak Sekolah") {
                                                                        echo "selected";
                                                                    } ?>>Tidak Sekolah</option>
                                    <option value="Putus SD" <?php if ($cari->pend_wl == "Putus SD") {
                                                                    echo "selected";
                                                                } ?>>Putus SD</option>
                                    <option value="SD Sederajad" <?php if ($cari->pend_wl == "SD Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SD Sederajad</option>
                                    <option value="SMP Sederajad" <?php if ($cari->pend_wl == "SMP Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMP Sederajad</option>
                                    <option value="SMA Sederajad" <?php if ($cari->pend_wl == "SMA Sederajad") {
                                                                        echo "selected";
                                                                    } ?>>SMA Sederajad</option>
                                    <option value="D1" <?php if ($cari->pend_wl == "D1") {
                                                            echo "selected";
                                                        } ?>>D1</option>
                                    <option value="D2" <?php if ($cari->pend_wl == "D2") {
                                                            echo "selected";
                                                        } ?>>D2</option>
                                    <option value="D3" <?php if ($cari->pend_wl == "D3") {
                                                            echo "selected";
                                                        } ?>>D3</option>
                                    <option value="D4/S1" <?php if ($cari->pend_wl == "D4/S1") {
                                                                echo "selected";
                                                            } ?>>D4/S1</option>
                                    <option value="S2" <?php if ($cari->pend_wl == "S2") {
                                                            echo "selected";
                                                        } ?>>S2</option>
                                    <option value="S3" <?php if ($cari->pend_wl == "S3") {
                                                            echo "selected";
                                                        } ?>>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerja_wl" class="col-sm-4 col-form-label">PEKERJAAN WALI</label>
                            <div class="col-sm-8">
                                <select type="text" name="kerja_wl" id="kerja_wl" class="form-control">
                                    <option value="" <?php if ($cari->kerja_wl == "") {
                                                            echo "selected";
                                                        } ?>>Tidak Diketahui</option>
                                    <option value="Tidak bekerja" <?php if ($cari->kerja_wl == "Tidak bekerja") {
                                                                        echo "selected";
                                                                    } ?>>Tidak bekerja</option>
                                    <option value="Nelayan" <?php if ($cari->kerja_wl == "Nelayan") {
                                                                echo "selected";
                                                            } ?>>Nelayan</option>
                                    <option value="Petani" <?php if ($cari->kerja_wl == "Petani") {
                                                                echo "selected";
                                                            } ?>>Petani</option>
                                    <option value="Peternak" <?php if ($cari->kerja_wl == "Peternak") {
                                                                    echo "selected";
                                                                } ?>>Peternak</option>
                                    <option value="PNS/TNI/POLRI" <?php if ($cari->kerja_wl == "PNS/TNI/POLRI") {
                                                                        echo "selected";
                                                                    } ?>>PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta" <?php if ($cari->kerja_wl == "Karyawan Swasta") {
                                                                        echo "selected";
                                                                    } ?>>Karyawan Swasta</option>
                                    <option value="Pedagang Kecil" <?php if ($cari->kerja_wl == "Pedagang Kecil") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" <?php if ($cari->kerja_wl == "Pedagang Besar") {
                                                                        echo "selected";
                                                                    } ?>>Pedagang Besar</option>
                                    <option value="Wiraswasta" <?php if ($cari->kerja_wl == "Wiraswasta") {
                                                                    echo "selected";
                                                                } ?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php if ($cari->kerja_wl == "Wirausaha") {
                                                                    echo "selected";
                                                                } ?>>Wirausaha</option>
                                    <option value="Buruh" <?php if ($cari->kerja_wl == "Buruh") {
                                                                echo "selected";
                                                            } ?>>Buruh</option>
                                    <option value="Pensiunan" <?php if ($cari->kerja_wl == "Pensiunan") {
                                                                    echo "selected";
                                                                } ?>>Pensiunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hasil_wl" class="col-sm-4 col-form-label">PENGHASILAN WALI</label>
                            <div class="col-sm-8">
                                <select type="text" name="hasil_wl" id="hasil_wl" class="form-control">
                                    <option value="Kurang dari Rp. 500,000" <?php if ($cari->hasil_wl == "Kurang dari Rp. 500,000") {
                                                                                echo "selected";
                                                                            } ?>>Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999" <?php if ($cari->hasil_wl == "Rp. 500,000 - Rp. 999,999") {
                                                                                    echo "selected";
                                                                                } ?>>Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999" <?php if ($cari->hasil_wl == "Rp. 1,000,000 - Rp. 1,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999" <?php if ($cari->hasil_wl == "Rp. 2,000,000 - Rp. 4,999,999") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000" <?php if ($cari->hasil_wl == "Rp. 5,000,000 - Rp. 20,000,000") {
                                                                                        echo "selected";
                                                                                    } ?>>Rp. 5,000,000 - Rp. 20,000,000</option>
                                    <option value="Lebih dari Rp. 20,000,000" <?php if ($cari->hasil_wl == "Lebih dari Rp. 20,000,000") {
                                                                                    echo "selected";
                                                                                } ?>>Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan" <?php if ($cari->hasil_wl == "Tidak Berpenghasilan") {
                                                                                echo "selected";
                                                                            } ?>>Tidak Berpenghasilan</option>
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
                                <input type="text" name="no_kps" class="form-control" id="no_kps" value="<?php echo $cari->no_kps; ?>" placeholder="Sesuai Kartu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_kip" class="col-sm-4 col-form-label">NO KIP</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_kip" class="form-control" id="no_kip" value="<?php echo $cari->no_kip; ?>" placeholder="Sesuai Kartu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_kis" class="col-sm-4 col-form-label">NO KIS</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_kis" class="form-control" id="no_kis" value="<?php echo $cari->no_kis; ?>" placeholder="Sesuai Kartu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_pkh" class="col-sm-4 col-form-label">NO PKH</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_pkh" class="form-control" id="no_pkh" value="<?php echo $cari->no_pkh; ?>" placeholder="Sesuai Kartu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="beasiswa" class="col-sm-4 col-form-label">Beasiswa</label>
                            <div class="col-sm-8">
                                <select type="text" name="beasiswa" id="beasiswa" class="form-control">
                                    <option value="<?php echo $cari->beasiswa; ?>"><?php echo $cari->beasiswa; ?></option>
                                    <option value="YATIM">YATIM</option>
                                    <option value="PIATU">PIATU</option>
                                    <option value="YATIM PIATU">YATIM PIATU</option>
                                    <option value="DUAFA">DUAFA</option>
                                </select>
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
                                <input type="text" name="no_un" class="form-control" value="<?php echo $cari->no_un; ?>" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_skhun" class="col-sm-4 col-form-label">NO SERI SKHUN</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_skhun" class="form-control" id="no_skhun" value="<?php echo $cari->no_skhun; ?>" placeholder="DN-XX DI XXXXXXX">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ijazah" class="col-sm-4 col-form-label">NO SERI IJAZAH</label>
                            <div class="col-sm-8">
                                <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo $cari->no_ijazah; ?>" placeholder="DN-XX DI XXXXXXX">
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
                            <label for="status" class="col-sm-4 col-form-label">STATUS</label>
                            <div class="col-sm-8">
                                <select type="text" name="status" id="status" class="form-control">
                                    <option value="AKTIF" <?php if ($cari->status == "AKTIF") {
                                                                echo "selected";
                                                            } ?>>AKTIF</option>
                                    <option value="RESIDU" <?php if ($cari->status == "RESIDU") {
                                                                echo "selected";
                                                            } ?>>RESIDU</option>
                                    <option value="NON AKTIF" <?php if ($cari->status == "NON AKTIF") {
                                                                    echo "selected";
                                                                } ?>>NON AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL</label>
                            <div class="col-sm-8">
                                <select type="text" name="skl_asal" id="skl_asal" class="form-control select2" required>
                                    <option value="<?php echo $cari->skl_asal; ?>"><?php echo $cari->skl_asal; ?></option>
                                    <?php
                                    $sklh = $this->m_ppdb->pil_skl($tbl_skl);
                                    foreach ($sklh->result() as $pilih) :
                                    ?>
                                        <option value="<?php echo $pilih->lembaga; ?>"><?php echo $pilih->lembaga; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jalur" class="col-sm-4 col-form-label">JALUR PENDAFTARAN</label>
                            <div class="col-sm-8">
                                <select type="text" name="jalur" id="jalur" class="form-control">
                                    <option value="INDEN" <?php if ($cari->jalur == "INDEN") {
                                                                echo "selected";
                                                            } ?>>INDEN</option>
                                    <option value="PRESTASI" <?php if ($cari->jalur == "PRESTASI") {
                                                                    echo "selected";
                                                                } ?>>PRESTASI</option>
                                    <option value="REGULER" <?php if ($cari->jalur == "REGULER") {
                                                                echo "selected";
                                                            } ?>>REGULER</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-4 col-form-label">KETERANGAN</label>
                            <div class="col-sm-8">
                                <select type="text" name="ket" id="ket" class="form-control">
                                    <option value=" " <?php if ($cari->ket == "") {
                                                            echo "selected";
                                                        } ?>>--pilih--</option>
                                    <option value="Sains" <?php if ($cari->ket == "Sains") {
                                                                echo "selected";
                                                            } ?>>Sains</option>
                                    <option value="Tahfidz" <?php if ($cari->ket == "Tahfidz") {
                                                                echo "selected";
                                                            } ?>>Tahfidz</option>
                                    <option value="Agama" <?php if ($cari->ket == "Agama") {
                                                                echo "selected";
                                                            } ?>>Agama</option>
                                    <option value="Bahasa" <?php if ($cari->ket == "Bahasa") {
                                                                echo "selected";
                                                            } ?>>Bahasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mgm" class="col-sm-4 col-form-label">JALUR MGM</label>
                            <div class="col-sm-8">
                                <select name="mgm" id="mgm" class="form-control select2">
                                    <!-- <option value="<?php echo $cari->mgm; ?>"><?php echo $cari->mgm; ?></option> -->
                                    <?php
                                    $kirim = 'db_panitia';
                                    $resul = $this->m_ppdb->pil_mgm($kirim);
                                    foreach ($resul->result() as $cek) :
                                    ?>
                                        <option value="<?php echo $cek->nama; ?>"><?php echo $cek->nama; ?></option>
                                    <?php endforeach; ?>
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
                            </label>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit Formulir</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->