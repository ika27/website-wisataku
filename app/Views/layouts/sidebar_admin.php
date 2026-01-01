   <div class="app-menu navbar-menu">
       <!-- LOGO -->
       <div class="navbar-brand-box">
           <!-- Light Logo-->
           <a href="#" class="logo logo-light">
               <span class="logo-sm">
                   <img src="assets/images/logo-sm.png" alt="" height="22">
               </span>
               <span class="logo-lg">
                   <img src="assets/images/logo-light.png" alt="" height="100"><br>
                   <span class="text-white fs-16">WISATAKU</span>
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
               <ul class="navbar-nav" id="navbar-nav">
                   <!-- Dashboard -->
                   <li class="nav-item mt-3">
                       <a class="nav-link menu-link" href="<?= base_url('home') ?>">
                           <i class="ri-honour-line"></i> <span data-key="t-dashboards">Dashboard</span>
                       </a>
                   </li>
                   <!-- Master Data -->
                   <li class="nav-item">
                       <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                           <i class="ri-apps-2-line"></i> <span data-key="t-apps">Master Data</span>
                       </a>
                       <div class="collapse menu-dropdown" id="sidebarDashboards">
                           <ul class="nav nav-sm flex-column">
                               <li class="nav-item">
                                   <a href="<?= base_url('data-alternatif') ?>" class="nav-link" data-key="t-chat"> Data Alternatif </a>
                               </li>
                               <li class="nav-item">
                                   <a href="<?= base_url('data-kriteria') ?>" class="nav-link" data-key="t-chat"> Data Kriteria </a>
                               </li>
                               <li class="nav-item">
                                   <a href="<?= base_url('data-sub-kriteria') ?>" class="nav-link" data-key="t-chat"> Data Sub Kriteria </a>
                               </li>
                               <li class="nav-item">
                                   <a href="<?= base_url('data-penilaian') ?>" class="nav-link" data-key="t-chat"> Data Penilaian </a>
                               </li>
                               <li class="nav-item">
                                   <a href="<?= base_url('data-perhitungan') ?>" class="nav-link" data-key="t-chat"> Data Perhitungan </a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <!-- Hasil akhir -->
                   <li class="nav-item">
                       <a class="nav-link menu-link" href="<?= base_url('hasil-akhir') ?>">
                           <i class="ri-honour-line"></i> <span data-key="t-widgets">Hasil Akhir</span>
                       </a>
                   </li>
                   <!-- Master User -->
                   <li class="nav-item">
                       <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                           <i class="ri-apps-2-line"></i> <span data-key="t-apps">Master User</span>
                       </a>
                       <div class="collapse menu-dropdown" id="sidebarApps">
                           <ul class="nav nav-sm flex-column">
                               <li class="nav-item">
                                   <a href="<?= base_url('data-user') ?>" class="nav-link" data-key="t-chat"> Data User </a>
                               </li>
                               <!-- <li class="nav-item">
                                        <a href="<?= base_url('data-profile') ?>" class="nav-link" data-key="t-chat"> Data Profile </a>
                                    </li> -->
                           </ul>
                       </div>
                   </li>

               </ul>
           </div>
           <!-- Sidebar -->
       </div>

       <div class="sidebar-background"></div>
   </div>