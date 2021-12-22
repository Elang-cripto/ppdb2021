<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
$this->load->view('theme/nav');
$this->load->view('headmaster/side');
?>
<!-- =============================================================================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Data MA</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- Default box -->
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Upload File Excel</h3>
              <script>
                $(document).ready(function(){
                  // Sembunyikan alert validasi kosong
                  $("#kosong").hide();
                });
              </script>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("headmaster/form_ma"); ?>">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="InputFile" required="required">
                      <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                    </div>
                    <div class="input-group-append">
                      <button type="submit" name="preview" value="Preview" class="btn btn-success">Preview</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <?php echo $this->session->flashdata('notif') ?>
              <p class="text-info">Pastikan format sudah sesuai dengan ketentuan</p>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-bullhorn"></i>
                 Perhatian
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="alert alert-info alert-dismissible">
                <h5>Panduan Upload Data</h5>
                <p>File yang akan di Upload adalah file Excel yang sesuai dengan format dan ketentuan untuk menghindari error.</p> 
                  <button type="button" href="../excel/format.xlsx" class="btn btn-block bg-gradient-warning">Download Format</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>  
      <!-- <div class="row"> -->
      <!-- Default box -->
        <!-- <div class="col-md-6"> -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Preview File Excel</h3>
            </div>
            <div class="card-body">
            <?php
              if(isset($_POST['preview'])){ 
                if(isset($upload_error)){ 
                  echo "<div style='color: red;'>".$upload_error."</div>";
                  die; 
                }
                echo "<form method='post' action='".base_url("headmaster/import_ma")."'>";
                echo "
                
                <table class='table table-bordered table-striped'>
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                </tr>";

                $numrow = 1;
                $kosong = 0;

                $no=-1;
                foreach($sheet as $row){
                  $no++;
                  
                  $nis = $row['B'];
                  $nama = $row['D'];
                  $jk = $row['E'];
                  $alamat = $row['J'];

                  if($nis == "" && $nama == "" && $jk == "" && $alamat == "")
                    continue;

                  if($numrow > 1){
                    
                    $nis_td = ( ! empty($nis))? "" : " style='background: #fd0303;'"; 
                    $nama_td = ( ! empty($nama))? "" : " style='background: #fd0303;'"; 
                    $jk_td = ( ! empty($jk))? "" : " style='background: #fd0303;'"; 
                    $alamat_td = ( ! empty($alamat))? "" : " style='background: #fd0303;'"; 

                    if($nis == "" or $nama == "" or $jk == "" or $alamat == ""){
                      $kosong++; 
                    }

                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td".$nis_td.">".$nis."</td>";
                    echo "<td".$nama_td.">".$nama."</td>";
                    echo "<td".$jk_td.">".$jk."</td>";
                    echo "<td".$alamat_td.">".$alamat."</td>";
                    echo "</tr>";
                  }

                  $numrow++; 
                }

                echo "</table>";

                if($kosong > 0){
                ?>
                  <script>
                  $(document).ready(function(){
                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                    $("#kosong").show(); 
                  });
                  </script>
                <?php
                }else{ 
                  echo "<hr>";

                  

                }
                  echo "<button type='submit' name='import' class='btn btn-primary'>Save</button>";
                  echo "  ";
                  echo "<button href='".base_url("admin")."' class='btn btn-danger'>Cancel</button>";
                echo "</form>";
              }
            ?>
            </div>
          </div>
    </section>
  </div>

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_form');
$this->load->view('theme/flink_modal');
?>
</body>
</html>