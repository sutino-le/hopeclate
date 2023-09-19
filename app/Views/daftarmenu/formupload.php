<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>daftarmenu" class="btn btn-sm btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Upload Gambar</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->



    <form action="<?= base_url('simpangambar') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="card-body">

            <input type="hidden" name="menuid" value="<?= $menuid ?>">


            <div class="form-group">
                <label for="menuharga"><?= $menunama ?></label>
                <img src="<?= base_url() ?>upload/<?= $menufoto ?>" alt="<?= $menufoto ?>" width="150px" height="150px">
            </div>

            <div class="form-group">
                <label for="">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="menufoto" name="menufoto">
                    <label class="custom-file-label" for="menufoto">Pilih Gambar</label>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>


    </form>


</div>
<!-- /.card -->



<?= $this->endSection('isi') ?>