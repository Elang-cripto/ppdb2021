<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_ind12');
$this->load->view('theme/hlink_modal');
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
            <h1>Managemen Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Managemen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
          <div class="col-12 ">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Perangkat Pembelajaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fa fa-user-plus"></i> Tambah
                </button><br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>File</th>
                    <th>Update</th>
                    <th>Link</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no=0;//variabel no
                    foreach($dblink as $row): 
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row->file; ?></td>
                    <td><?php echo $row->update; ?></td>
                    <td align="center">
                      <a data-toggle='tooltip' data-placement='top' title='link' href="<?php echo $row->link; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>

                      <a type="button" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-verval-<?php echo $row->id; ?>"><i class="fa fa-edit"></i> Edit</a>

                      <a href="<?php echo base_url(); ?>admin/del_link/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin dihapus?')"><i class="fa fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<!-- ====================================================================================================================== -->
              <!-- /.card-body -->
        <div class="row">
          <div class="col-12 ">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Link Khusus</h3>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tambaha">
                  <i class="fa fa-user-plus"></i> Tambah
                </button><br><br>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>File</th>
                    <th>Update</th>
                    <th>Link</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no=0;//variabel no
                    foreach($dblink_a as $row_a): 
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row_a->file; ?></td>
                    <td><?php echo $row_a->update; ?></td>
                    <td align="center">
                      <a data-toggle='tooltip' data-placement='top' title='link' href="<?php echo $row_a->link; ?>" target="_blank" class="btn btn-primary btn-sm">Menuju Link</a>

                      <a type="button" href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-vervala-<?php echo $row_a->id; ?>"><i class="fa fa-edit"></i> Edit</a>

                      <a href="<?php echo base_url(); ?>admin/del_linka/<?php echo $row_a->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin dihapus?')"><i class="fa fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /. row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- =============================================================================================== -->
<?php $this->load->view('admin/modal_link');  ?>
<?php $this->load->view('admin/modal_link_a');  ?>
<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_ind12');
$this->load->view('theme/flink_modal');
?>
</body>
</html>