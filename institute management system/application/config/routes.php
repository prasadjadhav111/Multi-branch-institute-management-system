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
$route['default_controller'] = 'Client';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['student/dashboard'] = 'login_c/dasboard';
$route['student/profile'] = 'login_c/account';
 $route['student'] = 'login_c';
 $route['student/signup'] = 'login_c/register';
 $route['student/email_verification/(:any)']='login_c/verify';
 $route['student/login']='login_c/login';
$route['student/check_mail']='login_c/check_mail';
$route['student/google_login?(:any)']='login_c/google_log';
$route['student/linkedin_login?(:any)']='login_c/link_log';
$route['courses']='client/course';
$route['branches']='client/branch_detail';
$route['instructors']='client/users';
$route['events']='client/event';
$route['faculty-profile/(:num)']='client/user_profile_ajax';
$route['faculty-profile/(:any)']='client/user_profile';
$route['contact-us']='client/contactus';
$route['courses/(:num)']='client/course';
$route['courses/(:any)']='client/course_details';
$route['course/enrollment/(:any)']='client/course_enroll';
$route['course/payment-receipt']='client/success';
$route['course/payment-fail']='client/fail';
$route['course/payment-processing']='client/enroll';
$route['online-test/(:any)']='student/test_course';
$route['online-test/ranking/(:any)']='student/testrank';
$route['online-test/question-paper/(:any)/(:any)']='student/questionpaper';
$route['online-test/question-paper/(:any)']='student/exampaper';
$route['student/change-password']='login_c/changepassword';
$route['student/update-password/(:any)']='login_c/updatepassword';
$route['student/update-password']='login_c/changepassword_field';

$route['super_admin/manage_event']='super_admin/cal';

// $route['online-test/(:any)']='student/questionpaper';
// $route['test/']='student/exampaper'
