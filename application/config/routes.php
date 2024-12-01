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
$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';
//$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['compte/toggleBlockUser'] = 'Compte/toggleBlockUser';
// Dans le fichier routes.php
$route['admin'] = 'pages/admin';

$route['google_login'] = 'google_login';
$route['Users/login'] = 'Users/login';
$route['Users/callback'] = 'Users/login';
$route['Users/logout'] = 'Users/logout';
$route['dashboard'] = 'dashboard'; // Assurez-vous que cette route pointe vers votre contrôleur de tableau de bord
$route['google_callback'] = 'Users/google_callback';
$route['common/setEtabId'] = 'common/setEtabId';
$route['users/fetchAdministrateurEtab'] = 'users/fetchAdministrateurEtab';
$route['Users/update_User'] = 'Users/update_User';
$route['Users/removeUser'] = 'Users/removeUser';
$route['Users/add_EtabUsers'] = 'Users/add_EtabUsers';
$route['emploiStage/fetchOffreDataDept'] = 'emploiStage/fetchOffreDataDept';

