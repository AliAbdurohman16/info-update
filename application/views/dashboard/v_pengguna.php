<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pengguna
            <small>Pengguna Website</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url('dashboard/Pengguna_tambah'); ?>" class="btn btn-primary">Buat Pengguna Baru</a>
                <br />
                <br />

                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == "sukses") {
                        echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pengguna Telah ditambahkan!</div>";
                    }
                } 
				?>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pengguna</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th width="10%">foto</th>
                                    <th width="8%">OPSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								$no = 1;
								foreach($pengguna as $p){
								?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->pengguna_nama; ?></td>
                                    <td><?= $p->pengguna_email; ?></td>
                                    <td><?= $p->pengguna_username; ?></td>
                                    <td><?= $p->pengguna_level; ?></td>
                                    <td>
                                        <?php
										if ($p->pengguna_status == 1) {
											echo "Aktif";
										} else {
											echo "Non Aktif";
										}
										?>
                                    </td>
                                    <td><img width="100%" class="img-responsive"
                                            src="<?= base_url('gambar/profil/') . $p->pengguna_foto; ?>">
                                    </td>
                                    <td><a href="<?= base_url('dashboard/pengguna_edit/') . $p->pengguna_id; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('dashboard/pengguna_hapus/') . $p->pengguna_id; ?>"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>


</div>