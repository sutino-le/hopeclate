<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penilaian</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Rasa</th>
                                    <th>Kebersihan</th>
                                    <th>Pelayanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($viewdata as $rowmenu) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rowmenu['menunama'] ?></td>
                                        <td><?= $rowmenu['menukategori'] ?></td>
                                        <td><?= number_format($rowmenu['n_harga']) ?></td>
                                        <td><?= number_format($rowmenu['n_rasa']) ?></td>
                                        <td><?= number_format($rowmenu['n_kebersihan']) ?></td>
                                        <td><?= number_format($rowmenu['n_pelayanan']) ?></td>
                                        <td>

                                            <a href="<?= base_url() ?>editnilai/<?= $rowmenu['menuid'] ?>" class="btn btn-sm btn-success d-inline" title="Edit"><i class="fas fa-edit"></i></a>

                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


<?= $this->endSection('isi') ?>