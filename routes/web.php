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
    return view('welcome');
});

// Route::get('/dashboard', function(){ 
//     return view('Admin.dashboard');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function() {
    Route::get('/dashboard', function(){ 
        return view('Admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredEdit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@roleRegisterUpdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@roleDelete');

});
