<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Warehouse | <?= $titlePage ?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/demo/default/media/img/logo/favicon.ico" />
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Open+Sans:300,300i,400,400i,600,600i,700,700i","Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
          var siteUrl = "<?php echo base_url(); ?>";
        </script>
        <!--end::Web font -->
        <!--begin::Base Styles -->
        <link href="<?= base_url(); ?>vendor/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>vendor/css/template.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>vendor/css/responsive.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
	<body>
        <div class="wrapper-page">
            <header class="s-topbar">
                <div class="s-topbar__user">
                    <span>
                       <i class="fa fa-user-circle-o"></i> <?= $admin_login->name; ?> 
                    </span>
                </div>
                <div class="s-topbar__logout">
                    <a href="<?= base_url('Login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </header>
            <div class="wrapper-content">