<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
define('admingroup', ['filter' => 'auth', 'namespace' => 'App\Controllers\Admin']);

$routes->get('/', 'Frondend::index');
$routes->add('/artikels', 'Frondend::artikel');
$routes->get('/isi_artikel/(:num)', 'Frondend::isi_artikel/$1');
$routes->get('/turnament', 'Frondend::turnament');
$routes->get('/(:num)', 'Frondend::content/$1');
$routes->get('/gallery', 'Frondend::gallery');
$routes->get('/isi_gallery/(:num)', 'Frondend::isi_gallery/$1');
$routes->get('/kategoriartikel/(:num)', 'Frondend::kategoriartikel/$1');
$routes->get('/kategoriartikel/isi_artikel/(:num)', 'Frondend::isi_artikel/$1');
$routes->get('/isi_artikel/kategoriartikel/(:num)', 'Frondend::kategoriartikel/$1');


$routes->group('', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->add('administrator/login', 'Login::index'); // Form tambah berita
    $routes->add('administrator/loginproses', 'Login::loginProses'); // Form tambah berita
    $routes->add('administrator/logout', 'Login::logout');
    $routes->add('administrator/', 'Login::index');
    $routes->group('', admingroup, function ($routes) {
        $routes->get('administrator/beranda', 'Beranda::index');
        $routes->group('administrator/artikel', admingroup, function ($routes) {
            $routes->get('/', 'Artikel::index'); // Menampilkan daftar berita
            $routes->get('tambah', 'Artikel::tambah'); // Form tambah berita
            $routes->post('simpan', 'Artikel::simpan'); // Proses tambah berita
            $routes->get('status/(:num)', 'Artikel::status/$1'); // Fupdate status berita
            $routes->get('edit/(:num)', 'Artikel::edit/$1'); // Form edit berita
            $routes->post('update/', 'Artikel::update'); // Proses update berita
            $routes->get('hapus/(:num)', 'Artikel::hapus/$1'); // Proses hapus berita
        });
        $routes->group('administrator/banners', admingroup, function ($routes) {
            $routes->get('/', 'Banner::index'); // Menampilkan daftar Banner
            $routes->get('tambah', 'Banner::tambah'); // Form tambah Banner
            $routes->post('simpan', 'Banner::simpan'); // Proses tambah Banner
            $routes->get('status/(:num)', 'Banner::status/$1'); // Fupdate status Banner
            $routes->get('edit/(:num)', 'Banner::edit/$1'); // Form edit Banner
            $routes->post('update/', 'Banner::update'); // Proses update Banner
            $routes->get('hapus/(:num)', 'Banner::hapus/$1'); // Proses hapus Banner
        });
        $routes->group('administrator/foto', admingroup, function ($routes) {
            $routes->get('/', 'Foto::index'); // Menampilkan daftar Foto
            $routes->get('tambah', 'Foto::tambah'); // Form tambah Foto
            $routes->post('simpan', 'Foto::simpan'); // Proses tambah Foto
            $routes->get('status/(:num)', 'Foto::status/$1'); // Fupdate status Foto
            $routes->get('edit/(:num)', 'Foto::edit/$1'); // Form edit Foto
            $routes->post('update/', 'Foto::update'); // Proses update Foto
            $routes->add('image-upload/upload/', 'Foto::upload'); // Proses update Foto
            $routes->get('hapus/(:num)', 'Foto::hapus/$1'); // Proses hapus Foto
        });
        $routes->group('administrator/video', admingroup, function ($routes) {
            $routes->get('/', 'Video::index'); // Menampilkan daftar Video
            $routes->get('tambah', 'Video::tambah'); // Form tambah Video
            $routes->post('simpan', 'Video::simpan'); // Proses tambah Video
            $routes->get('status/(:num)', 'Video::status/$1'); // Fupdate status Video
            $routes->get('edit/(:num)', 'Video::edit/$1'); // Form edit Video
            $routes->post('update/', 'Video::update'); // Proses update Video
            $routes->get('hapus/(:num)', 'Video::hapus/$1'); // Proses hapus Video
        });
        $routes->group('administrator/album', admingroup, function ($routes) {
            $routes->get('/', 'Album::index'); // Menampilkan daftar Album
            $routes->get('tambah', 'Album::tambah'); // Form tambah Album
            $routes->post('simpan', 'Album::simpan'); // Proses tambah Album
            $routes->get('status/(:num)', 'Album::status/$1'); // Fupdate status Album
            $routes->get('edit/(:num)', 'Album::edit/$1'); // Form edit Album
            $routes->post('update/', 'Album::update'); // Proses update Album
            $routes->get('hapus/(:num)', 'Album::hapus/$1'); // Proses hapus Album
        });
        $routes->group('administrator/artikel/kategori', admingroup, function ($routes) {
            $routes->get('/', 'KategoriArtikel::index'); // Menampilkan daftar Kategoriberita
            $routes->get('tambah', 'KategoriArtikel::tambah'); // Form tambah Kategoriberita
            $routes->post('simpan', 'KategoriArtikel::simpan'); // Proses tambah Kategoriberita
            $routes->get('status/(:num)', 'KategoriArtikel::status/$1'); // Update status berita
            $routes->get('edit/(:num)', 'KategoriArtikel::edit/$1'); // Form edit Kategoriberita
            $routes->post('update/', 'KategoriArtikel::update'); // Proses update Kategoriberita
            $routes->get('hapus/(:num)', 'KategoriArtikel::hapus/$1'); // Proses hapus Kategoriberita
        });
        
        $routes->group('administrator/tournament', admingroup, function ($routes) {
            $routes->get('/', 'Tournament::index'); // Menampilkan daftar Tournament
            $routes->get('tambah', 'Tournament::tambah'); // Form tambah Tournament
            $routes->post('simpan', 'Tournament::simpan'); // Proses tambah Tournament
            $routes->get('edit/(:num)', 'Tournament::edit/$1'); // Form edit Tournament
            $routes->post('update/', 'Tournament::update'); // Proses update Tournament
            $routes->get('hapus/(:num)', 'Tournament::hapus/$1'); // Proses hapus Tournament
        });
        $routes->group('administrator/tournament/kategori', admingroup, function ($routes) {
            $routes->get('/', 'KategoriTournament::index'); // Menampilkan daftar KategoriTournament
            $routes->get('tambah', 'KategoriTournament::tambah'); // Form tambah KategoriTournament
            $routes->post('simpan', 'KategoriTournament::simpan'); // Proses tambah KategoriTournament    
            $routes->get('edit/(:num)', 'KategoriTournament::edit/$1'); // Form edit KategoriTournament
            $routes->post('update/', 'KategoriTournament::update'); // Proses update KategoriTournament
            $routes->get('hapus/(:num)', 'KategoriTournament::hapus/$1'); // Proses hapus KategoriTournament
        });
        $routes->group('administrator/contact', admingroup, function ($routes) {
            $routes->get('/', 'Contact::index');
            $routes->get('tambah', 'Contact::tambah');
            $routes->post('simpan', 'Contact::simpan');
            $routes->get('status/(:num)', 'Contact::status/$1');
            $routes->get('edit/(:num)', 'Contact::edit/$1');
            $routes->post('update/', 'Contact::update');
            $routes->get('detail/(:num)', 'Contact::detail/$1');
            $routes->get('hapus/(:num)', 'Contact::hapus/$1');
        });
        $routes->group('administrator/link', admingroup, function ($routes) {
            $routes->get('/', 'Link::index');
            $routes->get('tambah', 'Link::tambah');
            $routes->post('simpan', 'Link::simpan');
            $routes->get('status/(:num)', 'Link::status/$1');
            $routes->get('edit/(:num)', 'Link::edit/$1');
            $routes->post('update/', 'Link::update');
            $routes->get('detail/(:num)', 'Link::detail/$1');
            $routes->get('hapus/(:num)', 'Link::hapus/$1');
        });
        $routes->group('administrator/usermanager', admingroup, function ($routes) {
            $routes->get('/', 'UserManager::index');
            $routes->get('tambah', 'UserManager::tambah');
            $routes->post('simpan', 'UserManager::simpan');
            $routes->get('status/(:num)', 'UserManager::status/$1');
            $routes->add('edit/(:num)', 'UserManager::edit/$1');
            $routes->add('update/(:num)', 'UserManager::update/$1');
            $routes->get('hapus/(:num)', 'UserManager::hapus/$1');
        });
        $routes->group('administrator/menu', admingroup, function ($routes) {
            $routes->get('/', 'Menu::index');
            $routes->get('tambah', 'Menu::tambah');
            $routes->post('simpan', 'Menu::simpan');
            $routes->get('status/(:num)', 'Menu::status/$1');
            $routes->get('hapus/(:num)', 'Menu::hapus/$1');
        });

        $routes->group('administrator/content', admingroup, function ($routes) {
            $routes->get('(:num)', 'Content::index/$1');
            $routes->get('tambah/(:num)', 'Content::tambah/$1');
            $routes->post('simpan', 'Content::simpan');
            $routes->get('edit/(:num)', 'Content::edit/$1');
            $routes->post('update/(:num)', 'Content::update/$1');
            $routes->get('status/(:num)', 'Content::status/$1');
            $routes->get('hapus/(:num)', 'Content::hapus/$1');
        });
        $routes->group('administrator/chatwa', admingroup, function ($routes) {
            $routes->add('', 'Chatwa::index');
            $routes->add('tambah/', 'Chatwa::tambah/');
            $routes->post('simpan', 'Chatwa::simpan');
            $routes->add('edit/(:num)', 'Chatwa::edit/$1');
            $routes->post('update/(:num)', 'Chatwa::update/$1');
            $routes->add('status/(:num)', 'Chatwa::status/$1');
            $routes->add('hapus/(:num)', 'Chatwa::hapus/$1');
        });
    });
});
$routes->group('/', function ($routes) {});
