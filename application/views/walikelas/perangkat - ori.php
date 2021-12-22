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
          <div class="col-12 col-sm-8">
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
                    <th>Link</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1.</td>
                    <td>CONTOH KKM</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EmXbzxKfkWNMiv5_5_KAXfEBlA9pyQu7wwuXi8I2WHmZyA?e=WaFSGF" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>CONTOH PERANGKAT PEMBELAJARAN</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EkZNouIHEHlOnXZJQ2zEEkAB80J1c3Na1VKWP26qVaZL6w?e=CHCgKK" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>DASAR PENENTUAN KI KD KONDISI KHUSUS</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EkZNouIHEHlOnXZJQ2zEEkAB80J1c3Na1VKWP26qVaZL6w?e=CHCgKK" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>JUKNIS PENILAIAN</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/ElmQoOrp_QtAiSuVdzZnkYMBtF2-zpELLxZ6eTuXNQEhWg?e=Xcv8he" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>KALENDER PENDIDIKAN</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/EjSOWnZuBlNAggWypHSvu28BUoPlEXZvD0D07sywM68DRQ?e=4IGnvl" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>MATERI SOSIALISASI</td>
                    <td align="center">
                      <a data-toggle="tooltip" data-placement="top" title="Detail" href="https://brtyl-my.sharepoint.com/:f:/g/personal/yasin_apps365_work/Ep59zJLDwBJEkJnnzCoQNyQBAtQ2ffRcVtwbJi2fdYQlIg?e=qtdoFY" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <div class="col-12 col-sm-4">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                   Perhatian
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="alert alert-warning alert-dismissible">
                  <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian</h5>
                  Aplikasi DATABASE ini masih dalam tahap penyempurnaan. mohon untuk berhati-hati dalam penggunakan menu ini.
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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