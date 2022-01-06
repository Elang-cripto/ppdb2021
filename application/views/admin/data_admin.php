    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MANAGEMEN PENGGUNA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">USER</li>
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
        ?>

        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Managemen Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-user-plus"></i> Tambah</a>
                <br><br>
                <table class="table table-bordered table-striped projects">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Profil</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Last LogIn</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($dbuser as $row) :
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td align="center">
                          <ul class="list-inline">
                            <li class="list-inline-item">
                              <img alt="Avatar" class="table-avatar" src="<?php echo base_url(); ?>asset/dist/img/<?php
                                                                                                                  if (empty($row->foto)) {
                                                                                                                    echo "none.png";
                                                                                                                  } else {
                                                                                                                    echo $row->foto;
                                                                                                                  }
                                                                                                                  ?>">
                            </li>
                          </ul>
                        </td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td align="center">
                          <span class="badge badge-<?php
                                                    if ($row->jabatan == 'admin') {
                                                      echo 'danger';
                                                    } elseif ($row->jabatan == 'panitia') {
                                                      echo 'info';
                                                    } else {
                                                      echo 'success';
                                                    } ?>">
                            <?php echo strtoupper($row->jabatan); ?>
                          </span>
                        </td>
                        <td align="center"><?php echo $row->last; ?></td>
                        <td align="center">
                          <a type="button" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-user-<?php echo md5($row->id); ?>"><i class="fa fa-user-edit"></i></a>
                          <a data-toggle='tooltip' data-placement='top' title='Hapus' href="<?php echo base_url(); ?>admin/deluser/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return del()"><i class="fa fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- =============================== modal tambah =============================== -->
    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah User admin</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <form name="form_tambah" method="post" action="<?php echo base_url(); ?>admin/adduser" enctype="multipart/form-data" onsubmit="return cekform()">
            <div class="modal-body">
              <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="Level" class="col-sm-4 col-form-label">Level</label>
                <div class="col-sm-8">
                  <select type="text" name="jabatan" id="jabatan" class="form-control select2">
                    <option value="">--- Pilih Jabatan ---</option>
                    <option value="admin">ADMIN</option>
                    <option value="panitia">PANITIA</option>
                    <option value="mgm">MGM</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="Status" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select type="text" name="status" id="status" class="form-control select2">
                    <option value="">--- Pilih Status ---</option>
                    <option value="1">AKTIF</option>
                    <option value="0">NON AKTIF</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <!-- ======================================= modal edit ======================================= -->
    <?php
    foreach ($dbuser as $m) :
    ?>
      <div class="modal fade" id="modal-user-<?php echo md5($m->id); ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/edituser" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="hidden" id="id" name="id" value="<?php echo $m->id; ?>">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m->nama; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $m->username; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $m->password; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                  <div class="col-sm-8">
                    <select type="text" name="jabatan" id="jabatan" class="form-control select2">
                      <option value="admin" <?php if ($m->jabatan == "admin") {
                                              echo "selected";
                                            } ?>>admin</option>
                      <option value="panitia" <?php if ($m->jabatan == "panitia") {
                                                echo "selected";
                                              } ?>>panitia</option>
                      <option value="mgm" <?php if ($m->jabatan == "mgm") {
                                            echo "selected";
                                          } ?>>mgm</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <select type="text" name="status" id="status" class="form-control select2">
                      <option value="0" <?php if ($m->status == "0") {
                                          echo "selected";
                                        } ?>>suspen</option>
                      <option value="1" <?php if ($m->status == "1") {
                                          echo "selected";
                                        } ?>>aktif</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php endforeach; ?>