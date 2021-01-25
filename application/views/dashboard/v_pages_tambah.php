<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Halaman
            <small>Tulis Halaman Baru</small>
        </h1>
    </section>

    <section class="content">

        <a href="<?= base_url('dashboard/pages'); ?>" class="btn btn-primary">Kembali</a>
        <br />
        <br />

        <form method="post" action="<?= base_url('dashboard/pages_aksi'); ?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-12">

                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Judul Halaman</label>
                                    <input type="text" name="judul" class="form-control"
                                        placeholder="Masukkan judul Halaman..." value="<?= set_value('judul'); ?>">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Konten Halaman</label>
                                    <br />
                                    <?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
                                    <br />
                                    <textarea name="konten" class="form-control"
                                        id="editor"><?= set_value('konten'); ?></textarea>
                                </div>
                            </div>
                            <input type="submit" name="status" value="Publish" class="btn btn-success btn-block">

                        </div>
                    </div>

                </div>
            </div>

        </form>

    </section>

</div>
