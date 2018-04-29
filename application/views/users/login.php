<!DOCTYPE HTML>
<html>
<head>
<title>Farmer App</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url() ;?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url() ;?>assets/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="<?php echo base_url() ;?>assets/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/jquery-ui.css">
<!-- jQuery -->
<script src="<?php echo base_url() ;?>assets/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url() ;?>assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head>
<body>
	<div class="main-wthree fc-green">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>

		<?php if(validation_errors()){ ?>
<div class="alert alert-danger"><?php echo validation_errors(); ?></div>
<?php } ?>


	<!-- flash message loggin failed-->
			<?php if($this->session->flashdata('login_failed')){?>
			<p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed') ;?></p>

			<?php } ?>


<!--end flash message -->

		<form action="login" method="post">
			<div class="username">
				<span class="username">Email:</span>
				<input type="email" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<!-- <div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">Remember me<br>
				<a href="#">Forgot Password</a><br>
			</div> -->
			<div class="login-w3">
					<input type="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="<?php echo base_url() ;?>users/register">Register</a>
				</div>

				<div class="footer">
					<p>&copy; <?php echo date('Y'); ?> Farmcrowdy. All Rights Reserved</a></p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>
