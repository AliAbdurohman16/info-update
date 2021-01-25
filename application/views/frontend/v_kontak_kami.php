<!--/ Intro Skew Star /-->
<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url('gambar/bg-image/') . $pengaturan->foto_sampul; ?>)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4" data-aos="zoom-in">Kontak Kami</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item" data-aos="zoom-in-down">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" data-aos="zoom-in-up">Kontak Kami</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<!--/ Section Blog-Single Star -->

<div class="container">
    <div class="row">
        <div class="col-sm-12" data-aos="zoom-in">
            <div class="contact-mf">
                <div id="contact" class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6" data-aos="zoom-out-up">
                            <div class="title-box-2">
                                <h5 class="title-left">
                                    Hubungi Kami
                                </h5>
                            </div>
                            <div>
                                <form action="<?= base_url('welcome/pesan_aksi'); ?>" method="post">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama"
                                                    required>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email" required>
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subjek"
                                                    placeholder="Subjek" required>
                                                <?= form_error('subjek', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan"
                                                    required></textarea>
                                                <?= form_error('pesan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="button button-a button-big button-rouded">Kirim
                                                Pesan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-out-down">
                            <div class="title-box-2 pt-4 pt-md-0">
                                <h5 class="title-left">
                                    Kontak Kami
                                </h5>
                            </div>
                            <div class="more-info">
                                <ul class="list-ico">
                                    <li><span class="ion-ios-location"></span> <?= $pengaturan->alamat; ?> </li>
                                    <li><span class="ion-ios-telephone"></span> <?= $pengaturan->telepon; ?> </li>
                                    <li><span class="ion-email"></span> <?= $pengaturan->email; ?> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>