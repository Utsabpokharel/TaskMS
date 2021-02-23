<?php

use Illuminate\Support\Facades\Auth;
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


Route::any('/', 'AuthController@index')->name('/login');
Route::any('post-login', 'AuthController@postLogin');
// Route::get('registration', 'AuthController@registration');
// Route::post('post-registration', 'AuthController@postRegistration');
// Route::any('dashboard', 'AuthController@dashboard');
Route::any('logout', 'AuthController@logout');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //dashboard
    Route::get('/index', 'dashboardController@index')->name('admin-dashboard');
    Route::get('/notification', 'dashboardController@notification')->name('notification');

    //user profile
    Route::get('/profile', 'userProfileController@auth_prof')->name('user_profile');

    Route::any('/updateProfile', 'userProfileController@prof_update')->name('update_profile');

    Route::any('/updatePassword', 'userProfileController@password_update')->name('update_password');

    Route::any('/updatePhoto/{id}', 'userProfileController@photo_update')->name('update_photo');

    //Education details
    Route::resource('/education', 'educationDetailsController');

    //User Work Details
    Route::resource('/work', 'workDetailsController');

    //User Personal Details
    Route::resource('/personal', 'personalDetailsController');
    //re-assign
    Route::put('//Todo-reassign/{id}', 'toDosController@reaassign')->name('reaassign');
    //edit re-assign
    Route::any('//Todo-editreassign/{id}', 'toDosController@editreaassign')->name('editre-assign');
    Route::any('//Todo-updatereassign/{id}', 'toDosController@updateReassign')->name('updateReassign');
    //task re-assign
    Route::put('/Todo-ReAssign/{id}', 'toDosController@ReAssign')->name('ReAssign');

    Route::get('/Usermarkasread', function () {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\UserNotification')->markAsRead();
        return redirect()->route('user.index');
    })->name('Usermarkasread');

    Route::get('/Taskmarkasread', function () {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\TaskNotification')->markAsRead();
        return redirect()->route('Employee');
    })->name('Taskmarkasread');
});

Route::group(['middleware' => ['super']], function () {
    //roles
    Route::resource('/roles', 'rolesController');
    //departments
    Route::resource('/department', 'departmentsController');
    // users
    Route::resource('/user', 'allUsersController');
    // tasks
    Route::resource('/task', 'toDosController');
});
Route::group(['middleware' => ['adminn']], function () {
    Route::resource('/task', 'toDosController')->except(['index']);
    Route::get('/Admin', 'employeeController@GetList')->name('adminTask');
    Route::get('/AdminAssigned', 'employeeController@GetAdminList')->name('assignTask');
    Route::get('/Details/{id}', 'employeeController@GetAdminTaskDetail')->name('TaskDetails');
});
Route::group(['middleware' => ['employee']], function () {
    Route::get('/TaskList', 'employeeController@GetList')->name('Employee');

    Route::get('/TaskDetails/{id}', 'employeeController@GetTaskDetail')->name('EmployeeDetails');
});
Route::group(['middleware' => ['comment']], function () {

    //comment
    Route::resource('/comment', 'commentsController');
    //pending
    Route::put('/Todo-Pending/{id}', 'toDosController@pending')->name('pending');
    //complete
    Route::put('/Todo-Complete/{id}', 'toDosController@complete')->name('complete');
});
