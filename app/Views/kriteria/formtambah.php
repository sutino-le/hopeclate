<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>kriteria" class="btn btn-sm btn-warning"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Tambah Kriteria</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'simpankriteria', 'class="formsimpan"'); ?>
    <?= csrf_field(); ?>

    <div class="card-body">

        <div class="row">
            <div class="col-6">

                <div class="form-group">
                    <label for="kriteria">Kriteria</label>
                    <input type="text" class="form-control" name="kriteria" id="kriteria" placeholder="Kriteria"
                        autocomplete="off">
                    <div class="invalid-feedback errorKriteria"></div>
                </div>

                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <select name="bobot" id="bobot" class="form-control">
                        <option value="">Pilih Bobot</option>
                        <option value=""></option>
                        <?php foreach ($databobot as $rowbobot) : ?>
                        <option value="<?= $rowbobot['bobotid'] ?>"><?= $rowbobot['jenis'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback errorBobot"></div>
                </div>

                <div class="form-group">
                    <label for="atribut">Atribut</label>
                    <select name="atribut" id="atribut" class="form-control">
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
                            '<?= base_url() ?>/kriteriatambah');
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