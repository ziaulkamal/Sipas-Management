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
$route['persuratan/go/prog_add_document']   = 'Update_controller/prog_insert_disposisi';
$route['persuratan/surat/update_document/(:any)']   = 'Update_controller/update_disposisi/$1';
$route['persuratan/go/prog_update_document']     = 'Update_controller/prog_update_disposisi';
// $route['persuratan/surat/add_disposisi/(:any)/(:any)']   = 'Update_controller/add_disposisi_byId/$1/$2';

// end persuratan



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;