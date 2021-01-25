<div class="widget-sidebar sidebar-search" data-aos="zoom-in">
    <h5 class="sidebar-title" data-aos="zoom-in">Search</h5>
    <div class="sidebar-content">

        <?= form_open(base_url() . 'search'); ?>
        <div class="input-group">
            <input type="text" class="form-control" name="cari" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-secondary btn-search" type="submit">
                    <span class="ion-android-search"></span>
                </button>
            </span>
        </div>
        </form>
    </div>
</div>
<div class="widget-sidebar" data-aos="zoom-in">
    <h5 class="sidebar-title" data-aos="zoom-in">Artikel Terbaru</h5>
    <div class="sidebar-content" data-aos="zoom-in">
        <ul class="list-sidebar">
            <?php
			$artikel = $this->db->query("SELECT * FROM artikel, pengguna, kategori WHERE artikel_status = 'publish' AND artikel_author = pengguna_id AND artikel_kategori = kategori_id ORDER BY artikel_id DESC LIMIT 3")->result();
            foreach ($artikel as $a) {
				?>
            <div class="row">
                <img src="<?= base_url('gambar/artikel/') . $a->artikel_sampul; ?>" alt="artikel" class="col-sm-4">
                <div class="col-sm">
                    <b><a href="<?= base_url() . $a->artikel_slug; ?>"><?= $a->artikel_judul; ?></a></b>
                </div>
            </div>
            <br />
            <?php } ?>
        </ul>
    </div>
</div>
<div class="widget-sidebar" data-aos="zoom-in">
    <h5 class="sidebar-title" data-aos="zoom-in">Halaman</h5>
    <div class="sidebar-content" data-aos="zoom-in">
        <ul class="list-sidebar">
            <?php
				$halaman = $this->m_data->get_data('halaman')->result();
				foreach($halaman as $h){
			?>
            <li>
                <a href="<?php echo base_url('page/') . $h->halaman_slug; ?>"><?php echo $h->halaman_judul; ?></a>
            </li>
            <?php
 				}
 			?>
        </ul>
    </div>
</div>
<div class="widget-sidebar widget-tags" data-aos="zoom-in">
    <h5 class="sidebar-title" data-aos="zoom-in">Kategori</h5>
    <div class="sidebar-content" data-aos="zoom-in">
        <ul>
            <?php
			$kategori = $this->m_data->get_data('kategori')->result();
			foreach($kategori as $k) {
			?>
            <li>
                <a href="<?= base_url('kategori/') . $k->kategori_slug; ?>"><?= $k->kategori_nama; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>