<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>kriteria" class="btn btn-sm btn-warning"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Ubah Kriteria</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'updatekriteria', 'class="formupdate"'); ?>
    <?= csrf_field(); ?>

    <div class="card-body">

        <div class="row">
            <div class="col-6">

                <div class="form-group">
                    <label for="kriteria">Kriteria</label>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="text" class="form-control" name="kriteria" id="kriteria" value="<?= $kriteria ?>"
                        placeholder="Kriteria" autocomplete="off">
                    <div class="invalid-feedback errorKriteria"></div>
                </div>

                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <select name="bobot" id="bobot" class="form-control">
                        <option value="">Pilih Bobot</option>
                        <option value="">----------</option>
                        <?php foreach ($databobot as $rowbobot) : ?>

                        <?php if ($rowbobot['bobotid'] == $bobot) : ?>
                        <option value="<?= $rowbobot['bobotid'] ?>" selected><?= $rowbobot['jenis'] ?></option>
                        <?php else : ?>
                        <option value="<?= $rowbobot['bobotid'] ?>"><?= $rowbobot['jenis'] ?></option>
                        <?php endif; ?>


                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorBobot"></div>
                </div>

                <div class="form-group">
                    <label for="atribut">Atribut</label>
                    <select name="atribut" id="atribut" class="form-control">
                        <option value="<?= $atribut ?>" selected><?= $atribut ?></option>
                        <option value="">Pilih Atribut</option>
                        <option value=""></option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                    </select>
                    <div class="invalid-feedback errorAtribut"></div>
                </div>

            </div>

            <div class="col-3"></div>


            <div class="col-3">
                <b>Keterangan Bobot :</b>
                <table width="50%">
                    <tr>
                        <td>5</td>
                        <td>=</td>
                        <td>Sangat Tinggi</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>=</td>
                        <td>Tinggi</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>=</td>
                        <td>Sedang</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>=</td>
                        <td>Rendah</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>=</td>
                        <td>Sangat Rendah</td>
                    </tr>
                </table>
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

                    if (err.errKriteria) {
                        $('#kriteria').addClass('is-invalid');
                        $('.errorKriteria').html(err.errKriteria);
                    } else {
                        $('#kriteria').removeClass('is-invalid');
                        $('#kriteria').addClass('is-valid');
                    }

                    if (err.errBobot) {
                        $('#bobot').addClass('is-invalid');
                        $('.errorBobot').html(err.errBobot);
                    } else {
                        $('#bobot').removeClass('is-invalid');
                        $('#bobot').addClass('is-valid');
                    }

                    if (err.errAtribut) {
                        $('#atribut').addClass('is-invalid');
                        $('.errorAtribut').html(err.errAtribut);
                    } else {
                        $('#atribut').removeClass('is-invalid');
                        $('#atribut').addClass('is-valid');
                    }

                }

                if (response.sukses) {
                    Swal.fire(
                        'Berhasil',
                        response.success,
                        'success'
                    ).then((result) => {
                        window.location.href = (
                            '<?= base_url() ?>kriteria');
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