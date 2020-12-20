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
$route['default_controller'] = 'Front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Administration']='Admin';
$route['View_init/(:any)/(:any)']='Front/View_init/$1/$2';
$route['View_init/(:any)/(:any)/(:any)']='Front/View_init/$1/$2/$3';
$route['View/(:any)/(:any)']='Front/View/$1/$2';
$route['View/(:any)/(:any)/(:any)']='Front/View/$1/$2/$3';
$route['View_admin/(:any)/(:any)']='Admin/View_admin/$1/$2';
$route['View_admin/(:any)/(:any)/(:any)']='Admin/View_admin/$1/$2/$3';
$route['View_front/(:any)/(:any)']='Admin/View_front/$1/$2';
$route['View_front/(:any)/(:any)/(:any)']='Admin/View_front/$1/$2/$3';
$route['View_vendor/(:any)/(:any)']='Vendor/View_vendor/$1/$2';
$route['View_vendor/(:any)/(:any)/(:any)']='Vendor/View_vendor/$1/$2/$3';
$route['Insert/(:any)/(:any)/(:any)/(:any)']='Admin/Insert/$1/$2/$3/$4';
$route['Add_product_admin/(:any)/(:any)/(:any)/(:any)']='Admin/add_product_admin/$1/$2/$3/$4';
$route['Add_product_vendor/(:any)/(:any)/(:any)/(:any)']='Vendor/Add_product_vendor/$1/$2/$3/$4';
$route['Delete/(:any)/(:any)/(:any)/(:any)']='Admin/Delete/$1/$2/$3/$4';
$route['Update_all/(:any)/(:any)/(:any)/(:any)/(:any)']='Admin/Update_all/$1/$2/$3/$4/$5';

$route['Add_Category/(:any)/(:any)/(:any)/(:any)']='Admin/Add_Category/$1/$2/$3/$4';
$route['Edit/(:any)/(:any)/(:any)/(:any)']='Admin/Edit/$1/$2/$3/$4';
$route['Edit_Category/(:any)/(:any)/(:any)/(:any)']='Admin/Edit_Category/$1/$2/$3/$4';
$route['Delete/(:any)/(:any)/(:any)/(:any)']='Admin/Delete/$1/$2/$3/$4';
$route['Add_Sub_Category/(:any)/(:any)/(:any)/(:any)']='Admin/Add_Sub_Category/$1/$2/$3/$4';
$route['Edit_Sub_Category/(:any)/(:any)/(:any)/(:any)']='Admin/Edit_Sub_Category/$1/$2/$3/$4';
$route['Add_Products/(:any)/(:any)/(:any)/(:any)']='Admin/Add_Products/$1/$2/$3/$4';
$route['Edit_Products/(:any)/(:any)/(:any)/(:any)']='Admin/Edit_Products/$1/$2/$3/$4';
$route['Sub_Image/(:any)/(:any)/(:any)/(:any)']='Admin/Sub_Image/$1/$2/$3/$4';
$route['Edit_access/(:any)/(:any)/(:any)']='Admin/Edit_access/$1/$2/$3';
