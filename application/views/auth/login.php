<?php
$this->load->view('theme/head');
?>
<!-- =============================================================================================== -->

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/adminlte.min.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <h2><b>FORM REGISTRASI PESERTA DIDIK BARU</b></h2>
            <h3><b>MTs AL AMIEN</b></h3>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <!-- <p class="login-box-msg">Registrasi user baru</p> -->

                <form role="form" id="cekform" method="post" action="<?php echo base_url('auth'); ?>" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        <?php form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" required>
                        <?php form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <div class="">

                                <label for="">
                                    Daftar Akun <a href="<?php echo base_url(); ?>auth/registration">Daftar</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?php echo base_url(); ?>asset/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/plugins/jquery-validation/additional-methods.min.js"></script>



</body>

</html>