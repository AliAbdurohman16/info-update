<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ganti Password
            <small>Ubah password anda</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-6">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ganti Password</h3>
                    </div>
                    <div class="box-body">

                        <?php
						if (isset($_GET['alert'])) {
							if ($_GET['alert'] == "sukses") {
								echo "<div class='alert alert-success'>Password telah diubah!</div>";
							} else if ($_GET['alert'] == "gagal") {
								echo "<div class='alert alert-danger'>Maaf, Passwod lama yang anda masukkan salah!</div>";
							}
						}
						?>

                        <form method="post" action="<?= base_url('dashboard/ganti_password_aksi'); ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="password_lama" class="form-control"
                                        placeholder="Masukkan password lama anda...">
                                    <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <br />
                                    <input type="password" name="password_baru" class="form-control"
                                        placeholder="Masukkan password baru...">
                                    <small>Password minimal 5 karakter</small>
                                    <br />
                                    <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="konfirmasi_password" class="form-control"
                                        placeholder="Ulangi password baru...">
                                    <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Ganti Password">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>