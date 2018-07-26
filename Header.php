<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Member</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url() ?>assets/user/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	
	
	<div id="fh5co-page">
	<?php if($this->session->flashdata('user_loggedin')): ?>
     	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
   	<?php endif; ?>
   	<?php if($this->session->flashdata('login_failed')): ?>
     	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
   	<?php endif; ?>
   	<?php if($this->session->flashdata('user_loggedout')): ?>
     	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
   	<?php endif; ?>
   	<?php if($this->session->flashdata('not_allow')): ?>
     	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_allow').'</p>'; ?>
   	<?php endif; ?>
   	
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<a href="<?php echo base_url() ?>visitor"><img src="<?php echo base_url() ?>assets/images/loker.png" width="100" height="80"></a>
				<nav role="navigation">
					<ul>
						<li><a href="<?php echo base_url() ?>visitor">Beranda</a></li>
						<li class="cta"><a href="<?php echo base_url() ?>login">Login & Register</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<?php if ($this->uri->segment(2)==''): ?>
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
			   	<li style="background-image: url(<?php echo base_url() ?>assets/images/banner.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container">
			   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h2 style="color: black;">Join Us</h2>
			   					<p class="fh5co-lead" style="color: black;">Get your job<i class="icon-heart"></i></p>
			   				</div>
			   			</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
	<?php endif ?>
	