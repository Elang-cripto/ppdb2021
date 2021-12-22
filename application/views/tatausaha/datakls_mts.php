<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/nav');
$this->load->view('tatausaha/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Data Siswa <span class="badge bg-info">Kelas <?php echo $this->uri->segment(3) ?></span></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DATA MTS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <div class="box-body">
                <?php echo $this->session->flashdata('pesan'); ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Induk</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Tmpt Tgl Lahir</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no=0;//variabel no
                    foreach($dbkls as $row): 
                    $no++;
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->jk; ?></td>
                    <td><?php echo $row->tmp_lahir.', '.date_indo($row->tgl_lahir); ?></td>
                    <td><?php echo $row->kelas_aktf; ?></td>
                    <td align="center">
                      <?php if($row->status == "AKTIF"){ ?>
                        <span class="badge bg-success"><?php echo $row->status; ?></span>
                      <?php }elseif($row->status == "NON AKTIF"){ ?>
                        <span class="badge bg-danger"><?php echo $row->status; ?></span>
                      <?php }else{ ?>
                        <span class="badge bg-warning"><?php echo $row->status; ?></span>
                      <?php } ?>
                    </td>
                    <td align="center">
                      <a data-toggle='tooltip' data-placement='top' title='Profil' href="<?php echo base_url(); ?>tatausaha/viewmts/<?php echo $row->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                      <a data-toggle='tooltip' data-placement='top' title='Edit' href="<?php echo base_url(); ?>tatausaha/editmts/<?php echo $row->id; ?>" class="btn btn-info btn-sm"><i class="fa fa-user-edit"></i></a>
                    </td>
                  </tr>
                    <?php  endforeach; ?>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_table');
?>
</body>
</html>