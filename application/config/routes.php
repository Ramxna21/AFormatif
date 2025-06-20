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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'index';
$route['auth'] = 'auth/index';
$route['auth/action_login'] = 'auth/action_login';
$route['auth/logout'] = 'auth/logout';

$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/action_create_pertanyaan'] = 'admin/action_create_pertanyaan';
$route['admin/action_edit_pertanyaan'] = 'admin/action_edit_pertanyaan';
$route['admin/action_delete_pertanyaan'] = 'admin/action_delete_pertanyaan';

$route['admin/simpan_formulir'] = 'admin/simpan_formulir';
$route['pendaftaran/sukses'] = 'admin/pendaftaran_sukses';
$route['admin/read_pertanyaan'] = 'admin/read_pertanyaan'; // To list all questions

$route['admin/read_formulir'] = 'admin/read_formulir'; // Untuk daftar semua formulir
$route['admin/read_formulir_detail/(:num)'] = 'admin/read_formulir_detail/$1'; // Untuk detail satu formulir