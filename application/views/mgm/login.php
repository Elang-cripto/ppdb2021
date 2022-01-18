<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login admin</title>
	<meta name="description" content="Custom Login Form Styling with CSS3" />
	<meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="<?php echo base_url('') ?>asset/dist/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login/css/style.css" />
	<script src="<?php echo base_url(); ?>asset/login/js/modernizr.custom.63321.js"></script>
	<script src="<?php echo base_url(); ?>asset/plugins/sweetalert2/sweetalert211.js"></script>
	<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
	<style>
		@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);

		body {
			background: #563c55 url(<?php echo base_url(); ?>asset/login/images/blurred.jpg) no-repeat center top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
		}

		.container>header h1,
		.container>header h2 {
			color: black;
			text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
		}
	</style>
</head>

<body>
	<div class="container">
		<header>
			<h1> <strong> LOGIN ADMIN - PANITIA - MGM</strong> </h1>
			<h1>PPDB 2022</h1>
			<h2>MTS - MA - SMP - SMK AL AMIEN</h2>
		</header>
		<section class="main">
			<form class="form-3" method="post" action="<?php echo base_url(); ?>auth/cek_admin">
				<p class="clearfix">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" placeholder="Username" required>
				</p>
				<p class="clearfix">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Password" required>
				</p>
				<p class="clearfix">
					<input type="checkbox" name="remember" id="remember">
					<label for="remember">Remember me</label>
				</p>
				<p class="clearfix">
					<input type="submit" name="submit" value="Sign in">
				</p>
			</form>​
		</section>
	</div>

	<?php
	$this->load->view('theme/ft_alert');
	?>
</body>

</html>