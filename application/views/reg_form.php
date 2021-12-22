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
    <h2><b>FORM REGISTRASI</b></h2>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <!-- <p class="login-box-msg">Registrasi user baru</p> -->

      <form role="form" id="cekform" method="post"  action="<?php echo base_url(); ?>page/savereg" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Guru" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select type="text" name="jabatan" id="jabatan" class="form-control select2" onChange="opsi(this)" required>
              <option value="">-- Pilih Jabatan --</option>
              <option value="guru">Guru</option>
              <option value="walikelas">Wali Kelas</option>
              <option value="tatausaha">Tata Usaha</option>
              <option value="headmaster">Kepala Sekolah</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select type="text" name="par" id="par" class="form-control select2" required>
              <option value="">-- Pilih Lembaga --</option>
              <option value="mts">MTs Al Amien</option>
              <option value="ma">MA Al Amien</option>
              <option value="smp">SMPS Plus Al Amien</option>
              <option value="smk">SMKS Al Amien</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" id="kelas" hidden>
            <input type="text" name="kelas"  class="form-control" placeholder="Kelas">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" required>
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
          
          <div class="form-group">
            <div class="input-group mb-3">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" name="password" id="exampleInputPassword1" class="form-control" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

        
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
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

<script type="text/javascript">
  function opsi(value){
     var st = $("#jabatan").val();
     if(st == "walikelas"){
      document.getElementById("kelas").hidden = false;
      document.getElementById("kelas").required = true;
     } else {
      document.getElementById("kelas").hidden = true;
      document.getElementById("kelas").required = false;
      document.getElementById("kelas").value = "-";
     }
  }

</script>

<script>
    $('#cekform').validate({
      rules: {
        email: {
            required: true,
            email: true,
        },
        username: {
            required: true,
            minlength: 6
        },
        password: {
            required: true,
            minlength: 6
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
        username: {
          required: "Username wajib di isi",
          minlength: "Username minimal 6 Digit tanpa spasi"
        },
        password: {
          required: "Password wajib di isi",
          minlength: "Password minimal 6 karakter"
        },
        terms: "Centang dulu lah"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
</script>

</body>
</html>
