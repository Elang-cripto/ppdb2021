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

<body class="hold-transition register-page bg-primary">
    <div class="register-box">
        <div class="register-logo">
            <h2><b>FORM REGISTRASI PESERTA DIDIK BARU</b></h2>
            <h3><b>MTs AL AMIEN</b></h3>
            <h6>Mohon DI Isi Dengan HURUF BESAR/KAPITAL,</h6>
            <h6>Kecuali Email</h6>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <!-- <p class="login-box-msg">Registrasi user baru</p> -->

                <form class="user" method="post" action="<?php echo base_url('auth/register'); ?>" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK Sesuai KK" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Sesuai KK" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor WA Aktif" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select type="text" name="par" id="par" class="form-control select2" required>
                            <option value="">-- Pilih Lembaga --</option>
                            <option value="MTS">MTs Al Amien</option>
                            <option value="MA">MA Al Amien</option>
                            <option value="SMP">SMPS Plus Al Amien</option>
                            <option value="SMK">SMKS Al Amien</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                </form>
                <br>
                <a href="../" class="text-center">Kembali ke Log In</a>
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

    <script>
        $('#cekform').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                nama: {
                    required: true,
                    minlength: 6
                },
                telp: {
                    required: true,
                    minlength: 11
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                nama: {
                    required: "Nama wajib di isi",
                    minlength: "Nama Sesuai KK"
                },
                telp: {
                    required: "Telpon Wajib di isi",
                    minlength: "Nomor harus min 11 karakter"
                },
                terms: "Centang dulu lah"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>

</body>

</html>