<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HopeClate | Admin</title>
    <link href="<?= base_url() ?>/upload/logo.jpg" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets_admin/dist/css/adminlte.min.css">


    <link rel="stylesheet" href="<?= base_url() ?>assets_admin/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?= base_url() ?>assets_admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>





</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>main" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-slide="true" href="<?= base_url() ?>logout" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>main" class="brand-link">
                <img src="<?= base_url() ?>/upload/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Hope Clate</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>/upload/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->username  ?></a>
                    </div>
                </div>

                <?php

                // if (session()->level == 1) :
                if (session()->level == 1) {
                    // Setting 
                    $setting = "show";
                    $users = "show";
                    $daftarmenu = "show";
                    $bobot = "show";
                    $kriteria = "show";


                    // penilaian 
                    $penilaian = "show";
                    $nilai = "show";
                    $perhitungan = "show";
                } else {
                    // Setting
                    $setting = "none";
                    $users = "none";
                    $daftarmenu = "none";
                    $bobot = "none";
                    $kriteria = "none";


                    // penilaian 
                    $penilaian = "none";
                    $nilai = "none";
                    $perhitungan = "none";
                }

                ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-header">
                            <hr>Admin
                        </li>

                        <!-- Setting -->
                        <li class="nav-item <?= ($menu == 'setting') ? 'menu-open' : '' ?>" style="display: <?= $setting ?>;">
                            <a href="#" class="nav-link <?= ($menu == 'setting') ? 'active' : '' ?>">
                                <i class="fas fa-cog text-info"></i>
                                <p>
                                    Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $users ?>;">
                                    <a href="<?= site_url('user') ?>" class="nav-link <?= ($submenu == 'user') ? 'active' : '' ?>">
                                        <i class="fas fa-user nav-icon text-info"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $daftarmenu ?>;">
                                    <a href="<?= site_url('daftarmenu') ?>" class="nav-link <?= ($submenu == 'daftarmenu') ? 'active' : '' ?>">
                                        <i class="fas fa-th-list nav-icon text-info"></i>
                                        <p>Menu</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $bobot ?>;">
                                    <a href="<?= site_url('bobot') ?>" class="nav-link <?= ($submenu == 'bobot') ? 'active' : '' ?>">
                                        <i class="fas fa-balance-scale-left nav-icon text-info"></i>
                                        <p>Bobot</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $kriteria ?>;">
                                    <a href="<?= site_url('kriteria') ?>" class="nav-link <?= ($submenu == 'kriteria') ? 'active' : '' ?>">
                                        <i class="fas fa-code-branch nav-icon text-info"></i>
                                        <p>Kriteria</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- penilaian -->
                        <li class="nav-item <?= ($menu == 'penilaian') ? 'menu-open' : '' ?>" style="display: <?= $penilaian ?>;">
                            <a href="#" class="nav-link <?= ($menu == 'penilaian') ? 'active' : '' ?>">
                                <i class="fas fa-clipboard-list text-warning"></i>
                                <p>
                                    Penilaian
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $nilai ?>;">
                                    <a href="<?= site_url('penilaian') ?>" class="nav-link <?= ($submenu == 'nilai') ? 'active' : '' ?>">
                                        <i class="fas fa-clipboard-check nav-icon text-warning"></i>
                                        <p>Nilai</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview ml-2">
                                <li class="nav-item" style="display: <?= $perhitungan ?>;">
                                    <a href="<?= site_url('perhitungan') ?>" class="nav-link <?= ($submenu == 'perhitungan') ? 'active' : '' ?>">
                                        <i class="fas fa-hourglass-half nav-icon text-warning"></i>
                                        <p>Kalkulasi</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <?= $this->renderSection('isi'); ?>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>main">Hope Clate</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets_admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/assets_admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets_admin/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>