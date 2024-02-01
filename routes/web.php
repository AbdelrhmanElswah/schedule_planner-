<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OAuthController;



/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', '/admin/home');
// Admin Login and Logout Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
});

// Protected Admin Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('/home', 'HomeController@index');

        Route::get('calendar/select', 'CalendarController@filterCalender');
        Route::get('calendar/show', 'CalendarController@showCalendar');
                
        Route::resource('department', 'DepartmentController');
         
        Route::resource('course', 'CourseController');

        Route::resource('instrusctor', 'InstrusctorController');

        Route::resource('room', 'RoomController');

        // Users
        Route::resource('users', 'UserController');
        // Admins
        Route::resource('admins', 'AdminController');

        Route::post('/lecture/save', 'LectureController@store');
        Route::post('/lecture/update/{id}', 'LectureController@update');
        Route::delete('/lecture/delete/{id}', 'LectureController@delete');

    });
// OAuth Routes
Route::get('/oauth/authorize', 'App\Http\Controllers\OAuthController@authorizeToken')->name('oauth.authorize');
Route::post('/oauth/token', 'App\Http\Controllers\OAuthController@token')->name('oauth.token');
Route::post('/fulfillment', 'App\Http\Controllers\GoogleHomeController@fulfillment')->name('google.fulfillment');
