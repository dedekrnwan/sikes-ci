<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'DefaultController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# auth
$route['auth/login'] = 'auth/AuthController/login';
$route['auth/loginSubmit'] = 'auth/AuthController/loginSubmit';
$route['auth/logout'] = 'auth/AuthController/logout';

# dashboard
$route['dashboard/page'] = 'dashboard/DashboardController/index';
$route['dashboard'] = 'dashboard/DashboardController/index';

# data_master
$route['data_master/siswa/page'] = 'data_master/SiswaController/index';
$route['data_master/siswa/listData'] = 'data_master/SiswaController/listData';
$route['data_master/siswa/saveData'] = 'data_master/SiswaController/saveData';
$route['data_master/siswa/getData'] = 'data_master/SiswaController/getData';
$route['data_master/siswa/page/status'] = 'data_master/SiswaController/status';

$route['data_master/tahun_ajaran/page'] = 'data_master/TahunAjaranController/index';
$route['data_master/tahun_ajaran/listData'] = 'data_master/TahunAjaranController/listData';
$route['data_master/tahun_ajaran/saveData'] = 'data_master/TahunAjaranController/saveData';
$route['data_master/tahun_ajaran/getData'] = 'data_master/TahunAjaranController/getData';

$route['data_master/tipe_tarif/page'] = 'data_master/TipeTarifController/index';
$route['data_master/tipe_tarif/listData'] = 'data_master/TipeTarifController/listData';
$route['data_master/tipe_tarif/saveData'] = 'data_master/TipeTarifController/saveData';
$route['data_master/tipe_tarif/getData'] = 'data_master/TipeTarifController/getData';
$route['data_master/tipe_tarif/page/detail'] = 'data_master/TipeTarifController/detail';

#pembayaran
$route['pembayaran'] = 'pembayaran/PembayaranController/index';
$route['pembayaran/page'] = 'pembayaran/PembayaranController/index';

#sms
$route['sms'] = 'sms/SmsController/index';
$route['sms/page'] = 'sms/SmsController/index';