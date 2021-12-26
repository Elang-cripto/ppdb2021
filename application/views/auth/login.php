<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Selamat Datang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="shortcut icon" href="<?php echo base_url('') ?>asset/dist/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/login/dist/style.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert2.min.css">
  
</head>
<body>
<!-- partial:index.partial.html -->
<div class="scroll-down">SCROLL DOWN
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
  <path d="M16 3C8.832031 3 3 8.832031 3 16s5.832031 13 13 13 13-5.832031 13-13S23.167969 3 16 3zm0 2c6.085938 0 11 4.914063 11 11 0 6.085938-4.914062 11-11 11-6.085937 0-11-4.914062-11-11C5 9.914063 9.914063 5 16 5zm-1 4v10.28125l-4-4-1.40625 1.4375L16 23.125l6.40625-6.40625L21 15.28125l-4 4V9z"/> 
</svg></div>
<div class="container"></div>
<div class="modal">
  <div class="modal-container">
    <div class="modal-left">
      <h1 class="modal-title">Selamat Datang</h1>
      <p class="modal-desc">Peserta Didik Baru <br>Tahun Pelajaran 2022-2023</p>
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
      
      <form method="post" action="<?php echo base_url();?>auth/proses" onSubmit="return cekform();">
        <div class="input-block">
          <label for="email" class="input-label">Email</label>
          <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="input-block">
          <label for="password" class="input-label">Password</label>
          <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="modal-buttons">
          <a href="" class="">Forgot your password?</a>
          <button type="submit" class="input-button">Login</button>
          <button type="button" class="input-button" onclick=" Swal.fire(<?php echo $this->session->flashdata('pesan'); ?>)">test</button>
        </div>
      </form>
      <p class="sign-up">Don't have an account? <a href="<?php echo base_url(); ?>auth/registration">Sign up now</a></p>
    </div>
    <div class="modal-right">
      <img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80" alt="">
    </div>
    <button class="icon-button close-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
</svg>
      </button>
  </div>
  <button class="modal-button">Click here to login</button>
</div>
<!-- partial -->

    <script type="text/javascript">
      <?php if ($this->session->flashdata('pesan')): ?>
          Swal.fire(<?php echo $this->session->flashdata('pesan'); ?>)      
      <?php endif ?>
    </script>
    
    <script src="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/login/dist/script.js"></script>

</body>
</html>