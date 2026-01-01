<!doctype html>
<html lang="en" data-layout="horizontal">

<head>
    <meta charset="utf-8" />
    <title>Detail Wisata | <?= esc($wisata['nama_wisata'] ?? 'Detail') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />
    <style>
        /* jika perlu override kecil agar rapi pada tampilan detail */
        .product-img-slider img {
            max-height: 300px;
            object-fit: cover;
        }

        .product-nav-slider img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- layout wrapper (sama seperti template Anda) -->
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

        <!-- Page content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="card shadow-sm mt-4">
                        <div class="card-body">
                            <div class="row g-4 align-items-start">
                                <!-- Gambar -->
                                <div class="col-xl-5">
                                    <div class="product-img-slider">
                                        <?php if (!empty($wisata['gambar'])): ?>
                                            <img src="<?= base_url('assets/images/foto_wisata/' . $wisata['gambar']) ?>" alt="<?= esc($wisata['nama_wisata']) ?>" class="img-fluid rounded w-100" />
                                        <?php else: ?>
                                            <div class="bg-light rounded p-5 text-center">No image</div>
                                        <?php endif; ?>

                                        <?php if (!empty($galeri)): ?>
                                            <div class="mt-3 d-flex gap-2">
                                                <?php foreach ($galeri as $g): ?>
                                                    <img src="<?= base_url('assets/images/foto_wisata/' . $g['foto']) ?>" alt="" class="img-thumbnail" width="80" height="60">
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Detail -->
                                <div class="col-xl-7">
                                    <h3 class="mb-1"><?= esc($wisata['nama_wisata'] ?? '-') ?></h3>
                                    <p class="mb-2 text-muted">Kategori: <strong><?= esc($wisata['kategori_wisata'] ?? '-') ?></strong></p>

                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="text-warning">⭐ <?= esc($wisata['rating'] ?? '—') ?> / 5</div>
                                        <div class="text-muted"> (<?= esc($wisata['jumlah_ulasan'] ?? '—') ?> ulasan)</div>
                                    </div>

                                    <h6>Deskripsi:</h6>
                                    <p class="text-muted"><?= nl2br(esc($wisata['deskripsi'] ?? '-')) ?></p>

                                    <div class="row g-3 mt-4">


                                        <div class="col-md-4">
                                            <div class="border p-3 rounded">
                                                <p class="text-muted mb-1">Pengunjung / bulan</p>
                                                <h5 class="mb-0"><?= esc($wisata['jumlah_pengunjung'] ?? '-') ?></h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="border p-3 rounded">
                                                <p class="text-muted mb-1">Fasilitas</p>
                                                <h5 class="mb-0"><?= esc($wisata['fasilitas'] ?? '-') ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="<?= base_url('daftar-wisata') ?>" class="btn btn-secondary me-2"><i class="ri-arrow-left-line align-bottom me-1"></i> Kembali</a>
                                        <button id="bookmarkBtn"
                                            class="btn <?= $isBookmarked ? 'btn-danger' : 'btn-primary' ?>"
                                            data-id="<?= esc($wisata['id_wisata']) ?>">
                                            <i class="<?= $isBookmarked ? 'ri-bookmark-fill' : 'ri-bookmark-line' ?> align-bottom me-1"></i>
                                            <?= $isBookmarked ? 'Delete to Bookmark' : 'Add to Bookmark' ?>
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div>

                </div>
            </div>

            <footer class="footer mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            &copy; <?= date('Y') ?> SPK Wisata SAW
                        </div>
                        <div class="col-sm-6 text-end">
                            SPK Wisata - All Rights Reserved
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- SCRIPTS (panggil sekali, gunakan base_url agar path benar) -->
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookmarkBtn = document.getElementById('bookmarkBtn');
            if (!bookmarkBtn) return;

            bookmarkBtn.addEventListener('click', function() {
                const idWisata = this.dataset.id;

                fetch("<?= base_url('/toggle-bookmark') ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "id_wisata=" + encodeURIComponent(idWisata)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'error') {
                            alert(data.message);
                            return;
                        }

                        if (data.status === 'added') {
                            bookmarkBtn.classList.remove('btn-primary');
                            bookmarkBtn.classList.add('btn-danger');
                            bookmarkBtn.innerHTML = '<i class="ri-bookmark-fill align-bottom me-1"></i> Hapus dari Bookmark';
                        } else if (data.status === 'removed') {
                            bookmarkBtn.classList.remove('btn-danger');
                            bookmarkBtn.classList.add('btn-primary');
                            bookmarkBtn.innerHTML = '<i class="ri-bookmark-line align-bottom me-1"></i> Tambahkan ke Bookmark';
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan. Coba lagi nanti.');
                    });
            });
        });
    </script>


</body>

</html>