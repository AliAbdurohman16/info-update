<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Artikel
            <small>Manajemen Artikel</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url('dashboard/artikel_tambah'); ?>" class="btn btn-primary">Buat Artikel Baru</a>
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Artikel</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Tanggal</th>
                                    <th>Artikel</th>
                                    <th>Author</th>
                                    <th>Kategori</th>
                                    <th width="10%">Gambar</th>
                                    <th>Status</th>
                                    <th width="13%">OPSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								$no = 1;
								foreach($artikel as $a){
								?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($a->artikel_tanggal)); ?></td>
                                    <td>
                                        <?= $a->artikel_judul; ?>
                                        <br />
                                        <small class="text-muted"><?= base_url() . "" .$a->artikel_slug; ?></small>
                                    </td>
                                    <td><?= $a->pengguna_nama; ?></td>
                                    <td><?= $a->kategori_nama; ?></td>
                                    <td><img width="100%" class="img-responsive"
                                            src="<?= base_url('gambar/artikel/') . $a->artikel_sampul; ?>">
                                    </td>
                                    <td>
                                        <?php
										if ($a->artikel_status=="publish") {
											echo "<span class='label label-success'>Publish</span>";
										} else {
											echo "<span class='label label-danger'>Draft</span>";
										}
										?>
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?= base_url().$a->artikel_slug; ?>"
                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                                        <?php
											// Cek apakah pengguna yang login adalah penulis
											if ($this->session->userdata('level') == "penulis") {
												// Jika penulis, maka cek apakah penulis artikel ini adalah si pengguna atau bukan

                                                if ($this->session->userdata('id') == $a->artikel_author) {
                                         ?>
                                        <a href="<?= base_url('dashboard/artikel_edit/') . $a->artikel_id; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('dashboard/artikel_hapus/') . $a->artikel_id; ?>"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <?php
                                                }
													
											}else {
												// jika yang login adalah admin
														?>
                                        <a href="<?= base_url('dashboard/artikel_edit/') . $a->artikel_id; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('dashboard/artikel_hapus/') . $a->artikel_id; ?>"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <?php }  ?>

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