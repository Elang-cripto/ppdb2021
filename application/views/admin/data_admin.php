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
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Managemen Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a class="btn btn-primary" href="<?php echo base_url('') ?>admin/adduser"><i class="fa fa-user-plus"></i> Tambah</a>  
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
                    $no=0;
                    foreach($dbuser as $row): 
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align="center">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                        <img alt="Avatar" class="table-avatar" src="<?php echo base_url(); ?>asset/dist/img/<?php 
                        if(empty($row->foto)){
                          echo "none.png";
                        }else{
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
                      if($row->jabatan == 'admin') {
                        echo 'danger';
                      }elseif($row->jabatan == 'tatausaha') {
                        echo 'info';
                      }else{
                        echo 'success';
                      }?>">
                        <?php echo strtoupper($row->jabatan); ?>
                      </span>
                    </td>
                    <td align="center"><?php echo $row->last; ?></td>
                    <td align="center">
                      <a type="button" href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-user-<?php echo md5($row->id); ?>"><i class="fa fa-user-edit"></i></a>
                      <a data-toggle='tooltip' data-placement='top' title='Hapus' href="<?php echo base_url(); ?>admin/del_user/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return del()"><i class="fa fa-trash-alt"></i></a>              
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
                  <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="3509xxxxxxxxxxxx" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Sesuai Ijazah" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="email" id="email" placeholder="username" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Password" class="col-sm-4 col-form-label">No Telp (Password)</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Lembaga Tujuan" class="col-sm-4 col-form-label">Lembaga Tujuan</label>
                  <div class="col-sm-8">
                  <select type="text" name="par" id="par"  class="form-control select2">
                      <option value="">--- Pilih ---</option> 
                      <option value="MTS">MTS AL AMIEN</option>
                      <option value="MA">MA AL AMIEN</option>
                      <option value="SMP">SMP PLUS AL AMIEN</option>
                      <option value="SMK">SMK AL AMIEN</option>
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
      foreach($dbuser as $m):
    ?>
      <div class="modal fade" id="modal-user-<?php echo md5($m->id);?>">
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
                    <input type="hidden" id="id" name="id" value="<?php echo $m->id;?>">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m->nama;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m->username;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m->password;?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Jabatan</label>
                  <div class="col-sm-8">
                    <select type="text" name="jabatan" id="jabatan"  class="form-control select2">
                      <option value="admin" <?php if($m->jabatan=="admin"){echo "selected";} ?>>admin</option>
                      <option value="admin" <?php if($m->jabatan=="admin"){echo "selected";} ?>>admin</option>
                      <option value="mgm" <?php if($m->jabatan=="mgm"){echo "selected";} ?>>mgm</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Username" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <select type="text" name="status" id="status"  class="form-control select2">
                      <option value="suspen" <?php if($m->status=="0"){echo "selected";} ?>>suspen</option>
                      <option value="aktif" <?php if($m->status=="1"){echo "selected";} ?>>aktif</option>
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