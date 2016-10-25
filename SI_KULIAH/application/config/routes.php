<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "con_user";
$route['404_override'] = '';

/*admin*/
$route['admin'] = 'con_user/index';
$route['admin/signup'] = 'con_user/signup';
$route['admin/create_member'] = 'con_user/create_member';
$route['admin/login'] = 'con_user/index';
$route['admin/logout'] = 'con_user/logout';
$route['admin/login/validate_credentials'] = 'con_user/validate_credentials';

$route['pimpinan'] = 'con_pimpinan/index';
$route['pimpinan/edit/(:num)'] = 'con_pimpinan/update_data/$1';
$route['pimpinan/save_edit_jurusan/(:num)'] = 'con_pimpinan/save_update_jurusan/$1';
$route['pimpinan/save_edit_fakultas/(:num)'] = 'con_pimpinan/save_update_fakultas/$1';

$route['matakuliah']='con_matkul/view_matkul';
$route['matakuliah/add'] = 'con_matkul/tambah_data';
$route['matakuliah/save_add'] = 'con_matkul/save_tambahdata';
$route['matakuliah/edit/(:num)']='con_matkul/update_data/$1';
$route['matakuliah/save_edit/(:any)'] = 'con_matkul/save_update_data/$1';
$route['matakuliah/delete/(:num)']='con_matkul/delete_data/$1';
$route['matakuliah/add']='con_matkul/tambah_data';

$route['ruang']='con_ruang/view_ruang';
$route['ruang/add'] = 'con_ruang/tambah_data';
$route['ruang/save_add'] = 'con_ruang/save_tambahdata';
$route['ruang/edit/(:any)']='con_ruang/update_data/$1';
$route['ruang/save_edit/(:any)'] = 'con_ruang/save_update_data/$1';
$route['ruang/delete/(:any)']='con_ruang/delete_data/$1';
$route['ruang/add']='con_ruang/tambah_data';

$route['dosenif'] = 'con_dosenif/view_dosenif';
$route['dosenif/add'] = 'con_dosenif/tambah_data';
$route['dosenif/save_add'] = 'con_dosenif/save_tambahdata';
$route['dosenif/edit/(:any)'] = 'con_dosenif/update_data/$1';
$route['dosenif/save_edit/(:any)'] = 'con_dosenif/save_update_data/$1';
$route['dosenif/delete/(:any)'] = 'con_dosenif/delete_data/$1';

$route['dosennonif'] = 'con_dosennonif/view_dosennonif';
$route['dosennonif/add'] = 'con_dosennonif/tambah_data';
$route['dosennonif/save_add'] = 'con_dosennonif/save_tambahdata';
$route['dosennonif/edit/(:any)'] = 'con_dosennonif/update_data/$1';
$route['dosennonif/save_edit/(:any)'] = 'con_dosennonif/save_update_data/$1';
$route['dosennonif/delete/(:any)'] = 'con_dosennonif/delete_data/$1';

$route['pengampu'] = 'con_pengampu/view_pengampu';
$route['pengampu/add'] = 'con_pengampu/tambah_data';
$route['pengampu/save_add'] = 'con_pengampu/save_tambahdata';
$route['pengampu/edit/(:num)'] = 'con_pengampu/update_data/$1';
$route['pengampu/save_edit/(:num)'] = 'con_pengampu/save_update_data/$1';
$route['pengampu/delete/(:num)'] = 'con_pengampu/delete_data/$1';

$route['beban_non_if'] = 'con_beban_non_if/index';
$route['beban_non_if/add'] = 'con_beban_non_if/tambahdata';
$route['beban_non_if/save_add'] = 'con_beban_non_if/validate_tambahdata';
$route['beban_non_if/edit/(:num)'] = 'con_beban_non_if/update_data/$1';
$route['beban_non_if/save_edit/(:num)'] = 'con_beban_non_if/save_update_data/$1';
$route['beban_non_if/delete/(:num)'] = 'con_beban_non_if/delete_data/$1';

$route['beban_non_fsm'] = 'con_beban_non_fsm/index';
$route['beban_non_fsm/add'] = 'con_beban_non_fsm/tambahdata';
$route['beban_non_fsm/save_add'] = 'con_beban_non_fsm/validate_tambahdata';
$route['beban_non_fsm/edit/(:num)'] = 'con_beban_non_fsm/update_data/$1';
$route['beban_non_fsm/save_edit/(:num)'] = 'con_beban_non_fsm/save_update_data/$1';
$route['beban_non_fsm/delete/(:num)'] = 'con_beban_non_fsm/delete_data/$1';

$route['jadwalkuliah'] = 'con_jadwal_kuliah/index';
$route['jadwalkuliah/add'] = 'con_jadwal_kuliah/tambahdata';
$route['jadwalkuliah/save_add'] = 'con_jadwal_kuliah/validate_tambahdata';
$route['jadwalkuliah/edit/(:num)'] = 'con_jadwal_kuliah/update_data/$1';
$route['jadwalkuliah/save_edit/(:num)'] = 'con_jadwal_kuliah/save_update_data/$1';
$route['jadwalkuliah/delete/(:num)'] = 'con_jadwal_kuliah/delete_data/$1';

$route['jadwalujian'] = 'con_jadwal_ujian/index';
$route['jadwalujian/add'] = 'con_jadwal_ujian/tambahdata';
$route['jadwalujian/save_add'] = 'con_jadwal_ujian/validate_tambahdata';
$route['jadwalujian/edit/(:num)'] = 'con_jadwal_ujian/update_data/$1';
$route['jadwalujian/save_edit/(:num)'] = 'con_jadwal_ujian/save_update_data/$1';
$route['jadwalujian/delete/(:num)'] = 'con_jadwal_ujian/delete_data/$1';

$route['jadwal/jadwal'] = 'con_jadwal/jadwal';
$route['jadwal/jadwal_view'] = 'con_jadwal/jadwal_view';

$route['hitungbeban'] = 'con_hitungbeban';
$route['hitungbeban/view'] = 'con_hitungbeban/view';

$route['report/SKKelebihan'] = 'con_skkelebihan';
$route['report/SKKelebihan_view'] = 'con_skkelebihan/view';

$route['report/SKDekan'] = 'con_skdekan';
$route['report/SKDekan_view'] = 'con_skdekan/SKDekan_view';

$route['report/view_jadwal'] = 'con_report_jadwal/index';

$route['report/jadwalkuliah'] = 'con_report_jadwal_kuliah/jadwal';
$route['report/jadwal_view'] = 'con_report_jadwal_kuliah/jadwal_view';

$route['report/jadwalujian'] = 'con_report_jadwal_ujian/jadwal';
$route['report/jadwalujian_view'] = 'con_report_jadwal_ujian/jadwal_view';

/* End of file routes.php */
/* Location: ./application/config/routes.php */