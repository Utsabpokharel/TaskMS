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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //dashboard
    Route::get('/index', 'dashboardController@index')->name('admin-dashboard');
    //roles
    Route::resource('/roles','rolesController');
    //departments
    Route::resource('/department','departmentsController');
    // users
    Route::resource('/user','allUsersController');
    // tasks
    Route::resource('/task','toDosController');
    
    //user profile    
    Route::get('/profile', 'userProfileController@auth_prof')->name('user_profile');

    Route::any('/updateProfile', 'userProfileController@prof_update')->name('update_profile');
    //Education details
    Route::resource('/education', 'educationDetailsController');

    //User Work Details
    Route::resource('/work', 'workDetailsController');

    //User Personal Details
    Route::resource('/personal', 'personalDetailsController');
            
});


Auth::routes();
// Auth::routes(['registration' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::any('/', 'AuthController@index');
Route::any('post-login', 'AuthController@postLogin'); 
// Route::get('registration', 'AuthController@registration');
// Route::post('post-registration', 'AuthController@postRegistration'); 
// Route::any('dashboard', 'AuthController@dashboard'); 
Route::any('logout', 'AuthController@logout');