<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HopeClate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>/upload/logo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">




</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><img src="<?= base_url() ?>/upload/logo.png" alt="Logo">Hope Clate</h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?= base_url() ?>menu" class="nav-item nav-link">Menu</a>
                        <a href="<?= base_url() ?>about" class="nav-item nav-link">About</a>
                        <a href="<?= base_url() ?>contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="<?= base_url() ?>login" class="btn btn-primary py-2 px-4">Login</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Hero start -->
        <div class="container-xxl position-relative p-0">
            <div class="container-xxl py-5 bg-dark hero-header mb-5">

            </div>
        </div>
        <!-- Hero end -->



        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">


                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Login</p>

                            <form action="<?= base_url() ?>cekuser" method="post">
                                <?= csrf_field(); ?>

                                <?php
                                if (session()->getFlashdata('errIdUser')) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?= session()->getFlashdata('errIdUser'); ?></strong>
                                    </div>
                                <?php
                                }
                                ?>



                                <div class="input-group mb-3">
                                    <input type="text" name="userid" id="userid" class="form-control" placeholder="User ID" autocomplete="off">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <!-- 
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->


            </div>
        </div>
        <!-- Menu End -->





        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Gedung Permata Kuningan, Ground Floor.
                            Jalan Kuningan Mulia Kav 9C., Jakarta, Indonesia, Jakarta</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0818-0660-8249</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>hopeclatsales@gmail.com</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Sunday</h5>
                        <p>08:30 WIB - 21:00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="<?= base_url() ?>">HopeClate <?= date('Y') ?></a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url() ?>/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>

</html>