<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Upload</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Default box -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <!-- form start -->
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url("admin/updatesetting"); ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="tapel" class="col-sm-4 col-form-label">TAHUN PELAJARAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="tapel" class="form-control" id="tapel" value="<?php echo $cari->tapel; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jalur" class="col-sm-4 col-form-label">JALUR PENDAFTARAN</label>
                            <div class="col-sm-8">
                                <select type="text" name="jalur" id="jalur" class="form-control select">
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
                            <label for="jadwal_ver" class="col-sm-4 col-form-label">Jadwal Verivikasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="jadwal_ver" class="form-control" id="jadwal_ver" value="<?php echo $cari->jadwal_ver; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
<<<<<<< HEAD
                            <label for="jam_ver" class="col-sm-4 col-form-label">Waktu Verivikasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="jam_ver" class="form-control" id="jam_ver" value="<?php echo $cari->jam_ver; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
=======
>>>>>>> 8fa083bd9a94d79a6e4b500e7bec457a255ed0b5
                            <label for="tempat_ver1" class="col-sm-4 col-form-label">Tempat Verivikasi 1</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_ver1" class="form-control" id="tempat_ver1" value="<?php echo $cari->tempat_ver1; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_ver2" class="col-sm-4 col-form-label">Tempat Verivikasi 2</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_ver2" class="form-control" id="tempat_ver2" value="<?php echo $cari->tempat_ver2; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right toastrDefaultSuccess">Simpan </button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Info Pop Up</h4>
                    </div>
                    <div class="row">
                        <div class="card-body">

                            <textarea id="compose-textarea" class="form-control" name="pengumuman" id="pengumuman" style="height: 300px" required="">
            <?php echo $cari->pengumuman; ?>
            </textarea>

                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>