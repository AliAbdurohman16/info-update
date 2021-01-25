<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pesan
            <small>Pesan Dan Masukan</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Pesan</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <!-- <th>Pesan</th> -->
                                    <th width="9%">OPSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								$no = 1;
								foreach($pesan as $p){
								?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->nama; ?></td>
                                    <td><?= $p->email; ?></td>
                                    <td><?= $p->subjek; ?></td>
                                    <!-- <td><?= $p->pesan; ?></td> -->
                                    <td>
                                        <a href="<?= base_url('dashboard/pesan_detail/') . $p->id; ?>"
                                            class="btn btn-info btn-sm"><i class="fa fa-info"></i></a>
                                        <a href="<?= base_url('dashboard/pesan_hapus/') . $p->id; ?>"
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