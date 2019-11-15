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

/* Route Menu Admin */
$route['admin_dashboard']	= 'admin/dashboard';
$route['manajemen_user']	= 'admin/manage_user';
$route['master_perusahaan']	= 'admin/master_perusahaan';
$route['master_cabang']		= 'admin/master_cabang';
$route['master_jns_brg']	= 'admin/master_barang';
$route['admin_set_akun']	= 'admin/setting_akun';
/* Route Menu Admin */

/* Route Transaksi Admin */
$route['create_user']		= 'admin/create_user';
$route['user_byId/(:any)']	= 'admin/user_by_id';
$route['update_pwd']		= 'admin/update_password';
$route['usr_lv_byId/(:any)']= 'admin/user_level_byId';
$route['update_lv']			= 'admin/update_lv_user';
$route['create_company']	= 'admin/create_company';
$route['prsh_by_Id/(:any)'] = 'admin/prsh_by_id';
$route['update_company']	= 'admin/update_company';
$route['create_cabang']		= 'admin/create_cabang';
$route['cbg_byId/(:any)']	= 'admin/cabang_byId';
$route['update_cabang']		= 'admin/update_cabang';
$route['create_barang']		= 'admin/create_barang';
$route['brg_byId/(:any)']	= 'admin/brg_byId';
$route['update_barang']		= 'admin/update_barang';
$route['get_dt_adm']		= 'admin/get_DtAdmin';
$route['update_uname_adm']	= 'admin/update_uname';
$route['update_pass']		= 'admin/update_pwd';
/* Route Transaksi Admin */

/* Route Menu User */
$route['brg_br_in_out']		    = 'user/brg_baru_in_out';
$route['input_barang_masuk']    = 'user/input_barang';
$route['update_barang_masuk']   = 'user/update_barang';
$route['update_stat_barang']    = 'user/update_stat_barang';
$route['user_set_akun']		    = 'user/setting_akun';
$route['update_uname_usr']		= 'admin/update_uname';
$route['update_pass_usr']		= 'admin/update_pwd';
/* Route Menu User */

/* Route Transaksi User */
$route['tmbh_brg_masuk']        = 'user/tambah_data_barang_masuk';
/* Route Transaksi User */

/* Route Menu */
$route['menu/(:any)']			= 'Sistem_control/menu';
$route['doLogin']				= 'Sistem_control/doLogin';
$route['doLogout']				= 'Sistem_control/doLogout';
/* Route Menu */

$route['default_controller'] = 'sistem_control';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
