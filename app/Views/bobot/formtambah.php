<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>bobot" class="btn btn-sm btn-warning"><i class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Tambah Bobot</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'simpanbobot', 'class="formsimpan"'); ?>
    <?= csrf_field(); ?>

    <div class="card-body">


        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" autocomplete="off">
            <div class="invalid-feedback errorJenis"></div>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Nilai" autocomplete="off">
            <div class="invalid-feedback errorNilai"></div>
        </div>



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


        $('.formsimpan').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        let err = response.error;

                        if (err.errJenis) {
                            $('#jenis').addClass('is-invalid');
                            $('.errorJenis').html(err.errJenis);
                        } else {
                            $('#jenis').removeClass('is-invalid');
                            $('#jenis').addClass('is-valid');
                        }

                        if (err.errNilai) {
                            $('#nilai').addClass('is-invalid');
                            $('.errorNilai').html(err.errNilai);
                        } else {
                            $('#nilai').removeClass('is-invalid');
                            $('#nilai').addClass('is-valid');
                        }

                    }

                    if (response.sukses) {
                        Swal.fire(
                            'Berhasil',
                            response.success,
                            'success'
                        ).then((result) => {
                            window.location.href = (
                                '<?= base_url() ?>/bobottambah');
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