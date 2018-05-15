<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
    <title>Loker_Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap/new/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>assets/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dt/datatables.min.css"/>
    <style type="text/css">
        .navbar {
            padding: 0;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="<?php echo base_url() ?>javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="admin"><b><img src="<?php echo base_url() ?>assets/images/loker.png" alt="home" width="120px" height="50px" /></b></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="<?php echo base_url() ?>assets/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="<?php echo base_url() ?>admin" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Beranda</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/perusahaan" class="waves-effect"><i class="fa fa-institution fa-fw" aria-hidden="true"></i><span class="hide-menu">Perusahaan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/jenis_perusahaan" class="waves-effect"><i class="fa fa-navicon fa-fw" aria-hidden="true"></i><span class="hide-menu">Jenis Perusahaan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/member" class="waves-effect"><i class="fa fa-group fa-fw" aria-hidden="true"></i><span class="hide-menu">Member</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/lowongan" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Lowongan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/pendaftar" class="waves-effect"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i><span class="hide-menu">Pendaftar</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
