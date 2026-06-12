<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//---> Home
$route['default_controller'] = 'home';

//---> login admin
$route['login'] = 'auth';
$route['login/proses'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'dashboard';

//---> registrasi dan login pasien
$route['pasien/register'] = 'pasien/register';
$route['pasien/simpan-register'] = 'pasien/simpan_register';
$route['pasien/login'] = 'pasien/login';
$route['pasien/login/proses'] = 'pasien/proses_login';
$route['pasien/dashboard'] = 'pasien/dashboard';
$route['pasien/logout'] = 'pasien/logout';

//---> pasien mendaftar dan berobat
$route['pasien/daftar-berobat'] = 'pasien/daftar_berobat';
$route['pasien/simpan-pendaftaran'] = 'pasien/simpan_pendaftaran';
$route['pasien/status-pendaftaran'] = 'pasien/status_pendaftaran';

//---> admin kelola pendaftaran
$route['admin/pendaftaran'] = 'admin_pendaftaran';
$route['admin/pendaftaran/setujui/(:num)'] = 'admin_pendaftaran/setujui/$1';
$route['admin/pendaftaran/tolak/(:num)'] = 'admin_pendaftaran/tolak/$1';

//---> admin kelola pasien
$route['admin/pasien'] = 'admin_pasien';
$route['admin/pasien/tambah'] = 'admin_pasien/tambah';
$route['admin/pasien/simpan'] = 'admin_pasien/simpan';
$route['admin/pasien/edit/(:num)'] = 'admin_pasien/edit/$1';
$route['admin/pasien/update/(:num)'] = 'admin_pasien/update/$1';
$route['admin/pasien/hapus/(:num)'] = 'admin_pasien/hapus/$1';

//--->admin kelola dokter
$route['admin/dokter'] = 'admin_dokter';
$route['admin/dokter/tambah'] = 'admin_dokter/tambah';
$route['admin/dokter/simpan'] = 'admin_dokter/simpan';
$route['admin/dokter/edit/(:num)'] = 'admin_dokter/edit/$1';
$route['admin/dokter/update/(:num)'] = 'admin_dokter/update/$1';
$route['admin/dokter/hapus/(:num)'] = 'admin_dokter/hapus/$1';

//---> admin jadwal pasien
$route['admin/jadwal'] = 'admin_jadwal';

//---> admin laporan
$route['admin/laporan'] = 'admin_laporan';
$route['admin/laporan/csv'] = 'admin_laporan/export_csv';
$route['admin/laporan/pdf'] = 'admin_laporan/export_pdf';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;