<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="light">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Daftar Bookmark</title>
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

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
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

                    <!-- start page title -->
                    <div class="card" style="background-color:#EEEFFF;">
                        <div class="card-header" style="background-color:#405189;margin-bottom:0;padding-bottom:0px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 text-white">List Riwayat Anda</h4>

                                        <div class="search-box">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mt-3">
                                <div class="col-12">

                                    <?php if (!empty($wisata)): ?>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th width="500">Objek Wisata</th>
                                                        <th>Kategori</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tanggal Disimpan</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($wisata as $w): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <?php if (!empty($w['gambar'])): ?>
                                                                            <img src="<?= base_url('assets/images/foto_wisata/' . $w['gambar']) ?>"
                                                                                alt="<?= esc($w['nama_wisata']) ?>"
                                                                                class="avatar-md rounded">
                                                                        <?php else: ?>
                                                                            <div class="bg-light rounded avatar-md rounded text-center justify-content-center align-items-center">No image</div>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-1">
                                                                            <a href="<?= base_url('detail-wisata/' . $w['id_wisata']) ?>"
                                                                                class="text-dark"><?= esc($w['nama_wisata']) ?></a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><?= esc($w['kategori_wisata']) ?></td>
                                                            <td class="text-muted">
                                                                <?= esc(strlen($w['deskripsi']) > 100 ? substr($w['deskripsi'], 0, 100) . '...' : $w['deskripsi']) ?>
                                                            </td>
                                                            <td><?= isset($w['tanggal_disimpan']) ? date('d M Y', strtotime($w['tanggal_disimpan'])) : '-' ?></td>
                                                            <td class="text-center">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger remove-bookmark"
                                                                    data-id="<?= $w['id_wisata'] ?>">
                                                                    <i class="ri-delete-bin-6-line align-middle me-1"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Pagination -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div>
                                                <?= $pager->links('wisata', 'bootstrap') ?>
                                            </div>
                                            <div class="text-muted">
                                                Menampilkan <strong><?= count($wisata) ?></strong> wisata tersimpan.
                                            </div>
                                        </div>

                                    <?php else: ?>
                                        <div class="alert alert-info text-center mb-0">
                                            Belum ada wisata yang disimpan di bookmark Anda.
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('click', '.remove-bookmark', function() {
            const idWisata = $(this).data('id');
            if (confirm('Hapus wisata ini dari bookmark Anda?')) {
                $.ajax({
                    url: '<?= base_url('toggle-bookmark') ?>',
                    type: 'POST',
                    data: {
                        id_wisata: idWisata
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'removed') {
                            alert('Bookmark berhasil dihapus!');
                            location.reload();
                        } else {
                            alert(response.message || 'Terjadi kesalahan.');
                        }
                    },
                    error: function() {
                        alert('Gagal menghapus bookmark, coba lagi.');
                    }
                });
            }
        });
    </script>


    <?php if (session()->getFlashdata('error')): ?>
        <script>
            var loginModal = new bootstrap.Modal(document.getElementById('loginModals'));
            loginModal.show();
        </script>
    <?php endif; ?>


</body>

</html>