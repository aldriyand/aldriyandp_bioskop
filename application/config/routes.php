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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['movie/(:num)'] = 'movie/index/$1';
$route['book-ticket/(:num)'] = 'Book/index/$1';
$route['my-tickets'] = 'Tickets/index';
$route['process']['post'] = 'Book/process';
$route['update-status/(:num)']['post'] = 'Book/update_status/$1';

$route['auth/signin'] = 'auth/signin';
$route['auth/signup'] = 'auth/signup';
$route['auth/signout'] = 'auth/signout';

$route['admin/dashboard'] = 'administrator/dashboard';
$route['admin/movies'] = 'administrator/movies';
$route['admin/movies/add'] = 'administrator/movies/add';
$route['admin/movies/create']['post'] = 'administrator/movies/create';
$route['admin/movies/edit/(:num)'] = 'administrator/movies/edit/$1';
$route['admin/movies/update']['post'] = 'administrator/movies/update';
$route['admin/movies/delete/(:num)'] = 'administrator/movies/delete/$1';
$route['admin/cinemas'] = 'administrator/cinemas';
$route['admin/cinemas/add'] = 'administrator/cinemas/add';
$route['admin/cinemas/create']['post'] = 'administrator/cinemas/create';
$route['admin/cinemas/edit/(:num)'] = 'administrator/cinemas/edit/$1';
$route['admin/cinemas/update']['post'] = 'administrator/cinemas/update';
$route['admin/cinemas/delete/(:num)'] = 'administrator/cinemas/delete/$1';
$route['admin/schedules'] = 'administrator/schedules';
$route['admin/schedules/add'] = 'administrator/schedules/add';
$route['admin/schedules/create']['post'] = 'administrator/schedules/create';
$route['admin/schedules/edit/(:num)'] = 'administrator/schedules/edit/$1';
$route['admin/schedules/update']['post'] = 'administrator/schedules/update';
$route['admin/schedules/delete/(:num)'] = 'administrator/schedules/delete/$1';
$route['admin/orders'] = 'administrator/orders';
$route['admin/orders/edit/(:num)'] = 'administrator/orders/edit/$1';
$route['admin/orders/verify/(:num)'] = 'administrator/orders/verify/$1';
$route['admin/orders/delete/(:num)'] = 'administrator/orders/delete/$1';