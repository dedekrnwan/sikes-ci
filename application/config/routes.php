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

#general 
$route['default/delete'] = 'DefaultController/delete';

# auth
$route['auth/login'] = 'auth/AuthController/login';
$route['auth/loginOrtu'] = 'auth/AuthController/loginOrtu';
$route['auth/loginSubmit'] = 'auth/AuthController/loginSubmit';
$route['auth/logout'] = 'auth/AuthController/logout';

# dashboard
$route['dashboard/page'] = 'dashboard/DashboardController/index';
$route['dashboard'] = 'dashboard/DashboardController/index';

# data_master
// siswa
$route['data_master/siswa/page'] = 'data_master/SiswaController/index';
$route['data_master/siswa/listData'] = 'data_master/SiswaController/listData';
$route['data_master/siswa/saveData'] = 'data_master/SiswaController/saveData';
$route['data_master/siswa/getData'] = 'data_master/SiswaController/getData';

// siswa status
$route['data_master/siswa/page/status/(:any)'] = 'data_master/SiswaController/status/$1';
$route['data_master/siswa/listDataSiswaStatus/(:any)'] = 'data_master/SiswaController/listDataSiswaStatus/$1';
$route['data_master/siswa/saveDataSiswaStatus'] = 'data_master/SiswaController/saveDataSiswaStatus';
$route['data_master/siswa/getDataSiswaStatus'] = 'data_master/SiswaController/getDataSiswaStatus';

// tahun ajaran
$route['data_master/tahun_ajaran/page'] = 'data_master/TahunAjaranController/index';
$route['data_master/tahun_ajaran/listData'] = 'data_master/TahunAjaranController/listData';
$route['data_master/tahun_ajaran/saveData'] = 'data_master/TahunAjaranController/saveData';
$route['data_master/tahun_ajaran/getData'] = 'data_master/TahunAjaranController/getData';

// tipe tarif
$route['data_master/tipe_tarif/page'] = 'data_master/TipeTarifController/index';
$route['data_master/tipe_tarif/listData'] = 'data_master/TipeTarifController/listData';
$route['data_master/tipe_tarif/saveData'] = 'data_master/TipeTarifController/saveData';
$route['data_master/tipe_tarif/getData'] = 'data_master/TipeTarifController/getData';
$route['data_master/tipe_tarif/sync/(:any)'] = 'data_master/TipeTarifController/sync/$1';

// tarif_nilai
$route['data_master/tipe_tarif/page/tarif_nilai/(:any)'] = 'data_master/TipeTarifController/tarif_nilai/$1';
$route['data_master/tipe_tarif/listDataTarifNilai/(:any)'] = 'data_master/TipeTarifController/listDataTarifNilai/$1';
$route['data_master/tipe_tarif/saveDataTarifNilai'] = 'data_master/TipeTarifController/saveDataTarifNilai';
$route['data_master/tipe_tarif/getDataTarifNilai'] = 'data_master/TipeTarifController/getDataTarifNilai';


#keuangan
// pembayaran
$route['pembayaran/page'] = 'keuangan/PembayaranController/index';
$route['pembayaran/listData'] = 'keuangan/PembayaranController/listData';
$route['pembayaran/getHistory'] = 'keuangan/PembayaranController/getHistory';
$route['pembayaran/getPembayaran'] = 'keuangan/PembayaranController/getPembayaran';
$route['pembayaran/savePembayaran'] = 'keuangan/PembayaranController/savePembayaran';
$route['pembayaran/getBalanceSms'] = 'keuangan/PembayaranController/getBalanceSms';

// jurnal
$route['jurnal/page'] = 'keuangan/JurnalController/index';
$route['jurnal/listData'] = 'keuangan/JurnalController/listData';
$route['jurnal/getData'] = 'keuangan/JurnalController/getData';
$route['jurnal/saveData'] = 'keuangan/JurnalController/saveData';
$route['jurnal/getSummary/(:any)'] = 'keuangan/JurnalController/getSummary/$1';


#sms
$route['sms'] = 'sms/SmsController/index';
$route['sms/page'] = 'sms/SmsController/index';
$route['sms/listData'] = 'sms/SmsController/listData';