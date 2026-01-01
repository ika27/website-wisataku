<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Data Perhitungan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- Optional Bootstrap styling -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />


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
        .table-card .dataTables_info,
        .table-card .dataTables_paginate {
            padding: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            background-color: transparent;

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

                    <!-- tab menu -->
                    <div class="row">
                        <div class="col-xxl-12">
                            <h5 class="mb-3">Data Perhitungan</h5>
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-muted">Berikut ini adalah hasil dari data perhitungan.</p>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav nav-justified gap-2 mb-3" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#animation-home" role="tab">
                                                Bobot Prev (W)
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#animation-profile" role="tab">
                                                Matrix keputusan (x)
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#animation-messages" role="tab">
                                                Matrix Normalisasi (R)
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#animation-settings" role="tab">
                                                Perhitungan
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="animation-home" role="tabpanel">
                                            <table id="datatable"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <?php foreach ($kriteria as $item): ?>
                                                            <th><?= $item['kode_kriteria'] ?></th>
                                                        <?php endforeach; ?>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php foreach ($kriteria as $index => $item): ?>
                                                            <td><?= $item['bobot']; ?></td>
                                                        <?php endforeach; ?>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="animation-profile" role="tabpanel">
                                            <table id="datatable2"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Alternatif</th>
                                                        <?php foreach ($kriteria as $item): ?>
                                                            <th><?= $item['kode_kriteria'] ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($matrixX as $alt): ?>
                                                        <tr>
                                                            <td><?= $alt['nama'] ?></td>
                                                            <?php foreach ($kriteria as $item): ?>
                                                                <td><?= $alt['values'][$item['kode_kriteria']] ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="animation-messages" role="tabpanel">
                                            <div class="table-responsive" style="overflow-x:auto;">
                                                <table id="datatable3"
                                                    class="table table-bordered table-striped text-center align-middle"
                                                    style="width:100%; white-space:nowrap;">
                                                    <thead class="text-dark table-light">
                                                        <tr>
                                                            <th>Alternatif</th>
                                                            <?php foreach ($kriteria as $item): ?>
                                                                <th><?= $item['kode_kriteria'] ?></th>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($R as $alt): ?>
                                                            <tr>
                                                                <td><?= $alt['nama'] ?></td>
                                                                <?php foreach ($kriteria as $item): ?>
                                                                    <td><?= number_format($alt['values'][$item['kode_kriteria']], 3) ?></td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="animation-settings" role="tabpanel">
                                            <table id="datatable4"
                                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Alternatif</th>
                                                        <th>Kriteria</th>
                                                        <th>R (Normalisasi)</th>
                                                        <th>W (Bobot)</th>
                                                        <th>R × W</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detail as $altId => $kriterias): ?>
                                                        <?php foreach ($kriterias as $kode_kriteria => $data): ?>
                                                            <tr>
                                                                <td><?= $R[$altId]['nama'] ?></td>
                                                                <td><?= $kode_kriteria ?></td>
                                                                <td><?= number_format($data['R'], 3) ?></td>
                                                                <td><?= number_format($data['W'], 3) ?></td>
                                                                <td><?= number_format($data['RW'], 3) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!-- tab menu end -->


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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                paging: true,
                searching: false,
                ordering: false,
                autoWidth: false,
                lengthChange: false,
            });
        });
    </script>
    <script>
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable2').DataTable({
                responsive: true,
                paging: true,
                searching: false,
                ordering: false,
                autoWidth: false,
                lengthChange: false,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable3').DataTable({
                scrollX: false,
                responsive: true,
                paging: true,
                searching: false,
                ordering: false,
                autoWidth: false,
                lengthChange: false,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable4').DataTable({
                responsive: true,
                paging: true,
                searching: false,
                ordering: false,
                autoWidth: false,
                lengthChange: false,
            });
        });
    </script>
    <script>
        feather.replace();
    </script>

    <script>
        $(document).on("click", ".btn-edit", function() {
            var id = $(this).data("id");
            var nama = $(this).data("nama");
            var deskripsi = $(this).data("deskripsi");

            $("#editId").val(id);
            $("#editNama").val(nama);
            $("#editDeskripsi").val(deskripsi);
        });
    </script>


</body>

</html>