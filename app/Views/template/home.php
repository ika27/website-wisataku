<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Wisataku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        .nav-link.active {
            background-color: #10D4FF;
            color: #000;
            border-radius: 8px;
            padding-left: 25px;
        }
    </style>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('layouts/header_admin') ?>

        <!-- ========== App Menu ========== -->
        <?= $this->include('layouts/sidebar_admin') ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex" style="background-color:#405189;color:#ffffff;">
                                                <h4 class="card-title mb-0 flex-grow-1 text-white">Hasil Akhir</h4>
                                            </div><!-- end card header -->

                                            <div class="container-fluid" style="background-color:#EEEFFF;">
                                                <div class="row mt-3 mb-3">
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-card">
                                                                <table id="datatable" class="table table-bordered table-centered align-middle border-dark">
                                                                    <thead class="text-dark table-light">
                                                                        <tr>
                                                                            <th>Alternatif</th>
                                                                            <th>Total</th>
                                                                            <th>Rank</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($ranked as $row): ?>
                                                                            <tr>
                                                                                <td><?= esc($row['nama']) . " (" . esc($row['id_wisata']) . ")" ?></td>
                                                                                <td><?= esc($row['total']) ?></td>
                                                                                <td><?= esc($row['rank']) ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span style="color:#405189;"> <i data-feather="clock"></i> Terakhir di update : 20 Juni 2025</span>
                                                    </div>
                                                </div>
                                                <!-- pagination -->
                                                <div class="pagination">
                                                    <nav>
                                                        <ul class="pagination">
                                                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                                                <a class="page-link" href="?page=<?= $page - 1 ?>">Prev</a>
                                                            </li>

                                                            <?php
                                                            $startPage = max(1, $page - 1);
                                                            $endPage   = min($totalPages, $page + 1);

                                                            if ($startPage > 1) {
                                                                echo '<li class="page-item"><a class="page-link" href="?page=1">1</a></li>';
                                                                if ($startPage > 2) {
                                                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                                                }
                                                            }

                                                            for ($i = $startPage; $i <= $endPage; $i++) :
                                                            ?>
                                                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                                </li>
                                                            <?php endfor;

                                                            if ($endPage < $totalPages) {
                                                                if ($endPage < $totalPages - 1) {
                                                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                                                }
                                                                echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '">' . $totalPages . '</a></li>';
                                                            }
                                                            ?>

                                                            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                                                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                                            </li>

                                                        </ul>
                                                    </nav>
                                                </div>

                                                <!-- pagination end-->
                                            </div>

                                        </div> <!-- .card-->
                                    </div> <!-- .col-->
                                </div> <!-- end row-->

                                <!-- kriteria  -->

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body" style="background-color: #E9E9E9;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold mb-0 text-center" style="color:#707EAE;font-weight:bold;"> Data Alternatif</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 mb-4 text-center"><span class="counter-value" data-target="<?= $totalAlternatif ?>"><?= $totalAlternatif ?></span> </h4>
                                                        <a href="#" style="color:#B9B9B9;font-weight:bold;" class="text-decoration text-center">Total Data Alternatif</a>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body" style="background-color: #E9E9E9;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold mb-0 text-center" style="color:#707EAE;font-weight:bold;">Data Kriteria</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 mb-4 text-center"><span class="counter-value" data-target="<?= $totalKriteria ?>"><?= $totalKriteria ?></span></h4>
                                                        <a href="#" style="color:#B9B9B9;font-weight:bold;" class="text-decoration text-center">Total Data Kriteria</a>
                                                    </div>

                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body" style="background-color: #E9E9E9;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold mb-0 text-center" style="color:#707EAE;font-weight:bold;">Data Sub Kriteria</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-4">
                                                    <div>
                                                        <h4 class="fs-22 mb-4 text-center"><span class="counter-value" data-target="<?= $totalSubKriteria ?>"><?= $totalSubKriteria ?></span></h4>
                                                        <a href="#" style="color:#B9B9B9;font-weight:bold;" class="text-decoration text-center">Total Data Sub Kriteria</a>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                </div> <!-- end row-->


                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->

                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-sm-center d-none d-sm-block">
                                Copyright © 2025 SPK Wisata SAW All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>