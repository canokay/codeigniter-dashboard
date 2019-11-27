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
$route['default_controller'] = 'Web/homepage';

$route['admin'] = 'Dashboard/homepage';
$route['admin/animations'] = 'Dashboard/animations';
$route['admin/borders'] = 'Dashboard/borders';
$route['admin/buttons'] = 'Dashboard/buttons';
$route['admin/cards'] = 'Dashboard/cards';
$route['admin/charts'] = 'Dashboard/charts';
$route['admin/colors'] = 'Dashboard/colors';
$route['admin/other'] = 'Dashboard/other';
$route['admin/tables'] = 'Dashboard/tables';
$route['admin/form'] = 'Dashboard/form';


$route['admin/page'] = 'Page/page_list';
$route['admin/page/ekle'] = 'Page/page_add';
$route['admin/page/sil/(:num)'] = 'Page/page_delete';
$route['admin/page/durum/(:num)'] = 'Page/isActiveSetter';
$route['admin/page/(:num)'] = 'Page/page_update/';


$route['login'] = 'User/login';
$route['register'] = 'User/register';
$route['forgot_password'] = 'User/forgot_password';
$route["logout"] = "User/logout";


$route['api/login'] = 'ApiUser/login';
$route['api/register'] = 'ApiUser/register';
$route['api/forgot_password'] = 'ApiUser/forgot_password';
$route["api/logout"] = "ApiUser/logout";

$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;
