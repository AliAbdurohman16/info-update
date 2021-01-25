<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pesan
            <small>Pesan Detail</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-10">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pesain Detail</h3>
                    </div>
                    <div class="box-body">

                        <?php foreach ($pesan as $p) { ?>
                        <form>
                            <div class="box-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <p><?= $p->nama; ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <p><?= $p->email; ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Subjek</label>
                                    <div class="col-sm-9">
                                        <p><?= $p->subjek; ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pesan</label>
                                    <div class="col-sm-9">
                                        <p><?= $p->pesan; ?></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>

    </section>


</div>
