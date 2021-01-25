<!--/ Intro Skew Star /-->
<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url('gambar/bg-image/') . $pengaturan->foto_sampul; ?>)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4" data-aos="zoom-in">Artikel Blog</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item" data-aos="zoom-in-down">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item" data-aos="zoom-in-up">
                        <a href="<?= base_url('blog'); ?>">Blog</a>
                    </li>
                    <li class="breadcrumb-item active" data-aos="zoom-in-down">Artikel</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<!--/ Section Blog-Single Star -->

<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8" data-aos="zoom-in">

                <?php foreach($artikel as $a) { ?>
                <div class="post-box">
                    <div class="post-thumb" data-aos="zoom-in-up">
                        <?php if ($a->artikel_sampul != "") { ?>
                        <img src="<?= base_url('gambar/artikel/') . $a->artikel_sampul; ?>"
                            alt="<?= $a->artikel_judul; ?>" class="img-fluid">
                        <?php } ?>
                    </div>
                    <div class="post-meta" data-aos="zoom-in-up">
                        <h1 class="article-title">
                            <a href="<?= base_url() . $a->artikel_slug; ?>"><?= $a->artikel_judul; ?></a>
                        </h1>
                        <ul>
                            <li data-aos="zoom-in-up">
                                <span class="ion-ios-person"></span>
                                <a href="#"><?= $a->pengguna_nama; ?></a>
                            </li>
                            <li data-aos="zoom-in-up">
                                <span class="ion-pricetag"></span>
                                <a href="#"><?= $a->kategori_nama; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php } ?>

                <!-- Tombol halaman pagination -->
                <?= $this->pagination->create_links(); ?>

            </div>

            <div class="col-md-4" data-aos="zoom-in">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
    </div>
</section>