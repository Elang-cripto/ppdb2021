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
            <h1>Upload Data</h1>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Upload File Excel</h3>
              <script>
                $(document).ready(function(){
                  // Sembunyikan alert validasi kosong
                  $("#kosong").hide();
                });
              </script>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("tatausaha/form_mts"); ?>">
                    
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="InputFile" required="required">
                      <label class="custom-file-label" for="exampleInputFile">Pilih file...</label>
                    </div>
                    <div class="input-group-append">
                      <button type="submit" name="preview" value="Preview" class="btn btn-primary">Preview</button>
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
                  <a type="button" href="<?php echo base_url() ?>/excel/format.xlsx" class="btn btn-block bg-gradient-warning">Download Format</a>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Preview File Excel</h3>
            </div>
            <div class="card-body">
            <?php
              if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
                if(isset($upload_error)){ // Jika proses upload gagal
                  echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                  die; // stop skrip
                }

                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='".base_url("tatausaha/import_mts")."'>";
                echo "<button type='submit' name='import' class='btn btn-primary'>Save</button>";

                // Buat sebuah div untuk alert validasi kosong
                // echo "<div style='color: red;' nis='kosong'>
                // Semua data belum diisi, Ada <span nis='jumlah_kosong'></span> data yang belum diisi.
                // </div>";

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

                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                $no=-1;
                foreach($sheet as $row){
                  $no++;
                  // Ambil data pada excel sesuai Kolom
                  $nis = $row['B']; // Ambil data NIS
                  $nama = $row['D']; // Ambil data nama
                  $jk = $row['E']; // Ambil data jenis kelamin
                  $alamat = $row['J']; // Ambil data alamat

                  // Cek jika semua data tidak diisi
                  if($nis == "" && $nama == "" && $jk == "" && $alamat == "")
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                  // Cek $numrow apakah lebih dari 1
                  // Artinya karena baris pertama adalah nama-nama kolom
                  // Jadi dilewat saja, tidak usah diimport
                  if($numrow > 1){
                    // Validasi apakah semua data telah diisi
                    $nis_td = ( ! empty($nis))? "" : " style='background: #fd0303;'"; // Jika NIS kosong, beri warna merah
                    $nama_td = ( ! empty($nama))? "" : " style='background: #fd0303;'"; // Jika Nama kosong, beri warna merah
                    $jk_td = ( ! empty($jk))? "" : " style='background: #fd0303;'"; // Jika Jenis Kelamin kosong, beri warna merah
                    $alamat_td = ( ! empty($alamat))? "" : " style='background: #fd0303;'"; // Jika Alamat kosong, beri warna merah

                    // Jika salah satu data ada yang kosong
                    if($nis == "" or $nama == "" or $jk == "" or $alamat == ""){
                      $kosong++; // Tambah 1 variabel $kosong
                    }

                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td".$nis_td.">".$nis."</td>";
                    echo "<td".$nama_td.">".$nama."</td>";
                    echo "<td".$jk_td.">".$jk."</td>";
                    echo "<td".$alamat_td.">".$alamat."</td>";
                    echo "</tr>";
                  }

                  $numrow++; // Tambah 1 setiap kali looping
                }

                echo "</table>";

                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if($kosong > 0){
                ?>
                  <script>
                  $(document).ready(function(){
                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                    $("#kosong").show(); // Munculkan alert validasi kosong
                  });
                  </script>
                <?php
                }else{ // Jika semua data sudah diisi
                  echo "<hr>";

                  // Buat sebuah tombol untuk mengimport data ke database
                  echo "<button type='submit' name='import' class='btn btn-primary'>Save</button>";
                  echo "  ";
                  echo "<button href='".base_url("admin")."' class='btn btn-danger'>Cancel</button>";
                }

                echo "</form>";
              }
            ?>
            </div>
          </div>
        <!-- </div> -->
      <!-- </div> -->

      
    </section>
  </div>
  
<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_form');
?>
</body>
</html>