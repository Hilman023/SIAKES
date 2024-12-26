<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth', 'Auth::verify');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::registered');
$routes->get('/auth/logout', 'Auth::logout');

$routes->group('', ['filter' => '\App\Filters\AuthFilter'], function ($routes) {
  $routes->get('dashboard', 'Dashboard::index');

  $routes->get('profile', 'Users::profile');
  $routes->get('profile/edit', 'Users::editProfile');
  $routes->put('profile', 'Users::updateProfile');
  $routes->get('change-password', 'Users::changePassword');
  $routes->put('change-password', 'Users::updatePassword');

  $routes->get('users/active/(:num)/(:num)', 'Users::active/$1/$2');
  $routes->resource('users', ['controller' => '\App\Controllers\Users']);

  $routes->get('master_kategori', 'MasterKategori::index');

  $routes->group('master_kategori', function ($routes) {
    $routes->resource('kelas', ['controller' => '\App\Controllers\MasterKategoriKelas']);
    $routes->resource('jurusan', ['controller' => '\App\Controllers\MasterKategoriJurusan']);
    $routes->resource('tahun', ['controller' => '\App\Controllers\MasterKategoriTahun']);
  });

  $routes->resource('transaksi_item', ['controller' => '\App\Controllers\TransaksiItem']);
  $routes->resource('transaksi_kategori_sub', ['controller' => '\App\Controllers\TransaksiKategoriSub']);
  $routes->resource('guru', ['controller' => '\App\Controllers\Guru']);
  $routes->resource('siswa', ['controller' => '\App\Controllers\Siswa']);

  $routes->group('transaksi', function ($routes) {
    $routes->get('set_item', 'Transaksi::set_item');
    $routes->get('get_item', 'Transaksi::get_item');
    $routes->get('delete_item', 'Transaksi::delete_item');

    $routes->get('ajax_list_aktor', 'Transaksi::ajax_list_aktor');
    $routes->get('ajax_aktor', 'Transaksi::ajax_aktor');
    $routes->get('ajax_kategori_sub', 'Transaksi::ajax_kategori_sub');
    $routes->get('ajax_item_transaksi', 'Transaksi::ajax_item_transaksi');
    $routes->get('ajax_item', 'Transaksi::ajax_item');

    $routes->get('kwitansi/(:any)', 'Transaksi::kwitansi/$1');
    $routes->get('kwitansi/(:any)/(:any)', 'Transaksi::kwitansi/$1/$2');

    $routes->get('', 'Transaksi::index');
    $routes->get('new', 'Transaksi::new');
    $routes->post('', 'Transaksi::create');
    $routes->get('(:any)/edit', 'Transaksi::edit/$1');
    $routes->get('(:any)', 'Transaksi::show/$1');
    $routes->put('(:any)', 'Transaksi::update/$1');
    $routes->delete('(:any)', 'Transaksi::delete/$1');
  });

  $routes->group('pembayaran', function ($routes) {
    $routes->get('', 'Pembayaran::index');
    $routes->get('ajax_transaksi_detail', 'Pembayaran::ajax_transaksi_detail');
    $routes->get('new', 'Pembayaran::new');
    $routes->post('', 'Pembayaran::create');
  });

  $routes->get('rekap_keuangan', 'RekapKeuangan::index');
  $routes->get('laporan_keuangan', 'LaporanKeuangan::index');
});
