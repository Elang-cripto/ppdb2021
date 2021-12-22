<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/nav');
$this->load->view('walikelas/side');
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
          <div class="col-12 col-sm-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Perangkat Pembelajaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                      <a data-toggle='tooltip' data-placement='top' title='link' href="<?php echo $row->link; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>Download</a>
                    </td>
                  </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <div class="col-12 col-sm-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Link Khusus</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                    foreach($dblink_a as $rows): 
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $rows->file; ?></td>
                    <td><?php echo $rows->update; ?></td>
                    <td align="center">
                      <a data-toggle='tooltip' data-placement='top' title='link' href="<?php echo $rows->link; ?>" target="_blank" class="btn btn-primary btn-sm"> Menuju Link</a>
                    </td>
                  </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_2');
?>
</body>
</html>