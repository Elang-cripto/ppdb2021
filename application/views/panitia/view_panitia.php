    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Panitia</h1>
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
                    $warna = "primary";

                    ?>
                    <!-- Profile Image -->
                    <div class="card card-<?php echo $warna; ?>">
                        <div class="card-header">
                            <h3 class="card-title">Profil Pengguna</h3>
                        </div>
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
                                <?php if ($cari->status == 1) { ?>
                                    <span class="badge bg-primary">Online</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Offline</span>
                                <?php } ?>
                            </h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Username</b> <a class="float-right">****</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jabatan</b> <a class="float-right"><span class="badge bg-success"><?php echo $cari->jabatan; ?></span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-<?php echo $warna; ?>">
                        <div class="card-header">
                            <h3 class="card-title">Hak Akses</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Tugas</strong>

                            <p class="text-muted">
                                - Input</br>
                                - Edit
                            </p>
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
                                <li class="nav-item"><a class="nav-link" href="#data2" data-toggle="tab">Upload Foto</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="data1">
                                    <form method="post" action="<?php echo base_url(); ?>panitia/editpan/<?php
                                                                                                            $user_id = $this->session->userdata('id');
                                                                                                            echo $user_id; ?>" enctype="multipart/form-data">
                                        <!-- <form class="form-horizontal"> -->
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="jangan ada spasi" value="<?php echo $cari->nama; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="username" id="username" value="****" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="password" id="password" placeholder="****" value="" required>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </form>
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