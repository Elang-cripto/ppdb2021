<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$this->load->view('admin/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <table id="example1" class="table table-bordered table-striped projects">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Profil</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Kelas</th>
                    <th>Akun</th>
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
                      <span class="badge badge-<?php if($row->jabatan == 'admin'){echo 'danger';}elseif($row->jabatan == 'tatausaha'){echo 'info';}else{echo 'success';} ?>">
                        <?php echo strtoupper($row->jabatan); ?>
                      </span>
                    </td>
                    <td align="center"><?php echo $row->kelas; ?></td>
                    <td align="center">
                      <span class="badge badge-<?php if($row->status == 'AKTIF'){echo 'success';}else{echo 'danger';} ?>">
                        <?php echo $row->status; ?>
                      </span>
                    </td>
                    <td align="center"><?php echo $row->last; ?></td>
                    <td align="center">
                      <a data-toggle='tooltip' data-placement='top' title='Detail' href="<?php echo base_url(); ?>admin/profil/<?php echo $row->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                      <a data-toggle='tooltip' data-placement='top' title='Edit' href="<?php echo base_url(); ?>admin/edituser/<?php echo base64_encode($row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-user-edit"></i></a>
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
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_all');
$this->load->view('theme/flink_modal');
?>
</body>
</html>