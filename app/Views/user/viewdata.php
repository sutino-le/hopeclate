<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User
                            <a href="<?= base_url() ?>usertambah" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>
                                Tambah</a>
                        </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <?php
                        if (session()->getFlashdata('errIdUser')) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?= session()->getFlashdata('errIdUser'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }
                        ?>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>Nama User</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($viewdata as $rowuser) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rowuser['userid'] ?></td>
                                        <td><?= $rowuser['username'] ?></td>
                                        <td><?= sha1($rowuser['password']) ?></td>
                                        <td><?= $rowuser['level'] ?></td>
                                        <td class="">
                                            <a href="<?= base_url() ?>edituser/<?= $rowuser['userid'] ?>" class="btn btn-sm btn-success d-inline" title="Edit"><i class="fas fa-edit"></i></a>


                                            <?php
                                            if ($rowuser['userid'] == "admin") {
                                            } else {
                                            ?>
                                                <form action="<?= base_url() ?>hapususer" method="post" class=" d-inline">
                                                    <input type="hidden" name="userid" value="<?= $rowuser['userid'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                                </form>
                                            <?php
                                            }
                                            ?>


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