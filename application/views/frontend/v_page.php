<!--/ Intro Skew Star /-->
<div class="intro intro-single route bg-image"
    style="background-image: url(<?= base_url('gambar/bg-image/') . $pengaturan->foto_sampul; ?>)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <h2 class="intro-title mb-4" data-aos="zoom-in">Halaman</h2>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item" data-aos="zoom-in-down">
                        <a href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" data-aos="zoom-in-up">Halaman</li>
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
            <div class="col-md-12" data-aos="zoom-out">

                <?php if (count($halaman) == 0) { ?>
                <center>
                    <h3 class="mt-5">Halaman ini tidak ditemukan.</h3>
                </center>
                <?php } ?>

                <?php foreach($halaman as $a) { ?>
                <div class="post-box">
                    <div class="post-meta">
                        <center>
                            <h1 class="article-title" data-aos="zoom-out-up"><?= $a->halaman_judul; ?></h1>
                        </center>

                        <br />
                        <br />
                        <br />

                    </div>
                    <div class="article-content" data-aos="zoom-in">
                        <?= $a->halaman_konten; ?>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>