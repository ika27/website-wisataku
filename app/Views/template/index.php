<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="light">

<head>

    <meta charset="utf-8" />
    <title>Wisataku | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- swiper css -->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- glightbox css -->
    <link rel="stylesheet" href="assets/libs/glightbox/css/glightbox.min.css">

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

    <style>
        .modal-backdrop {
            z-index: 1040 !important;
        }

        .modal {
            z-index: 1050 !important;
        }
    </style>


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

                    <!-- dashboard hasil akhir -->
                    <!-- <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Hasil Akhir</h4>
                                    <div>
                                        <span>Terakhir di update : 20 Juni 2025</span>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3 p-2">
                                    <div class="col-md-12">
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
                                                      
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><
                        </div>

                    </div> -->
                    <!-- dashboard hasil akhir end -->

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-center">
                                <h2 class="mb-sm-0 text-center">Sistem Rekomendasi Wisata Dengan Metode<br>
                                    Simple Additive Weighting di Kabupaten Bantul</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row justify-content-center mb-4">
                                        <div class="col-lg-6">
                                            <form action="<?= base_url('/search') ?>" method="post">
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <div class="position-relative mb-3">
                                                            <select name="wisata_name" id="wisata_name" class="form-control form-control-lg bg-light border-light">
                                                                <option value="">--Pilih Wisata--</option>
                                                                <?php foreach ($kategori as $kat): ?>
                                                                    <option value="<?= esc($kat['kategori_wisata']) ?>"
                                                                        <?= ($kategoriDipilih == $kat['kategori_wisata']) ? 'selected' : '' ?>>
                                                                        <?= esc($kat['kategori_wisata']) ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light"><i class="mdi mdi-magnify me-1"></i> Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <h5 class="fs-16 fw-semibold text-center mb-0">Showing results for "<span class="text-primary fw-medium fst-italic">Wisata Anda</span> "</h5>
                                        </div>
                                    </div>
                                    <!--end row-->

                                    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                        <div class="offcanvas-body">
                                            <button type="button" class="btn-close text-reset float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                                <div class="search-voice">
                                                    <i class="ri-mic-fill align-middle"></i>
                                                    <span class="voice-wave"></span>
                                                    <span class="voice-wave"></span>
                                                    <span class="voice-wave"></span>
                                                </div>
                                                <h4>Talk to me, what can I do for you?</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-4">
                                    <div class="tab-content text-muted">
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-12 video-list">
                                                    <!-- list wisata -->
                                                    <?php if (!empty($wisata)): ?>
                                                        <?php foreach ($wisata as $w): ?>

                                                            <div class="list-element mt-3">
                                                                <h5 class="mb-1"><a href="javascript:void(0);"><?= esc($w['nama_wisata']) ?></a></h5>

                                                                <div class="d-flex flex-column flex-sm-row">
                                                                    <div class="flex-shrink-0">

                                                                        <?php if (!empty($w['gambar'])): ?>
                                                                            <img src="<?= base_url('assets/images/foto_wisata/' . $w['gambar']) ?>" alt="<?= esc($w['nama_wisata']) ?>" class="rounded" width="250" />
                                                                        <?php else: ?>
                                                                            <div class="bg-light rounded p-5 text-center" style="width: 250px;">No image</div>
                                                                        <?php endif; ?>

                                                                        <!-- <img src="<?= base_url('assets/images/foto_wisata/' . $w['gambar']) ?>"
                                                                            alt="<?= esc($w['nama_wisata']) ?>" class="rounded" width="250"> -->
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                                        <?php if ($w['rank'] == 1): ?>
                                                                            <span class="badge bg-warning text-dark">#1 Terbaik</span>
                                                                        <?php elseif ($w['rank'] == 2): ?>
                                                                            <span class="badge bg-secondary">#2</span>
                                                                        <?php elseif ($w['rank'] == 3): ?>
                                                                            <span class="badge bg-info">#3</span>
                                                                        <?php else: ?>
                                                                            <span class="badge bg-light text-muted">#<?= $w['rank'] ?></span>
                                                                        <?php endif; ?>
                                                                        <span class="text-success"><?= esc($w['kategori_wisata']) ?></span>
                                                                        <p class="text-muted mb-2 deskripsi-text">
                                                                            <?= esc(strlen($w['deskripsi']) > 200 ? substr($w['deskripsi'], 0, 200) . '...' : $w['deskripsi']) ?>
                                                                        </p>
                                                                        <!-- <p class="text-muted mb-0"><?= esc($w['deskripsi']) ?></p> -->
                                                                        <div class="border border-dashed mb-1 mt-3"></div>
                                                                        <a href="<?= base_url('detail-wisata/' . $w['id_wisata']) ?>" class="text-decoration-underline">
                                                                            Selengkapnya <i class="ri-arrow-right-line"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php elseif ($kategoriDipilih): ?>
                                                        <p class="text-muted">Tidak ada wisata ditemukan untuk kategori <b><?= esc($kategoriDipilih) ?></b>.</p>
                                                    <?php endif; ?>
                                                    <!--end list-element-->

                                                </div>
                                                <!--end col-->

                                            </div>
                                            <!--end row-->

                                            <?php if (!empty($totalPages) && $totalPages > 1): ?>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center mt-4">
                                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                                                <a class="page-link" href="<?= base_url('?page=' . $i) ?>"><?= $i ?></a>
                                                            </li>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </nav>
                                            <?php endif; ?>

                                        </div>
                                        <!--end tab-pane-->
                                    </div>
                                    <!--end tab-content-->

                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card -->
                        </div>
                        <!--end card -->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- glightbox js -->
    <script src="assets/libs/glightbox/js/glightbox.min.js"></script>

    <!-- search-result init js -->
    <script src="assets/js/pages/search-result.init.js"></script>
    <!-- Modal JS -->
    <script src="assets/js/pages/modal.init.js"></script>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            var loginModal = new bootstrap.Modal(document.getElementById('loginModals'));
            loginModal.show();
        </script>
    <?php endif; ?>

    <script>
        $(document).ready(function() {
            $('.bookmark-btn').on('click', function() {
                const btn = $(this);
                const idWisata = btn.data('id');

                $.ajax({
                    url: '<?= base_url('toggle-bookmark') ?>',
                    type: 'POST',
                    data: {
                        id_wisata: idWisata
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        if (response.status === 'added') {
                            btn.find('i').removeClass('ri-bookmark-line').addClass('ri-bookmark-fill');
                            btn.find('.bookmark-text').text('Disimpan');
                        } else if (response.status === 'removed') {
                            btn.find('i').removeClass('ri-bookmark-fill').addClass('ri-bookmark-line');
                            btn.find('.bookmark-text').text('Simpan');
                        } else if (response.status === 'error') {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        console.log(xhr.responseText);
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                });
            });
        });
    </script>

</body>

</html>