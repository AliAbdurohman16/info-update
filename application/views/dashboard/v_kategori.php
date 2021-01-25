<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Kategori
            <small>Kategori Artikel</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url('dashboard/kategori_tambah'); ?>" class="btn btn-primary">Buat Kategori Baru</a>
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Kategori</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Kategori</th>
                                    <th>Slug</th>
                                    <th width="10%">OPSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								$no = 1;
								foreach($kategori as $k){
								?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->kategori_nama; ?></td>
                                    <td><?= $k->kategori_slug; ?></td>
                                    <td><a href="<?= base_url('dashboard/kategori_edit/') . $k->kategori_id; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('dashboard/kategori_hapus/') . $k->kategori_id; ?>"
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