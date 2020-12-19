<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

// custome user
$route['user/login'] = 'welcome/login';
$route['user/login-proses'] = 'welcome/loginProses';
$route['user/logout'] = 'welcome/logout';
$route['user/register'] = 'welcome/register';
$route['user/register-proses'] = 'welcome/registerProses';
$route['user/daftar-wifi-publik'] = 'u_pengajuan';
$route['user/proses-daftar-wifi'] = 'u_pengajuan/prosesDaftar';
$route['user/data-pengajuan'] = 'u_pengajuan/dataPengajuan';
$route['user/profile'] = 'welcome/profile';
$route['user/manual-book'] = 'welcome/manualBook';
$route['user/lupa-password'] = 'welcome/lupaPass';
$route['user/reset-password'] = 'welcome/resetPass';
$route['user/lihat-pengajuan/(:any)'] = 'u_pengajuan/lihat/$1';

//

// custome admin 
$route['admin'] = 'admin';
$route['admin/login-proses'] = 'admin/loginProses';
$route['admin/logout'] = 'dashboard/logout';
$route['admin/dashboard'] = 'dashboard';
$route['admin/data-kecamatan'] = 'dashboard/kecamatan';
$route['admin/tambah-kecamatan'] = 'dashboard/addKecamatan';
$route['admin/proses-tambah-kecamatan'] = 'dashboard/prosesAddKecamatan';
$route['admin/edit-kecamatan/(:any)'] = 'dashboard/editKecamatan/$1';
$route['admin/proses-edit-kecamatan'] = 'dashboard/prosesEditKecamatan';
$route['admin/data-kelurahan'] = 'kelurahan';
$route['admin/tambah-kelurahan'] = 'kelurahan/addKelurahan';
$route['admin/proses-tambah-kelurahan'] = 'kelurahan/prosesAddKelurahan';
$route['admin/edit-kelurahan/(:any)'] = 'kelurahan/editKelurahan/$1';
$route['admin/proses-edit-kelurahan'] = 'kelurahan/prosesEditKelurahan';
$route['admin/data-tempat'] = 'tempat';
$route['admin/tambah-tempat'] = 'tempat/addTempat';
$route['admin/proses-tambah-tempat'] = 'tempat/prosesAddTempat';
$route['admin/edit-tempat/(:any)'] = 'tempat/editTempat/$1';
$route['admin/proses-edit-tempat'] = 'tempat/prosesEditTempat';
$route['admin/data-pengajuan'] = 'pengajuan';
$route['admin/lihat-pengajuan/(:any)'] = 'pengajuan/lihat/$1';
$route['admin/status-pengajuan'] = 'pengajuan/submitStatus';
//
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
