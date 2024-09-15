<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard';


// Piket
$route['piket/surat/add_document'] = 'Insert_controller/insert_surat';
$route['piket/go/prog_save']    = 'Insert_controller/prog_insert_surat';
$route['piket/surat/listing']    = 'View_controller/piket_view';
$route['piket/surat/update/(:any)']   = 'Update_controller/edit_surat/$1';
$route['piket/go/prog_update_surat']   = 'Update_controller/prog_update_surat';
$route['piket/surat/delete/(:any)']   = 'Update_controller/remove_surat/$1';

// End Piket 

// persuratan
$route['persuratan/surat/listing']    = 'View_controller/persuratan_view';
$route['persuratan/surat/add_document/(:any)']    = 'Update_controller/add_disposisi/$1';
$route['persuratan/go/prog_add_document/(:any)']   = 'Update_controller/prog_insert_disposisi/$1';
$route['persuratan/surat/update_document/(:any)']   = 'Update_controller/update_disposisi/$1';
$route['persuratan/go/prog_update_document']     = 'Update_controller/prog_update_disposisi';
$route['persuratan/go/final/(:any)'] = 'Update_controller/final_result/$1';
// $route['persuratan/surat/add_disposisi/(:any)/(:any)']   = 'Update_controller/add_disposisi_byId/$1/$2';

// sample
$route['persuratan/surat/forward_document/(:any)'] = 'Update_controller/forward_disposisi_persuratan/$1';
$route['persuratan/go/prog_update_disposisi_persuratan'] = 'Update_controller/prog_update_disposisi_persuratan';

// end persuratan


// admin
$route['admin/create_user'] = 'Insert_controller/create_user';
$route['admin/delete_user/(:any)'] = 'Update_controller/deleteUser/$1';
$route['admin/user/listing'] = 'View_controller/user_view';
$route['admin/go/process'] = 'Insert_controller/process_create_user';

// auth
$route['login'] = 'Insert_controller/login';
$route['guest/login'] = 'Insert_controller/login_guest';
$route['logout'] = 'Insert_controller/logout';
$route['auth/login'] = 'Insert_controller/proses_login';

// pimpinan

$route['pimpinan/surat/listing'] = 'View_controller/pimpinan_view';
$route['pimpinan/reject/surat/(:any)'] = 'Update_controller/update_penolakan/$1';

$route['pimpinan/approve/surat/(:any)'] = 'Update_controller/approveBerkas/$1';

$route['disposisi/excel/download/(:any)'] = 'Generate_controller/excel_process/$1';
$route['disposisi/first/download/(:any)'] = 'Generate_controller/firstDisposisi/$1';


// end pimpinan 

//Pull Notif 
$route['pull_notifications'] = 'Dashboard/pull_notifications';
$route['follow']            = 'Dashboard/followNotification';
$route['tracking/surat/(:any)']= 'View_controller/trackingLog/$1';

// All User
$route['surat_selesai']    = 'View_controller/suratSelesaiView';
$route['daftar/surat_selesai']    = 'View_controller/sekretarisView';
// All User

$route['export_pdf/(:any)'] = 'Pdf_export/index/$1';
$route['cleardb'] = 'Custom/clear_db';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
