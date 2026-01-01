<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="light">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Daftar Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('layouts/header') ?>

        <!-- alert untuk gagal login -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Login modal -->
        <div id="loginModals" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-body login-modal p-5">
                        <h5 class="text-white fs-20">Login</h5>
                    </div>
                    <div class="modal-body p-5">
                        <h5 class="mb-3">Silahkan login disini!</h5>
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="mb-2">
                                <input type="email" class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter your email/username" name="email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password"
                                    id="exampleInputPassword1"
                                    placeholder="Enter your password">
                                <div
                                    class="mt-1 d-flex align-items-end justify-content-between mt-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">Forgot password?</a>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Modal Register -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <h5 class="mb-3 text-center">Register Akun Baru</h5>
                        <form action="<?= base_url('auth/register') ?>" method="post">
                            <div class="mb-2">
                                <label for="username">username</label>
                                <input type="text" class="form-control" name="username" placeholder="username" required>
                            </div>
                            <div class="mb-2">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required>
                            </div>
                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Forgot Password -->
        <div class="modal fade" id="forgotModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <h5 class="mb-3">Reset Password</h5>
                        <form action="<?= base_url('auth/forgotPassword') ?>" method="post">
                            <div class="mb-2">
                                <input type="email" class="form-control" name="email" placeholder="Masukkan email terdaftar" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Kirim Link Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal forget password -->

        <!-- ========== App Menu ========== -->
        <?= $this->include('layouts/sidebar') ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="card" style="background-color:#EEEFFF;">
                        <div class="card-header" style="background-color:#405189;margin-bottom:0;padding-bottom:0px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 text-white">List Wisata</h4>

                                        <div class="search-box">
                                            <form action="<?= base_url('daftar-wisata') ?>" method="get" class="position-relative">
                                                <input type="text" name="q" value="<?= esc($keyword) ?>" class="form-control rounded bg-light border-light" placeholder="Search...">
                                                <button type="submit" class="btn position-absolute top-0 end-0 mt-1 me-2 border-0 bg-transparent">
                                                    <i class="mdi mdi-magnify search-icon"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mt-3">
                                <div class="col-xxl-12">
                                    <div class="row gx-4">
                                        <?php if (!empty($wisata)): ?>
                                            <?php foreach ($wisata as $w): ?>
                                                <div class="col-xxl-12">
                                                    <div class="card shadow-sm border-0 mb-3">
                                                        <div class="card-body">
                                                            <div class="row g-4 align-items-center">
                                                                <div class="col-xxl-3 col-lg-5">
                                                                    <img src="<?= base_url('assets/images/foto_wisata/' . $w['gambar']) ?>"
                                                                        alt="<?= esc($w['nama_wisata']) ?>"
                                                                        class="img-fluid rounded w-100 object-fit-cover">
                                                                </div>
                                                                <div class="col-xxl-9 col-lg-7">
                                                                    <p class="mb-2 text-primary text-uppercase fw-semibold"><?= esc($w['kategori_wisata']) ?></p>
                                                                    <h5 class="fs-15 fw-semibold"><?= esc($w['nama_wisata']) ?></h5>
                                                                    <p class="text-muted mb-2 deskripsi-text">
                                                                        <?= esc(strlen($w['deskripsi']) > 150 ? substr($w['deskripsi'], 0, 150) . '...' : $w['deskripsi']) ?>
                                                                    </p>

                                                                    <a href="<?= base_url('detail-wisata/' . $w['id_wisata']) ?>" class="text-decoration-underline">
                                                                        Selengkapnya <i class="ri-arrow-right-line"></i>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-muted">Tidak ada wisata ditemukan untuk kategori <b><?= esc($kategoriDipilih) ?></b>.</p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Pagination Section -->
                                    <div class="row g-0 text-center text-sm-start align-items-center mb-4 mt-3">
                                        <div class="col-sm-6">
                                            <?php
                                            $currentPage = $pager->getCurrentPage('wisata');
                                            $perPage = $pager->getPerPage('wisata');
                                            $total = $pager->getTotal('wisata');
                                            $start = ($currentPage - 1) * $perPage + 1;
                                            $end = min($start + $perPage - 1, $total);
                                            ?>
                                            <p class="mb-sm-0 text-muted">
                                                Showing <span class="fw-semibold"><?= $start ?></span>
                                                to <span class="fw-semibold"><?= $end ?></span>
                                                of <span class="fw-semibold text-decoration-underline"><?= $total ?></span> entries
                                            </p>
                                        </div>

                                        <div class="col-sm-6 d-flex justify-content-end align-items-center gap-2">

                                            <!-- Pagination -->
                                            <div class="pagination-container ms-3">
                                                <?= $pager->links('wisata', 'bootstrap') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .pagination .page-link {
                                color: #243c74;
                                border-radius: 6px !important;
                                padding: 6px 12px !important;
                                font-size: 13px;
                            }

                            .pagination .page-item.active .page-link {
                                background-color: #243c74;
                                border-color: #243c74;
                                color: #fff;
                            }

                            .pagination .page-item.disabled .page-link {
                                color: #999;
                            }
                        </style>

                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Copyright ©
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                SPK Wisata SAW All Rights Reserved.
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

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            var loginModal = new bootstrap.Modal(document.getElementById('loginModals'));
            loginModal.show();
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-more').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const p = this.previousElementSibling;
                    const fullText = this.dataset.full;
                    const shortText = fullText.substring(0, 150) + '...';

                    if (this.textContent.includes('Read more')) {
                        p.textContent = fullText;
                        this.innerHTML = 'Show less <i class="ri-arrow-up-line"></i>';
                    } else {
                        p.textContent = shortText;
                        this.innerHTML = 'Read more <i class="ri-arrow-right-line"></i>';
                    }
                });
            });
        });
    </script>


</body>

</html>