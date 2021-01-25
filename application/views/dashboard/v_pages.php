<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pages
            <small>Manajemen Halaman Website</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">

                <a href="<?= base_url('dashboard/pages_tambah'); ?>" class="btn btn-primary">Buat Halaman Baru</a>
                <br />
                <br />

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Halaman</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Judul Halaman</th>
                                    <th>URL SLug</th>
                                    <th width="15%">OPSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								$no = 1;
								foreach($halaman as $h){
								?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $h->halaman_judul; ?></td>
                                    <td><?= base_url() . "page/".$h->halaman_slug; ?></td>
                                    <td>
                                        <a target="_blank" href="<?= base_url() . "page/".$h->halaman_slug; ?>"
                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('dashboard/pages_edit/') . $h->halaman_id; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="<?= base_url('dashboard/pages_hapus/') . $h->halaman_id; ?>"
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