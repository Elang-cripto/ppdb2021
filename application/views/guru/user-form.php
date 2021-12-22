<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/nav');
$this->load->view('guru/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('asset/upload/none.png') ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">??????</h3>
                <h3 class="profile-username text-center">
                  <span class="badge bg-success">VERIVIKASI</span>
                </h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>USERNAME</b> <a class="float-right">??????</a>
                  </li>
                  <li class="list-group-item">
                    <b>PASSWORD</b> <a class="float-right">??????</a>
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
                    ??????
                  </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                  <p class="text-muted">??????</p>
                <hr>

                <strong><i class="fas fa-at mr-1"></i> E-mail</strong>
                <p class="text-muted">??????</p>
                <hr>

                <strong><i class="fas fa-phone-alt mr-1"></i> No Telp</strong>
                <p class="text-muted">08xxxxxxxxxx</p>

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
                  <li class="nav-item"><a class="nav-link active" href="#data1" data-toggle="tab">Data Pengguna Baru</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="data1">
                    <form method="post" action="<?php echo base_url(); ?>guru/saveuser" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password" id="password" placeholder="password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select type="text" name="jabatan" id="jabatan" class="form-control select2">
                            <option value="" disabled selected hidden>Pilih salah satu...</option>
                            <option value="guru">Guru</option>
                            <option value="walikelas">Wali Kelas</option>
                            <option value="tatausaha">Tata Usaha</option>
                            <option value="headmaster">Kepala Sekolah</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas 9XX"> -->
                          <select type="text" name="kelas" id="kelas"  class="form-control select2">
                             <?php foreach($cats as $cat) : ?>
                              <option value="<?php echo $cat->kelas;?>"> <?php echo $cat->par;?> - <?php echo $cat->kelas;?></option>
                             <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Telp/HP" class="col-sm-2 col-form-label">Telp/HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="telp" name="telp" placeholder="082xxxxxxxxx" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-6">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Daftar</button>
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