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
