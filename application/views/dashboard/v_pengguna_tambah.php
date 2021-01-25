<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengguna
            <small>Tambah Pengguna</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-6">
                <a href="<?= base_url('dashboard/pengguna'); ?>" class="btn btn-sm btn-primary">Kembali</a>
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pengguna</h3>
                    </div>
                    <div class="box-body">

                        <?php
						if (isset($_GET['alert'])) {
							if ($_GET['alert'] == "gagal") {
								echo "<div class='alert alert-danger'>Pengguna Gagal ditambahkan!</div>";
							}
						}
						?>

                        <form method="post" action="<?= base_url('dashboard/pengguna_aksi'); ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="nama" name="nama" class="form-control"
                                        placeholder="Masukkan nama pengguna...">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Masukkan email pengguna...">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="Masukkan username pengguna...">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <br />
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan password pengguna...">
                                    <small>Password minimal 5 karakter</small>
                                    <br />
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">- Pilih Level -</option>
                                        <option value="admin">Admin</option>
                                        <option value="penulis">Penulis</option>
                                    </select>
                                    <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">- Pilih Status -</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="box-footer">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>

</div>
