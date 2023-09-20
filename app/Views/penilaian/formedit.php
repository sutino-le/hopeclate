<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>penilaian" class="btn btn-sm btn-warning"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Ubah Nilai</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'updatenilai', 'class="formupdate"'); ?>
    <?= csrf_field(); ?>


    <input type="hidden" name="menuid" value="<?= $menuid ?>">

    <div class="card-body">

        <div class="form-group">
            <label>Menu : <?= $menunama ?></label><br>
            <label>Harga : <?= number_format($menuharga) ?></label>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="n_harga">Bobot Harga</label>
                    <select name="n_harga" id="n_harga" class="form-control">
                        <option value="<?= $n_harga ?>" selected><?= $n_harga ?></option>
                        <option value="">Pilih Bobot</option>
                        <option value=""></option>
                        <?php foreach ($databobot as $rowbobot) : ?>
                        <option value="<?= $rowbobot['nilai'] ?>"><?= $rowbobot['nilai'] ?> ( <?= $rowbobot['jenis'] ?>
                            )</option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorHarga"></div>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="n_rasa">Bobot Rasa</label>
                    <select name="n_rasa" id="n_rasa" class="form-control">
                        <option value="<?= $n_rasa ?>" selected><?= $n_rasa ?></option>
                        <option value="">Pilih Bobot</option>
                        <option value=""></option>
                        <?php foreach ($databobot as $rowbobot) : ?>
                        <option value="<?= $rowbobot['nilai'] ?>"><?= $rowbobot['nilai'] ?> ( <?= $rowbobot['jenis'] ?>
                            )</option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorRasa"></div>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="n_kebersihan">Bobot Kebersihan</label>
                    <select name="n_kebersihan" id="n_kebersihan" class="form-control">
                        <option value="<?= $n_kebersihan ?>" selected><?= $n_kebersihan ?></option>
                        <option value="">Pilih Bobot</option>
                        <option value=""></option>
                        <?php foreach ($databobot as $rowbobot) : ?>
                        <option value="<?= $rowbobot['nilai'] ?>"><?= $rowbobot['nilai'] ?> ( <?= $rowbobot['jenis'] ?>
                            )</option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorKebersihan"></div>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="n_pelayanan">Bobot Pelayanan</label>
                    <select name="n_pelayanan" id="n_pelayanan" class="form-control">
                        <option value="<?= $n_pelayanan ?>" selected><?= $n_pelayanan ?></option>
                        <option value="">Pilih Bobot</option>
                        <option value=""></option>
                        <?php foreach ($databobot as $rowbobot) : ?>
                        <option value="<?= $rowbobot['nilai'] ?>"><?= $rowbobot['nilai'] ?> ( <?= $rowbobot['jenis'] ?>
                            )</option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorPelayanan"></div>
                </div>
            </div>


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


    $('.formupdate').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    let err = response.error;

                    if (err.errHarga) {
                        $('#n_harga').addClass('is-invalid');
                        $('.errorHarga').html(err.errHarga);
                    } else {
                        $('#n_harga').removeClass('is-invalid');
                        $('#n_harga').addClass('is-valid');
                    }

                    if (err.errRasa) {
                        $('#n_rasa').addClass('is-invalid');
                        $('.errorRasa').html(err.errRasa);
                    } else {
                        $('#n_rasa').removeClass('is-invalid');
                        $('#n_rasa').addClass('is-valid');
                    }

                    if (err.errKebersihan) {
                        $('#n_kebersihan').addClass('is-invalid');
                        $('.errorKebersihan').html(err.errKebersihan);
                    } else {
                        $('#n_kebersihan').removeClass('is-invalid');
                        $('#n_kebersihan').addClass('is-valid');
                    }

                    if (err.errPelayanan) {
                        $('#n_pelayanan').addClass('is-invalid');
                        $('.errorPelayanan').html(err.errPelayanan);
                    } else {
                        $('#n_pelayanan').removeClass('is-invalid');
                        $('#n_pelayanan').addClass('is-valid');
                    }

                }

                if (response.sukses) {
                    Swal.fire(
                        'Berhasil',
                        response.success,
                        'success'
                    ).then((result) => {
                        window.location.href = (
                            '<?= base_url() ?>/penilaian');
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