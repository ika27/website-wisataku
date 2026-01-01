<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Data Kriteria</title>
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
        .nav-link.active {
            background-color: #10D4FF;
            color: #000;
            border-radius: 8px;
            padding-left: 25px;
        }

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
                                                <h4 class="card-title mb-0 flex-grow-1 text-white">Data Alternatif</h4>
                                                <form class="app-search d-none d-md-block m-0 p-0" method="get" action="<?= base_url('data-alternatif') ?>">
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

                                            </div><!-- end card header -->

                                            <div class="container-fluid" style="background-color:#EEEFFF;">
                                                <div class="row mt-3 mb-3">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-card">
                                                                <table id="datatable" style="padding: 0px;" class="table table-bordered table-centered align-middle border-dark">
                                                                    <thead class="text-dark table-light">
                                                                        <tr>
                                                                            <th width="50px;">No</th>
                                                                            <th>Alternatif</th>
                                                                            <th>Deskripsi</th>
                                                                            <th>Gambar</th>
                                                                            <th width="120px;">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($wisata as $index => $a): ?>
                                                                            <tr>
                                                                                <td><?= $index + 1 ?></td>
                                                                                <td><?= esc($a['nama_wisata']) ?></td>
                                                                                <td><?= esc($a['deskripsi']) ?></td>
                                                                                <td><img width="200" src="<?= base_url('assets/images/foto_wisata/' . $a['gambar']) ?>" alt=""> </td>
                                                                                <td>
                                                                                    <a href="#"
                                                                                        class="btn-edit"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#editModal"
                                                                                        data-id="<?= esc($a['id']) ?>"
                                                                                        data-nama="<?= esc($a['nama_wisata']) ?>"
                                                                                        data-deskripsi="<?= esc($a['deskripsi']) ?>"
                                                                                        data-kategori="<?= esc($a['kategori_wisata']) ?>"
                                                                                        data-gambar="<?= esc($a['gambar']) ?>"
                                                                                        data-rating="<?= esc($a['rating']) ?>"
                                                                                        style="background-color:#28F179;padding:8px;border-radius:8px;">
                                                                                        <i data-feather="edit" class="fs-11"></i>
                                                                                    </a>

                                                                                    &nbsp;&nbsp;
                                                                                    <a href="<?= base_url('data-alternatif/delete/' . $a['id']) ?>"
                                                                                        style="background-color:#EA5756;padding:8px;border-radius:8px;"
                                                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                                                        <i data-feather="trash-2" class="fs-11"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr><!-- end tr -->
                                                                        <?php endforeach; ?>

                                                                        <!-- modal -->
                                                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content" style="background-color:#DCE2FF;">
                                                                                    <div class="modal-header" style="background-color:#405189;color:#fff;">
                                                                                        <h5 class="modal-title text-white" id="editModalLabel">Edit Data Alternatif</h5>
                                                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form id="formEdit" action="<?= base_url('data-alternatif/update') ?>" method="post" enctype="multipart/form-data">
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" id="editId" name="id">
                                                                                            <!-- Nama -->
                                                                                            <div class="mb-3 row">
                                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Nama</label></div>
                                                                                                <div class="col-md-9"><input type="text" class="form-control" id="editNama" name="nama"></div>
                                                                                            </div>

                                                                                            <!-- Deskripsi -->
                                                                                            <div class="mb-3 row">
                                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Deskripsi</label></div>
                                                                                                <div class="col-md-9"><textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3"></textarea></div>
                                                                                            </div>

                                                                                            <!-- Kategori -->
                                                                                            <div class="mb-3 row">
                                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Kategori</label></div>
                                                                                                <div class="col-md-9"><input type="text" class="form-control" id="editKategori" name="kategori_wisata"></div>
                                                                                            </div>

                                                                                            <!-- Rating -->
                                                                                            <div class="mb-3 row">
                                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Rating</label></div>
                                                                                                <div class="col-md-9"><input type="number" class="form-control" id="editRating" name="rating" min="0" max="5" step="0.1"></div>
                                                                                            </div>

                                                                                            <!-- Upload Gambar -->
                                                                                            <div class="mb-3 row">
                                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Gambar</label></div>
                                                                                                <div class="col-md-9">
                                                                                                    <input type="file" class="form-control" id="editGambar" name="gambar" accept="image/*">
                                                                                                    <img id="previewGambar" src="" alt="Preview Gambar" class="img-fluid mt-2" style="display:none;max-height:150px;border-radius:8px;">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" form="formEdit" class="btn btn-success">Simpan</button>
                                                                                            <button type="reset" form="formEdit" class="btn btn-secondary">Reset</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end modal -->
                                                                    </tbody><!-- end tbody -->
                                                                </table><!-- end table -->
                                                            </div>
                                                        </div>
                                                        <!-- button create tambah cetak -->
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                                                Tambah
                                                            </button>
                                                        </div>

                                                        <!--  -->
                                                        <!-- Modal Tambah -->
                                                        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <form id="formTambah" action="<?= base_url('data-alternatif/tambah') ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title fw-bold" id="tambahModalLabel">Tambah Data Wisata</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <div class="modal-body">

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">ID Wisata</label></div>
                                                                                <div class="col-md-9"><input type="text" class="form-control" name="id_wisata" required></div>
                                                                            </div>

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Nama Wisata</label></div>
                                                                                <div class="col-md-9"><input type="text" class="form-control" name="nama" required></div>
                                                                            </div>

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Kategori</label></div>
                                                                                <div class="col-md-9"><input type="text" class="form-control" name="kategori" required></div>
                                                                            </div>

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Deskripsi</label></div>
                                                                                <div class="col-md-9"><textarea class="form-control" name="deskripsi" rows="3"></textarea></div>
                                                                            </div>

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Gambar</label></div>
                                                                                <div class="col-md-9"><input type="file" class="form-control" name="gambar" accept="image/*"></div>
                                                                            </div>

                                                                            <div class="mb-3 row">
                                                                                <div class="col-md-3"><label class="form-label fw-bold text-dark">Rating</label></div>
                                                                                <div class="col-md-9"><input type="number" class="form-control" name="rating" min="0" max="5" step="0.1"></div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- modal tambah end -->
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
                pageLength: 5,
                columnDefs: [{
                    orderable: false,
                    targets: 3
                }]
            });
        });
    </script>
    <script>
        feather.replace();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".btn-edit");

            editButtons.forEach(btn => {
                btn.addEventListener("click", function() {
                    // isi form berdasarkan data attribute
                    document.getElementById("editId").value = this.dataset.id;
                    document.getElementById("editNama").value = this.dataset.nama;
                    document.getElementById("editDeskripsi").value = this.dataset.deskripsi;
                    document.getElementById("editKategori").value = this.dataset.kategori || '';
                    document.getElementById("editRating").value = this.dataset.rating || '';

                    // tampilkan preview gambar lama
                    const gambar = this.dataset.gambar;
                    const preview = document.getElementById("previewGambar");

                    if (gambar && gambar !== "") {
                        preview.src = "<?= base_url('assets/images/foto_wisata/') ?>" + gambar;
                        preview.style.display = "block";
                    } else {
                        preview.style.display = "none";
                    }
                });
            });
        });
    </script>


    <script>
        // Preview gambar saat memilih file
        document.getElementById('editGambar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewGambar');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });
    </script>

</body>

</html>