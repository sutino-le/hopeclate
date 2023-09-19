<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>daftarmenu" class="btn btn-sm btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Tambah Menu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'updatemenu', 'class="formedit"'); ?>
    <?= csrf_field(); ?>

    <div class="card-body">


        <div class="form-group">
            <label for="menunama">User ID</label>
            <input type="hidden" name="menuid" value="<?= $menuid ?>">
            <input type="text" class="form-control" name="menunama" id="menunama" placeholder="Menu" value="<?= $menunama ?>" autocomplete="off">
            <div class="invalid-feedback errorMenu"></div>
        </div>
        <div class="form-group">
            <label for="menukategori">menukategori</label>
            <select name="menukategori" id="menukategori" class="form-control">
                <option value="<?= $menukategori ?>" selected><?= $menukategori ?></option>
                <option value="">Pilih Kategori</option>
                <option value=""></option>
                <option value="Food">Food</option>
                <option value="Beverages">Beverages</option>
            </select>
            <div class="invalid-feedback errorKategori"></div>
        </div>
        <div class="form-group">
            <label for="menuharga">menuharga</label>
            <input type="menuharga" class="form-control" name="menuharga" id="menuharga" placeholder="Harga" value="<?= $menuharga ?>" autocomplete="off">
            <div class="invalid-feedback errorHarga"></div>
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="menufoto" name="menufoto">
                <label class="custom-file-label" for="menufoto">Choose file</label>
            </div>
        </div> -->
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>


    <?= form_close(); ?>
</div>
<!-- /.card -->



<script>
    $(document).ready(function() {


        $('.formedit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        let err = response.error;

                        if (err.errMenu) {
                            $('#menunama').addClass('is-invalid');
                            $('.errorMenu').html(err.errMenu);
                        } else {
                            $('#menunama').removeClass('is-invalid');
                            $('#menunama').addClass('is-valid');
                        }

                        if (err.errKategori) {
                            $('#menukategori').addClass('is-invalid');
                            $('.errorKategori').html(err.errKategori);
                        } else {
                            $('#menukategori').removeClass('is-invalid');
                            $('#menukategori').addClass('is-valid');
                        }

                        if (err.errHarga) {
                            $('#menuharga').addClass('is-invalid');
                            $('.errorHarga').html(err.errHarga);
                        } else {
                            $('#menuharga').removeClass('is-invalid');
                            $('#menuharga').addClass('is-valid');
                        }

                    }

                    if (response.sukses) {
                        Swal.fire(
                            'Berhasil',
                            response.success,
                            'success'
                        ).then((result) => {
                            window.location.href = (
                                '<?= base_url() ?>/daftarmenu');
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });

            return false;
        });
    });
</script>



<?= $this->endSection('isi') ?>