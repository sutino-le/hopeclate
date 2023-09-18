<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Menu
                            <a href="<?= base_url() ?>daftarmenutambah" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>
                                Tambah</a>
                        </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Menus</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
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
                                        <td><?= number_format($rowmenu['menuharga']) ?></td>
                                        <td><?= $rowmenu['menufoto'] ?></td>
                                        <td>
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