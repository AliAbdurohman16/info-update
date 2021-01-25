<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Profil
            <small>Update Profil Pengguna</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-8">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update Profil</h3>
                    </div>
                    <div class="box-body">

                        <?php
						if (isset($_GET['alert'])) {
							if ($_GET['alert'] == "sukses") {
								echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Profil telah diupdate!</div>";
							}
						}
						?>

                        <?php foreach ($profil as $p) { ?>
                        <form method="post" action="<?= base_url('dashboard/profil_update'); ?>"
                            enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan nama baru anda..." value="<?= $p->pengguna_nama; ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Masukkan username baru anda..."
                                            value="<?= $p->pengguna_username; ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Masukkan email baru anda..."
                                            value="<?= $p->pengguna_email; ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Foto Profil</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="<?= base_url('gambar/profil/') . $p->pengguna_foto; ?>"
                                                    class="img-thumbnail col-lg-10">
                                            </div>

                                            <div class="col-sm-8">
                                                <input type="file" name="foto" class="form-control">
                                                <small>Kosongkan jika tidak ingin mengubah foto profil</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>

    </section>


</div>
