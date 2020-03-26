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

$route['admin'] = 'dashboard/Dashboard/homepage';
$route['admin/animations'] = 'dashboard/Dashboard/animations';
$route['admin/borders'] = 'dashboard/Dashboard/borders';
$route['admin/buttons'] = 'dashboard/Dashboard/buttons';
$route['admin/cards'] = 'dashboard/Dashboard/cards';
$route['admin/charts'] = 'dashboard/Dashboard/charts';
$route['admin/colors'] = 'dashboard/Dashboard/colors';
$route['admin/other'] = 'dashboard/Dashboard/other';
$route['admin/tables'] = 'dashboard/Dashboard/tables';
$route['admin/form'] = 'dashboard/Dashboard/form';


$route['admin/page'] = 'dashboard/Page/page_list';
$route['admin/page/ekle'] = 'dashboard/Page/page_add';
$route['admin/page/sil/(:num)'] = 'dashboard/Page/page_delete';
$route['admin/page/durum/(:num)'] = 'dashboard/Page/isActiveSetter';
$route['admin/page/(:num)'] = 'dashboard/Page/page_update/';


$route['login'] = 'dashboard/User/login';
$route['register'] = 'dashboard/User/register';
$route['forgot_password'] = 'dashboard/User/forgot_password';
$route["logout"] = "dashboard/User/logout";


$route['api/login'] = 'api/ApiUser/login';
$route['api/register'] = 'api/ApiUser/register';
$route['api/forgot_password'] = 'api/ApiUser/forgot_password';
$route["api/logout"] = "api/ApiUser/logout";


$route['sp-admin'] = 'sp_dashboard/Dashboard/homepage';
$route['sp-admin/animations'] = 'sp_dashboard/Dashboard/animations';
$route['sp-admin/borders'] = 'sp_dashboard/Dashboard/borders';
$route['sp-admin/buttons'] = 'sp_dashboard/Dashboard/buttons';
$route['sp-admin/cards'] = 'sp_dashboard/Dashboard/cards';
$route['sp-admin/charts'] = 'sp_dashboard/Dashboard/charts';
$route['sp-admin/colors'] = 'sp_dashboard/Dashboard/colors';
$route['sp-admin/other'] = 'sp_dashboard/Dashboard/other';
$route['sp-admin/tables'] = 'sp_dashboard/Dashboard/tables';
$route['sp-admin/form'] = 'sp_dashboard/Dashboard/form';


$route['sp-admin/page'] = 'sp_dashboard/Page/page_list';
$route['sp-admin/page/ekle'] = 'sp_dashboard/Page/page_add';
$route['sp-admin/page/sil/(:num)'] = 'sp_dashboard/Page/page_delete';
$route['sp-admin/page/durum/(:num)'] = 'sp_dashboard/Page/isActiveSetter';
$route['sp-admin/page/(:num)'] = 'sp_dashboard/Page/page_update/';


$route['sp-login'] = 'sp_dashboard/User/login';
$route["sp-logout"] = "sp_dashboard/User/logout";
$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;
