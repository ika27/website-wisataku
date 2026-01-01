<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | User Profile</title>
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
        .profile-photo-wrapper {
            text-align: center;
        }

        .profile-photo-wrapper img {
            transition: all 0.3s ease-in-out;
        }

        .profile-photo-wrapper img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?= base_url() ?>" class="logo logo-dark">
                                <span class="logo-sm"><img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22"></span>
                                <span class="logo-lg"><img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="17"></span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>

                    <?php $session = session(); ?>

                    <div class="d-flex align-items-center">
                        <?php if ($session->get('logged_in')): ?>
                            <!-- Jika sudah login tampilkan profil -->
                            <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <?php
                                        $fotoUser = session()->get('foto');
                                        $avatarPath = $fotoUser && file_exists(FCPATH . 'assets/images/users/' . $fotoUser)
                                            ? base_url('assets/images/users/' . $fotoUser)
                                            : base_url('assets/images/users/user-dummy-img.jpg');
                                        ?>

                                        <img class="rounded-circle header-profile-user"
                                            src="<?= $avatarPath ?>"
                                            alt="Header Avatar"
                                            style="width:40px; height:40px; object-fit:cover;">

                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                                <?= esc($session->get('nama')) ?>
                                            </span>
                                            <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                                <?= esc($session->get('role')) ?>
                                            </span>
                                        </span>
                                    </span>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">Welcome <?= esc($session->get('nama')) ?>!</h6>
                                    <a class="dropdown-item" href="<?= base_url('data-profile') ?>">
                                        <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Profile</span>
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                        <i class="bx bx-log-out-circle text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle">Logout</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Jika belum login tampilkan button login -->
                            <div class="ms-1 header-item d-none d-sm-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModals">Login</button>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </header>

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
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav align-items-center justify-content-center" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url('/'); ?>">
                                <i class="ri-apps-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Daftar Wisata</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('daftar-wisata') ?>"
                                            class="nav-link" data-key="t-chat">All Wisata
                                        </a>
                                    </li>
                                    <?php foreach ($kategori as $kat): ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url('daftar-wisata?kategori=' . urlencode($kat['kategori_wisata'])) ?>"
                                                class="nav-link" data-key="t-chat">
                                                <?= esc($kat['kategori_wisata']) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li> <!-- end menu daftar wisata -->
                        <?php $session = session(); ?>
                        <?php if ($session->get('logged_in')): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('hasil-akhir-guest'); ?>">
                                    <i class="ri-honour-line"></i> <span data-key="t-dashboards">Hasil Akhir</span>
                                </a>
                            </li> <!-- end Hasil akhir Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('riwayat-user'); ?>">
                                    <i class="ri-bookmark-3-line"></i> <span data-key="t-dashboards">Riwayat Anda</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <div class="container-fluid">
                    <div class="row mt-3 mb-3">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Profile User</h6>
                                </div>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php elseif (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body p-4 text-center">
                                    <div class="profile-photo-wrapper d-flex flex-column align-items-center mb-3 mt-2">
                                        <div class="position-relative">
                                            <img src="<?= base_url('assets/images/users/' . ($session->get('foto') ?? 'user-dummy-img.jpg')) ?>"
                                                alt="Foto Profil"
                                                class="img-thumbnail rounded-circle shadow-sm"
                                                style="width:130px; height:130px; object-fit:cover; border:4px solid #fff;">
                                        </div>

                                        <button class="btn btn-warning btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#ubahFotoModal">
                                            <i class="bi bi-camera"></i> Ubah Foto
                                        </button>
                                    </div>


                                    <!-- Modal ubah foto -->
                                    <div class="modal fade" id="ubahFotoModal" tabindex="-1" aria-labelledby="ubahFotoLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="<?= base_url('data-profile/update-foto') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahFotoLabel">Ubah Foto Profil</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Pilih Foto Baru</label>
                                                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <!-- Form ubah data profil -->
                                    <form action="<?= base_url('data-profile/update') ?>" method="post" enctype="multipart/form-data" class="mt-4">
                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label fw-bold text-dark">Nama</label>
                                            <div class="col-md-8">
                                                <input type="text" name="nama" class="form-control" value="<?= esc($session->get('nama')) ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label fw-bold text-dark">Username</label>
                                            <div class="col-md-8">
                                                <input type="text" name="username" class="form-control" value="<?= esc($session->get('username')) ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label fw-bold text-dark">Email</label>
                                            <div class="col-md-8">
                                                <input type="email" name="email" class="form-control" value="<?= esc($session->get('email')) ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label fw-bold text-dark">Password</label>
                                            <div class="col-md-8">
                                                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ubah password">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-md-3 col-form-label fw-bold text-dark">Level</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?= esc($session->get('role')) ?>" disabled>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
                                    </form>
                                </div>


                                <div class="card-footer text-center">

                                </div>
                            </div>
                        </div><!-- end col -->

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
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('btnEdit');
            const saveBtn = document.getElementById('btnSave');
            const cancelBtn = document.getElementById('btnCancel');
            const inputs = document.querySelectorAll('#formProfile input');

            editBtn.addEventListener('click', () => {
                inputs.forEach(input => {
                    if (input.id !== 'editrole') {
                        input.disabled = false;
                    }
                });
                editBtn.classList.add('d-none');
                saveBtn.classList.remove('d-none');
                cancelBtn.classList.remove('d-none');
            });

            cancelBtn.addEventListener('click', () => {
                inputs.forEach(input => input.disabled = true);
                editBtn.classList.remove('d-none');
                saveBtn.classList.add('d-none');
                cancelBtn.classList.add('d-none');
            });
        });
    </script>


</body>

</html>