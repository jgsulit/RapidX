<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('auth.admin_login');
});


Route::get('/new_user_mail', function () {
    return view('mail.user.new_user');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function(){
	return view('index');
})->name('dashboard');

Route::get('/home', function(){
	return view('index');
})->name('home');

Route::get('/users', function () {
    return view('users');
});
Route::get('/department', function () {
    return view('department');
});
Route::get('/user_access', function(){
	return view('user_access');
});
Route::get('/module', function(){
	return view('module');
});
Route::get('/new_user', function(){
	return view('auth.new_user');
});

// Route::get('/QADS', function () {
//     return view('auth.login');
// });

// USER CONTROLLER
Route::get('/sign_in', 'UserController@sign_in');
Route::get('/sign_in_admin', 'UserController@sign_in_admin');
Route::get('/user_logout', 'UserController@user_logout');
Route::get('/view_users', 'UserController@view_users');
Route::post('/add_user', 'UserController@add_user');
Route::post('/deactivate_user', 'UserController@deactivate_user');
Route::post('/activate_user', 'UserController@activate_user');
Route::post('/reset_password', 'UserController@reset_password');
Route::get('/get_users_by_stat', 'UserController@get_users_by_stat');
Route::post('/change_password', 'UserController@change_password');
Route::get('/get_user_by_id', 'UserController@get_user_by_id');
Route::post('/edit_user', 'UserController@edit_user');
Route::get('/check_session_rapidx', 'UserController@check_session_rapidx')->name('check_session_rapidx'); // JD

// DEPARTMENT CONTROLLER
Route::get('/get_department_by_stat', 'DepartmentController@get_department_by_stat');
Route::get('/get_department_by_id', 'DepartmentController@get_department_by_id');
Route::get('/view_department_by_stat', 'DepartmentController@view_department_by_stat');
Route::post('/archive_department', 'DepartmentController@archive_department');
Route::post('/restore_department', 'DepartmentController@restore_department');
Route::post('/add_department', 'DepartmentController@add_department');
Route::post('/edit_department', 'DepartmentController@edit_department');

// USER LEVEL CONTROLLER
Route::get('/get_user_level_by_stat', 'UserLevelController@get_user_level_by_stat');

// MODULE
Route::get('/get_module_by_stat', 'ModuleController@get_module_by_stat');
Route::get('/get_module_by_id', 'ModuleController@get_module_by_id');
Route::get('/view_module_by_stat', 'ModuleController@view_module_by_stat');
Route::post('/archive_module', 'ModuleController@archive_module');
Route::post('/restore_module', 'ModuleController@restore_module');
Route::post('/add_module', 'ModuleController@add_module');
Route::post('/edit_module', 'ModuleController@edit_module');

// USER ACCESS
Route::get('/get_user_access_by_id', 'UserAccessController@get_user_access_by_id');
Route::get('/view_user_access_by_stat', 'UserAccessController@view_user_access_by_stat');
Route::post('/archive_user_access', 'UserAccessController@archive_user_access');
Route::post('/restore_user_access', 'UserAccessController@restore_user_access');
Route::post('/add_user_access', 'UserAccessController@add_user_access');
Route::post('/edit_user_access', 'UserAccessController@edit_user_access');
Route::get('/getUserAccess', 'UserAccessController@getUserAccess');


/**
 * Temporary login for ESS
 * Added by JD 06-05-2023
 */
Route::get('/ess', function () {
    return view('auth.ess_login');
});
Route::get('/sign_in_ess', 'UserController@sign_in_ess');