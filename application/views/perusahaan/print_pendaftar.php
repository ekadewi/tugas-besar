<?php
    if ($this->session->userdata('level') != 2) {
        redirect('login');
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Flew &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

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
	<!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dt/datatables.min.css"/>

	<!-- Modernizr JS -->
	<script src="<?php echo base_url() ?>assets/user/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div class="container text-center">
		<h1>Laporan Pendaftar <?php echo $print[0]->status_daftar ?></h1>
		<h3>Perusahaan <?php echo $print[0]->nama_perusahaan ?></h3>
	</div>
	<br><br><br>
	<br><br><br>
	<div class="container-fluid">
		<div class="col-md-12">
			<table class="table table-bordered" id="myTable">
				<thead>
					<tr>
						<th>Tanggal Daftar</th>
						<th>Lowongan</th>
						<th>Nama</th>
						<th>CV</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($print as $key): ?>
					<tr>
						<td><?php echo $key->tanggal_daftar ?></td>
						<td><?php echo $key->lowongan ?></td>
						<td><?php echo $key->nama_member ?></td>
						<td><a href="<?php echo base_url('upload/cv/'.$key->cv) ?>" target="_blank"><?php echo $key->cv ?></a></td>
						<td><?php echo $key->status_daftar ?></td>
					</tr>
				<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</footer>
	<script src="<?php echo base_url() ?>assets/user/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url() ?>assets/user/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url() ?>assets/user/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url() ?>assets/user/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?php echo base_url() ?>assets/user/js/jquery.flexslider-min.js"></script>
	
	<!-- MAIN JS -->
	<script src="<?php echo base_url() ?>assets/user/js/main.js"></script>

	<!-- DataTables -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/dt/datatables.min.js"></script>

	<script type="text/javascript">
        $(document).ready( function () {
                $('#myTable').DataTable({
                    "bInfo" : false
                });
            } );
    </script>
	</body>
</html>