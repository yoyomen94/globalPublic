<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Front Methods

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'Acontroller';

//Registration
$route['sign-up'] = "Acontroller/signUp";
$route['register-user'] = "Bcontroller/registerUser";
$route['verify-account/(:any)'] = "Acontroller/verifyAccount";
$route['login'] = "Acontroller/login";
$route['user-login'] = "Ccontroller/userLogin";
$route[user.'/dashboard'] = "Acontroller/userDashboard";
$route['user-logout'] = "Acontroller/userLogout";

$route['get-captcha'] = "Acontroller/getCaptcha";

//User Forgot Password
$route['user-forgot-password'] = "Bcontroller/userForgotPassword";
$route['password-recovery/(:any)'] = "Acontroller/passwordRecovery";
$route['user-password-reset'] = "Bcontroller/userPasswordReset";

//User Panel

//Update Password
$route[user.'/update-password'] = "Acontroller/updatePassword";
$route['update-user-password'] = "Bcontroller/updateUserPassword";

//User Profile
$route[user.'/user-profile'] = "Acontroller/userProfile";

//Manage Provide Help (PH)
$route[user.'/provide-help'] = "Acontroller/provideHelp";

// Admin
$route[admin] = "admin/Acontroller/login";
$route[admin.'/change-password'] = "admin/Acontroller/changePassword";
$route[admin.'/logout'] = "admin/Acontroller/logout";
$route[admin.'/dashboard'] = "admin/Acontroller/welcomeAdmin";

//admin method using ajax
$route['loginCheck'] = "admin/Ccontroller/loginCheck";//for login
$route['forgot-password'] = "admin/Bcontroller/forgotPassword";//for forget password
$route['delete-data'] = "admin/Econtroller/deleteData";
$route['block-data-function'] = "admin/Fcontroller/blockDataFunction";//for block data
$route['update-password'] = "admin/Bcontroller/updatePassword";//for update password

//Manage SEO Page
$route[admin.'/list-page'] = "admin/Acontroller/listPage";
$route[admin.'/edit-page/(:any)'] = "admin/Dcontroller/editPage";
$route['submit-page'] = "admin/Bcontroller/submitPage";

//User mngmt
$route[admin.'/user-list'] = "admin/Acontroller/userList";
$route[admin.'/view-user/(:any)'] = "admin/Acontroller/viewUser";
$route['user-table-grid-data'] = "admin/Bcontroller/userTableGridData";