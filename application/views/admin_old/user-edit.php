<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
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
            <h1>Edit Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

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
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       <?php 
                          if(empty("$dbuser->foto")){
                            $gambar = 'asset/upload/none.png';
                          }else{
                            $gambar = 'asset/dist/img/'.$dbuser->foto;
                          }
                        ?>
                       src="<?php echo base_url($gambar)?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $dbuser->nama; ?></h3>
                <h3 class="profile-username text-center">
                  <span class="badge bg-success">EDIT DATA</span>
                </h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>USERNAME</b> <a class="float-right"><?php echo $dbuser->username; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>PASSWORD</b> <a class="float-right">*****</a>
                  </li>
                </ul>
                <div class="text-center">
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Resume</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong><i class="fas fa-book mr-1"></i> Jabatan</strong>
                  <p class="text-muted">
                    <?php echo $dbuser->jabatan; ?>
                  </p>
                <hr>

                <strong><i class="fas fa-at mr-1"></i> E-mail</strong>
                <p class="text-muted"><?php echo $dbuser->email; ?></p>
                <hr>

                <strong><i class="fas fa-phone-alt mr-1"></i> No Telp</strong>
                <p class="text-muted"><?php echo $dbuser->telp; ?></p>

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
                  <li class="nav-item"><a class="nav-link active" href="#data1" data-toggle="tab">Profil Pengguna</a></li>
                  <li class="nav-item"><a class="nav-link" href="#data2" data-toggle="tab">Setting User</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="data1">
                    <form method="post" action="<?php echo base_url(); ?>admin/updateprofil" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id" id="id" placeholder="id" required value="<?php echo $dbuser->id; ?>">
                          <input type="hidden" class="form-control" name="username" id="username" placeholder="username" required value="<?php echo $dbuser->username; ?>">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required value="<?php echo $dbuser->nama; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select type="text" name="jabatan" id="jabatan" class="form-control select2">
                            <option value="admin" <?php if($dbuser->jabatan=="admin"){echo "selected";} ?>>Admin</option>
                            <option value="guru" <?php if($dbuser->jabatan=="guru"){echo "selected";} ?>>Guru</option>
                            <option value="walikelas" <?php if($dbuser->jabatan=="walikelas"){echo "selected";} ?>>Wali Kelas</option>
                            <option value="tatausaha" <?php if($dbuser->jabatan=="tatausaha"){echo "selected";} ?>>Tata Usaha</option>
                            <option value="headmaster" <?php if($dbuser->jabatan=="headmaster"){echo "selected";} ?>>Kepala Sekolah</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Telp/HP" class="col-sm-2 col-form-label">Lembaga</label>
                        <div class="col-sm-10">
                          <select type="text" name="par" id="par" class="form-control select2">
                            <option value="" <?php if($dbuser->par==""){echo "selected";} ?>>-- Pilih Lembaga --</option>
                            <option value="mts" <?php if($dbuser->par=="mts"){echo "selected";} ?>>MTs Al Amien</option>
                            <option value="ma" <?php if($dbuser->par=="ma"){echo "selected";} ?>>MA Al Amien</option>
                            <option value="smp" <?php if($dbuser->par=="smp"){echo "selected";} ?>>SMPS Plus Al Amien</option>
                            <option value="smk" <?php if($dbuser->par=="smk"){echo "selected";} ?>>SMKS Al Amien</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                         <!--  <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas 9-x" value="<?php echo $dbuser->kelas; ?>"> -->
                          <select type="text" name="kelas" id="kelas"  class="form-control select2">
                              <option value="" <?php if($dbuser->par==""){echo "selected";} ?>>-- Pilih Lembaga --</option>
                             <?php foreach($cats as $cat) : ?>
                              <option value="<?php echo $cat->kelas;?>" <?php if($dbuser->kelas==$cat->kelas){echo "selected";} ?>> <?php echo $cat->par; ?>-<?php echo $cat->kelas; ?></option>
                             <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Telp/HP" class="col-sm-2 col-form-label">Telp/HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="telp" name="telp" placeholder="082xxxxxxxxx" required value="<?php echo $dbuser->telp; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo $dbuser->email; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Aktifasi Akun</label>
                        <div class="col-sm-10">
                          <select type="text" name="status" id="status" class="form-control select2">
                            <option value="AKTIF" <?php if($dbuser->status=="AKTIF"){echo "selected";} ?>>AKTIF</option>
                            <option value="NON AKTIF" <?php if($dbuser->status=="NON AKTIF"){echo "selected";} ?>>NON AKTIF</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-6">
                          <div class="custom-file">
                            <input type="hidden" name="foto_old" value="<?php echo $dbuser->foto; ?>">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>                    
                    </form>
                  </div>
                  <div class="tab-pane" id="data2">
                    <form method="post" action="<?php echo base_url(); ?>admin/updateuspass" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id" id="id" placeholder="id" required value="<?php echo $dbuser->id; ?>">
                          <input type="text" class="form-control" name="username" id="username" placeholder="username" required value="<?php echo $dbuser->username; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password" id="password" placeholder="password baru" required value="">
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_form');
?>
</body>
</html>