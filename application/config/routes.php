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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'welcome';
$route['404_override'] = '';

//$route['dashboard/deleteDomain/(:any)'] = 'dashboard/deleteDomain/$1';
//$route['blog/addPost/(:any)/(:any)'] = 'blog/addPost/$1/$2';
//$route['blog/deletePost/(:any)/(:any)'] = 'blog/deletePost/$1/$2';

$route['dashboard'] = 'dashboard';
$route['registro'] = 'registro';
$route['login'] = 'login';
$route['user'] = 'user';
$route['(:any)/user/(:any)'] = 'user/index/$2/$1';

$route['(:any)'] = 'welcome/index/$1';
$route['(:any)/registro'] = 'registro/index/$1';
$route['(:any)/registro/action'] = 'registro/action/$1';
$route['(:any)/login'] = 'login/index/$1';
$route['(:any)/login/checkCredentials'] = 'login/checkCredentials/$1';
$route['(:any)/dashboard'] = 'dashboard/index/$1';
$route['(:any)/logout'] = 'dashboard/logout/$1';

// CRUD POST
$route['(:any)/(:any)/post/(:any)/create'] = 'blog/addPost/$2/$3/$1';
$route['(:any)/(:any)/post/(:any)'] = 'blog/modifyPostView/$2/$3/$1';
$route['(:any)/(:any)/post/(:any)/modify'] = 'blog/modifyPost/$2/$3/$1';
$route['(:any)/(:any)/post/(:any)/delete'] = 'blog/deletePost/$2/$3/$1';

// CRUD BLOG
$route['(:any)/blog/create'] = 'dashboard/addDomain/$1';
$route['(:any)/(:any)'] = 'blog/loader/$2/$1';
$route['(:any)/(:any)/edit'] = 'dashboard/modifyDomainBlogView/$2/$1';
$route['(:any)/(:any)/delete'] = 'dashboard/deleteDomain/$2/$1';

$route['translate_uri_dashes'] = FALSE;
