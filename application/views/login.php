<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>DATABASE ICT-A</title>
  	<link rel="shortcut icon" href="<?php echo base_url('') ?>asset/dist/img/logo.png" type="image/x-icon">
	<!-- <link rel="shortcut icon" href="http://localhost:5774/resources/images/logo_dapodik_circle.png"> -->
	<link href="<?php echo base_url('') ?>asset/db/bootstrap.min.cosmo.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>asset/db/full-slider.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>asset/db/w3.css" rel="stylesheet"> 
	<style type="text/css">
	.containers{border:1px solid #8eaec3;width:500px;margin:auto;padding:10px;background-image:radial-gradient(circle 484px at 49.4% 19%, rgb(71 197 81) 0%, rgb(12 56 22) 100.2%);border-radius:4px;box-shadow:15px 19px 50px #698698cc;border-bottom:5px solid #8d202f;border-top:3px solid #8d202f}
	.box{border:0px solid #000;width:100%;height:100%}
	.box_login{margin:20px;color:white;border:0px solid #fff;content:'';height:100%}body{background:url(resources/images/swirl_pattern.png);color:#111;font-size:100%;padding:40px 0px}
	.ribbon-start,.ribbon,.ribbon-end{background-color:#056fad;background-image:-webkit-gradient(linear, 100% 0%, 0% 100%, from(transparent), color-stop(0.25, transparent), color-stop(0.25, hsla(0, 0%, 0%, .15)), color-stop(0.50, hsla(0, 0%, 0%, .15)), color-stop(0.50, transparent), color-stop(0.75, transparent), color-stop(0.75, hsla(0, 0%, 0%, .15)), to(hsla(0, 0%, 0%, .15)));background-image:-webkit-linear-gradient(right top, transparent 0%, transparent 25%, hsla(0, 0%, 0%, .15) 25%, hsla(0, 0%, 0%, .15) 50%, transparent 50%, transparent 75%, hsla(0, 0%, 0%, .15) 75%, hsla(0, 0%, 0%, .15) 100%);background-image:-moz-linear-gradient(left bottom, transparent 0%, transparent 25%, hsla(0, 0%, 0%, .15) 25%, hsla(0, 0%, 0%, .15) 50%, transparent 50%, transparent 75%, hsla(0, 0%, 0%, .15) 75%, hsla(0, 0%, 0%, .15) 100%);background-image:-ms-linear-gradient(right bottom, transparent 0%, transparent 25%, hsla(0, 0%, 0%, .15) 25%, hsla(0, 0%, 0%, .15) 50%, transparent 50%, transparent 75%, hsla(0, 0%, 0%, .15) 75%, hsla(0, 0%, 0%, .15) 100%);background-image:-o-linear-gradient(right bottom, transparent 0%, transparent 25%, hsla(0, 0%, 0%, .15) 25%, hsla(0, 0%, 0%, .15) 50%, transparent 50%, transparent 75%, hsla(0, 0%, 0%, .15) 75%, hsla(0, 0%, 0%, .15) 100%);background-image:linear-gradient(right bottom, transparent 0%, transparent 25%, hsla(0, 0%, 0%, .15) 25%, hsla(0, 0%, 0%, .15) 50%, transparent 50%, transparent 75%, hsla(0, 0%, 0%, .15) 75%, hsla(0, 0%, 0%, .15) 100%);-webkit-background-size:3px 3px;-moz-background-size:3px 3px;-ms-background-size:3px 3px;-o-background-size:3px 3px;background-size:3px 3px}
	.ribbon-start,.ribbon,.ribbon-end{height:60px;float:left;position:relative;width:75px}
	.ribbon-start,.ribbon-end{overflow:hidden}
	.ribbon-start{-webkit-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 17px 1px 2px hsla(0, 0%, 0%, .4);-moz-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 17px 1px 2px hsla(0, 0%, 0%, .4);box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 17px 1px 2px hsla(0,0%,0%,.25)}
	.ribbon-end{-webkit-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), -17px 1px 2px hsla(0, 0%, 0%, .4);-moz-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), -17px 1px 2px hsla(0, 0%, 0%, .4);box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), -17px 1px 2px hsla(0,0%,0%,.25)}
	.ribbon{margin:0 -36px;top:90px;width:114.8%;z-index:10;-webkit-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 0 2px 5px hsla(0, 0%, 0%, .4);-moz-box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 0 2px 5px hsla(0, 0%, 0%, .4);box-shadow:inset 0 -25px 25px hsla(0, 0%, 0%, .2), inset 0 0 0 2px hsla(0, 0%, 100%, .25), inset 0 0 0 1px hsla(0, 0%, 0%, .75), 0 2px 5px hsla(0,0%,0%,.25)}
	.ribbon:after,.ribbon:before{border-top:25px solid #014266;bottom:-25px;content:'';height:0;position:absolute;width:0}
	.ribbon:after{border-left:25px solid transparent;left:0}
	.ribbon:before{border-right:25px solid transparent;right:0}
	.ribbon-start:after,.ribbon-start:before,.ribbon-end:after,.ribbon-end:before{content:'';height:50px;position:absolute;top:0;width:50px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
	.ribbon-start:after,.ribbon-end:after{background:#a6a6a6}.ribbon-start:after{left:-20px}.ribbon-end:after{right:-20px}.ribbon-start:before,.ribbon-end:before{background:hsla(0,0%,0%,.5)}.ribbon-start:before{left:-19px}.ribbon-end:before{right:-19px}.ribbon ul, .ribbon li{list-style:none;margin:0;padding:0}.ribbon a{color:#f6f6f6;display:block;float:left;font:1em/48px georgia, serif;text-align:center;text-decoration:none;text-shadow:0 1px 1px hsla(0, 0%, 0%, .25);width:100px}.ribbon a:hover, .ribbon a:focus{text-shadow:0 1px 1px hsla(0, 0%, 0%, .25), 0 0 5px hsla(0, 0%, 100%, .5)}.ribbon a:active{position:relative;top:1px}
	.content{background:#f6f6f6;margin:-50px 65px;padding:100px 20px 20px;position:relative;width:340px;z-index:5;-webkit-box-shadow:inset 0 0 0 1px hsla(0, 0%, 0%, .5), inset 0 0 50px hsla(0, 0%, 0%, .2), 0 2px 5px hsla(0, 0%, 0%, .25);-moz-box-shadow:inset 0 0 0 1px hsla(0, 0%, 0%, .5), inset 0 0 50px hsla(0, 0%, 0%, .2), 0 2px 5px hsla(0, 0%, 0%, .25);box-shadow:inset 0 0 0 1px hsla(0, 0%, 0%, .5), inset 0 0 50px hsla(0, 0%, 0%, .2), 0 2px 5px hsla(0,0%,0%,.25)}
	.judul{font-size:28px;color:white;margin-top:5px;width:100%;font-weight:bold;text-align:center}.logo{content:'';height:80px;width:100%;text-align:center;margin-top:-50px}.gap{content:'';height:155px}.form-control{background:#ececec;color:#393939;font-size:14px;border-top:0px solid transparent;border-left:0px solid transparent;border-right:0px solid transparent}input:-webkit-autofill{-webkit-box-shadow:0 0 0px 1000px #333335 inset;-webkit-text-fill-color:#22A6F1 !important}@media screen and (max-width: 570px){.containers{width:100%}.ribbon:before,.ribbon:after{display:none}.ribbon{width:100%;margin:auto}}.progres{display:none;position:absolute;bottom:0%;background:black;width:100%;opacity:0.8;z-index:999999;color:white;margin:auto;text-align:center;padding-top:20px;padding-bottom:20px}.footer{position:fixed;left:0;bottom:0;width:100%;background-color:#000;color:#FFF;text-align:center;display:block}a{color:#3DA7F1;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}a:hover{color:#2e28f6;text-decoration:underline}a:not([href]):not([tabindex]){color:inherit;text-decoration:none}a:not([href]):not([tabindex]):hover,a:not([href]):not([tabindex]):focus{color:inherit;text-decoration:none}a:not([href]):not([tabindex]):focus{outline:0}
	</style>
	<script src="<?php echo base_url('') ?>asset/db/jquery.js.download"></script>
	<script src="<?php echo base_url('') ?>asset/db/bootstrap.min.js.download"></script>
	<script type="text/javascript">
	function cekform()
	{
	  if(!$("#username").val())
	  {
	    alert('maaf username tidak boleh kosong');
	    $("#username").focus();
	    return false;
	  }
	  if(!$("#password").val())
	  {
	    alert('maaf password tidak boleh kosong');
	    $("#password").focus();
	    return false;
	  }
	}
	</script>
</head> 
<body class="login-app">
	<br><br>
	<div class="containers">
		<div class="box">
			<div class="logo"> 
        <img src="<?php echo base_url('') ?>asset/dist/img/logo.png" width="100px"> <br>
        <h4 style="font-weight:bold;color:white;font-size:14px">YAYASAN PONDOK PESANTREN AL AMIEN</h4>
        <h4 style="font-weight:bold;color:white;font-size:24px">MTS - MA - SMP - SMK AL AMIEN</h4>
			</div>
			<div class="ribbon">
				<div class="judul">DATABASE ONLINE</div>
			</div>
			<div class="gap"></div>
			<div class="box_login">
				<form method="post" action="<?php echo base_url();?>page/Proses_log" onSubmit="return cekform();">
					<div class="form-group">
						<div class="col-lg-12"> 
							<input type="username" class="form-control" id="username" name="username" placeholder="Username ..." value="" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12"> 
							<input type="password" class="form-control" id="password" name="password" placeholder="Password ..." value="" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12"> 
							<input type="checkbox" name="rememberme"> 
							<font size="1em">Remember me</font><br>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12" class="center">
							<div class="col-lg-6">
								<input type="submit" class="btn btn-primary login" value="MASUK" style="width:100%">
							</div>
							<div class="col-lg-6">
								<a href="<?php echo base_url();?>page/registrasi" class="btn btn-warning login" style="width:100%">REGISTRASI</a>
							</div><br>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12" class="center"><br>
							<h5 class="text-center">
								<?php echo $this->session->flashdata('pesan'); ?>
								<?php echo $this->session->flashdata('pesan2'); ?>
							</h5>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="progres"> Mohon tunggu beberapa saat ... <br> <br>
		<div class="w3-progress-container w3-light-blue">
			<div class="w3-progressbar w3-blue" style="width:10%"></div>
		</div>
	</div>
	<div class="footer">
<!-- 		<p>Copyright © 2020 
			<a href="https://dapo.kemdikbud.go.id/" target="_blank">Ditjen Paud Dikdasmen</a>, 
			<a href="https://www.kemdikbud.go.id/" target="_blank">Kementerian Pendidikan dan Kebudayaan</a>
		</p> -->
	</div>
</body>
</html>