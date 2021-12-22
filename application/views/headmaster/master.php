<?php 
$this->load->view('theme/head');
$this->load->view('theme/hlink_all');
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
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#upload-mts" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">DATABASE MTS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#upload-ma" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">DATABASE MA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#upload-smp" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">DATABASE SMP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#upload-smk" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">DATABASE SMK</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="upload-mts" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="alert alert-info alert-dismissible">
                      Untuk mempermudah dalam backup data dan restore data silahkan anda gurnakan menu berikut. akan tetapi tetap berhati-hati dalam
                      mengupload data excel. <hr>
                    </div>  
                      <a href="<?php echo base_url('') ?>headmaster/uploadmts" class="btn btn-app" >
                        <i class="fas fa-upload"></i> Upload Data MTS
                      </a>
                      <a href="<?php echo base_url('') ?>headmaster/export_mts" class="btn btn-app" >
                        <i class="fas fa-download"></i> Download Data MTS
                      </a>
                  </div>
                  <div class="tab-pane fade" id="upload-ma" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="alert alert-success alert-dismissible">
                      Untuk mempermudah dalam backup data dan restore data silahkan anda gurnakan menu berikut. akan tetapi tetap berhati-hati dalam
                      mengupload data excel. <hr>
                    </div>
                      <a href="<?php echo base_url('') ?>headmaster/uploadma" class="btn btn-app" >
                        <i class="fas fa-upload"></i> Upload Data MA
                      </a>
                      <a href="<?php echo base_url('') ?>headmaster/export_ma" class="btn btn-app" >
                        <i class="fas fa-download"></i> Download Data MA
                      </a>
                  </div>
                  <div class="tab-pane fade" id="upload-smp" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="alert alert-warning alert-dismissible">
                      Untuk mempermudah dalam backup data dan restore data silahkan anda gurnakan menu berikut. akan tetapi tetap berhati-hati dalam
                      mengupload data excel. <hr>
                    </div>
                    <a href="<?php echo base_url('') ?>headmaster/uploadsmp" class="btn btn-app" >
                      <i class="fas fa-upload"></i> Upload Data SMP
                    </a>
                    <a href="<?php echo base_url('') ?>headmaster/export_smp" class="btn btn-app" >
                      <i class="fas fa-download"></i> Download Data SMP
                    </a>
                  </div>
                  <div class="tab-pane fade" id="upload-smk" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="alert alert-danger alert-dismissible">
                      Untuk mempermudah dalam backup data dan restore data silahkan anda gurnakan menu berikut. akan tetapi tetap berhati-hati dalam
                      mengupload data excel. <hr>
                    </div>
                    <a href="<?php echo base_url('') ?>headmaster/uploadsmk" class="btn btn-app" >
                      <i class="fas fa-upload"></i> Upload Data SMK
                    </a>
                    <a href="<?php echo base_url('') ?>headmaster/export_smk" class="btn btn-app" >
                      <i class="fas fa-download"></i> Download Data SMK
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>

          <div class="col-12 col-sm-6">
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