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
<script src="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert211.js"></script>

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page bg-primary">
    <div class="register-box">


        <div class="card">

            <div class="card-body register-card-body card text-light bg-light mb-3">
                <div class="register-logo card-header">
                    <img class="" style="max-width: 30%;" src="<?php echo base_url(); ?>asset/frontend/image/LOGO YAYASAN.png">
                    <div class="register-logo">
                        <h3><b style="color: black;">FORM REGISTRASI PESERTA DIDIK BARU</b></h3>
                        <H6 style=" color: black;"> Di isi Dengan HURUF BESAR/KAPITAL, <br> kecuali E-mail</H6>
                    </div>
                </div>
                <form name="formregister" class="user" method="post" action="<?php echo base_url('auth/register'); ?>" onsubmit="return cekform()">
                    <div class="input-group mb-3">
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK Sesuai KK">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Sesuai IJAZAH">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor WA Aktif">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select type="text" name="par" id="par" class="form-control select2">
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
                <a href="../auth" class="text-center">Kembali ke Log In</a>
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
        function cekform() {
            var number = /^[0-9]+$/;
            var huruf = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
            var hp = document.forms["formregister"]["telp"];
            var nik = document.forms["formregister"]["nik"];
            var nama = document.forms["formregister"]["nama"];

            if (nik.value == "") {
                Swal.fire({
                    title: 'Gagal',
                    text: 'NIK tidak Boleh Kosong',
                    icon: 'error',
                })
                nik.focus();
                return false;
            }
            if (nik.value.length != 16) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'NIK Tidak Valid',
                    icon: 'error',
                })
                nik.focus();
                return false;
            }
            if (!nik.value.match(number)) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'NIK Wajib Angka',
                    icon: 'error',
                })
                nik.focus();
                return false;
            }
            if (nama.value == "") {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nama Tidak Boleh Kosong',
                    icon: 'error',
                })
                nama.focus();
                return false;
            }
            if (nama.value.length < 3) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nama Terlalu Pendek',
                    icon: 'error',
                })
                nama.focus();
                return false;
            }
            if (!nama.value.match(huruf)) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'NAMA Wajib Huruf',
                    icon: 'error',
                })
                nama.focus();
                return false;
            }
            if (document.forms["formregister"]["telp"].value == "") {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nomor Telepon Tidak Boleh Kosong',
                    icon: 'error',
                })
                document.forms["formregister"]["telp"].focus();
                return false;
            }
            if (hp.value.length < 10 || hp.value.length > 13) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nomor Telepon Tidak Valid',
                    icon: 'error',
                })
                hp.focus();
                return false;
            }
            if (!hp.value.match(number)) {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Nomor Telepon Wajib Angka',
                    icon: 'error',
                })
                hp.focus();
                return false;
            }
            if (document.forms["formregister"]["par"].value == "") {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Wajib Pilih 1 Lembaga Tujuan',
                    icon: 'error',
                })
                document.forms["formregister"]["par"].focus();
                return false;
            }
        }
    </script>
    <?php $this->load->view('theme/ft_alert');    ?>
</body>

</html>