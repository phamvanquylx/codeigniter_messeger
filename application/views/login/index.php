<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>
		Messeger | <?= $titlePage ?>
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Css Base -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="<?= base_url() ?>vendor/css/template.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>vendor/css/responsive.css" rel="stylesheet" type="text/css" />
	<!-- end -->
</head>
<body class="<?= $titlePage ?>">
	<div class="container m-login">
		<div class="row">
			<div class="col-xs-12 col-sm-4"></div>
			<div class="col-xs-12 col-sm-4">
				<div class="m-wapper">
					<div class="m-login__logo text-center">
						<h1>
							<a href="#">
								<img src="<?= base_url() ?>vendor/images/logo.png" alt="">
							</a>
						</h1>
						<h2>Sign In To Admin</h2>
					</div>
					<div class="m-login__form">
						<form action="" method="post" class="text-center">
							<?php if(validation_errors() !== '') { ?>
								<div class="s-alert s-alert--air">
									<?php echo validation_errors(); ?>
								</div>
							<?php } ?>
							<?php if(!empty($this->session->flashdata('login-error'))) { ?>
								<div class="s-alert s-alert-danger">
									<?php echo $this->session->flashdata('login-error'); ?>
								</div>
							<?php } ?>							
							<input type="text" id="m-login__form__account" class="border" name="account" placeholder="Account">
							<input type="password" id="m-login__form__password" class="border" name="password" placeholder="Password">
							<div class="m-form__sub">
								<label class="m-left">
									<input type="checkbox" name="remember">
									Remember me
									<span></span>
								</label>
								<div class="m-right">
									<a href="<?= base_url(); ?>Create_account" id="m_login_forget_password" class="m-link">
										Create Account
									</a>
								</div>
							</div>	
							<button id="m-login__form__submit" class="border">Sign In</button>
						</form>
					</div>
					<div class="m-login__copyright text-center">
						<span><?= date('Y'); ?> © Version 1.0</span>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4"></div>
		</div>
	</div>
	<!-- Javascript Base -->
	<script src="<?= base_url() ?>vendor/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>vendor/js/custom.js" type="text/javascript"></script>
	<!-- end -->
</body>
</html>