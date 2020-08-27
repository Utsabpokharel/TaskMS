<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
// Auth::routes(['registration' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::any('/', 'AuthController@index');
Route::any('post-login', 'AuthController@postLogin'); 
// Route::get('registration', 'AuthController@registration');
// Route::post('post-registration', 'AuthController@postRegistration'); 
// Route::any('dashboard', 'AuthController@dashboard'); 
Route::any('logout', 'AuthController@logout');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
     //dashboard
    Route::get('/index', 'dashboardController@index')->name('admin-dashboard');

     //user profile    
    Route::get('/profile', 'userProfileController@auth_prof')->name('user_profile');

    Route::any('/updateProfile', 'userProfileController@prof_update')->name('update_profile');
 
    Route::any('/updatePhoto/{id}', 'userProfileController@photo_update')->name('update_photo');

    //Education details
    Route::resource('/education', 'educationDetailsController');

    //User Work Details
    Route::resource('/work', 'workDetailsController');

    //User Personal Details
    Route::resource('/personal', 'personalDetailsController');
});

Route::group(['middleware' => ['super']], function () {
    //roles
    Route::resource('/roles','rolesController');
    //departments
    Route::resource('/department','departmentsController');
    // users
    Route::resource('/user','allUsersController');
    // tasks
    Route::resource('/task','toDosController');

    //re-assign
    Route::put('//Todo-reassign/{id}','toDosController@reaassign')->name('reaassign');
    //task re-assign
    Route::put('/Todo-ReAssign/{id}', 'toDosController@ReAssign')->name('ReAssign');
});

Route::group(['middleware' => ['employee']], function () {
    Route::get('/Employee', 'employeeController@GetList')->name('Employee');

    Route::get('/EmployeeDetails/{id}', 'AdminControllers\EmployeeController@GetTaskDetail')->name('EmployeeDetails');

    //pending
    Route::put('/Todo-Pending/{id}','toDosController@pending')->name('pending');
    //complete
    Route::put('/Todo-Complete/{id}','toDosController@complete')->name('complete');
});