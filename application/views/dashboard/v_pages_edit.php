<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pages
            <small>Edit Halaman</small>
        </h1>
    </section>

    <section class="content">

        <a href="<?= base_url('dashboard/pages'); ?>" class="btn btn-primary">Kembali</a>
        <br />
        <br />

        <?php foreach ($halaman as $h) { ?>
        <form method="post" action="<?= base_url('dashboard/pages_update'); ?>">

            <div class="row">
                <div class="col-lg-12">

                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Judul Halaman</label>

                                    <input type="hidden" name="id" value="<?= $h->halaman_id; ?>">

                                    <input type="text" name="judul" class="form-control"
                                        placeholder="Masukkan judul halaman..." value="<?= $h->halaman_judul; ?>">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <br />
                                    <?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
                                    <textarea name="konten" class="form-control"
                                        id="editor"><?= $h->halaman_konten; ?></textarea>
                                </div>
                            </div>

                            <input type="submit" name="status" value="Publish" class="btn btn-success btn-block">

                        </div>
                    </div>
                </div>
            </div>

        </form>
        <?php } ?>

    </section>

</div>
