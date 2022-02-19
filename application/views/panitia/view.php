    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <?php
                    if ($this->uri->segment(3) == "mts") {
                        $warna = "info";
                    } elseif ($this->uri->segment(3) == "ma") {
                        $warna = "success";
                    } elseif ($this->uri->segment(3) == "smp") {
                        $warna = "warning";
                    } else {
                        $warna = "danger";
                    }
                    ?>
                    <!-- Profile Image -->
                    <div class="card card-<?php echo $warna; ?> card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" <?php
                                                                                    if (empty($cari->foto)) {
                                                                                        $gambar = "none.png";
                                                                                    } else {
                                                                                        $gambar = $cari->foto;
                                                                                    }
                                                                                    ?> src="<?php echo base_url('asset/upload/' . $gambar) ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $cari->nama; ?></h3>

                            <h3 class="text-center">
                                <?php if ($cari->status == "AKTIF") { ?>
                                    <span class="badge bg-success"><?php echo $cari->status; ?></span>
                                <?php } else { ?>
                                    <span class="badge bg-danger"><?php echo $cari->status; ?></span>
                                <?php } ?>
                            </h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>No Registrasi</b> <a class="float-right"><?php echo $cari->no_reg; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>NISN</b> <a class="float-right"><?php echo $cari->nisn; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>JALUR</b> <a class="float-right">
                                        <h6><span class="badge bg-info"> <?php echo $cari->jalur; ?></span></h6>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>UMUR</b>
                                    <a class="float-right">
                                        <?php
                                        echo hitung_umur($cari->tgl_lahir);
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-<?php echo $warna; ?>">
                        <div class="card-header">
                            <h3 class="card-title">Resume</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                            <p class="text-muted">
                                SD/MI : <?php echo $cari->skl_asal; ?><br>
                                SMP/MTS : MTsS AL AMIEN AMBULU
                            </p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted"><?php echo $cari->alamat; ?></p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Jenis Tinggal</strong>
                            <p class="text-muted"><?php echo $cari->jns_tinggal; ?></p>
                            <hr>
                            <strong><i class="fas fa-user-alt mr-1"></i> Keluarga</strong>

                            <p class="text-muted">
                                Ayah : <?php echo $cari->nm_ayh; ?><br>
                                Ibu : <?php echo $cari->nm_ibu; ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone-alt mr-1"></i> No Telp</strong>

                            <p class="text-muted"><?php echo $cari->telp; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#data1" data-toggle="tab">Data Siswa</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data2" data-toggle="tab">Data Ayah</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data3" data-toggle="tab">Data Ibu</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data4" data-toggle="tab">Data Wali</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data5" data-toggle="tab">Legalitas</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data6" data-toggle="tab">Kartu</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data8" data-toggle="tab">Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="#data9" data-toggle="tab">Update</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="data1">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Nama" value="<?php echo $cari->nama; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="NIS" class="col-sm-2 col-form-label">NO REGISTRASI</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="NIS" value="<?php echo $cari->no_reg; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="NISN" value="<?php echo $cari->nisn; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="JK" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="JK" value="<?php echo $cari->jk; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tempatlahir" class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tempatlahir" value="<?php echo $cari->tmp_lahir; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tgl_lahir" value="<?php echo date_indo($cari->tgl_lahir); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="NIK" value="<?php echo $cari->nik; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="AGAMA" class="col-sm-2 col-form-label">AGAMA</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="AGAMA" value="<?php echo $cari->agama; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Alamat" value="<?php echo $cari->alamat; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="RT / RW" class="col-sm-2 col-form-label">RT / RW</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="RT / RW" value="<?php echo $cari->rt . " / " . $cari->rw; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Dusun" class="col-sm-2 col-form-label">DUSUN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Dusun" value="<?php echo $cari->dusun; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Kelurahan" class="col-sm-2 col-form-label">KELURAHAN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Kelurahan" value="<?php echo $cari->kelurahan; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Kecamatan" class="col-sm-2 col-form-label">KECAMATAN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Kecamatan" value="<?php echo $cari->kecamatan; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Kabupaten" class="col-sm-2 col-form-label">KABUPATEN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Kabupaten" value="<?php echo $cari->kabupaten; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Propinsi" class="col-sm-2 col-form-label">PROPINSI</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Propinsi" value="<?php echo $cari->propinsi; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Jns_tinggal" class="col-sm-2 col-form-label">JENIS TINGGAL</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Jns_tinggal" value="<?php echo $cari->jns_tinggal; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Alat_trans" class="col-sm-2 col-form-label">TRANSPORTASI</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Alat_trans" value="<?php echo $cari->alat_trans; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Phone" class="col-sm-2 col-form-label">No Telp/ HP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Phone" data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask value="<?php echo $cari->telp; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Email" class="col-sm-2 col-form-label">E-MAIL</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Email" value="<?php echo $cari->email; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="anak_ke" class="col-sm-2 col-form-label">ANAK KE-</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="anak_ke" value="<?php echo $cari->anak_ke; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Jumlah_Saudara" class="col-sm-2 col-form-label">Jumlah Saudara</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Jumlah_Saudara" value="<?php echo $cari->jml_sdr; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data2">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="nm_ayh" class="col-sm-3 col-form-label">NAMA AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nm_ayh" value="<?php echo $cari->nm_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_ayh" class="col-sm-3 col-form-label">NIK AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nik_ayh" value="<?php echo $cari->nik_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lahir_ayh" class="col-sm-3 col-form-label">TAHUN LAHIR AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="lahir_ayh" value="<?php echo $cari->lahir_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pend_ayh" class="col-sm-3 col-form-label">PENDIDIKAN AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="pend_ayh" value="<?php echo $cari->pend_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kerja_ayh" class="col-sm-3 col-form-label">PEKERJAAN AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="kerja_ayh" value="<?php echo $cari->kerja_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hasil_ayh" class="col-sm-3 col-form-label">PENGHASILAN AYAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="hasil_ayh" value="<?php echo $cari->hasil_ayh; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data3">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="nm_ibu" class="col-sm-3 col-form-label">NAMA IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nm_ibu" value="<?php echo $cari->nm_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_ibu" class="col-sm-3 col-form-label">NIK IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nik_ibu" value="<?php echo $cari->nik_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lahir_ibu" class="col-sm-3 col-form-label">TAHUN LAHIR IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="lahir_ibu" value="<?php echo $cari->lahir_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pend_ibu" class="col-sm-3 col-form-label">PENDIDIKAN IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="pend_ibu" value="<?php echo $cari->pend_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kerja_ibu" class="col-sm-3 col-form-label">PEKERJAAN IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="kerja_ibu" value="<?php echo $cari->kerja_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hasil_ibu" class="col-sm-3 col-form-label">PENGHASILAN IBU</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="hasil_ibu" value="<?php echo $cari->hasil_ibu; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data4">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="nm_wl" class="col-sm-3 col-form-label">NAMA WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nm_wl" value="<?php echo $cari->nm_wl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nik_wl" class="col-sm-3 col-form-label">NIK WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="nik_wl" value="<?php echo $cari->nik_wl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lahir_wl" class="col-sm-3 col-form-label">TAHUN LAHIR WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="lahir_wl" value="<?php echo $cari->lahir_wl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pend_wl" class="col-sm-3 col-form-label">PENDIDIKAN WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="pend_wl" value="<?php echo $cari->pend_wl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kerja_wl" class="col-sm-3 col-form-label">PEKERJAAN WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="kerja_wl" value="<?php echo $cari->kerja_wl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hasil_wl" class="col-sm-3 col-form-label">PENGHASILAN WALI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="hasil_wl" value="<?php echo $cari->hasil_wl; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data5">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="no_un" class="col-sm-3 col-form-label">NO UN SD/MI</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="no_un" data-inputmask="'mask': ['9-99-99-99-999-999-9']" data-mask value="<?php echo $cari->no_un; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_skhun" class="col-sm-3 col-form-label">NO SERI SKHUN</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="no_skhun" value="<?php echo $cari->no_skhun; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_ijazah" class="col-sm-3 col-form-label">NO SERI IJAZAH</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="no_ijazah" value="<?php echo $cari->no_ijazah; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data6">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="no_kk" class="col-sm-3 col-form-label">NO KK</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_kk" value="<?php echo $cari->no_kk; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_kps" class="col-sm-3 col-form-label">NO KPS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_kps" value="<?php echo $cari->no_kps; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_kip" class="col-sm-3 col-form-label">NO KIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_kip" value="<?php echo $cari->no_kip; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_kis" class="col-sm-3 col-form-label">NO KIS</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_kis" value="<?php echo $cari->no_kis; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_pkh" class="col-sm-3 col-form-label">NO PKH</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="no_pkh" value="<?php echo $cari->no_pkh; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="beasiswa" class="col-sm-3 col-form-label">Beasiswa</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="beasiswa" value="<?php echo $cari->beasiswa; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data8">
                                    <form class="form-horizontal">
                                        <div class="text-center">
                                            <p><b>REGISTER MASUK</b></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="skl_asal" class="col-sm-3 col-form-label">SEKOLAH ASAL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="skl_asal" value="<?php echo $cari->skl_asal; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="almt_skl" class="col-sm-3 col-form-label">ALAMAT SEKOLAH ASAL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="almt_skl" value="<?php echo $cari->almt_skl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jns_masuk" class="col-sm-3 col-form-label">JENIS PENDAFTARAN</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jns_masuk" value="<?php echo $cari->jns_masuk; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_masuk" class="col-sm-3 col-form-label">TANGGAL MASUK</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="tgl_masuk" value="<?php echo date('d F Y', strtotime($cari->tgl_masuk)); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p><b>REGISTER KELUAR</b></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ket_out" class="col-sm-3 col-form-label">KETERANGAN KELUAR</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="ket_out" value="<?php echo $cari->ket_out; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="almt_skl" class="col-sm-3 col-form-label">ALAMAT SEKOLAH ASAL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="almt_skl" value="<?php echo $cari->almt_skl; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_out" class="col-sm-3 col-form-label">TANGGAL KELUAR</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="tgl_out" value="<?php echo date('d F Y', strtotime($cari->tgl_out)); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alasan_out" class="col-sm-3 col-form-label">ALASAN KELUAR</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="alasan_out" value="<?php echo $cari->alasan_out; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nosrt_out" class="col-sm-3 col-form-label">NO SURAT</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nosrt_out" value="<?php echo $cari->nosrt_out; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data9">
                                    <div class="form-group row">
                                        <label for="skl_asal" class="col-sm-3 col-form-label">Terakhir Di edit</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="skl_asal" value="<?php echo $cari->progres; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="almt_skl" class="col-sm-3 col-form-label">User Editor</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="almt_skl" value="<?php echo $cari->editor; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->