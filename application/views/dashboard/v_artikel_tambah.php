<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Artikel
            <small>Tulis Artikel Baru</small>
        </h1>
    </section>

    <section class="content">

        <a href="<?= base_url('dashboard/artikel'); ?>" class="btn btn-primary">Kembali</a>
        <br />
        <br />

        <form method="post" action="<?= base_url('dashboard/artikel_aksi'); ?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-9">

                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control"
                                        placeholder="Masukkan judul artikel..." value="<?= set_value('judul'); ?>">
                                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Konten</label>
                                    <br />
                                    <?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
                                    <textarea name="konten" class="form-control"
                                        id="editor"><?= set_value('konten'); ?></textarea>
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
                                            <?php if (set_value('kategori') == $k->kategori_id) { echo "selected='selected'"; } ?>
                                            value="<?= $k->kategori_id; ?>"><?= $k->kategori_nama; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <br />
                                <br />

                                <div class="form-group">
                                    <label>Gambar Sampul</label>
                                    <input type="file" name="sampul" class="form-control">

                                    <?php
									if (isset($gambar_error)) {
										echo $gambar_error;
									} 
									?>
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

    </section>

</div>