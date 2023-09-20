<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Tampilan Awal / dashboard
$routes->get('/', 'Home::index');

// Halaman Login
$routes->get('/login', 'Home::login');

// Validasi user / login proses
$routes->post('cekuser', 'Login::index');

// main setelah login
$routes->get('/main', 'Main::index');

// Logout
$routes->get('/logout', 'Login::keluar');

// user
$routes->get('/user', 'User::index');
// user form
$routes->get('/usertambah', 'User::formtambah');
// user simpan
$routes->post('/simpanuser', 'User::simpan');
// user hapus
$routes->post('/hapususer', 'User::hapus');
// user edit
$routes->get('/edituser/(:any)', 'User::formedit/$1');
// user edit simpan
$routes->post('/editsimpan', 'User::editsimpan');




// daftar menu
$routes->get('/daftarmenu', 'DaftarMenu::index');
$routes->get('/daftarmenutambah', 'DaftarMenu::formtambah');
$routes->post('/simpanmenu', 'DaftarMenu::simpan');
$routes->get('/editmenu/(:any)', 'DaftarMenu::formedit/$1');
$routes->post('/updatemenu', 'DaftarMenu::update');
$routes->get('/hapusmenu/(:any)', 'DaftarMenu::hapus/$1');
$routes->get('/uploadgambar/(:any)', 'DaftarMenu::uploadgambar/$1');
$routes->post('/simpangambar', 'DaftarMenu::simpangambar');




// bobot
$routes->get('/bobot', 'Bobot::index');
$routes->get('/bobottambah', 'Bobot::formtambah');
$routes->post('/simpanbobot', 'Bobot::simpan');
$routes->get('/editbobot/(:any)', 'Bobot::formedit/$1');
$routes->post('/updatebobot', 'Bobot::update');
$routes->get('/hapusbobot/(:any)', 'Bobot::hapus/$1');




// Kriteria
$routes->get('/kriteria', 'Kriteria::index');
$routes->get('/kriteriatambah', 'Kriteria::formtambah');
$routes->post('/simpankriteria', 'Kriteria::simpan');
$routes->get('/editkriteria/(:any)', 'Kriteria::formedit/$1');
$routes->post('/updatekriteria', 'Kriteria::update');
$routes->get('/hapuskriteria/(:any)', 'Kriteria::hapus/$1');




// Penilaian
$routes->get('/penilaian', 'Penilaian::index');
$routes->get('/editnilai/(:any)', 'Penilaian::formedit/$1');
$routes->post('/updatenilai', 'Penilaian::update');
