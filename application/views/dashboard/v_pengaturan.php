<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Profil
            <small>Pengaturan Website</small>
        </h1>
    </section>


    <section class="content">

        <?php foreach ($pengaturan as $p) { ?>
        <form method="post" action="<?= base_url('dashboard/pengaturan_update'); ?>" enctype="multipart/form-data">

            <?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert'] == "sukses") {
						echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Profil telah diupdate!</div>";
					}
				}
			?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Pengaturan Website</h3>
                        </div>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Website</label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Masukkan nama website..." value="<?= $p->nama; ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Singkat Website</label>
                                            <input type="text" name="nama_singkat" class="form-control"
                                                placeholder="Masukkan nama singkat website..."
                                                value="<?= $p->nama_singkat; ?>">
                                            <small>Nama singkat website maksimal 13 karakter</small>
                                            <br />
                                            <?= form_error('nama_singkat', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control"
                                                placeholder="Masukkan deskripsi..." value="<?= $p->deskripsi; ?>">
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Slogan</label>
                                            <input type="text" name="slogan" class="form-control"
                                                placeholder="Masukkan slogan..." value="<?= $p->slogan; ?>">
                                            <?= form_error('slogan', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="number" name="telepon" class="form-control"
                                                placeholder="Masukkan telepon..." value="<?= $p->telepon; ?>">
                                            <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Masukkan email..." value="<?= $p->email; ?>">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="Masukkan alamat..." value="<?= $p->alamat; ?>">
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Link Facebook</label>
                                            <input type="text" name="link_facebook" class="form-control"
                                                placeholder="Masukkan link facebook..."
                                                value="<?= $p->link_facebook; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link Twitter</label>
                                            <input type="text" name="link_twitter" class="form-control"
                                                placeholder="Masukkan link twitter..." value="<?= $p->link_twitter; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link Instagram</label>
                                            <input type="text" name="link_instagram" class="form-control"
                                                placeholder="Masukkan link instagram..."
                                                value="<?= $p->link_instagram; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link Github</label>
                                            <input type="text" name="link_github" class="form-control"
                                                placeholder="Masukkan link github..." value="<?= $p->link_github; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Link LinkedIn</label>
                                            <input type="text" name="link_linkedin" class="form-control"
                                                placeholder="Masukkan link linkedin.."
                                                value="<?= $p->link_linkedin; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label>Logo Website</label>
                                            <input type="file" name="logo" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengubah logo</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Foto Sampul Website</label>
                                            <input type="file" name="foto_sampul" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengubah foto sampul</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Paralax 1</label>
                                            <input type="file" name="paralax_1" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengubah paralax 1</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Paralax 2</label>
                                            <input type="file" name="paralax_2" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengubah paralax 2</small>
                                        </div>

                                        <div class="form-group">
                                            <label>Background Footer</label>
                                            <input type="file" name="bg_footer" class="form-control">
                                            <small>Kosongkan jika tidak ingin mengubah background footer</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-success btn-block" value="Simpan">
                            </div>
                        </div>
                    </div>

                </div>

        </form>
        <?php } ?>

    </section>




</div>