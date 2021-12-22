<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
$this->load->view('theme/hlink_modal');
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
            <h1>Setting</h1>
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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Setting</h3>
            </div>
            <script>
              $(document).ready(function(){
                // Sembunyikan alert validasi kosong
                $("#kosong").hide();
              });
            </script>
            
            <!-- /.card-header -->
            <!-- form start -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url("walikelas/editset"); ?>">
              <div class="card-body">
                <div class="form-group row">
                  <label for="tapel" class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $set->id; ?>" disabled>
                    <input type="text" class="form-control" name="tapel" id="tapel" value="<?php echo $set->tapel; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" class="form-control" name="semester" id="semester" value="<?php echo $set->semester; ?>"> -->
                    
                    <select type="text" name="semester" id="semester" disabled class="form-control select2">
                      <option value="Ganjil" <?php if($set->semester=="Ganjil"){echo "selected";} ?>>Ganjil</option>
                      <option value="Genap"  <?php if($set->semester=="Genap"){echo "selected";} ?>>Genap</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
                <p class="text-danger">* Anda tidak memiliki akses untuk merubah menu ini</p>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
            <!-- /.card-footer-->
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
              <div class="alert alert-warning alert-dismissible">
                <h5>Aplikasi Masih dalam pengembangan</h5>
                <p>Saat ini masih ada beberapa kendala dalam beberapa menu mohon kritik dan saran untuk pengembangan aplikasi ini <br><br> By Elang</p> 
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>  
    </section>
  </div>

<!-- =============================================================================================== -->
<?php 
$this->load->view('theme/foot');
$this->load->view('theme/flink_2');
$this->load->view('theme/flink_modal');
?>
</body>
</html>