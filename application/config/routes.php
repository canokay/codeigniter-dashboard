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

$route['default_controller'] = 'Web/index';

$route['admin']['GET'] = 'dashboard/Dashboard/index';

$route['admin/page']['GET'] = 'dashboard/Page/index';
$route['admin/page']['POST'] = 'dashboard/Page/store';
$route['admin/page/create']['GET']  = 'dashboard/Page/create';
$route['admin/page/(:num)']['GET'] = 'dashboard/Page/show/';
$route['admin/page/(:num)']['POST'] = 'dashboard/Page/update/';
$route['admin/page/(:num)/edit']['GET'] = 'dashboard/Page/edit/';
$route['admin/page/(:num)/delete']['GET'] = 'dashboard/Page/delete/';
$route['admin/page/(:num)/delete']['POST'] = 'dashboard/Page/destroy/';


$route['admin/media-upload']['GET'] = 'dashboard/Media/create';
$route['admin/media-upload']['POST'] = 'dashboard/Media/store';

$route['admin/media']['GET'] = 'dashboard/Media/index';
$route['admin/media']['POST'] = 'dashboard/Media/store';
$route['admin/media/create']['GET']  = 'dashboard/Media/create';
$route['admin/media/delete/(:num)']['GET'] = 'dashboard/Media/destroy';
$route['admin/media/(:num)']['GET'] = 'dashboard/Media/show/';
$route['admin/media/(:num)/edit']['GET'] = 'dashboard/Media/edşt/';
$route['admin/media/(:num)']['POST'] = 'dashboard/Media/update/';



$route['admin/users']['GET'] = 'dashboard/UserSettings/index';
$route['admin/users']['POST'] = 'dashboard/UserSettings/store';
$route['admin/settings/profile'] = 'dashboard/UserSettings/show/';
$route['admin/settings/security'] = 'dashboard/UserSettings/security/';


$route['login']['GET'] = 'user/User/login_form';
$route['login']['POST'] = 'user/User/login';
$route['register']['GET'] = 'user/User/register_form';
$route['register']['POST'] = 'user/User/register';
$route['forgot_password']['GET'] = 'user/User/forgot_password_form';
$route['forgot_password']['POST'] = 'user/User/forgot_password';
$route["logout"]['GET'] = "user/User/logout";


$route['sp-admin']['GET'] = 'sp_dashboard/Dashboard/index';



$route['sp-admin/page']['GET'] = 'sp_dashboard/Page/index';
$route['sp-admin/page']['POST'] = 'sp_dashboard/Page/store';
$route['sp-admin/page/create']['GET']  = 'sp_dashboard/Page/create';
$route['sp-admin/page/delete/(:num)']['GET'] = 'sp_dashboard/Page/destroy';
$route['sp-admin/page/(:num)']['GET'] = 'sp_dashboard/Page/show/';
$route['sp-admin/page/(:num)/edit']['GET'] = 'sp_dashboard/Page/edit/';
$route['sp-admin/page/(:num)']['POST'] = 'sp_dashboard/Page/update/';



$route['sp-admin/media-upload'] = 'sp_dashboard/Media/create';

$route['sp-admin/media']['GET'] = 'sp_dashboard/Media/index';
$route['sp-admin/media']['POST'] = 'sp_dashboard/Media/store';
$route['sp-admin/media/create']['GET']  = 'sp_dashboard/Media/create';
$route['sp-admin/media/delete/(:num)']['GET'] = 'sp_dashboard/Media/destroy';
$route['sp-admin/media/(:num)']['GET'] = 'sp_dashboard/Media/show/';
$route['sp-admin/media/(:num)/edit']['GET'] = 'sp_dashboard/Media/edit/';
$route['sp-admin/media/(:num)']['POST'] = 'sp_dashboard/Media/update/';



$route['sp-admin/users']['GET'] = 'sp_dashboard/UserSettings/index';
$route['sp-admin/users']['POST'] = 'sp_dashboard/UserSettings/store';
$route['sp-admin/settings/profile'] = 'sp_dashboard/UserSettings/show/';
$route['sp-admin/settings/profile/edit'] = 'sp_dashboard/UserSettings/edit/';
$route['sp-admin/settings/security'] = 'sp_dashboard/UserSettings/security/';


$route['welcome']['GET'] = 'welcome_dashboard/WelcomeDashboard/index';


$route['(:any)'] = 'Web/show';
$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;
