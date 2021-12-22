<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/nav');
$this->load->view('walikelas/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $this->uri->segment(2); ?></li>
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
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><b>Rombel MA</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Jumlah</th>
                    <th class="text-center">Aksi</th>
                    <th class="text-center">Form</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=0;
                      foreach($dbkls as $row):
                      $no++;
                    ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td>Kelas <?php echo $row->kelas; ?></td>
                    <td><?php echo $row->wali_kelas; ?></td>
                    <td align="center">
                      <?php 
                        $clkls = "%L".$row->kelas."AKTIF%";
                        $mal = $this->db->query("SELECT * FROM db_ma where CONCAT(jk,kelas_aktf,status) LIKE '$clkls'")->num_rows();
                        echo $mal;
                      ?>
                    </td>
                    <td align="center">
                      <?php 
                        $cpkls = "%P".$row->kelas."AKTIF%";
                        $map = $this->db->query("SELECT * FROM db_ma where CONCAT(jk,kelas_aktf,status) LIKE '$cpkls'")->num_rows();
                        echo $map;
                      ?>                      
                    </td>
                    <td align="center">
                      <?php 
                        echo $mal+$map
                      ?>
                    </td>
                    <td align="center">
                      <a href="<?php echo base_url(); ?>walikelas/waliklsma/<?php echo $row->kelas; ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Siswa</a>
                    </td>
                    <td align="center">
                      <a href="<?php echo base_url(); ?>download/form_nilai/<?php echo $row->par; ?>/<?php echo $row->kelas; ?>" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download-alt"></i> Nilai</a>
                      <a href="<?php echo base_url(); ?>download/form_absen/<?php echo $row->par; ?>/<?php echo $row->kelas; ?>" class="btn btn-success btn-sm"><i class="fa fa-cloud-download-alt"></i> Absen</a>
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
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<!-- =============================================================================================== -->
<?php $this->load->view('walikelas/modal_kls');  ?>
<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_table');
?>
</body>
</html>