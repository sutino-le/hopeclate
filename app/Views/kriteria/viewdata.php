<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kriteria
                            <a href="<?= base_url() ?>kriteriatambah" class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus-circle"></i>
                                Tambah</a>
                        </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Atribut</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($viewdata->getResultArray() as $rowkriteria) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $rowkriteria['kriteria'] ?></td>
                                    <td><?= $rowkriteria['nilai'] ?> (<?= $rowkriteria['jenis'] ?>)</td>
                                    <td><?= $rowkriteria['atribut'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>editkriteria/<?= $rowkriteria['id'] ?>"
                                            class="btn btn-sm btn-success d-inline" title="Edit"><i
                                                class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="hapus(<?= $rowkriteria['id'] ?>)" title="Delete"><i
                                                class='fas fa-trash-alt'></i></button>

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

<script>
function hapus(id) {
    Swal.fire({
        title: 'Apakah kamu yakin ?',
        text: "ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url() ?>hapuskriteria/" + id,
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        swal.fire(
                            'Success',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            window.location.reload();
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        }
    })

}
</script>


<?= $this->endSection('isi') ?>