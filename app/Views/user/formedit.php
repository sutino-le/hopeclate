<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><a href="<?= base_url() ?>user" class="btn btn-sm btn-warning"><i
                    class="fas fa-arrow-alt-circle-left"></i>
                Back</a> Edit User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart(base_url() . 'editsimpan', 'class="formupdate"'); ?>
    <?= csrf_field(); ?>

    <div class="card-body">


        <div class="form-group">
            <label for="userid">User ID</label>
            <input type="hidden" name="userid_lama" value="<?= $userid ?>">
            <input type="text" class="form-control" name="userid" id="userid" value="<?= $userid ?>">
            <div class="invalid-feedback errorUserID"></div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $username ?>"
                placeholder="Enter Username">
            <div class="invalid-feedback errorUsername"></div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?= $password ?>"
                placeholder="Password">
            <div class="invalid-feedback errorPassword"></div>
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

                    if (err.errUserID) {
                        $('#userid').addClass('is-invalid');
                        $('.errorUserID').html(err.errUserID);
                    } else {
                        $('#userid').removeClass('is-invalid');
                        $('#userid').addClass('is-valid');
                    }

                    if (err.errUsername) {
                        $('#username').addClass('is-invalid');
                        $('.errorUsername').html(err.errUsername);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('#username').addClass('is-valid');
                    }

                    if (err.errPassword) {
                        $('#password').addClass('is-invalid');
                        $('.errorPassword').html(err.errPassword);
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('#password').addClass('is-valid');
                    }

                }

                if (response.sukses) {
                    Swal.fire(
                        'Berhasil',
                        response.success,
                        'success'
                    ).then((result) => {
                        window.location.href = (
                            '<?= base_url() ?>/user');
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