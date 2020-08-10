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

$route['admin'] = 'dashboard/Dashboard/homepage';

/*
$route['admin/page'] = 'dashboard/Page/list';
$route['admin/page/ekle'] = 'dashboard/Page/add';
$route['admin/page/sil/(:num)'] = 'dashboard/Page/delete';
$route['admin/page/(:num)'] = 'dashboard/Page/show/';
*/

$route['admin/page'] = 'dashboard/Page/list';
$route['admin/page/(:num)'] = 'dashboard/Page/show/';
$route['admin/page/create'] = 'dashboard/Page/create';
$route['admin/page/(:num)/edit'] = 'dashboard/Page/edit/';
$route['admin/page/(:num)/delete'] = 'dashboard/Page/delete/';


$route['admin/notification'] = 'dashboard/Notification/list';
$route['admin/notification/(:num)'] = 'dashboard/Notification/update/';

$route['admin/media-upload'] = 'dashboard/Media/add';

$route['admin/media'] = 'dashboard/Media/list';
$route['admin/media/ekle'] = 'dashboard/Media/add';
$route['admin/media/sil/(:num)'] = 'dashboard/Media/delete';
$route['admin/media/(:num)'] = 'dashboard/Media/update/';

$route['admin/ticket'] = 'dashboard/Ticket/list';
$route['admin/ticket/ekle'] = 'dashboard/Ticket/add';
$route['admin/ticket/sil/(:num)'] = 'dashboard/Ticket/delete';
$route['admin/ticket/(:num)'] = 'dashboard/Ticket/update/';


$route['admin/users'] = 'dashboard/UserSettings/list';
$route['admin/settings/profile'] = 'dashboard/UserSettings/update/';
$route['default_controller'] = 'Web/index';
$route['admin/settings/security'] = 'dashboard/UserSettings/security/';


$route['login'] = 'user/User/login';
$route['register'] = 'user/User/register';
$route['forgot_password'] = 'user/User/forgot_password';
$route["logout"] = "user/User/logout";


$route['api/login'] = 'api/ApiUser/login';
$route['api/register'] = 'api/ApiUser/register';
$route['api/forgot_password'] = 'api/ApiUser/forgot_password';
$route["api/logout"] = "api/ApiUser/logout";


$route['sp-admin'] = 'sp_dashboard/Dashboard/homepage';


$route['sp-admin/page'] = 'sp_dashboard/Page/list';
$route['sp-admin/page/ekle'] = 'sp_dashboard/Page/add';
$route['sp-admin/page/sil/(:num)'] = 'sp_dashboard/Page/delete';
$route['sp-admin/page/(:num)'] = 'sp_dashboard/Page/update/';

$route['sp-admin/notification'] = 'sp_dashboard/Notification/list';
$route['sp-admin/notification/ekle'] = 'sp_dashboard/Notification/add';
$route['sp-admin/notification/sil/(:num)'] = 'sp_dashboard/Notification/delete';
$route['sp-admin/notification/(:num)'] = 'sp_dashboard/Notification/update/';


$route['sp-admin/media-upload'] = 'sp_dashboard/Media/add';

$route['sp-admin/media'] = 'sp_dashboard/Media/list';
$route['sp-admin/media/ekle'] = 'sp_dashboard/Media/add';
$route['sp-admin/media/sil/(:num)'] = 'sp_dashboard/Media/delete';
$route['sp-admin/media/(:num)'] = 'sp_dashboard/Media/update/';

$route['sp-admin/ticket'] = 'sp_dashboard/Ticket/list';
$route['sp-admin/ticket/ekle'] = 'sp_dashboard/Ticket/add';
$route['sp-admin/ticket/sil/(:num)'] = 'sp_dashboard/Ticket/delete';
$route['sp-admin/ticket/(:num)'] = 'sp_dashboard/Ticket/update/';


$route['sp-admin/users'] = 'sp_dashboard/UserSettings/list';
$route['sp-admin/settings/profile'] = 'sp_dashboard/UserSettings/update/';
$route['sp-admin/settings/security'] = 'sp_dashboard/UserSettings/security/';


$route['welcome'] = 'welcome_dashboard/WelcomeDashboard/homepage';
$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;
