<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengguna
            <small>Edit Pengguna</small>
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

                        <?php foreach ($pengguna as $p) { ?>
                        <form method="post" action="<?= base_url('dashboard/pengguna_update'); ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="id" value="<?php echo $p->pengguna_id; ?>">
                                    <input type="nama" name="nama" class="form-control"
                                        value="<?php echo $p->pengguna_nama; ?>"
                                        placeholder="Masukkan nama pengguna...">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo $p->pengguna_email; ?>"
                                        placeholder="Masukkan email pengguna...">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?php echo $p->pengguna_username; ?>"
                                        placeholder="Masukkan username pengguna...">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <br />
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan password pengguna...">
                                    <small>Kosongkan jika tidak ingin mengubah password</small>
                                </div>

                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">- Pilih Level -</option>
                                        <option <?php if($p->pengguna_level == "admin"){ echo "selected='selected'";} ?>
                                            value="admin">Admin</option>
                                        <option
                                            <?php if($p->pengguna_level == "penulis"){ echo "selected='selected'";} ?>
                                            value="penulis">Penulis</option>
                                    </select>
                                    <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">- Pilih Status -</option>
                                        <option <?php if($p->pengguna_status == "1"){ echo "selected='selected'";} ?>
                                            value="1">Aktif</option>
                                        <option
                                            <?php if($p->pengguna_status == "0"){ echo "selected='selected'";} ?>value="0">
                                            Non Aktif</option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
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
