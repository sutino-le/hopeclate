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
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Foods</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- free -->
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Beverages</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <!-- Menu 1 -->
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">

                                <?php
                                foreach ($kategorifood->getResultArray() as $rowFood) :
                                ?>


                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="<?= base_url() ?>upload/<?= $rowFood['menufoto'] ?>" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?= $rowFood['menunama'] ?></span>
                                                    <span class="text-primary">Rp.
                                                        <?= number_format($rowFood['menuharga']) ?></span>
                                                </h5>
                                                <small class="fst-italic"><?= $rowFood['deskripsi'] ?></small>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>

                        <!-- Menu 2 -->
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">

                                <?php
                                foreach ($kategoribeverages->getResultArray() as $rowBeverages) :
                                ?>



                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="<?= base_url() ?>upload/<?= $rowBeverages['menufoto'] ?>" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?= $rowBeverages['menunama'] ?></span>
                                                    <span class="text-primary">Rp.
                                                        <?= number_format($rowBeverages['menuharga']) ?></span>
                                                </h5>
                                                <small class="fst-italic"><?= $rowBeverages['deskripsi'] ?></small>
                                            </div>
                                        </div>
                                    </div>


                                <?php endforeach ?>


                            </div>
                        </div>



                    </div>
                </div>
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