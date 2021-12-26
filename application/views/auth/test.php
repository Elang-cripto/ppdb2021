<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- <link rel="stylesheet" href="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert2.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('') ?>asset/login/dist/sweetalert2.min.css">
    
</head>
<body>
    
    <button type="button" id="tombol" onclick=" Swal.fire('Alhamdulillah', 'Njajal metu ora', 'success')">test</button>
     <button type="button" id="tombol" onclick=" Swal('Alhamdulillah', 'Njajal metu ora', 'success')">test2</button>

    <script src="<?php echo base_url('') ?>asset/login/dist/sweetalert2.min.js"></script>
    <!-- <script src="<?php echo base_url('') ?>asset/plugins/sweetalert2/sweetalert2.min.js"></script> -->

</body>
</html>