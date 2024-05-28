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
$route['default_controller'] = 'Students';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//For Students Module
$route['students/(.+)'] = 'Students/$1';
$route['students'] = 'Students';

//For registration Module
$route['registration/(.+)'] = 'Registration/$1';
$route['registration'] = 'Registration';

//For Admin Exam Module
$route['a_exam/(.+)'] = 'A_exam/$1';
$route['a_exam'] = 'A_exam';
//For Question Module
$route['a_question/(.+)'] = 'A_question/$1';
$route['a_question'] = 'A_question';

//For Admin Module
$route['admin/(.+)'] = 'Admin/$1';
$route['admin'] = 'Admin';

//For settings Module
$route['settings/(.+)'] = 'Settings/$1';
$route['settings'] = 'Settings';


//For A_usergroup Module
$route['a_usergroup/(.+)'] = 'A_usergroup/$1';
$route['a_usergroup'] = 'A_usergroup';

//For A_user Module
$route['a_user/(.+)'] = 'A_user/$1';
$route['a_user'] = 'A_user';

//For A_designation Module
$route['a_designation/(.+)'] = 'A_designation/$1';
$route['a_designation'] = 'A_designation';

//For A_departmentGroup Module
$route['a_departmentGroup/(.+)'] = 'A_departmentGroup/$1';
$route['a_departmentGroup'] = 'A_departmentGroup';

//For A_department Module
$route['a_department/(.+)'] = 'A_department/$1';
$route['a_department'] = 'A_department';

//For reports Module
$route['reports/(.+)'] = 'Reports/$1';
$route['reports'] = 'Reports';