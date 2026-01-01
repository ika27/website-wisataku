<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Data Penilaian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables Bootstrap 5 CSS -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- Optional Bootstrap styling -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


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

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex" style="background-color:#405189;color:#ffffff;">
                                                <h4 class="card-title mb-0 flex-grow-1 text-white">Data Penilaian</h4>
                                                <form class="app-search d-none d-md-block m-0 p-0" method="get" action="<?= base_url('data-penilaian') ?>">
                                                    <div class="position-relative">
                                                        <span class="mdi mdi-magnify search-widget-icon"></span>
                                                        <input type="text"
                                                            class="form-control"
                                                            placeholder="Cari Data..."
                                                            autocomplete="off"
                                                            id="search-options"
                                                            name="search"
                                                            value="<?= esc($search ?? '') ?>">
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="container-fluid" style="background-color:#EEEFFF;">
                                                <div class="row mt-3 mb-3">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-card">
                                                                <table id="datatable" class="table table-bordered table-centered align-middle border-dark">
                                                                    <thead class="text-dark table-light">
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nama Alternatif</th>
                                                                            <?php foreach ($kriteria as $k): ?>
                                                                                <th><?= esc($k['kode_kriteria']) ?></th>
                                                                            <?php endforeach; ?>
                                                                            <th>Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = 1;
                                                                        foreach ($alternatif as $alt): ?>
                                                                            <tr>
                                                                                <td><?= $no++ ?></td>
                                                                                <td><?= esc($alt['nama_wisata']) ?></td>
                                                                                <?php foreach ($kriteria as $k): ?>
                                                                                    <td><?= $penilaian[$alt['id']][$k['kode_kriteria']] ?? '-' ?></td>
                                                                                <?php endforeach; ?>
                                                                                <td>
                                                                                    <a href="#"
                                                                                        class="btn-edit"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#editModal"
                                                                                        data-id="<?= $alt['id'] ?>"
                                                                                        <?php for ($i = 1; $i <= 15; $i++): ?>
                                                                                        data-c<?= $i ?>="<?= $penilaian[$alt['id']]["C$i"] ?? '' ?>"
                                                                                        <?php endfor; ?>
                                                                                        style="background-color:#28F179;padding:8px;border-radius:8px;">
                                                                                        <i data-feather="edit" class="fs-11"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                                <!-- modal penilaian -->
                                                                <div class="modal fade" id="editModal" tabindex="-1">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content" style="background-color:#DCE2FF;">
                                                                            <div class="modal-header" style="background-color:#405189;color:#fff;">
                                                                                <h5 class="modal-title text-white">Edit Data Penilaian</h5>
                                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <form id="formEdit">
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" id="editId" name="id">

                                                                                    <?php for ($i = 1; $i <= 15; $i++): ?>
                                                                                        <div class="mb-2 row">
                                                                                            <div class="col-md-3">
                                                                                                <label for="editC<?= $i ?>" class="form-label fw-bold text-dark">C<?= $i ?></label>
                                                                                            </div>
                                                                                            <div class="col-md-9">
                                                                                                <select name="C<?= $i ?>" id="editC<?= $i ?>" class="form-select">
                                                                                                    <option value="">Pilih Nilai</option>
                                                                                                    <?php for ($n = 0; $n <= 5; $n++): ?>
                                                                                                        <option value="<?= $n ?>"> <?= $n ?> </option>
                                                                                                    <?php endfor; ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php endfor; ?>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <!-- modal penilaian end -->
                                                            </div>
                                                        </div>
                                                        <!-- button create tambah cetak -->
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <!-- <button class="btn btn-warning btn-sm">Cetak</button> &nbsp;&nbsp;&nbsp; -->
                                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>
                                                        </div>

                                                        <!-- Modal Tambah -->
                                                        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <form action="<?= base_url('penilaian/insert') ?>" method="post">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="tambahModalLabel">Tambah Penilaian Baru</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <!-- Pilih Wisata -->
                                                                            <div class="mb-3">
                                                                                <label for="id_wisata" class="form-label">Nama Wisata</label>
                                                                                <select name="id_wisata" id="id_wisata" class="form-control select2" required>
                                                                                    <option value="">-- Pilih Wisata --</option>
                                                                                    <?php foreach ($alternatif as $alt): ?>
                                                                                        <option value="<?= $alt['id'] ?>"><?= $alt['nama_wisata'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>

                                                                            <div class="row">
                                                                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                                                                    <div class="col-md-4 mb-3">
                                                                                        <label for="C<?= $i ?>" class="form-label">C<?= $i ?></label>
                                                                                        <select name="C<?= $i ?>" id="C<?= $i ?>" class="form-control" required>
                                                                                            <option value="">-- Pilih Nilai --</option>
                                                                                            <?php for ($n = 0; $n <= 5; $n++): ?>
                                                                                                <option value="<?= $n ?>"><?= $n ?></option>
                                                                                            <?php endfor; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                <?php endfor; ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- .card-->
                                    </div> <!-- .col-->
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
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
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-edit").forEach(btn => {
                btn.addEventListener("click", function() {
                    document.getElementById("editId").value = this.dataset.id;

                    // Loop untuk set nilai C1 - C15
                    for (let i = 1; i <= 15; i++) {
                        let val = this.getAttribute("data-c" + i);
                        document.getElementById("editC" + i).value = val ?? "";
                    }
                });
            });

            // Submit via AJAX
            document.getElementById("formEdit").addEventListener("submit", function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                fetch("<?= base_url('data-penilaian/update') ?>", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === "success") {
                            alert("Data berhasil diperbarui!");
                            location.reload();
                        } else {
                            alert("Gagal update data!");
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>

    <!-- Select2 Init -->
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('#tambahModal'),
                width: '100%'
            });
        });
    </script>

</body>

</html>