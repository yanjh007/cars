<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['login']  = 'home/login';
$route['logout'] = 'home/logout';

$route['news'] = 'news';
$route['news/(:any)'] = 'news/view/$1';
$route['news/create'] = 'news/create';

$route['clients'] = 'clients';
$route['clients/save'] = 'clients/save';
$route['clients/link'] = 'clients/link';
$route['clients/edit/(:any)'] = 'clients/edit/$1';
$route['clients/(:any)'] = 'clients/detail/$1';


$route['cars'] = 'cars';
$route['cars/save'] = 'cars/save';
$route['cars/link'] = 'cars/save';
$route['cars/edit/(:any)'] = 'cars/edit/$1';
$route['cars/(:any)'] = 'cars/detail/$1';

$route['service'] = 'service';

$route['404_override'] = '';


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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/



/* End of file routes.php */
/* Location: ./application/config/routes.php */