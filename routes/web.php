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

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function(){ 
//     return view('Admin.dashboard');
// });

// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

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

    Route::get('/products-all','Admin\ProductController@index');
    Route::post('/store-product','Admin\ProductController@store');
    Route::get('/edit-product/{id}','Admin\ProductController@edit');
    Route::put('/update-product/{id}','Admin\ProductController@update');
    Route::delete('/delete-product/{id}','Admin\ProductController@destroy');

    Route::get('/reviews-all','Admin\ReviewController@index');
    Route::post('/store-review','Admin\ReviewController@store');  
    Route::get('/edit-review/{id}','Admin\ReviewController@edit');
    Route::put('/update-review/{id}','Admin\ReviewController@update');
    Route::delete('/delete-review/{id}','Admin\ReviewController@destroy');    

});






