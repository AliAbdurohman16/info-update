<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
		$user = $this->db->query("SELECT * FROM pengaturan")->row();
	?>
    <title><?= $user->nama; ?> | Dashboard</title>
    <!-- Favicons -->
    <link href="<?php echo base_url('/gambar/website/' . $user->logo); ?>" rel="icon">
    <link href="<?php echo base_url('/gambar/website/' . $user->logo); ?>" rel="apple-touch-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/summernote/summernote-bs4.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <sc src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></sc>
  <sc src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></sc>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <?php
					$user = $this->db->query("SELECT * FROM pengaturan")->row();
				?>
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?= base_url('gambar/website/' . $user->logo); ?>" alt="logo"
                        width="70%"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="<?= base_url('gambar/website/' . $user->logo); ?>" alt="logo"
                        width="50px" class="mr-2"> <b><?= $user->nama_singkat; ?></b> </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php
									$id_user = $this->session->userdata('id');
									$user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id = '$id_user'")->row();
								?>
                                <img src="<?php echo base_url('gambar/profil/' . $user->pengguna_foto); ?>"
                                    class="user-image" alt="User Image">
                                <span class="hidden-xs">HAK AKSES :
                                    <b><?= $this->session->userdata('level'); ?></b></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <?php
										$id_user = $this->session->userdata('id');
										$user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id = '$id_user'")->row();
									?>
                                    <img src="<?= base_url('gambar/profil/' . $user->pengguna_foto); ?>"
                                        class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->session->userdata('username'); ?>
                                        <small>Hak akses:
                                            <?= $this->session->userdata('level'); ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('dashboard/profil'); ?>"
                                            class="btn btn-default btn-flat">Profil</a>

                                    </div>

                                    <div class="pull-right">
                                        <a href="<?= base_url('dashboard/keluar'); ?>"
                                            class="btn btn-default btn-flat">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">

                    <div class="pull-left image">
                        <?php
							$id_user = $this->session->userdata('id');
							$user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id = '$id_user'")->row();
						?>
                        <img src="<?= base_url('gambar/profil/' . $user->pengguna_foto); ?>" class="img-circle"
                            alt="User Image">
                    </div>

                    <div class="pull-left info">

                        <?php
							$id_user = $this->session->userdata('id');
							$user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id = '$id_user'")->row();
						?>

                        <p><?= $user->pengguna_nama; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>

                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url('dashboard'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php 
                    if ($this->session->userdata('level') == "admin") {
                        ?>
                    <li>
                        <a target="_blank" href="<?= base_url('welcome/index'); ?>">
                            <i class="fa fa-eye"></i>
                            <span>Lihat Web Anda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/kategori'); ?>">
                            <i class="fa fa-th"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('dashboard/artikel'); ?>">
                            <i class="fa fa-pencil"></i>
                            <span>Artikel</span>
                        </a>
                    </li>
                    <?php 
                    if ($this->session->userdata('level') == "admin") {
                        ?>
                    <li>
                        <a href="<?= base_url('dashboard/pages'); ?>">
                            <i class="fa fa-files-o"></i>
                            <span>Pages</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/pesan'); ?>">
                            <i class="fa fa-envelope-o"></i>
                            <span>Pesan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/pengguna'); ?>">
                            <i class="fa fa-users"></i>
                            <span>Pengguna & Hak Akses</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/pengaturan'); ?>">
                            <i class="fa fa-gears"></i>
                            <span>Pengaturan Website</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('dashboard/profil'); ?>">
                            <i class="fa fa-user"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/ganti_password'); ?>">
                            <i class="fa fa-lock"></i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/keluar'); ?>">
                            <i class="fa fa-share"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>