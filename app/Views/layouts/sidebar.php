  <div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
          <!-- Dark Logo-->
          <a href="#" class="logo logo-dark">
              <span class="logo-sm">
                  <img src="assets/images/logo-sm.png" alt="" height="22">
              </span>
              <span class="logo-lg">
                  <img src="assets/images/logo-dark.png" alt="" height="100">
              </span>
          </a>
          <!-- Light Logo-->
          <a href="#" class="logo logo-light">
              <span class="logo-sm">
                  <img src="assets/images/logo-sm.png" alt="" height="22">
              </span>
              <span class="logo-lg">
                  <img src="assets/images/logo-light.png" alt="" height="100">
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
                      <a class="nav-link menu-link" href="<?= base_url('/daftar-wisata'); ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
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
                  <li class="nav-item">
                      <a class="nav-link menu-link" href="<?= base_url('hasil-akhir-guest'); ?>">
                          <i class="ri-honour-line"></i> <span data-key="t-dashboards">Hasil Akhir</span>
                      </a>
                  </li> <!-- end Hasil akhir Menu -->
                  <?php $session = session(); ?>
                  <?php if ($session->get('logged_in')): ?>

                      <li class="nav-item">
                          <a class="nav-link menu-link" href="<?= base_url('riwayat-user'); ?>">
                              <i class="ri-bookmark-3-line"></i> <span data-key="t-dashboards">Riwayat Anda</span>
                          </a>
                      </li> <!-- end Bookmark Menu -->
                  <?php endif; ?>
              </ul>
          </div>
          <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
  </div>