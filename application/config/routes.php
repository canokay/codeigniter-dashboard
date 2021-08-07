<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Example Module Routes
| -------------------------------------------------------------------------
|
$route['admin/example']['GET'] = 'dashboard/Example/index';
$route['admin/example']['POST'] = 'dashboard/Example/store';
$route['admin/example/create']['GET']  = 'dashboard/Example/create';
$route['admin/example/(:num)']['GET'] = 'dashboard/Example/show/';
$route['admin/example/(:num)']['POST'] = 'dashboard/Example/update/';
$route['admin/example/(:num)/edit']['GET'] = 'dashboard/Example/edit/';
$route['admin/example/(:num)/delete']['GET'] = 'dashboard/Example/delete/';
$route['admin/example/(:num)/delete']['POST'] = 'dashboard/Example/destroy/';
*/

$route['default_controller'] = 'Web/index';

$route['admin']['GET'] = 'dashboard/Dashboard/index';

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


$route['sp-admin']['GET'] = 'sp_dashboard/Dashboard/index';

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


$route['login']['GET'] = 'user/User/login_form';
$route['login']['POST'] = 'user/User/login';
$route['register']['GET'] = 'user/User/register_form';
$route['register']['POST'] = 'user/User/register';
$route['forgot_password']['GET'] = 'user/User/forgot_password_form';
$route['forgot_password']['POST'] = 'user/User/forgot_password';
$route["logout"]['GET'] = "user/User/logout";

$route['welcome']['GET'] = 'welcome_dashboard/WelcomeDashboard/index';

$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;