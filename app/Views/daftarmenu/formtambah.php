<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>daftarmenu" class="btn btn-sm btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Tambah Menu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?= base_url() ?>simpanuser" method="post">
        <?= csrf_field(); ?>

        <div class="card-body">

            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="text" class="form-control" name="userid" id="userid" placeholder="Enter User ID">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </form>
</div>
<!-- /.card -->


<?= $this->endSection('isi') ?>