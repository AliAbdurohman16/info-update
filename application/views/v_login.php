<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
		$user = $this->db->query("SELECT * FROM pengaturan")->row();
	?>
    <title><?= $user->nama; ?> | Log in</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <?php
				$user = $this->db->query("SELECT * FROM pengaturan")->row();
			?>
            <img src="<?= base_url('gambar/website/' . $user->logo); ?>" width="30%" alt="logo">
        </div>
        <!-- /.login-logo -->

        <?php
		if (isset($_GET['alert'])) {
			if ($_GET['alert'] == "gagal") {
				echo "<div class='alert alert-danger font-weight-bold text-center'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Maaf! Username & Password salah!.</div>";
			}else if ($_GET['alert'] == "belum_login") {
				echo "<div class='alert alert-danger font-weight-bold text-center'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Anda harus login terlebih dahulu!.</div>";
			}else if ($_GET['alert'] == "logout") {
				echo "<div class='alert alert-success font-weight-bold text-center'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Anda telah logout!.</div>";
			}
		}
		?>

        <div class="login-box-body">
            <p class="login-box-msg">Sign in</p>

            <form action="<?= base_url('login/aksi'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/'); ?>plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>