<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');
$routes->get('/home', 'Page::home');
$routes->get('/data-alternatif', 'Page::dataAlternatif');
$routes->get('/data-kriteria', 'Page::dataKriteria');
$routes->get('/data-sub-kriteria', 'Page::dataSubKriteria');
$routes->get('/data-penilaian', 'Page::dataPenilaian');
$routes->get('/data-perhitungan', 'Page::dataPerhitungan');
$routes->get('/hasil-akhir', 'Page::hasilAkhir');
$routes->get('/data-user', 'Page::dataUser');
$routes->get('/data-profile', 'Page::dataProfile');
$routes->post('/data-profile/update', 'Page::updateProfile');
$routes->post('/data-profile/update-foto', 'Page::updateFoto');

// halaman daftar wisata
$routes->get('/daftar-wisata', 'Page::daftarWisata');
$routes->get('/hasil-akhir-guest', 'Page::hasilAkhirGuest');
$routes->get('/riwayat-user', 'Page::bookmarkList');
$routes->get('/detail-wisata/(:any)', 'Page::detail/$1');

// proses login
$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/register', 'Auth::register');
$routes->get('/auth/logout', 'Auth::logout');

// lupa password
$routes->post('auth/forgotPassword', 'Auth::forgotPassword');
$routes->get('auth/resetPassword/(:segment)', 'Auth::resetPassword/$1');
$routes->post('auth/processReset', 'Auth::processReset');

// search proses
$routes->post('/search', 'Page::search');
$routes->get('/search', 'Page::search');

// search data alternatif
$routes->get('data-alternatif', 'Page::dataAlternatif');
// search data hasilakhir
$routes->get('hasil-akhir', 'Page::hasilAkhir');
$routes->get('data-kriteria', 'Page::dataKritera');
$routes->get('data-sub-kriteria', 'Page::dataSubKriteria');
$routes->get('data-penilaian', 'Page::dataPenilaian');
$routes->get('data-user', 'Page::dataUser');

// update & delete data alternatif
$routes->post('/data-alternatif/update', 'DataAlternatif::update');
$routes->get('/data-alternatif/delete/(:num)', 'DataAlternatif::delete/$1');
$routes->post('/data-alternatif/tambah', 'DataAlternatif::tambah');

// update & delete data kriteria
$routes->post('/data-kriteria/tambah', 'DataKriteria::tambah');
$routes->post('/data-kriteria/update', 'DataKriteria::update');
$routes->get('/data-kriteria/delete/(:num)', 'DataKriteria::delete/$1');
$routes->post('/data-sub-kriteria/tambah', 'DataSubKriteria::tambah');
$routes->post('/data-sub-kriteria/update', 'DataSubKriteria::update');
$routes->get('/data-sub-kriteria/delete/(:num)', 'DataSubKriteria::delete/$1');

// update data user
$routes->post('/data-user/tambah', 'DataUser::tambah');
$routes->post('/data-user/update', 'DataUser::update');
$routes->get('/data-user/delete/(:num)', 'DataUser::delete/$1');

// cetak pdf
$routes->get('/data-kriteria/cetak', 'DataKriteria::cetak');
$routes->get('/data-sub-kriteria/cetak', 'DataSubKriteria::cetak');

// bookmark
$routes->post('/toggle-bookmark', 'Page::toggleBookmark');
$routes->post('bookmark/add', 'BookmarkController::add');
