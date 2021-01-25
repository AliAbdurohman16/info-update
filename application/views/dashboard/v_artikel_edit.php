<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Artikel
            <small>Edit Artikel</small>
        </h1>
    </section>

    <section class="content">

        <a href="<?= base_url('dashboard/artikel'); ?>" class="btn btn-primary">Kembali</a>
        <br />
        <br />

        <?php foreach ($artikel as $a) { ?>
        <form method="post" action="<?= base_url('dashboard/artikel_update'); ?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-9">

                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Judul Artikel</label>

                                    <input type="hidden" name="id" value="<?= $a->artikel_id; ?>">

                                    <input type="text" name="judul" class="form-control"
                                        placeholder="Masukkan judul artikel..." value="<?= $a->artikel_judul; ?>">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Konten Artikel</label>
                                    <br />
                                    <?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
                                    <textarea name="konten" class="form-control"
                                        id="editor"><?= $a->artikel_konten; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <option value="">- Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) { ?>
                                        <option
                                            <?php if ($a->artikel_kategori == $k->kategori_id) { echo "selected='selected'";} ?>
                                            value="<?= $k->kategori_id; ?>"><?= $k->kategori_nama; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <br />
                                <br />

                                <div class="form-group">
                                    <label>Gambar Sampul</label>

                                    <img src="<?= base_url('gambar/artikel/') . $a->artikel_sampul; ?>"
                                        class="img-thumbnail">

                                    <br />

                                    <input type="file" name="sampul" class="form-control">

                                    <br />

                                    <?= form_error('sampul', '<small class="text-danger">', '</small>'); ?>

                                    <br />
                                    <br />

                                    <input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
                                    <input type="submit" name="status" value="Publish"
                                        class="btn btn-success btn-block">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
        <?php } ?>

    </section>

</div>
